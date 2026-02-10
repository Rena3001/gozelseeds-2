<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\ContactSection;
use App\Models\Page;
use App\Models\Setting;
use App\Services\MicrosoftMailerService;
use Symfony\Component\Mime\Email;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request, $locale)
    {
         $page = Page::where('slug', 'about')
            ->with('translation')
            ->where('is_active', true)
            ->firstOrFail();
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }
        $contactSection = ContactSection::where('is_active', true)
            ->with('translation')
            ->first();
        $settings = Setting::with('translation')->first();

        return view('client.pages.contact', compact('contactSection', 'settings', 'locale','page'));
    }

    public function send(Request $request)
    {
        try {
            // Validation (error göstərmədən)
            $data = $request->validate([
                'name'    => 'required|string|max:255',
                'email'   => 'required|email|max:255',
                'message' => 'required|string|min:3',
                'cv'      => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            ]);

            // CV upload
            if ($request->hasFile('cv')) {
                $data['cv'] = $request->file('cv')->store('cvs', 'public');
            }

            // DB save
            \App\Models\ContactMessage::create($data);
            try {
                $mailer = app(MicrosoftMailerService::class);

                $email = (new Email())
                    ->from(config('mail.from.address'))
                    ->to(config('mail.from.address'))
                    ->subject('New Contact Message')
                    ->text($data['message']);

                $mailer->mailer()->send($email);
            } catch (\Throwable $e) {
                // LOG-la, amma user-a hiss etdirmə
                \Log::error('Microsoft mail error: ' . $e->getMessage());
            }
            return back()->with('status', 'success');
        } catch (\Throwable $e) {
            return back()->with('status', 'error');
        }
    }
}

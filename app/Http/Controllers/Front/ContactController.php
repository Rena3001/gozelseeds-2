<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactSection;
use App\Services\MicrosoftMailerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;

class ContactController extends Controller
{
    public function index(Request $request, $locale)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }
        $contactSection = ContactSection::where('is_active', true)
            ->with('translation')
            ->first();
        return view('client.pages.contact', compact('locale', 'contactSection'));
    }



    public function send(Request $request, $locale, MicrosoftMailerService $mailer)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }

        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // ✅ Symfony Email (OAuth uyğun)
        $email = (new Email())
            ->from(config('mail.from.address'))
            ->replyTo($data['email'])
            ->to(config('mail.from.address'))
            ->subject('New Contact Message')
            ->text(
                "Name: {$data['name']}\n" .
                    "Email: {$data['email']}\n\n" .
                    "Message:\n{$data['message']}"
            );

        // ✅ Microsoft OAuth SMTP ilə göndər
        $mailer->mailer()->send($email);

        return response()->json([
            'success' => true,
            'message' => __('contact.success'),
        ]);
    }
}

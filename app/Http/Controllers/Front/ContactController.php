<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
     public function send(Request $request, $locale)
    {
        if (in_array($locale, ['az', 'en', 'ru'])) {
            app()->setLocale($locale);
        }

        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Sadə mail (istəsən sonra Mailable edərik)
        Mail::raw(
            "Name: {$data['name']}\nEmail: {$data['email']}\n\nMessage:\n{$data['message']}",
            function ($message) {
                $message->to(config('mail.from.address'))
                        ->subject('New Contact Message');
            }
        );

        return response()->json([
            'success' => true,
            'message' => __('contact.success'),
        ]);
        return view('client.pages.contact', compact('locale'));
    }
}

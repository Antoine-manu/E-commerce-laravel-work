<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendinblueMailer;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only('name', 'email', 'message');

        // Préparer le contenu de l'email
        $content = "
            <h1>New Contact Form Submission</h1>
            <p><strong>Name:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Message:</strong> {$data['message']}</p>
        ";

        // Envoyer l'email
        $mailer = new SendinblueMailer();
        $mailer->sendEmail('quentingransart1998@gmail.com', 'New Contact Form Submission', $content);

        return back()->with('success', 'Merci de nous avoir contactés !');
    }
}

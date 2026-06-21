<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'nullable|string|max:20',
            'subject'        => 'nullable|string|max:255',
            'reference_name' => 'nullable|string|max:255',
            'message'        => 'required|string',
            'captcha'        => ['required', 'string', new \App\Rules\Captcha],
        ]);

        Contact::create($request->only([
            'name', 'email', 'phone', 'subject', 'reference_name', 'message'
        ]));

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent! We will get back to you soon.'
            ]);
        }

        return back()->with('success', 'Your message has been sent! We will get back to you soon.');
    }
}

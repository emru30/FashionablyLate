<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->all();
    }
}

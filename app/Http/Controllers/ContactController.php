<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        $validation_rules = [
            'name' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'string', 'regex:/^[\+\w.-]+@([\w.-]+)$/', 'max:255'],
            'comment' => ['required', 'string'],
        ];

        $data = $request->validate($validation_rules);


        return view('contact.confirm', $data);
    }

    public function send(Request $request)
    {
        $data = $request->only(['name', 'mail','comment']);

        $attributes = $request->only(['name', 'mail','comment']);

        Contact::create($attributes);

        return view('contact.thanks', $data);
    }
    
    public function datail()
    {
        return view('contact.datail');
    }
    public function list()
    {
        return view('contact.list');
    }


}

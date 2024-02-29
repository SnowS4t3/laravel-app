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

    public function __construct()
    {
        $this->contact = new Contact();
    }


    public function list()
    {

        $contacts = $this->contact->findAllContacts();

        return view('contact.list',compact('contacts'));

    }

    public function detail($id)
    {
        $contact = Contact::find($id);

        return view('contact.detail',compact('contact'));
    }
    
    public function destroy($id)
    {
        $this->contact->deleteContactById($id);

        return redirect()->route('contact.list');
    }
}

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

    public function confirm()
    {
        return view('contact.confirm');
    }

    public function thanks()
    {
        return view('contact.thanks');
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

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
        $data = $request->only(['name', 'mail','comment','title','status']);

        $attributes = $request->only(['name', 'mail','comment','title','status']);

        Contact::create($attributes);

        return view('contact.thanks', $data);
    }

    public function __construct()
    {
        $this->contact = new Contact();
    }


    public function list()
{
    $filterStatus = request()->input('status', null);

    if ($filterStatus !== null && in_array($filterStatus, [1, 2, 3])) {
        $contacts = (new Contact)->findContactsByStatus($filterStatus);
    } else {
        $contacts = $this->contact->findAllContacts();
    }

    $status = [
        1 => '1',
        2 => '2',
        3 => '3',
    ];

    // ステータスごとのカウントを取得
    $statusCounts = [];
    foreach ($status as $value) {
        $statusCounts[$value] = (new Contact)->getContactCountByStatus($value);
    }

    return view('admin.list', compact('contacts', 'status', 'statusCounts'));
}

    public function detail($id)
    {
        $contact = Contact::find($id);

        return view('admin.detail',compact('contact'));
    }
    
    public function destroy($id)
    {
        $this->contact->deleteContactById($id);

        return redirect()->route('admin.list');
    }

    public function update($id,Request $request)
    {
        $contact = Contact::find($id);

        $contact->status = $request->input('status');

        $contact->save();

        return redirect()->route('admin.list')->with('success', '状態を更新しました');
    }


}

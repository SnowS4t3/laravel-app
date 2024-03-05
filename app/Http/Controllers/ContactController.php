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

        $contacts = $this->contact->findAllContacts();

        return view('admin.list',compact('contacts'));

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
        // バリデーションなどが必要であれば追加

        // Eloquentモデルを使用してデータベースのレコードを取得
        $contact = Contact::find($id);

        // フォームで選択された状態を更新
        $contact->status = $request->input('status');

        // 他にも更新すべきフィールドがあればここで追加

        // レコードを保存
        $contact->save();

        // 成功メッセージやリダイレクトなどの処理を追加
        return redirect()->route('admin.list')->with('success', '状態を更新しました');
    }

    
}

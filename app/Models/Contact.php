<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = ['name', 'mail','comment'];

    public function findAllContacts()
    {
        return Contact::all();
    }

    public function __contact()
    {
        $this->contact = new Contact();
        // return $this->belongsTo(Contact::class);
    }

    public function deleteContactById($id)
    {
        // $deleted = Contact::where('id',$id)->delete();
        // return $deleted;
        return $this->destroy($id);
    }

}

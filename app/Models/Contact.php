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

    // public function contact()
    // {
    //     return $this->belongsTo(Contact::class);
    // }

}

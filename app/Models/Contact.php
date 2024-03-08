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

    }

    public function deleteContactById($id)
    {
        return $this->destroy($id);
    }

    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];
    /**
     * ステータス（状態）ラベルのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusLabelAttribute()
    {

        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラスのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function getStatusAvgAndCount($id)
    {
        return Contact::selectRaw('contact, COUNT(*) as count')
        ->groupBy('contact')
        ->where('contact_id', $id)
        ->get();
    }

    public function findContactsByStatus($status)
    {
        return $this->where('status', $status)->get();
    }

    public function getStatusSum()
    {
        return Contact::whereBetween('status', [1, 3])->sum('status');
    }

    public function getContactCountByStatus($status)
    {
        return $this->where('status', $status)->count();
    }

}

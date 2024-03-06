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
/**
     * ステータス（状態）定義
     * 
     */
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
        // ステータス（状態）カラムの値を取得する
        $status = $this->attributes['status'];

        // STATUSに定義されていない場合
        if (!isset(self::STATUS[$status])) {
            // 空文字を返す
            return '';
        }
        // STATUSの値（['label']）を返す
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
}

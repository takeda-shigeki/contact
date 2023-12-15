<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'sex',
        'email',
        'postal_code',
        'address',
        'building',
        'inquiry'
    ];
    public static $rules = array(
        'fullname' => 'required',
        'sex' => 'integer|min:1|max:2',
        'email' => 'required',
        'postal_code' => 'required',
        'address' => 'required',
        'inquiry' => 'required',
    );
    public function getDetail()
    {
        $txt = 'ID:' . $this->id . ' ' . $this->fullname . ' ' . '性別:' . $this->sex . '（1：男性　2：女性) ' . ' ' . $this->email . ' ' . '〒' . $this->postal_code . ' ' . $this->address. ' ' . $this->building. ' ' . $this->inquiry;
        return $txt;
    }
    public function contact()
    {
        return $this->hasOne('App\Models\Contact');
    }
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }
    public function scopeFullnameSearch($query, $keyword_fullname)
    {
        if (!empty($keyword_fullname)) {
            $query->where('fullname', 'like', '%' . $keyword_fullname . '%');
        }
    }
    public function scopeEmailSearch($query, $keyword_email)
    {
        if (!empty($keyword_email)) {
            $query->where('email', $keyword_email);
        }
    }
    public function scopeFromSearch($query, $from)
    {
        if (!empty($from)) {
            $query->whereDate('created_at','>=', $from);;
        }
    }
    public function scopeUntilSearch($query, $until)
    {
        if (!empty($until)) {
            $query->whereDate('created_at','<=', $until);;
        }
    }
    public function scopeCategorySearch($query, $category_sex)
    {
        if (!empty($category_sex)) {
            $query->where('sex', $category_sex);
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoaiModel extends Model
{
    protected $table="theloai";
    public $timestamps=false;
    public function sach()
    {
        return $this->hasMany('App\SachModel','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaXuatBanModel extends Model
{
    protected $table="nhaxuatban";
    public $timestamps=false;
    public function sach()
    {
        return $this->hasMany('App\SachModel','id');
    }
}

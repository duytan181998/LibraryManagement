<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SachModel extends Model
{
    protected $table="sach";
    public $timestamps=false;

    public function tacgia()
    {
        return $this->belongsTo('App\TacGiaModel','matacgia');
    }
    public function nhaxuatban()
    {
        return $this->belongsTo('App\NhaXuatBanModel','manxb');
    }
    public function theloai()
    {
        return $this->belongsTo('App\TheLoaiModel','matheloai');
    }
    public function ctmuon()
    {
        return $this->hasOne('App\CTMuonTraModel','masach');
    }
}

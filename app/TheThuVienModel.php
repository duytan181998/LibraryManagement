<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheThuVienModel extends Model
{
    protected $table="thethuvien";
    public $timestamps=false;

    public function muontra()
    {
        return $this->hasOne('App\MuonTraModel','sothe');
    }

    public function docgia()
    {
        return $this->hasOne('App\DocGiaModel','sothe','id');
    }
}

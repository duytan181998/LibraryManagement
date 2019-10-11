<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuonTraModel extends Model
{
    protected $table="muontra";
    public $timestamps=false;
    public function ctmuontra()
    {
        return $this->hasOne('App\CTMuonTraModel','mamuontra');
    }

    public function thethuvien()
    {
        return $this->belongsTo('App\TheThuVienModel','sothe');
    }
}

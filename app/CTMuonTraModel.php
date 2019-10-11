<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTMuonTraModel extends Model
{
    protected $table="ctmuontra";
    public $timestamps=false;

    public function muontra()
    {
        return $this->belongsTo('App\MuonTraModel','mamuontra');
    }

    public function sach()
    {
        return $this->belongsTo('App\SachModel','masach');
    }
}

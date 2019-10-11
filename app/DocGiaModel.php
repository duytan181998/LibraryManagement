<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocGiaModel extends Model
{
    protected $table="docgia";
    public $timestamps=false;

    public function thuvien()
    {
        return $this->belongsTo('App\TheThuVienModel','sothe','id');
    }
    public function scopeSothe($query)
    {
        return $query->where('sothe','>','0');
    }
}

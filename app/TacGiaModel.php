<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacGiaModel extends Model
{
    protected $table="tacgia";
    public $timestamps=false;

    public function sach()
    {
        return $this->hasMany('App\SachModel','id');
    }
}

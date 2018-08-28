<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Updatepsn extends Model
{
    //
    protected $fillable = [   'number_pks' ,
    'number_kss' ,
    'prefix' ,
    'name',
    'lastname' ,
    'monkname' ,
    'birthday' ,
    'birth_monkday',
    'school_name' ,
    'wat_name' ,
    'etc' ,
    'contact' ,
    'file'

];

public function ppt2() {
    return $this->hasOne('App\fileupload','updatepsns_id');
}
}

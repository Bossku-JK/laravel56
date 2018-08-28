<?php

namespace App\Gongtham;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    //
    public function Users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Members::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Members::class, 'parent_id','id');
    }


}

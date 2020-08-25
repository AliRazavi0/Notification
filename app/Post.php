<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=[

    ];

    public function user(){
        return $this->where('id',$this->user_id)->first();
    }
}

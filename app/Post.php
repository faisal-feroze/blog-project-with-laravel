<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];
    
    public function user(){
        
        return $this->belongsTo(User::class);
        
    }

    //Mutator
    // public function setPostImgAttribute($value){
    //     $this->attributes['post_img'] = asset($value);
    // }

    //Accessor
    public function getPostImgAttribute($value){

        return asset('/storage/'.$value);
    }


}

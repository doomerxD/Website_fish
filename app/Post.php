<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{  
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()   
    {
        return $this->hasMany('App\Comment');  
    }
    
    public function likes()   
    {
        return $this->belongsToMany('App\User',"likes","post_id","user_id");  
    }
    
    public function images()   
    {
        return $this->hasMany('App\Image');  
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
    
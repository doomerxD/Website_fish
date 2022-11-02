<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{  
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'tool',
        'user_id',
        'address',
        'lat',
        'lng'
    ];
    
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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
}
    
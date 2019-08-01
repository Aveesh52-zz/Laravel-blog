<?php

namespace App;
use Category;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;
class Post extends Model
{   use softDeletes;
    protected $fillable = [
        'title','content','price','featured','category_id','slug'
    ]; 
    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    public function categories(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}

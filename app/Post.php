<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'title', 'body'
    ];

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters){

        //$posts = Post::latest();

        //if($month = request('month')){
        //   $posts->whereMonth('create_at', Carbon::parse($month)->month);
        //}

        //if($year = request('year')){
        //     $posts->whereYear('create_at', $year);
        //}

        //$posts = $posts->get();


    }

}

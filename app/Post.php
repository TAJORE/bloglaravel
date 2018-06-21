<?php

namespace App;

use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    //protected $guarded = [];

    // ou encore protected $fillable = ['title', 'body'];

    /**
     * Override parent boot and Call deleting event
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($posts) {
            foreach ($posts->comments()->get() as $comment) {
                $comment->delete();
            }
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    // A post also belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function addComment($body)
    {
        //Add a comment to a post

        //$this->comments()->create(compact('body'));


        //  Ou encore
        //
        //
        Comment::create([
            'body' => $body,
            'post_id' => $this->id,   //$this refer to the post.
            'user_id' => auth()->id(),
        ]);
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month'])) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);   //On cherche les posts qui ont été créé pendant le mois indiqué dans la requête
            //On utilise la bibliothèque Carbon pour convertir le mois au chiffre correspondant. January->1, Febuary->2, ...
        }

        if (isset($filters['year'])) {
            $query->whereYear('created_at', $filters['year']);     // On selectionne parmis les posts créés pendant les mois indiqués plus haut, ceux qui ont été créés durant l'année indiquée dans la requête.
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published' )   // On selectionne les années, les mois de création et le nbre des posts
        ->groupBy('year', 'month')                                                                           // On les classe par année et par mois
        ->orderByRaw('min(created_at) desc')
            ->get()                                                                                              // On les prends
            ->toArray();
    }
}

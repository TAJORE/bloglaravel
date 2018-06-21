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
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);   //On cherche les posts qui ont �t� cr�� pendant le mois indiqu� dans la requ�te
            //On utilise la biblioth�que Carbon pour convertir le mois au chiffre correspondant. January->1, Febuary->2, ...
        }

        if (isset($filters['year'])) {
            $query->whereYear('created_at', $filters['year']);     // On selectionne parmis les posts cr��s pendant les mois indiqu�s plus haut, ceux qui ont �t� cr��s durant l'ann�e indiqu�e dans la requ�te.
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published' )   // On selectionne les ann�es, les mois de cr�ation et le nbre des posts
        ->groupBy('year', 'month')                                                                           // On les classe par ann�e et par mois
        ->orderByRaw('min(created_at) desc')
            ->get()                                                                                              // On les prends
            ->toArray();
    }
}

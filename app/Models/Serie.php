<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'author_id',
        'title',
        'content',
        'acteurs',
        'url',
        'tags',
        'date',
        'status',
    ];

     /**
    * Get the user that authored the serie.
    */
   public function author()
   {
       return $this->belongsTo(User::class,'author_id');
   }

   public function image()
   {
       return $this->hasOne(Image::class, 'serie_id');
   }

   public function comments()
   {
       return $this->morphMany(Comment::class, 'commentable')->latest();
   }


}

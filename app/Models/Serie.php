<?php

namespace App\Models;

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

}

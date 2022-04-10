<?php

namespace App\Models;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    
    protected $guarded = [];
    protected $fillable = [
        'author_id',
        'serie_id',
        'content',
        'date',
    ];

    
    public function commentable()
    {
        return $this->morphTo();
    }


    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}

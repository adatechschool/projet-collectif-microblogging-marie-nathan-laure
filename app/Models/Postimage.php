<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postimage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

       /**
    * Relation avec la table Post (une image appartient à un unique post)
    */
   public function post(): BelongsTo
   {
       return $this->belongsTo(Post::class);
   }
}
    

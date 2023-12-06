<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
    * Les attributs du modèle Post qui définissent les colonnes retrouvées dans la BDD
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'content',
       'picture',
   ];
   /**
    * Relation avec la table User (un post appartient à un user mais un user peut avoir plusieurs posts)
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }
}

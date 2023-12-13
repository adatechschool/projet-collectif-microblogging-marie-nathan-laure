<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
       'user_id',
   ];
   /**
    * Relation avec la table User (un post appartient à un user mais un user peut avoir plusieurs posts)
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }

      /**
    * Relation avec la table Postimage (un post peut avoir une seule image)
    */
    public function image(): HasOne
    {
        return $this->hasOne(Postimage::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'sujets'; // Assurez-vous que cela pointe vers la bonne table
    protected $primaryKey = 'codeCl'; // Définir codeCl comme clé primaire
    public $incrementing = false; // Indiquer que ce n'est pas un entier auto-incrémenté
    protected $keyType = 'string';
       protected $fillable = [
        'codeCl', // Ajoutez cette ligne
        'nomCl', // Autres champs existants

        // Ajoutez d'autres champs si nécessaire
    ];

}

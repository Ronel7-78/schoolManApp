<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'eleve'; // Assurez-vous que cela pointe vers la bonne table
    protected $primaryKey = 'id'; // Définir codeCl comme clé primaire
    protected $fillable=[

        'matricule',
        'nomEl',
        'prenomEl',
        'dateNais',
        'lieuNais',
        'gender',
        'codeCl',
        'contactP',
        'newOld',
        'montantDue',
        'montantVerse',
        'resteV',
        'datePay',
       // 'photoE',
    ];
}

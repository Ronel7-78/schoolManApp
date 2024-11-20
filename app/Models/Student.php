<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[

        'matricule',
        'nomEl',
        'prenomEl',
        'dateNais',
        'lieuNais',
        'codeCl',
        'contactP',
        'newOld',
        'montantVerse',
        'resteV',
        'datePay',
    ];
}

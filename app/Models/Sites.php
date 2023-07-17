<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;
    protected $fillable = [ "nom","users_id", "etablissement_id"  ];




    public function getuser() 
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


    public function getetablissement() 
    {
        return $this->belongsTo(Etablissements::class, 'etablissement_id', 'id');
    }
}


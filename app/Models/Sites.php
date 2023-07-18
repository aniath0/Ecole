<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;
    protected $fillable = [ "nom","users_id", "etablissement_id",'site_id','statut_id'];




    public function getuser() 
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


    public function getetablissement() 
    {
        return $this->belongsTo(Etablissements::class, 'etablissement_id', 'id');
    }

    public function matieres()
    {
        return $this->hasMany(Matieres::class);
    }

    
    
    

  
   


}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sites;


class Matieres extends Model
{
    use HasFactory;
    protected $fillable = [ "libelle", "description", "coefficient","notemax", "notesoumise","site_id", "statut_id" ];

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }
    
}

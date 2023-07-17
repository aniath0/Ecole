<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sites;
class Roles extends Model
{
    use HasFactory;
    protected $fillable = [ "libelle", "description", "site_id" ];

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sites;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'sigle',
        'libelle',
        'effectif',
        'user_id',
        'site_id',
    ];

    public function getuser() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }
}

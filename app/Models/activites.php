<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activites extends Model
{
    protected $fillable =[
        'nom_activite'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    use HasFactory;
}

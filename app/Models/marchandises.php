<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marchandises extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom',
        'barecode',
        'description',
        'quantite',
        'unite',
        'image'
    ];
    public function categories()
    {
        return $this->belongsTo(categories::class, 'id_cat');
    }

    
}

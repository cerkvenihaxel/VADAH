<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    use HasFactory;

    protected $table = 'obra_social';
    protected $fillable = ['nombre', 'codigo_unico'];
}

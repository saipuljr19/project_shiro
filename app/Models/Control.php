<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'controls';
    protected $primaryKey = 'id';

    // Kolom yang bisa diisi
    protected $fillable = [
        'temperature',
        'turbidity',
        'ph',
    ];
}

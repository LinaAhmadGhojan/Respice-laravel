<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_user',
        'name',
        'list_ingredients',
        'list_instructions',
        'photo'

    ];

    protected $casts = [
        'list_ingredients' => 'array',
        'list_instructions'=>'array'
    ];






}

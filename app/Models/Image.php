<?php
// app/Models/Image.php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\BinaryAs;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['data', 'description'];

    protected $casts = [
        'data' => 'binaryAs:blob',
    ];
}

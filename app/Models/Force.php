<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    protected $table = 'forces';

    protected $fillable = ['year'];
}

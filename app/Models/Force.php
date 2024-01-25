<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Force extends Model
{
    protected $table = 'forces';

    protected $fillable = ['year'];

    public function student(): HasMany
    {
        return $this->hasMany(Student::class, 'force_id', 'id');
    }
}

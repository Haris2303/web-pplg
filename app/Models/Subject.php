<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = ['name'];

    public function hasClasses(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'subjects_has_classes', 'subject_id', 'class_id');
    }
}

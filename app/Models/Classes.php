<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name'];

    public function Students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function hasSubjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subjects_has_classes', 'class_id', 'subject_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'class_id', 'id');
    }
}

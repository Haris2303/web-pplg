<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = ['name'];

    public function hasClasses(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'subjects_has_classes', 'subject_id', 'class_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'subject_id', 'id');
    }

    public function hasTeachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teachers_have_subjects', 'subject_id', 'teacher_id');
    }

    public function scopeFilter($query, $filter)
    {
        return $query->when($filter ?? false, function ($query, $search) {
            $query->where('name', 'like', '%'. $search .'%');
        });
    }
}

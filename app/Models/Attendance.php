<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $guarded = ['id'];

    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function hasClass(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        return $query->when($filters['q'] ?? false, function ($query, $search) {
            $query->whereHas('students', function($query) use ($search) {
                $query->join('users', 'students.user_id', '=', 'users.id')
                    ->where('name', 'like', "%$search%");
            });
        });
    }
}

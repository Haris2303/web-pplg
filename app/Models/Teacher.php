<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hasSubjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'teachers_have_subjects', 'teacher_id', 'subject_id');
    }

    public function scopeFilter($query, array $filters) {
        return $query->when($filters['q'] ?? false, function ($query, $search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%'. $search . '%')->orWhere('nip', 'like', '%' . $search . '%');
            });
        });
    }
}

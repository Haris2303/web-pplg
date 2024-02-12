<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $table = 'students';

    protected $guarded = ['id'];

    public function hasClass(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function force(): BelongsTo
    {
        return $this->belongsTo(Force::class, 'force_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'student_id', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['q'] ?? false, function ($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')->orWhere('nisn', 'like', '%' . $search . '%');
            });
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ProjectMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'role',
        'view',
        'color',
        'accepted_at'
    ];

    protected static function booted(): void
    {
        static::creating(function (ProjectMember $member) {
            $member->created_by = Auth::user()->id;
        });

        static::updating(function (ProjectMember $member) {
            $member->updated_by = Auth::user()->id;
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'accepted_at' => 'datetime:Y-m-d',
        ];
    }
}

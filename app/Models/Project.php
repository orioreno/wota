<?php

namespace App\Models;

use App\Enums\ProjectMemberRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'estimated_start',
        'estimated_finish',
        'default_view',
        'is_private'
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            $project->created_by = Auth::user()->id;
        });

        static::created(function (Project $project) {
            ProjectMember::create([
                'project_id' => $project->id,
                'user_id' => Auth::user()->id,
                'role' => ProjectMemberRole::OWNER,
                'view' => $project->default_view,
                'accepted_at' => now()
            ]);
        });

        static::updating(function (Project $project) {
            $project->updated_by = Auth::user()->id;
        });
    }

    public function members(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }

    static function get_my_projects()
    {
        return Project::whereHas('members', function($hasMember) {
            $hasMember->where('user_id', Auth::user()->id);
        })->orderBy('created_at')->get();
    }
}

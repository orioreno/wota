<?php

namespace App\Policies;

use App\Enums\ProjectMemberRole;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    private function get_role(User $user, Project $project): ProjectMemberRole | null
    {
        $member = $project->members->where('user_id', $user->id)->first();
        $role = $user->is_admin ? ProjectMemberRole::OWNER : ($member->role ?? null);
        return $role;
    }

    public function view_project(User $user, Project $project): Response
    {
        return $this->get_role($user, $project) !== null
            ? Response::allow()
            : Response::deny('You do not have permission to view this project');
    }

    public function manage_project(User $user, Project $project): Response
    {
        return in_array($this->get_role($user, $project), [ProjectMemberRole::OWNER, ProjectMemberRole::MANAGER])
            ? Response::allow()
            : Response::deny('You do not have permission to manage this project');
    }
}

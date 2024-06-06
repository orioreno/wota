<?php

namespace App\Http\Controllers;

use App\Enums\ProjectMemberRole;
use App\Models\ProjectMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectMemberController extends Controller
{
    function list(Request $request)
    {
        Gate::authorize('manage_project', $request->project);
        $members = ProjectMember::where('project_id', $request->project->id);
        if ($request->user) {
            $members->join('users', 'users.id', '=', 'project_members.user_id', 'inner')
                ->where(function($query) use ($request) {
                    $query->whereRaw('LOWER(users.name) LIKE ?', '%'.strtolower($request->user).'%')
                        ->orWhereRaw('LOWER(users.email) LIKE ?', '%'.strtolower($request->user).'%');
                });
        }
        if ($request->role) {
            $members->where('role', $request->role);
        }

        $data = [
            'roles' => ProjectMemberRole::list(),
            'members' => $members->get()
        ];
        return view('project.member', $data);
    }

    function add(Request $request)
    {

    }

    function remove(Request $request)
    {

    }

    function edit_role(Request $request)
    {

    }
}

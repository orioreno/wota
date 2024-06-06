<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->project_id) {
            $project = Project::where('id', $request->project_id)->first();
            Gate::authorize('view_project', $project);
            $member = $project->members->where('user_id', $request->user()->id)->first();
            if ($member) {
                $member->last_access = now()->toDateTimeString();
                $member->save();
            }
            $request->merge([
                'project' => $project,
                'project_member' => $member
            ]);
            return $next($request);
        }
        return abort(404);
    }
}

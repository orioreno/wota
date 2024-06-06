<?php

namespace App\Http\Controllers;

use App\Enums\ProjectView;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    function view(Request $request)
    {
        $data = [
            'project' => $request->project,
            'view' => strtolower($request->v ?? $request->project_member->view ?? $request->project->default_view)
        ];

        if ($data['view'] != strtolower($request->project_member->view)) {
            $request->project_member->view = $data['view'];
        }

        return view('project.view', $data);
    }

    private function form_data(Request $request)
    {
        $data['view_list'] = ProjectView::list();
        $data['project'] = $request->project;

        if ($request->isMethod('post')) {
            $input = $request->validate([
                'name' => ['required','string'],
                'description' => ['string'],
                'estimated_start' => ['required','date'],
                'estimated_finish' => ['required','date'],
                'default_view' => ['required', Rule::in(array_keys($data['view_list']))],
                'is_private' => ['boolean'],
            ]);

            if ($request->project) {
                if ($request->project->update($input)) {
                    return redirect()->route('project.edit', ['project_id' => $request->project->id])
                        ->withSuccess('Project changes has been saved');
                }
            } else {
                $project = Project::create($input);
                if ($project->id) return redirect()->route('project.view', ['project_id' => $project->id]);
            }

            return back()->withInput()->withErrors([
                'flash' => $request->project ? 'Failed to edit project' : 'Failed to create project'
            ]);
        }
        return $data;
    }

    function create(Request $request)
    {
        $data = $this->form_data($request);
        return is_array($data) ? view('project.create', $data) : $data;
    }

    function edit(Request $request)
    {
        Gate::authorize('manage_project', $request->project);
        $data = $this->form_data($request);
        return is_array($data) ? view('project.edit', $data) : $data;
    }


    function delete(Request $request)
    {

    }
}

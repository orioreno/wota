@php $project = request()->project @endphp
<x-layout.auth>
    <div class="d-flex">
        <div class="col-2 p-3">
            <div class="fw-bold mb-3">
                <span class="fa fa-cube"></span>
                {{ $project->name }}
            </div>
            <div class="list-group list-group-flush">
                @can('manage_project', $project)
                <a href="{{ route('project.edit', ['project_id' => $project->id]) }}" class="list-group-item list-group-item-action border-0 @if($nav == "edit") active rounded-3 @endif">
                    Edit project
                </a>
                <a href="{{ route('project.member', ['project_id' => $project->id]) }}" class="list-group-item list-group-item-action border-0 @if($nav == "member") active rounded-3 @endif">
                    Members
                </a>
                @endcan
            </div>

            <div class="py-3 fw-bold">Views</div>
            <div class="list-group list-group-flush">
                @foreach(\App\Enums\ProjectView::cases() as $project_view)
                <a href="{{ route('project.view',['project_id' => $project->id, 'v' => strtolower($project_view->name)]) }}" class="list-group-item list-group-item-action border-0 @if($nav == strtolower($project_view->name)) active rounded-3 @endif">
                    {{ $project_view->label() }}
                </a>
                @endforeach
            </div>

            <div class="py-3 fw-bold">Other projects</div>
            <div class="list-group list-group-flush">
                @foreach(\App\Models\Project::get_my_projects() as $other_project)
                    @if($other_project->id != $project->id)
                    <a href="{{ route('project.view', ['project_id' => $other_project->id]) }}" class="list-group-item list-group-item-action border-0">
                        {{ $other_project->name }}
                    </a>
                    @endif
                @endforeach
                <a href="{{ route('project.create') }}" class="list-group-item list-group-item-action border-0">
                    <i class="fa fa-plus"></i> Create new project
                </a>
            </div>
        </div>
        <div class="flex-fill px-3">
            {{ $slot }}
        </div>
    </div>
</x-layout.auth>

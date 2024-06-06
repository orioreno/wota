<x-layout.auth>
    <div class="d-flex">
        <div class="col-2 border-end p-3">
            <div class="py-3 fw-bold">Views</div>
            <div class="list-group list-group-flush">
                @foreach(\App\Enums\ProjectView::cases() as $project_view)
                <a href="{{ route('project.create',['view' => strtolower($project_view->name)]) }}" class="list-group-item list-group-item-action border-0">
                    {{ $project_view->label() }}
                </a>
                @endforeach
            </div>

            <div class="py-3 fw-bold">Other projects</div>
            <div class="list-group list-group-flush">
                @foreach($my_projects as $project)
                    <a href="{{ route('project.view', ['project_id' => $project->id]) }}" class="list-group-item list-group-item-action border-0">
                        {{ $project->name }}
                    </a>
                @endforeach
                <a href="{{ route('project.create') }}" class="list-group-item list-group-item-action border-0">
                    <i class="fa fa-plus"></i> Create new project
                </a>
            </div>
        </div>
        <div class="flex-fill px-3">
            @if($my_projects->isEmpty())
            <div class="text-center p-5">
                <h3 class="text-muted mb-3">
                    You don't have any project yet
                </h3>
                <a href="{{ route('project.create') }}" class="btn btn-light text-muted border p-5">
                    <div>
                        <i class="fa fa-plus-square mb-3 fs-2"></i><br/>
                        Start your first project here
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>

</x-layout.auth>

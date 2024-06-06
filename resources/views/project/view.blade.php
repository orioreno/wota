<x-layout.project :nav="$view">
    <x-card icon="list">
        <h1>{{ $project->name }}</h1>
        <div>{{ $project->description }}</div>

        @include('project.view.'.$view)
    </x-card>
</x-layout.project>

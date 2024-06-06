<x-card :icon="$project ? 'pencil-square' : 'plus-square'" :title="$project ? 'Edit project' : 'Create new project'">
    <form method="post">
        @csrf
        <x-form.input name="name" label="Project name" :value="$project->name ?? old('name') ?? null" required></x-form.input>
        <x-form.textarea name="description" label="Project description (optional)" :value="$project->description ?? old('description') ?? null"></x-form.textarea>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <x-form.datepicker name="estimated_start" label="Estimated start" :value="$project->estimated_start ?? old('estimated_start') ?? null" required></x-form.datepicker>
            </div>
            <div class="col-sm-6 col-lg-3">
                <x-form.datepicker name="estimated_finish" label="Estimated finish" :value="$project->estimated_finish ?? old('estimated_finish') ?? null" required></x-form.datepicker>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <x-form.select name="default_view" label="Default view" :options="$view_list" :value="$project->default_view ?? old('default_view') ?? null" required></x-form.select>
            </div>
        </div>
        <x-form.group>
            <x-form.checkbox name="is_private" value="1" :checked="$project->is_private ?? old('is_private') ?? false">Make this project private (only members can access this project)</x-form.checkbox>
        </x-form.group>
        <x-form.action>
            <x-form.button type="submit">{{ $project ? 'Save changes' : 'Create project' }}</x-form.button>
        </x-form.action>
    </form>
</x-card>

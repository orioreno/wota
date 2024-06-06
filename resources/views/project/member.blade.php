<x-layout.project nav="member">
    @php $request = request() @endphp
    <x-filter.card>
        <div class="row">
            <div class="col-md-8">
                <x-form.input name="user" label="Name or email" :value="$request->user ?? ''"></x-form.input>
            </div>
            <div class="col-md-4">
                <x-form.select name="role" label="Role" :options="array_merge(['' => 'ALL ROLES'], $roles)" :value="$request->role ?? ''"></x-form.select>
            </div>
        </div>
    </x-filter.card>
    <x-card icon="users" title="Members">
        <x-slot:action>
            <button type="button" class="btn btn-success">Add new member</button>
        </x-slot:action>
        <table id="table" class="table align-middle">
            <thead>
                <tr>
                    <x-th-sort name="name">Name</x-th-sort>
                    <x-th-sort name="email">Email</x-th-sort>
                    <x-th-sort name="role">Role</x-th-sort>
                    <x-th-sort name="accepted_at">Joined</x-th-sort>
                    <x-th-sort name="last_access">Last access</x-th-sort>
                    <th width="50px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{ $member->user->name }}</td>
                    <td>{{ $member->user->email }}</td>
                    <td>{{ $member->role }}</td>
                    <td>{{ $member->accepted_at ?? 'Pending invitation' }}</td>
                    <td>{{ $member->last_access }}</td>
                    <td>
                        <x-dropdown-action>
                            @empty($member->accepted_at)
                            <li><a class="dropdown-item" href="#">Resend verification email</a></li>
                            @endempty
                            <li><a class="dropdown-item" href="#">Change role</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalRemove">Remove</a></li>
                        </x-dropdown-action>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>

    <x-modal id="modalRemove" title="Remove user">
        
    </x-modal>
</x-layout.project>

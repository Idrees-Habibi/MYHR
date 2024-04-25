<div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>
                            Roles
                            <x-general.modal-button
                                click="$dispatchTo('settings.manage-role.create-role', 'showAssignmentModal')"
                                target="" class="btn btn-primary btn-sm me-2 float-end" text="+ Role" />
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-hover w-100" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            Sr.
                                        </th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="table-action">
                                                <a href="{{ route('role.permissions', ['roleId' => $role->id]) }}"
                                                    class="action-icon"><i class="mdi mdi-pencil"></i></a>
                                                {{-- <a href="#" class="action-icon"
                                                    wire:click="$dispatch('showDeleteModal', { id: {{ $role->id }} })">
                                                    <i class="mdi mdi-delete"></i></a> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Active Role Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-general.confirm-modal wire:model="showDeleteModal">
        <x-slot name="title">
            Delete Role
        </x-slot>
        <x-slot name="content">
            Are you sure you want to delete?
        </x-slot>
        <x-slot name="footer">
            <button class="ml-2 btn btn-secondary" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled">
                No
            </button>
            <button class="ml-2 btn btn-danger" wire:click="roleDelete()" wire:loading.attr="disabled">
                Yes
            </button>
        </x-slot>
    </x-general.confirm-modal>
    <livewire:settings.manage-role.create-role>
</div>

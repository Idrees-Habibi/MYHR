<div>
    <div class="card">
        <div class="card-header">
            <div class="text-end">
                <button type="button" class="btn btn-primary btn-sm"
                    wire:click="$dispatchTo('organization-structure.department.edit-department-modal', 'showDepartmentModal',{ id: 0 })"><i
                        class="mdi mdi-plus-thick"></i> Department</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th>Branch</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->branch->name }}</td>
                            <td>{{ $department->branch->country->name }}</td>
                            <td class="table-action">
                                <a href="#" class="action-icon"
                                    wire:click="$dispatchTo('organization-structure.department.edit-department-modal', 'showDepartmentModal',{ id: {{$department->id}} })">
                                    <i class="mdi mdi-pencil"></i></a>
                                {{-- <a href="#" wire:click="deleteModal({{ $department->id }})">
                                    <i class="mdi mdi-delete"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-2 text-center">No Record Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <x-general.confirm-modal wire:model="showDeleteModal">
        <x-slot name="title">
            Delete Department
        </x-slot>
        <x-slot name="content">
            Are you sure you want to delete Department?
        </x-slot>
        <x-slot name="footer">
            <button class="ml-2 btn btn-secondary" wire:click="$toggle('showDeleteModal')"
                wire:loading.attr="disabled">
                No
            </button>
            <button class="ml-2 btn btn-danger" wire:click="destroyDepartment" wire:loading.attr="disabled">
                Yes
            </button>
        </x-slot>
    </x-general.confirm-modal>
    <livewire:organization-structure.department.edit-department-modal />
</div>

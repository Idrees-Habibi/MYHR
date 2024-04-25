<div>
    <div class="card">
        <div class="card-header">
            <div class="text-end">
                <button type="button" class="btn btn-primary btn-sm"
                    wire:click="$dispatchTo('organization-structure.branch.edit-branch-modal', 'showBranchModal',{ id: 0 })"><i
                        class="mdi mdi-plus-thick"></i> Branch</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>Branch Name</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($branches as $branch)
                        <tr>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->address }}</td>
                            <td>{{ $branch->country->name }}</td>
                            <td class="table-action">
                                <a href="javascript: void(0);" class="action-icon"
                                    wire:click="$dispatchTo('organization-structure.branch.edit-branch-modal', 'showBranchModal',{ id: {{ $branch->id }} })">
                                    <i class="mdi mdi-pencil"></i></a>
                                {{-- <a href="#" wire:click="deleteModal({{ $branch->id }})">
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
            Delete Branch
        </x-slot>
        <x-slot name="content">
            Are you sure you want to delete Branch?
        </x-slot>
        <x-slot name="footer">
            <button class="ml-2 btn btn-secondary" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled">
                No
            </button>
            <button class="ml-2 btn btn-danger" wire:click="destroyBranch" wire:loading.attr="disabled">
                Yes
            </button>
        </x-slot>
    </x-general.confirm-modal>
    <livewire:organization-structure.branch.edit-branch-modal />
</div>

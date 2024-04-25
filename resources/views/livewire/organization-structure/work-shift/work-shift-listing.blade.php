<div>
    <div class="card">
        <div class="card-header">
            <div class="text-end">
                <button type="button" class="btn btn-primary btn-sm"
                    wire:click="$dispatchTo('organization-structure.work-shift.edit-work-shift-modal', 'showWorkShiftModal',{ id: 0 })"><i
                        class="mdi mdi-plus-thick"></i> Add New WorkShift</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>Shift Name</th>
                        <th>Short Code</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($workshifts as $shift)
                        <tr>
                            <td>{{ $shift->name }}</td>
                            <td>{{ $shift->shift_code }}</td>
                            <td>{{ $shift->start_time }}</td>
                            <td>{{ $shift->end_time }}</td>

                            <td class="table-action">
                                <a href="#" class="action-icon"
                                    wire:click="$dispatchTo('organization-structure.work-shift.edit-work-shift-modal', 'showWorkShiftModal',{ id: {{ $shift->id }} })">
                                    <i class="mdi mdi-pencil"></i></a>
                                {{-- <a href="#" wire:click="deleteModal({{ $shift->id }})">
                                    <i class="mdi mdi-delete"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-2 text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <x-general.confirm-modal wire:model="showDeleteModal">
        <x-slot name="title">
            Delete Workshift Record
        </x-slot>
        <x-slot name="content">
            Are you sure you want to delete this workshift?
        </x-slot>
        <x-slot name="footer">
            <button class="ml-2 btn btn-secondary" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled">
                No
            </button>
            <button class="ml-2 btn btn-danger" wire:click="destroyWorkShift" wire:loading.attr="disabled">
                Yes
            </button>
        </x-slot>
    </x-general.confirm-modal>
    <livewire:organization-structure.work-shift.edit-work-shift-modal />
</div>

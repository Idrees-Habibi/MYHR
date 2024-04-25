<div wire:ignore.self>
    <x-general.dialog-modal wire:model="showAssignmentModal" maxWidth="lg">
        <x-slot name="title">
            Role
        </x-slot>
        <x-slot name="content">
            <div class="row">

                <div class="col-12">
                    <label for="name" class="col-3 col-form-label">Role Title*</label>
                    <input type="text" class="form-control" id="name" wire:model="name" placeholder="Create new Role"
                        value="{{ $name }}">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-general.modal-button click="store" target="save" class="btn btn-info"
                text="{{ $roleId ? 'Update' : 'Create' }}" />
        </x-slot>
    </x-agent.general.dialog-modal>
</div>

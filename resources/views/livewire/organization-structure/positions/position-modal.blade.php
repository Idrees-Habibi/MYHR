<div>
    <x-general.dialog-modal wire:model="showPositionModel">
        <x-slot name="title">
            Add Posiiton Details
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-1">
                       <strong> Parent Grade Title :<span class="ms-2">{{ $selectedGradeName }}</span></strong>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Position Title *</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="name" wire:model="name" placeholder="e.g. Unit Team Lead"
                                value="{{ $name }}">
                        </div>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>
        </x-slot>

        <x-slot name="footer">
            <x-general.modal-button click="savePosition" target="savePosition" class="btn btn-info" text="Submit" />
        </x-slot>
    </x-general.dialog-modal>
</div>

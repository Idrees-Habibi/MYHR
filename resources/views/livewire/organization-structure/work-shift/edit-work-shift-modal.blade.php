<div>
    <x-general.dialog-modal wire:model="showWorkShifthModels" maxWidth="md">
        <x-slot name="title">
            Work Shifts
        </x-slot>
        <x-slot name="content">
            <div class="row" id="">
                <div class="row mb-3">
                    <label for="name" class="col-3 col-form-label">Shift Name *</label>
                    <div class="col-12">
                        <input type="text" class="form-control form-control-sm"  id="name" wire:model="name" placeholder="e.g. Morning"
                            value="">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="shift_code" class="col-3 col-form-label">Short Code</label>
                    <div class="col-12">
                        <input type="text" class="form-control form-control-sm" {{ !$shiftId ? '' : 'disabled' }}id="shift_code" wire:model="shift_code" placeholder="e.g. M1" value=""
                        {{ !$shiftId ? '' : 'disabled' }}>
                        @error('shift_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <label for="start_time" class="col-3 col-form-label">Shift Start</label>
                    <input type="time" class="form-control form-control-sm" id="start_time"
                        wire:model="start_time">

                    @error('start_time')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="end_time" class="col-3 col-form-label">Shift End</label>
                    <input type="time" class="form-control form-control-sm" id="end_time"
                        wire:model="end_time">

                    @error('end_time')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-general.modal-button click="save" target="save" class="btn btn-info" text="Submit" />
        </x-slot>
    </x-general.dialog-modal>
    
</div>

<div>
    <x-general.dialog-modal wire:model="showBranchModal" maxWidth="md">
        <x-slot name="title">
            Add Brnach
        </x-slot>
        <x-slot name="content">
            <div class="row" id="">
                <div class="row mb-3">
                    <label for="name" class="col-3 col-form-label">institute *</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="institute" wire:model="institute"
                            placeholder="institute" value="">
                        @error('institute')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="degree" class="col-3 col-form-label">degree *</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="degree" wire:model="degree" placeholder="degree"
                            value="">
                        @error('degree')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="subject" class="col-3 col-form-label">subject *</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="subject" wire:model="subject" placeholder="subject"
                            value="">
                        @error('subject')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gpa" class="col-3 col-form-label">gpa *</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="gpa" wire:model="gpa" placeholder="gpa"
                            value="">
                        @error('gpa')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="passing_year" class="col-3 col-form-label">passing_year *</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="passing_year" wire:model="passing_year" placeholder="passing_year"
                            value="">
                        @error('passing_year')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-general.modal-button click="save" target="save" class="btn btn-info" text="Submit" />
        </x-slot>
    </x-general.dialog-modal>
</div>

<div>
    <x-general.dialog-modal wire:model="showCategoryModal">
        <x-slot name="title">
            {{ $categoryId ? 'Modify the Category ' : 'Add New Category ' }}Details
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-3">
                        <label for="name" class="col-12 col-form-label">Category Name * </label>
                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="name" wire:model="name" placeholder="e.g. Management"
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
            <x-general.modal-button click="save" target="save" class="btn btn-info" text="Submit" />
        </x-slot>
    </x-general.dialog-modal>
</div>

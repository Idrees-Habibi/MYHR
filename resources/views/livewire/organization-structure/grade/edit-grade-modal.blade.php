<div>

    <x-general.dialog-modal wire:model="showGradeModal">
        <x-slot name="title">
            {{ $gradeId ? 'Modify the Grade ' : 'Add New Grade ' }}Details
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-12">

                    <div class="row mb-1">
                        <div class="col-12">
                            <strong> Parent Category Name :<span
                                    class="ms-2">{{ $selectedCategoryName }}</span></strong>
                        </div>
                        <div class="col-12">
                            @if ($parentGradeId)
                                <div class="row mb-3">
                                    <strong> Parent Grade Name :<span
                                            class="ms-2">{{ $parentGradeName }}</span></strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Grade Name *</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="name" wire:model="name"
                                placeholder="e.g. Head of Department" value="{{ $name }}">
                        </div>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>
        </x-slot>

        <x-slot name="footer">
            <x-general.modal-button click="saveGrade" target="saveGrade" class="btn btn-info" text="Submit" />
        </x-slot>
    </x-general.dialog-modal>
</div>

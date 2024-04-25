<div>
    @push('below_css')
        <link href="{!! asset(AppConst::ASSET_CSS . '/custom.css') !!}" type="text/css" rel="stylesheet">
    @endpush
    <div class="row mx-2">
        <div class="col-12 card ">
            <div class="card-body">
                <!-- jstree css -->
                <div class="col-12 ">
                    <x-general.modal-button
                        click="$dispatchTo('organization-structure.category.category-modal', 'showCategoryModal',{id: 0})"
                        target="" class="btn btn-primary me-2 float-end" text="Add New Category +" />
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item-class">
                        {{-- category loop --}}
                        @forelse($categories as $key => $category)
                            <ul class="parent">
                                <li class="h4">
                                    <span class="{{ $category->is_active == 'No' ? 'text-secondary' : 'yes' }}"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}"
                                        aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                                        <i class="ri-arrow-right-s-fill"></i>
                                        {{ $category->name }}
                                    </span>
                                    <span class="mx-2">
                                        <a href="#"
                                            wire:click="$dispatchTo('organization-structure.grade.edit-grade-modal', 'showGradeModal',{id: 0, employee_category_id:{{ $category->id }}})">
                                            <i class="mdi mdi-briefcase-plus-outline mdi-18px text-primary"></i>
                                        </a>
                                        <a href="#"
                                            wire:click="$dispatchTo('organization-structure.category.category-modal', 'showCategoryModal',{id: {{ $category->id }}})">
                                            <i class="mdi mdi-pencil-outline mdi-18px text-success"></i>
                                        </a>
                                        {{-- <a href="#"
                                            wire:click="deleteModal({{ $category->id }}, 'category')" class="action-icon">
                                            <i class="mdi mdi-delete-outline mdi-18px text-danger"></i>
                                        </a> --}}
                                    </span>
                                    {{-- Grade of parent category loop --}}
                                    @if ($category->grades)
                                        <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $category->id }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul class="child accordion" id="accordionGrades{{ $category->id }}">
                                                    @foreach ($category->grades ?? [] as $key => $grades)
                                                        <li class="h5">
                                                            <span class="collapsed" data-bs-toggle="collapse"
                                                                data-bs-target="#gradeCollapse{{ $grades->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="gradeCollapse{{ $grades->id }}">
                                                                <i class="ri-arrow-right-s-fill"></i>
                                                                {{ $grades->name }}
                                                            </span>
                                                            <span class="mx-2">
                                                                <a href="#"
                                                                    wire:click="$dispatchTo('organization-structure.grade.edit-grade-modal', 'showGradeModal',{subGradeId: 0, employee_category_id:{{ $category->id }} ,gradeId: {{ $grades->id }} })">
                                                                    <i
                                                                        class="mdi mdi-briefcase-plus-outline mdi-18px text-primary"></i>
                                                                </a>
                                                                <a href="#"
                                                                    wire:click="$dispatchTo('organization-structure.grade.edit-grade-modal', 'showGradeModal',{subGradeId: {{ $grades->id }}, employee_category_id:{{ $category->id }}, gradeId: 0 })">
                                                                    <i
                                                                        class="mdi mdi-pencil-outline mdi-18px text-success"></i>
                                                                </a>
                                                                {{-- <a href="javascript:void(0)"
                                                                    wire:click="deleteModal({{ $grades->id }}, 'grade')">
                                                                    <i
                                                                        class="mdi mdi-delete-outline mdi-18px text-danger"></i>
                                                                </a> --}}
                                                            </span>
                                                            <div id="gradeCollapse{{ $grades->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingGrade{{ $grades->id }}"
                                                                data-bs-parent="#accordionGrades{{ $category->id }}">
                                                                <div class="accordion-body">
                                                                    <ul class="sub-child accordion parent"
                                                                        id="accordionSubGrades{{ $grades->id }}">
                                                                        @foreach ($grades->subGrades as $subGrade)
                                                                            <li class="h6">
                                                                                <span class="collapsed"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#subGradeCollapse{{ $subGrade->id }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="subGradeCollapse{{ $subGrade->id }}">
                                                                                    <i
                                                                                        class="ri-arrow-right-s-fill"></i>
                                                                                    {{ $subGrade->name }}
                                                                                </span>
                                                                                <span class="mx-2">
                                                                                    <a href="#"
                                                                                        wire:click="$dispatchTo('organization-structure.positions.position-modal', 'showPositionModal',{id: 0, subGrade_id:{{ $subGrade->id }}})">
                                                                                        <i
                                                                                            class="mdi mdi-briefcase-plus-outline fs-6 text-primary"></i>
                                                                                    </a>
                                                                                    <a href="#"
                                                                                        wire:click="$dispatchTo('organization-structure.grade.edit-grade-modal', 'showGradeModal',{subGradeId:{{ $subGrade->id }}, employee_category_id:{{ $category->id }} ,gradeId: {{ $grades->id }} })">
                                                                                        <i
                                                                                            class="mdi mdi-pencil-outline fs-5 text-success"></i>
                                                                                    </a>
                                                                                    {{-- <a href="javascript:void(0)"
                                                                                        wire:click="deleteModal({{ $subGrade->id }}, 'subgrade')">
                                                                                        <i
                                                                                            class="mdi mdi-delete-outline fs-6 text-danger"></i>
                                                                                    </a> --}}
                                                                                </span>
                                                                                <div id="subGradeCollapse{{ $subGrade->id }}"
                                                                                    class="accordion-collapse collapse"
                                                                                    aria-labelledby="headingSubGrade{{ $subGrade->id }}"
                                                                                    data-bs-parent="#accordionSubGrades{{ $grades->id }}">
                                                                                    <div class="accordion-body">
                                                                                        @if ($subGrade->positions)
                                                                                            <ul>
                                                                                                @foreach ($subGrade->positions as $position)
                                                                                                <li>
                                                                                                    {{ $position->name }}
                                                                                                    <span class="mx-2">
                                                                                                        <a href="#"
                                                                                                            wire:click="$dispatchTo('organization-structure.positions.position-modal', 'showPositionModal',{id: {{ $position->id }} })">
                                                                                                            <i class="mdi mdi-pencil-outline fs-6 text-success"></i>
                                                                                                        </a>
                                                                                                        {{-- <a href="javascript:void(0)"
                                                                                                            wire:click="deleteModal({{ $position->id }}, 'position')">
                                                                                                            <i class="mdi mdi-delete-outline fs-6 text-danger"></i>
                                                                                                        </a> --}}
                                                                                                    </span>
                                                                                                </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @else
                                                                                            <p>No positions available
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div id="subGradeCollapse{{ $subGrade->id }}"
                                                                                    class="accordion-collapse collapse"
                                                                                    aria-labelledby="headingSubGrade{{ $subGrade->id }}"
                                                                                    data-bs-parent="#accordionSubGrades{{ $grades->id }}">
                                                                                    <div class="accordion-body">
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        @empty
                        @endforelse
                    </div>
                </div>

                <x-general.confirm-modal wire:model="showDeleteModal">
                    <x-slot name="title">
                        Delete category
                    </x-slot>
                    <x-slot name="content">
                        Are you sure you want to delete category?
                    </x-slot>
                    <x-slot name="footer">
                        <button class="ml-2 btn btn-secondary" wire:click="$toggle('showDeleteModal')"
                            wire:loading.attr="disabled">
                            No
                        </button>
                        <button class="ml-2 btn btn-danger" wire:click="deleteRecord" wire:loading.attr="disabled">
                            Yes
                        </button>
                    </x-slot>
                </x-general.confirm-modal>
                <livewire:organization-structure.category.category-modal />
                <livewire:organization-structure.grade.edit-grade-modal />
                <livewire:organization-structure.positions.position-modal />
            </div>
        </div>
    </div>
</div>

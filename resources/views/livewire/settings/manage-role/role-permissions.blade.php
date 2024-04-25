<div>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <form wire:submit="storePermissions">
                @foreach ($modules as $module)
                    @if ($module->module_id === null)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $module->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $module->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $module->id }}">
                                    {{ $module->name }}
                                </button>
                            </h2>
                            <div id="collapse{{ $module->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $module->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="row">
                                        @foreach ($modules as $subModule)
                                            @if ($subModule->module_id === $module->id)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="subHeading{{ $subModule->id }}">
                                                        <button class="accordion-button collapsed"  type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#subCollapse{{ $subModule->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="subCollapse{{ $subModule->id }}">
                                                            {{ $subModule->name }}
                                                        </button>
                                                    </h2>
                                                    <div id="subCollapse{{ $subModule->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="subHeading{{ $subModule->id }}"
                                                        data-bs-parent="#collapse{{ $module->id }}">
                                                        <div class="accordion-body">
                                                            <ul class="row">
                                                                @foreach ($subModule->permissions as $permission)
                                                                    <div class="col-lg-3">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input"
                                                                                type="checkbox"
                                                                                wire:model="selectedPermissions"
                                                                                value="{{ $permission->id }}"
                                                                                id="permission{{ $permission->id }}">
                                                                            <label class="form-check-label"
                                                                                for="permission{{ $permission->id }}">
                                                                                {{ $permission->name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

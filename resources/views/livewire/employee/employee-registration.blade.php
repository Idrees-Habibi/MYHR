<div>
    <form wire:submit="save" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic Detail</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <label for="name" class="form-label form-label-sm">First Name</label><span
                                    class="text-danger pl-1">*</span>
                                <input class="form-control form-control-sm" placeholder="Enter employee name"
                                    name="first_name" type="text" id="first_name" wire:model="first_name">
                                <div>
                                    @error('first_name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <label for="phone" class="form-label form-label-sm">Last Name</label><span
                                    class="text-danger pl-1">*</span>
                                <input class="form-control form-control-sm" placeholder="Enter Last Name"
                                    name="last_name" type="text" id="phone" wire:model="last_name">
                                <div>
                                    @error('last_name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <div class="form-group">
                                    <label for="dob" class="form-label form-label-sm">Date of Birth</label><span
                                        class="text-danger pl-1">*</span>
                                    <input class="form-control form-control-sm" id="example-date" type="date"
                                        name="date" wire:model="date_of_birth">
                                    <div>
                                        @error('date_of_birth')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                                <label for="email" class="form-label form-label-sm">Personal Email
                                    Address</label><span class="text-danger pl-1">*</span>
                                <input class="form-control form-control-sm" placeholder="Enter employee Email"
                                    name="personal_email" type="email" id="email" wire:model="personal_email">

                                @error('personal_email')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-md-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                                <div class="form-group">
                                    <label for="dob" class="form-label form-label-sm">Date of Joining</label><span
                                        class="text-danger pl-1">*</span>
                                    <input class="form-control form-control-sm" id="example-date" type="date"
                                        name="date" wire:model="date_of_joining">

                                    @error('date_of_joining')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-2">
                                <label for="tax_payer_id" class="form-label form-label-sm">Gender</label> <span
                                    class="text-danger pl-1">*</span>

                                <select class="form-select form-select-sm mb-3 " wire:model="gender">

                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                @error('gender')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <label for="bank_name" class="form-label form-label-sm">CNIC </label>
                                <span class="text-danger pl-1">*</span>
                                <input class="form-control form-control-sm" placeholder="xxxxx-xxxxxxx-x" name="cnic"
                                    type="text" id="bank_name" wire:model="cnic">

                                @error('cnic')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror


                            </div>
                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12">
                                <label for="bank_identifier_code" class="form-label form-label-sm">Government ID
                                    Expiration Date</label>
                                <input class="form-control form-control-sm" id="example-date" type="date"
                                    name="date" wire:model="expiry_date">

                            </div>
                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12">
                                <label for="branch_location" class="form-label form-label-sm">Employee Tax
                                    Number</label>
                                <input class="form-control form-control-sm" placeholder="employee tax number"
                                    name="branch_location" type="text" id="branch_location" wire:model="tax_number">
                            </div>


                            <div class="col-md-4 col-md-4 col-sm-6 col-xs-12 form-group" id="spouseage">
                                <label for="spouseAge" class="form-label form-label-sm">Blood Group</label>
                                <select class="form-select form-select-sm" wire:model="blood_group">
                                    <option selected value="">Select Blood Group</option>

                                    @foreach ($getBloodGroupType as $type)
                                        <option value="{{ $type['id'] }}">{{ $type['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <label for="tax_payer_id" class="form-label form-label-sm">Religion</label> <span
                                    class="text-danger pl-1">*</span>
                                <select class="form-select form-select-sm mb-3 " wire:model="religion">
                                    <option value="">Select Religion</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Christian</option>
                                    <option value="3">Hindu</option>
                                </select>

                                @error('religion')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group col-md-4 col-sm-6 col-xs-12 mb-3">
                                <label for="password" class="form-label form-label-sm">Password</label>
                                <span class="text-danger pl-1">*</span>
                                <input class="form-control form-control-sm" placeholder="Enter employee Password"
                                    name="password" type="password" wire:model="password" id="password">
                                @error('password')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <label for="tax_payer_id" class="form-label form-label-sm">Marital Status</label>
                                <select class="form-select form-select-sm mb-3" id="maritalStatus"
                                    wire:model.live="marital_status">
                                    <option value=""></option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                </select>

                                @error('marital_status')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                            @if ($marital_status == 'married')
                                <div class="row border border-1">
                                    <div class="col-md-3 col-md-3 col-sm-6 col-xs-12 form-group" id="spouseName">
                                        <label for="spouseName" class="form-label form-label-sm">Spouse Name:</label>
                                        <input type="text" class="form-control form-control-sm" id="spouseName"
                                            wire:model="spouse_name">
                                    </div>
                                    <div class="col-md-3 col-md-3 col-sm-6 col-xs-12 form-group" id="spouseage">
                                        <label for="spouseAge" class="form-label form-label-sm">Type</label>
                                        <select class="form-select form-select-sm" wire:model="spouse_type">
                                            <option selected value="">Select Type</option>

                                            @foreach ($getMemberType as $type)
                                                <option value="{{ $type['id'] }}">{{ $type['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-md-3 col-sm-6 col-xs-12 form-group" id="spousecnic">
                                        <label for="spouseAge" class="form-label form-label-sm">CNIC:</label>
                                        <input type="text" id="spouseAge" wire:model="spouse_cnic"
                                            class="form-control form-control-sm" min="0"><br><br>
                                    </div>
                                    <div class="col-md-3 col-md-3 col-sm-6 col-xs-12 form-group" id="spousedob">
                                        <div class="form-group">
                                            <label for="dob" class="form-label form-label-sm">Date of
                                                Birth</label><span class="text-danger pl-1">*</span>
                                            <input class="form-control form-control-sm" id="example-date"
                                                type="date" name="date" wire:model="spouse_dob">
                                            <div>
                                                @error('date_of_birth')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group col-md-4">

                                <div class="mb-3">
                                    <label for="example-number" class="form-label fomr-label-sm">Passport
                                        Number</label>
                                    <input class="form-control form-control-sm" id="example-number"
                                        type="text" name="text" placeholder="Passport Number">
                                </div>
                            </div>

                            <div class="form-group col-md-8 col-sm-6 col-xs-12 mb-3 position-relative mt-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <label for="profile_photo" class="form-label form-label-sm">Profile
                                            Photo</label>
                                        <span class="text-danger pl-1">*</span>

                                        <input type="file" wire:model="profile_photo" id="profile_photo"
                                            class="form-control">

                                        @error('profile_photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        @if ($profile_photo)
                                            <img src="{{ $profile_photo->temporaryUrl() }}"
                                                class="img-fluid avatar-md rounded-circle ms-3">
                                        @else
                                            <img src="{{ asset($profile_image_path ? $profile_image_path : asset('assets/images/user-profile.svg')) }}"
                                                class="img-fluid avatar-md rounded-circle ms-3">
                                        @endif
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Contact Information</h6>
                    </div>
                    <div class="card-body employee-detail-create-body">
                        <div class="row">

                            <div class="form-group col-md-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                                <x-general.select-single-input :options="$getcountries" entangle="country_id"
                                    inputName="country_id" wire:model.live="country_id"
                                    eventName="update-country-option" label="Country"  />
                            </div>


                            <div class="form-group col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label form-label-sm">State</label> <span
                                        class="text-danger pl-1">*</span>
                                    <select class="form-select form-select-sm mb-3" wire:model.live="state_id">
                                        <option selected value="">Select State</option>
                                        @foreach ($getStates as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div>
                                        @error('state_id')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class= "col-lg-4 col-md-4 col-sm-6 col-xs-12">

                                <div class="mb-3">
                                    <label for="example-date" class="form-label form-label-sm">City</label> <span
                                        class="text-danger pl-1">*</span>
                                    <select class="form-select form-select-sm mb-3" wire:model="city_id">
                                        <option selected value="">Select City</option>
                                        @foreach ($getCities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('city_id')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="mb-3">
                                    <label for="current_address" class="form-label form-label-sm">Current
                                        Address</label> <span class="text-danger">*</span>
                                    <input class="form-control form-control-sm" id="current_address" type="text"
                                        name="current_address" wire:model="current_address"
                                        placeholder="Current Address">
                                    @error('current_address')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="mb-3">
                                    <label for="current_address" class="form-label form-label-sm">Permanent
                                        Address</label> <span class="text-danger">*</span>
                                    <input class="form-control form-control-sm" id="permanent_address" type="text"
                                        name="current_address" wire:model="permanent_address"
                                        placeholder="Permanent Address">
                                    @error('permanent_address')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group col-lg-4  col-md-4 col-sm-6 col-xs-12">

                                <div class="mb-3">
                                    <label for="example-number" class="form-label form-label-sm">Passport
                                        Number</label>
                                    <input class="form-control form-control-sm" id="example-number" type="text"
                                        name="number" placeholder="Passport">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                <h5 class="mb-3">Phone Number</h5>
                            </div>
                            <div class= "col-lg-4 col-md-4 col-sm-6 col-xs-12" wire:ignore>

                                <div class="mb-3">
                                    <label for="example-number" class="form-label form-label-sm">Home Phone
                                        Number</label><span class="text-danger pl-1">*</span>
                                    <input class="form-control form-control-sm" placeholder="Home Phone Number"
                                        id="example-number" type="text" name="number"
                                        wire:model="primary_contact">
                                    <div>
                                        @error('primary_contact')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-4  col-md-4 col-sm-6 col-xs-12" wire:ignore>
                                <div class="mb-3">
                                    <label for="example-date" class="form-label form-label-sm">Office Phone
                                        Number</label><span class="text-danger pl-1">*</span>
                                    <input class="form-control form-control-sm" placeholder="Office Phone Number"
                                        id="example-date" type="text" name="date"
                                        wire:model="secondary_contact">
                                    <div>
                                        @error('secondary_contact')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label form-label-sm">Mobile Number</label>
                                    <input class="form-control form-control-sm" placeholder="Mobile Phone Number"
                                        id="example-date" type="text" name="date">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="mb-3">Emergency Contact Number</h5>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                                <div class="mb-3">
                                    <label for="example-number" class="form-label form-label-sm">Emergency Contact
                                        Person</label>
                                    <input class="form-control form-control-sm" id="example-number" type="text"
                                        name="number" placeholder="Person Name">
                                </div>
                            </div>
                            <div class="form-group col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label form-label-sm">Relationship</label>
                                    <input class="form-control form-control-sm" id="example-date" type="text"
                                        name="date" placeholder="Enter Relationship">
                                </div>
                            </div>

                            <div class="form-group col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="mb-3">
                                    <label for="example-date" class="form-label form-label-sm">Phone Number</label>
                                    <input class="form-control form-control-sm" id="example-date" type="text"
                                        name="date" placeholder="Phone Number">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="employee-official-info pe-3 border-end">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="mb-3">Employee Official Information</h5>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label for="branch_id" class="form-label form-label-sm">Select
                                                Branch</label>
                                            <span class="text-danger pl-1">*</span>
                                            <div class="form-icon-user">
                                                <select class="form-select form-select-sm mb-3"
                                                    wire:model.live="branch_id">
                                                    <option selected value="">Select Branch</option>
                                                    @foreach ($getbranches as $branch)
                                                        <option value="{{ $branch->id }}">{{ $branch->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('branch_id')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <div class="form-icon-user" id="department_id">
                                                <label for="department_id"
                                                    class="form-label form-label-sm">Department</label>
                                                <span class="text-danger pl-1">*</span>
                                                <select class="form-select form-select-sm mb-3"
                                                    wire:model="department_id">
                                                    @if ($branch_id > 0)
                                                        <option selected value="">Select Department</option>
                                                        @foreach ($getdepartments as $department)
                                                            <option value="{{ $department->id }}">
                                                                {{ $department->name }}
                                                            </option>
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('department_id')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="designation_id" class="form-label form-label-sm">Employee
                                                Type</label>
                                            <span class="text-danger pl-1">*</span>

                                            <div class="form-icon-user">
                                                <div class="designation_div">
                                                    <select class="form-select form-select-sm mb-3" wire:model="type">
                                                        @foreach ($getEmployeeType as $type)
                                                            <option value="{{ $type['id'] }}">{{ $type['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            @error('type')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="designation_id"
                                                class="form-label form-label-sm">Position</label>
                                            <select class="form-control" id="role_id" name="role_id"
                                                wire:model="position_id">
                                                <option value="">Select Positoin </option>
                                                @foreach ($getAllPositions as $position)
                                                    <option value="{{ $position['id'] }}">{{ $position['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="form-icon-user">
                                                <div class="designation_div">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6 col-sm-6 col-xs-12 mb-3 mt-1">
                                            <label for="role_id">Employee Roles</label>

                                            <select class="form-control" id="role_id" name="role_id"
                                                wire:model="role_id">
                                                <option value="">Select Employee Role</option>
                                                @foreach ($getAllRoles as $role)
                                                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="company_doj"
                                                class="form-label form-label-sm">WorkShift</label>
                                            <select wire:model="work_shift_id"
                                                class="form-select form-select-sm mb-3">
                                                @foreach ($getworkshifts as $workshift)
                                                    <option value="{{ $workshift->id }}">{{ $workshift->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email" class="form-label form-label-sm">Office Email
                                                Address</label><span class="text-danger pl-1">*</span>
                                            <input class="form-control form-control-sm"
                                                placeholder="Enter employee Email" name="email" type="email"
                                                id="email" wire:model="email">

                                            @error('email')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="driving-license ps-1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="mb-3">Driving License Information (optional)</h5>
                                        </div>
                                        <div class="form-group col-lg-6 mb-3">

                                            <div class="mb-3">
                                                <label for="example-number" class="form-label form-label-sm">Driving
                                                    License
                                                    Number</label>
                                                <input class="form-control form-control-sm" id="example-number"
                                                    type="text" name="number"
                                                    placeholder="Driving License Number">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label for="example-date" class="form-label form-label-sm">Expiration
                                                    Date</label>
                                                <input class="form-control form-control-sm" id="example-date"
                                                    type="date" name="date" placeholder="Expiration Date">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <div class="mb-3">
                                                <label for="example-date" class="form-label form-label-sm">Passport
                                                    Expiration
                                                    Date</label>
                                                <input class="form-control form-control-sm" id="example-date"
                                                    type="date" name="date">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-sm px-5 fs-4 rounded-pill">Submit</button>
            </div> <br><br>
        </div>
</div>

</form>
</div>

<script>
    function toggleSpouseFields() {
        var maritalStatus = document.getElementById("maritalStatus").value;
        var spouseFields = document.getElementById("spouseFields");
        var spouseFields2 = document.getElementById("spouseFields2");

        if (maritalStatus === "married") {
            spouseFields.style.display = "block";
            spouseFields2.style.display = "block";
        } else {
            spouseFields.style.display = "none";
            spouseFields2.style.display = "none";
        }
    }
</script>

<div>
    <div class="card">
        <div class="card-header">
            <div class="text-end">
                <a href="{{ route('employee.edit') }}" class="btn btn-primary">+Employee</a>

            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-centered mb-4">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Picture</th>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Email</th>
                        <th>Date of Joining</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($allEmployees as $employee)
                    <tr>
                        <td class="table-action">{{ $employee->rcl_number ?? '-' }}</td>
                        <td class="table-action">
                            <img class="me-3 rounded-circle" src="{{ $employee->profile_photo_url }}" width="40" alt="Profile Image">
                        </td>
                        <td class="table-action">{{ $employee->first_name ?? '-' }} {{ $employee->last_name ?? '' }}</td>
                        <td class="table-action">{{ $employee->cnic ?? '-' }}</td>
                        <td class="table-action">{{ $employee->personal_email ?? '-' }}</td>
                        <td class="table-action">{{ $employee->date_of_joining ?? '-' }}</td>
                        <td class="table-action">
                            <a href="{{ route('employee.edit', ['id' => $employee->id ?? 0]) }}" class="action-icon">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <a href="javascript:void(0)" wire:click="deleteEmployee({{ $employee->id }})" class="action-icon">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="table-action" colspan="7">No employees found.</td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>
        {{ $allEmployees->links() }}

    </div>
</div>

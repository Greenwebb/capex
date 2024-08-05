
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">Employees</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="customer_name">Fullnames</th>
                                            <th class="sort" data-sort="email">Email</th>
                                            <th class="sort" data-sort="phone">Status</th>
                                            <th class="sort" data-sort="date">Phone</th>
                                            <th class="sort" data-sort="status">Created Date</th>
                                            <th class="sort" data-sort="action">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse($users as $user)
                                            @if( !$user->hasRole('user')  && $user->id !== 1)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                <td class="customer_name">{{ $user->fname.' '.$user->name.' '.$user->lname }}</td>
                                                <td class="email">{{ $user->email }}</td>
                                                <td class="phone">{{ $user->phone }}</td>
                                                <td class="date">{{ $user->created_at->toFormattedDateString() }}</td>
                                                <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('client-account', ['key' => $user->id]) }}" class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                                        </div>
                                                        <div class="remove">
                                                            <a href="{{ route('edit-user', ['id' => $user->id]) }}" class="btn btn-sm btn-danger remove-item-btn">Remove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                        <div class="intro-y col-span-12 md:col-span-6">
                                            <div class="box text-center">
                                                <p>No User Found</p>
                                            </div>
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascript:void(0);">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form method="POST" action="{{ route('create-user') }}" class="tablelist-form" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3 mb-7">
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-semibold mb-2">Firstname</label>
                                    <input class="form-control form-control-solid" placeholder="Firstname" name="fname" />
                                </div>
                                <div class="col-md-6">
                                    <label class="required fs-6 fw-semibold mb-2">Lastname</label>
                                    <input class="form-control form-control-solid" placeholder="Surname" name="lname" />
                                </div>
                            </div>
                            <div class="row g-3 mb-7">
                                <div class="col-md-12">
                                    <label class="fs-6 fw-semibold mb-2">
                                        <span class="required">Email</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Email address must be active">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <input type="email" class="form-control form-control-solid" placeholder="" name="email" />
                                </div>
                            </div>
                            <div class="row g-3 mb-7">
                                <div class="col-md-12">
                                    <label class="fs-6 fw-semibold mb-2">Password</label>
                                    <input type="text" disabled class="form-control form-control-solid" placeholder="mighty.@2023@" required />
                                </div>
                            </div>
                            <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                                General Information
                                <span class="ms-2 rotate-180">
                                    <i class="ki-duotone ki-down fs-3"></i>
                                </span>
                            </div>
                            <div id="kt_modal_add_customer_billing_info" class="collapse show">
                                <div class="row g-3 mb-7">
                                    <div class="col-md-12">
                                        <label class="required fs-6 fw-semibold mb-2">Address Line 1</label>
                                        <input class="form-control form-control-solid" placeholder="" name="address1" value="101, Collins Street" />
                                    </div>
                                </div>
                                <div class="row g-3 mb-7">
                                    <div class="col-md-12">
                                        <label class="fs-6 fw-semibold mb-2">Active Phone Number</label>
                                        <input class="form-control form-control-solid" placeholder="" name="phone" />
                                    </div>
                                </div>
                                <div class="row g-3 mb-7">
                                    <div class="col-md-12">
                                        <label class="required fs-6 fw-semibold mb-2">Town</label>
                                        <input class="form-control form-control-solid" placeholder="" name="city" />
                                    </div>
                                </div>
                                <div class="row g-3 mb-7">
                                    <div class="col-md-6">
                                        <label class="required fs-6 fw-semibold mb-2">National ID Type</label>
                                        <select class="form-control form-control" placeholder="" name="id_type">
                                            <option value="">--choose--</option>
                                            <option value="NRC">NRC</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Driver Liecense">Driver Liecense</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="required fs-6 fw-semibold mb-2">National ID</label>
                                        <input class="form-control form-control" placeholder="" name="nrc_no" />
                                    </div>
                                </div>
                                <div class="row g-3 mb-7">
                                    <div class="col-md-6">
                                        <label class="fs-6 fw-semibold mb-2">
                                            <span class="required">Gender</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Sex of the employee">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <select name="gender" aria-label="Select a gender" data-control="select2" data-placeholder="Select a gender..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bold">
                                            <option value="">Select a gender...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-6 fw-semibold mb-2">
                                            <span class="required">Role</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="User role & permissions">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <select name="assigned_role" aria-label="Select a role" data-control="select2" data-placeholder="Select a role..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bold">
                                            <option value="">Select a user role...</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mb-7">
                                    <div class="col-md-12">
                                        <div class="d-flex flex-stack">
                                            <div class="me-5">
                                                <label class="fs-6 fw-semibold">Allow spooling?</label>
                                                <div class="fs-7 fw-semibold text-muted">If user is allowed spooling, they will be able to pick and review a loan request when in spooling mode</div>
                                            </div>
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="billing" type="checkbox" value="1" id="kt_modal_add_customer_billing" checked="checked" />
                                                <span class="form-check-label fw-semibold text-muted" for="kt_modal_add_customer_billing">Yes</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you Sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->

    </div>
    <!-- container-fluid -->
</div>

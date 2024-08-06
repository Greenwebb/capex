<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Add modal-xl for extra width -->
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form method="POST" action="{{ route('create-user') }}" class="tablelist-form" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Firstname</label>
                                <input type="text" class="form-control form-control-sm" name="fname" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Lastname</label>
                                <input type="text" class="form-control form-control-sm" name="lname" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">Gender</label>
                                <select name="gender" class="form-control form-control-sm">
                                    <option value="">--choose--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">National ID Type</label>
                                <select name="id_type" class="form-control form-control-sm">
                                    <option value="">--choose--</option>
                                    <option value="NRC">NRC</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Driver's License">Driver's License</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">ID Number</label>
                                <input type="text" class="form-control form-control-sm" name="nrc_no" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Address Line</label>
                                <input type="text" class="form-control form-control-sm" name="occupation" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">Job Title</label>
                                <input type="text" class="form-control form-control-sm" name="address2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                <input type="text" class="form-control form-control-sm" name="phone" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">
                                    <span class="required">Role</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="User role & permissions">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                                    </span>
                                </label>
                                <select name="assigned_role" aria-label="Select a role" data-control="select2" data-placeholder="Select a role..." class="form-select form-select-solid fw-bold">
                                    @foreach($roles as $role)
                                    <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add Borrower</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
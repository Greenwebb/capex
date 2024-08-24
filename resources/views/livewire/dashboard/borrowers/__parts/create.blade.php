<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Add modal-xl for extra width -->
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form method="POST" action="{{ route('create-user') }}"  enctype="multipart/form-data" class="tablelist-form" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Primary Photo -->
                            <div class="col-4">
                                <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                                    <div id="primary-image-preview-container"></div>
                                    <div class="mx-auto cursor-pointer relative">
                                        <button type="button" class="btn btn-square btn-primary" onclick="document.getElementById('primary_image').click();">+ Primary Photo</button>
                                        <input type="file" id="primary_image" name="primary_image_path" class="w-full h-full top-0 left-0" onchange="previewImages(event, 'primary-image-preview-container')" style="display: none;">
                                    </div>
                                    <small>
                                        @if ($errors->has('primary_image_path'))
                                            <span class="text-danger text-left">{{ $errors->first('primary_image_path') }}</span>
                                        @endif
                                    </small>
                                </div>
                            </div>

                            <!-- Secondary Photo -->
                            <div class="col-4">
                                <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                                    <div id="secondary-image-preview-container"></div>
                                    <div class="mx-auto cursor-pointer relative">
                                        <button type="button" class="btn btn-square btn-primary" onclick="document.getElementById('secondary_image').click();">+ Secondary Photo</button>
                                        <input type="file" id="secondary_image" name="secondary_image_path" class="w-full h-full top-0 left-0" onchange="previewImages(event, 'secondary-image-preview-container')" style="display: none;">
                                    </div>
                                    <small>
                                        @if ($errors->has('secondary_image_path'))
                                            <span class="text-danger text-left">{{ $errors->first('secondary_image_path') }}</span>
                                        @endif
                                    </small>
                                </div>
                            </div>

                            <!-- Tertiary Photo -->
                            <div class="col-4">
                                <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                                    <div id="tertiary-image-preview-container"></div>
                                    <div class="mx-auto cursor-pointer relative">
                                        <button type="button" class="btn btn-square btn-primary" onclick="document.getElementById('tertiary_image').click();">+ Tertiary Photo</button>
                                        <input type="file" id="tertiary_image" name="tertiary_image_path" class="w-full h-full top-0 left-0" onchange="previewImages(event, 'tertiary-image-preview-container')" style="display: none;">
                                    </div>
                                    <small>
                                        @if ($errors->has('tertiary_image_path'))
                                            <span class="text-danger text-left">{{ $errors->first('tertiary_image_path') }}</span>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>


                        <script>
                            function previewImages(event, previewContainerId) {
                                let files = event.target.files;
                                let previewContainer = document.getElementById(previewContainerId);
                                previewContainer.innerHTML = ''; // Clear existing previews

                                for (let i = 0; i < files.length; i++) {
                                    let file = files[i];
                                    let reader = new FileReader();

                                    reader.onload = function(e) {
                                        let imageElement = document.createElement('div');
                                        imageElement.className = 'col-12 mb-3';
                                        imageElement.innerHTML = `
                                            <div class="image-fit position-relative" style="background-image: url('${e.target.result}'); background-size: cover; background-position: center; height: 150px; border-radius: 5px;">
                                            </div>
                                        `;
                                        previewContainer.appendChild(imageElement);
                                    };

                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>
                        <br>
                        <h4 class="text-warning">Basic Information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Firstname</label>
                                <input type="text" class="form-control form-control-sm" name="fname" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Lastname</label>
                                <input type="text" class="form-control form-control-sm" name="lname" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">Gender</label>
                                <select name="gender" class="form-control form-control-sm" required>
                                    <option value="">--choose--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">National ID Type</label>
                                <select name="id_type" class="form-control form-control-sm" required>
                                    <option value="">--choose--</option>
                                    <option value="NRC">NRC</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Driver's License">Driver's License</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fs-6 fw-semibold mb-2">ID Number</label>
                                <input type="text" class="form-control form-control-sm" name="nrc_no" id="nrc_no" required/>
                                <small id="id-number-error" class="text-danger d-none">ID Number is already taken.</small>

                            </div>

                            <script>
                                document.getElementById('nrc_no').addEventListener('input', function() {
                                    const nrc_no = this.value;

                                    if (nrc_no.length > 0) {
                                        fetch(`{{ route('check.id_number') }}?nrc_no=${nrc_no}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                const idNumberError = document.getElementById('id-number-error');
                                                if (data.exists) {
                                                    idNumberError.classList.remove('d-none');
                                                } else {
                                                    idNumberError.classList.add('d-none');
                                                }
                                            });
                                    }
                                });
                            </script>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Address Line</label>
                                <input type="text" class="form-control form-control-sm" name="occupation" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                <input type="text" class="form-control form-control-sm" name="phone" id="customerphone" required/>
                                <small id="phone-error" class="text-danger d-none">Phone number is already taken.</small>

                            </div>

                            <script>
                                document.getElementById('customerphone').addEventListener('input', function() {
                                    const phone = this.value;

                                    if (phone.length > 0) {
                                        fetch(`{{ route('check.phone') }}?phone=${phone}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                const phoneError = document.getElementById('phone-error');
                                                if (data.exists) {
                                                    phoneError.classList.remove('d-none');
                                                } else {
                                                    phoneError.classList.add('d-none');
                                                }
                                            });
                                    }
                                });
                            </script>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Date of Birth</label>
                                <input type="text" class="form-control form-control-sm" id="customerDob" name="dob"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="required fs-6 fw-semibold mb-2">Role</label>
                                <select type="hidden" class="form-control form-control-sm" name="assigned_role" >
                                    @foreach($roles as $role)
                                    <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>
                            <h4 class="text-warning">Occupational Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Employer</label>
                                    <input type="text" class="form-control form-control-sm" name="employer"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Job Title</label>
                                    <input type="text" class="form-control form-control-sm" name="empaddress"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Employer Address</label>
                                    <input type="email" class="form-control form-control-sm" name="empemail" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Employer Phone Number</label>
                                    <input name="empphone" class="form-control form-control-sm">
                                </div>
                            </div><br>
                            <h4 class="text-warning">Next of Kin Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">First Name</label>
                                    <input type="text" class="form-control form-control-sm" name="nokfname"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" name="noklname"/>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Date of Birth -->
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Date of Birth</label>
                                    <input type="text" class="form-control form-control-sm" id="nokDob" name="nokdob" placeholder="MM/DD/YYYY" />
                                </div>
                                <!-- Phone Number -->
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Phone Number</label>
                                    <input type="text" class="form-control form-control-sm" id="phone" name="nokphone" placeholder="Enter 10-digit phone number" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="required fs-6 fw-semibold mb-2">Email Address</label>
                                    <input type="email" class="form-control form-control-sm" name="nokemail" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fs-6 fw-semibold mb-2">Gender</label>
                                    <select name="nokgender" class="form-control form-control-sm" >
                                        <option value="">--choose--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
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

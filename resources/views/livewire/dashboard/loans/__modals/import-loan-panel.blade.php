<div class="modal fade" id="addmemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            
            <div class="modal-body">
                <form autocomplete="off" id="memberlist-form" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="memberid-input" class="form-control" value="">
                            <div class="px-1 pt-1">
                                <div class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                    <img src="assets/images/small/img-9.jpg" alt="" id="cover-img" class="img-fluid">

                                    <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                        <div class="flex-grow-1">
                                            <h5 class="modal-title text-white" id="createMemberLabel">Add New Members</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="d-flex gap-3 align-items-center">
                                                <div>
                                                    <label for="cover-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Select Cover Image">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                <i class="ri-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <input class="form-control d-none" value="" id="cover-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                </div>
                                                <button type="button" class="btn-close btn-close-white"  id="createMemberBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-4 mt-n5 pt-2">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute bottom-0 end-0">
                                        <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Member Image">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="member-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="assets/images/users/user-dummy-img.jpg" id="member-img" class="avatar-md rounded-circle h-auto" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="teammembersName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="teammembersName" placeholder="Enter name"  required>
                                <div class="invalid-feedback">Please Enter a member name.</div>
                            </div>

                            <div class="mb-4">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" placeholder="Enter designation" required>
                                <div class="invalid-feedback">Please Enter a designation.</div>
                            </div>
                            <input type="hidden" id="project-input" class="form-control" value="">
                            <input type="hidden" id="task-input" class="form-control" value="">

                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="addNewMember">Add Member</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>

<div class="page-content">
    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg bg-transparent border-top">
                <!-- <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" /> -->
            </div>
        </div>
        <div class="col-md-12 row">
                @if (!empty($user->photos))
                    @foreach ($user->photos as $photo )
                        <img src="{{ url('public/storage/' . $photo->path) }}" alt="user-img" class="img-thumbnail col-4 rounded-sm" />
                    @endforeach
                @else
                    @if ($user->gender) 
                        @if ($user->gender == 'Female')
                            <img src="public/assets/images/girl.png" alt="user-img" class="img-thumbnail rounded-sm" />
                        @else
                            <img src="public/assets/images/boy.png" alt="user-img" class="img-thumbnail rounded-sm" />
                        @endif
                    @else
                        <img src="public/assets/images/user.png" alt="user-img" class="img-thumbnail rounded-sm" />
                    @endif
                @endif
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
            <div class="row g-4">
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="mb-1">{{ $user->fname.' '.$user->lname }}</h3>
                        <p class="text-muted">
                            @foreach ($user->roles as $role)
                            {{ ucwords($role->name) }}
                            @endforeach
                        </p>
                        <div class="hstack text-muted gap-1">
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 fs-16 align-bottom text-body"></i>{{ $user->address ?? 'No Address' }}</div>
                            @if ($user->occupation || $user->jobTitle)
                                
                            @endif
                            <div>
                                <i class="ri-building-line me-1 fs-16 align-bottom text-body"></i>{{ $user->jobTitle ?? $user->occupation  }}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-12 col-lg-auto order-last order-lg-0">
                    <div class="row text text-center">
                        <div class="col-lg-6 col-4">
                            <div class="p-2">
                                <h4 class="mb-1">{{ App\Models\Loans::customer_balance($user->id) }}</h4>
                                <p class="fs-14 text-muted mb-0">Current Amount Owing</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-4">
                            <div class="p-2">
                                <h4 class="mb-1">{{ App\Models\Loans::customer_total_borrowed($user->id) }}</h4>
                                <p class="fs-14 text-muted mb-0">Overall Total Amount Borrowed (Pending/Open/Closed)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>


        
        <div class="row">
            <div class="col-lg-12">
                <div>
                    
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Info</h5>
                                            <div class="table-responsive row">
                                                <table class="table table-borderless mb-0 ">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Full Name :</th>
                                                            <td class="text-muted">{{ $user->fname.' '.$user->lname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                            <td class="text-muted">{{ $user->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Location :</th>
                                                            <td class="text-muted">{{ $user->address ?? 'No Address' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Joining Date</th>
                                                            <td class="text-muted">24 Nov 2021</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            
                                              
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-0">Next of Kin</h5>
                                                </div>
                                                {{-- <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill fs-14"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                            <li><a class="dropdown-item" href="#">View</a></li>
                                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="public/assets/images/user.png" alt="" class="img-fluid rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Fullnames</h5>
                                                            <p class="fs-13 text-muted mb-0">{{ $user->nokfname.' '.$user->noklname }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="public/assets/images/users/phone.png" alt="" class="img-fluid rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Phone Number</h5>
                                                            <p class="fs-13 text-muted mb-0">{{ $user->nokphone ?? 'No Phone' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="public/assets/images/users/calendar.png" alt="" class="img-fluid rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Date of Birth</h5>
                                                            <p class="fs-13 text-muted mb-0">{{ $user->nokDob ?? 'No Record' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center py-3">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="public/assets/images/users/email.png" alt="" class="img-fluid rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Email Address</h5>
                                                            <p class="fs-13 text-muted mb-0">{{ $user->nokemail ?? 'No Email' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                    <!--end card-->

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title mb-0">Employement Details</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/small/img-4.jpg" alt="" height="50" class="rounded" />
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <a href="javascript:void(0);">
                                                        <h6 class="text-truncate fs-14">Employer</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">{{ $user->employer }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/small/img-5.jpg" alt="" height="50" class="rounded" />
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <a href="javascript:void(0);">
                                                        <h6 class="text-truncate fs-14">Job Title</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">{{ $user->jobTitle ?? $user->occupation }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/small/img-6.jpg" alt="" height="50" class="rounded" />
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <a href="javascript:void(0);">
                                                        <h6 class="text-truncate fs-14">Employer Contacts</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">{{ $user->address2 }}</p>
                                                    <p class="text-muted mb-0">{{ $user->phone }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                                {{-- <div class="col-xxl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">About</h5>
                                            <p>Hi I'm Anna Adame, It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is European languages are members of the same family.</p>
                                            <p>You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you’re working with reputable font websites. This may be the most commonly encountered tip I received from the designers I spoke with. They highly encourage that you use different fonts in one design, but do not over-exaggerate and go overboard.</p>
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-user-2-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Designation :</p>
                                                            <h6 class="text-truncate mb-0">Lead Designer / Developer</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-global-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Website :</p>
                                                            <a href="#" class="fw-semibold">www.velzon.com</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-body-->
                                    </div><!-- end card -->

                                </div> --}}
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        
                        <!--end tab-pane-->
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div><!-- container-fluid -->
</div><!-- End Page-content -->

<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-warning mb-4">{{ $loan_product->name }} Product Information</h5>
            <div class="d-flex flex-wrap gap-2 fs-16">
                {{-- <div class="badge fw-medium bg-primary-subtle text-primary">Bremah Nyeleti</div> --}}
            </div>
        </div>

        <div class="px-3">
            <div class="">
                <div class="row">
                    <div class="col-md-6">
                        <div data-simplebar style="max-height: 257px;">
                            <ul class="list-group list-group-flush border-dashed px-3">
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_one">Category</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->loan_child_type->type_name ?? '' }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_two">Disbursed By</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            @forelse ($loan_product->disbursed_by as $item)
                                            <p class="text-muted fs-12 mb-0">{{ $item['disbursed_by'] !== null ? $item['disbursed_by']['name'] : '' }}</p>
                                            @empty
                                            <p>None</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_three">Institutions</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            @forelse ($loan_product->loan_institutes as $item)
                                            <p class="text-muted fs-12 mb-0">{{ $item['institutions'] !== null ? $item['institutions']['name']  : 'None' }}</p>
                                            @empty
                                            <p>None</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_three">Account Payments Sources (Repayments)</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            @forelse ($loan_product->loan_accounts as $item)
                                            <p class="text-muted fs-12 mb-0">{{ $item['account_payment'] !== null ? $item['account_payment']['bank_name']:'' }}</p>
                                            @empty
                                            <p>None</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </li>
                            </ul><!-- end ul -->
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div data-simplebar style="max-height: 257px;">
                            <ul class="list-group list-group-flush border-dashed px-3">
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_one">Description</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->description }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_two">Release date</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">{{ (int)$loan_product->release_date == 0 ? 'Manual' : 'Automatic'}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_three">Auto Payments</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">{{ (int)$loan_product->auto_payment == 0 ? 'No' : 'Yes'}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_four">Number of Repayments</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->def_num_of_repayments }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_two">Repayment Cycles</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            @forelse ($loan_product->repayment_cycle as $item)
                                            <p class="text-muted fs-12 mb-0">{{ $item['repayment_cycle'] !== null ? $item['repayment_cycle']['name'] : '' }}</p>
                                            @empty
                                            <p>None</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </li>
                            </ul><!-- end ul -->
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success card-height-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-white bg-opacity-25 text-white rounded-2 fs-2">
                                            <i class="bx bx-shopping-bag"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-white-50 mb-3">Repayment</p>
                                        <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="2045">0</span></h4>
                                        <p class="text-white-50 mb-0">By Default</p>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-md-6">
                        <div class="card card-height-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                            <i class="bx bxs-user-account"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Repayment</p>
                                        <h4 class="fs-4 mb-3"><span class="counter-value" data-target="7522">0</span></h4>
                                        <p class="text-muted mb-0">Minimum</p>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-md-6">
                        <div class="card card-height-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
                                            <i class="bx bx-store-alt"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Repayment</p>
                                        <h4 class="fs-4 mb-3"><span class="counter-value" data-target="405">0</span>k</h4>
                                        <p class="text-muted mb-0">Maximum</p>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->                 --}}

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fs-15 fw-semibold">{{ $loan_product->min_loan_interest }} {{ $loan_product->interest_types->first()->interest_type['name'] == 'Percentage' ? '%' : 'ZMW' }}</h5>
                                <span class="text-success fs-12 align-middle me-2">{{ $loan_product->min_loan_duration }}</sapan> {{ $loan_product->loan_duration_period }}
                                <p class="text-muted">Minimum Loan Interest</p>
                            </div>
                            <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                                <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar rounded-0" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fs-15 fw-semibold">{{ $loan_product->def_loan_interest }} {{ $loan_product->interest_types->first()->interest_type['name'] == 'Percentage' ? '%' : 'ZMW' }}</h5>                                        
                                <span class="text-info fs-12 align-middle me-2">{{ $loan_product->def_loan_duration }}</sapan> {{ $loan_product->loan_duration_period }}
                                <p class="text-muted">Default Loan Interest</p>
                            </div>
                            <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                                <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar rounded-0" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fs-15 fw-semibold">{{ $loan_product->max_loan_interest }} {{ $loan_product->interest_types->first()->interest_type['name'] == 'Percentage' ? '%' : 'ZMW' }}</h5>
                                <span class="text-primary fs-12 align-middle me-2">{{ $loan_product->max_loan_duration }}</sapan> {{ $loan_product->loan_duration_period }}
                                <p class="text-muted">Maximum Loan Interest</p>
                            </div>
                            <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                                <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar rounded-0" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Loan Interest Details</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="{{ route('sys-settings') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted"><i class="ri-settings-4-line align-middle me-1 fs-15"></i>Settings</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body p-0">

                                        <div class="align-items-center p-3 justify-content-between d-flex">
                                            {{-- <button type="button" class="btn btn-sm btn-primary"><i class="ri-add-line align-middle me-1"></i> Defualt</button> --}}
                                        </div><!-- end card header -->

                                        <div data-simplebar style="max-height: 257px;">
                                            <ul class="list-group list-group-flush border-dashed px-3">
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_one">Interest method</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->interest_methods->first()->interest_method['name'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_two">Interest type</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->interest_types->first()->interest_type['name']  }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_four">Interest</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->def_loan_interest }} {{ $loan_product->interest_types->first()->interest_type['name'] == 'Percentage' ? '%' : 'ZMW' }} {{ $loan_product->loan_interest_period }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><!-- end ul -->
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                        </div> <!-- end row-->
                    </div> <!-- end col-xl-7-->

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Loan Duration Details</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href=" href="{{ route('sys-settings') }}"" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted"><i class="ri-settings-4-line align-middle me-1 fs-15"></i>Settings</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body p-0">

                                        <div class="align-items-center p-3 justify-content-between d-flex">
                                            {{-- <button type="button" class="btn btn-sm btn-primary"><i class="ri-add-line align-middle me-1"></i> Defualt</button> --}}
                                        </div><!-- end card header -->

                                        <div data-simplebar style="max-height: 257px;">
                                            <ul class="list-group list-group-flush border-dashed px-3">
                                                
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_two">Duration</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->min_loan_duration }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_one">Tenure/Period</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">{{ $loan_product->loan_duration_period }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                            </ul><!-- end ul -->
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                        </div> <!-- end row-->
                    </div> 
                </div>
                <!-- end row-->

                {{-- <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-height-100">
                            <div class="d-flex">
                                <div class="flex-grow-1 p-3">
                                    <h5 class="mb-3">Principal </h5>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="results_sparkline_charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-height-100">
                            <div class="d-flex">
                                <div class="flex-grow-1 p-3">
                                    <h5 class="mb-3">Interviewed</h5>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 34.24 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="apex-charts" data-colors='["--vz-danger" , "--vz-transparent"]' dir="ltr" id="results_sparkline_charts2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-height-100">
                            <div class="d-flex">
                                <div class="flex-grow-1 p-3">
                                    <h5 class="mb-3">Hired</h5>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 6.67 % </span> vs. previous month</p>
                                </div>
                                <div>
                                    <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="results_sparkline_charts3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end row-->
            </div>
            <!-- container-fluid -->
        </div>
    </div>
</div>
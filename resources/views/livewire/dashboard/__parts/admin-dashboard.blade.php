<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="bg-transparent page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Loan Dashboard </h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Overview</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="pb-1 mb-3 row">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="mb-1 fs-16">Good Morning, {{ auth()->user()->fname.' '.auth()->user()->lname }}!</h4>
                                    <p class="mb-0 text-muted">Here's what's happening with your reports today.</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="javascript:void(0);">
                                        <div class="mb-0 row g-3 align-items-center">
                                            <div class="col-sm-auto">
                                                {{-- <div class="input-group">
                                                    <input type="text" class="form-control dash-filter-picker" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                    <div class="text-white input-group-text bg-primary border-primary">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <!--end col-->
                                            <div class="col-auto">
                                                <a href="{{ route('proxy-loan-create') }}" type="button" class="btn btn-soft-primary"><i class="align-middle ri-add-circle-line me-1"></i> Add New Loan</a>
                                            </div>
                                            <!--end col-->
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-soft-secondary btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-pulse-line"></i>.</button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate card-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-white text-uppercase fw-medium text-truncate"> Total Number of Open Loans</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 text-white fs-22 fw-semibold ff-secondary">K<span class="counter-value" data-target="{{ $this->total_open_loans_amount() }}">{{ $this->total_open_loans_amount() }}</span> </h4>
                                            <a href="{{ route('open-loans') }}" class="text-white text-decoration-underline">Currently Opened</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-dark bg-primary-subtle fs-3">
                                                {{ $this->total_loans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->



                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate card-warning">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-white text-uppercase fw-medium text-truncate">No. Pending Loan Approval</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold ff-secondary">K<span class="counter-value" data-target="{{  $this->total_pending_loans_amount() }}">{{  $this->total_pending_loans_amount() }}</span></h4>
                                            <a href="{{ route('view-loan-requests') }}" class="text-white text-decoration-underline">Pending Loan Approval</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-dark bg-primary-subtle fs-3">
                                                {{ $this->total_pending_loans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate card-success">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                         <p class="mb-0 text-white text-uppercase fw-medium text-truncate">Successful Loans to Date</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 text-white fs-22 fw-semibold ff-secondary">K<span class="counter-value" data-target="{{ App\Models\Transaction::total_collected() }}">{{ App\Models\Transaction::total_collected() }}</span> </h4>
                                            <a href="{{ route('make-payment') }}" class="text-white text-decoration-underline">Successfully Closed</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-dark bg-primary-subtle fs-3">
                                               {{ $closedLoansCount }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                         <p class="mb-0 text-uppercase fw-medium text-muted text-truncate">Total Repayments to Date</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold ff-secondary">K<span class="counter-value" data-target="{{ App\Models\Transaction::total_collected() }}">{{ App\Models\Transaction::total_collected() }}</span> </h4>
                                            <a href="{{ route('make-payment') }}" class="text-decoration-underline text-muted">Number of Repayments</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-dark bg-primary-subtle fs-3">
                                                {{ $this->num_of_repayments() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                    </div> <!-- end row-->

                    {{-- Second Layer Stats --}}
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate card-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-uppercase fw-medium text-muted text-truncate"> Total Loans in Arears</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold text-dark ff-secondary">K<span class="counter-value" data-target="{{ $this->total_loans_arears() }}">{{ $this->total_loans_arears() }}</span> </h4>
                                            <a href="{{ route('loan-arrears') }}" class="text-decoration-underline text-muted">Overdue Loans (Arears)</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-dark bg-primary-subtle fs-3">
                                                {{ $this->num_loans_arears() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->



                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-uppercase fw-medium text-info text-truncate">Total Amount Disbursed to Date</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold text-info ff-secondary">K<span class="counter-value" data-target="{{  $this->total_disbursed_to_date() }}">{{  $this->total_disbursed_to_date() }}</span></h4>
                                            <a href="{{ route('approved-loans') }}" class="text-decoration-underline text-info">Disbursed Loans</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-dark bg-primary-subtle fs-3">
                                                {{ $this->num_disbursed_to_date() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                         <p class="mb-0 text-uppercase fw-medium text-danger text-truncate">Unresolved Loans to Date</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold text-danger ff-secondary">K<span class="counter-value" data-target="{{ $this->total_unresolved_to_date() }}">{{ $this->total_unresolved_to_date() }}</span> </h4>
                                            <a href="{{ route('view-loan-requests') }}" class="text-decoration-underline text-danger">Processing Loans</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-danger bg-primary-subtle fs-3">
                                                {{ $this->num_unresolved_to_date() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate card-danger">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                         <p class="mb-0 text-white text-uppercase fw-medium text-truncate">Rejected Loans to Date</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 text-white fs-22 fw-semibold ff-secondary">K<span class="counter-value" data-target="{{ $this->total_rejected_to_date() }}">{{ $this->total_rejected_to_date() }}</span> </h4>
                                            <a href="{{ route('make-payment') }}" class="text-white text-decoration-underline">Denied Loans</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title text-danger bg-primary-subtle fs-3">
                                                {{ $this->num_rejected_to_date() }}
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-uppercase fw-medium text-muted text-truncate">Total Loan Officers</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="{{ $this->total_loan_officers() }}">{{ $this->total_loan_officers() }}</span> </h4>
                                            <a href="{{ route('employees') }}" class="text-decoration-underline">Employees</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title bg-primary-subtle fs-3">
                                                <i class="bx bx-user-circle text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                         <p class="mb-0 text-uppercase fw-medium text-muted text-truncate">Total Assigned Officers</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="{{ $this->num_assigned_staff() }}">{{ $this->num_assigned_staff() }}</span></h4>
                                            <a href="{{ route('employees') }}" class="text-decoration-underline">Employees</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title bg-primary-subtle fs-3">
                                                <i class="bx bx-user-circle text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-uppercase fw-medium text-muted text-truncate">Total Unassigned Officers</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="{{ $this->num_unassigned_staff() }}">{{ $this->num_unassigned_staff() }}</span></h4>
                                            <a href="{{ route('employees') }}" class="text-decoration-underline">Employees</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title bg-primary-subtle fs-3">
                                                <i class="bx bx-user-circle text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="overflow-hidden flex-grow-1">
                                            <p class="mb-0 text-uppercase fw-medium text-muted text-truncate">Total Borrowers</p>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-end justify-content-between">
                                        <div>
                                            <h4 class="mb-4 fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="{{  $borrowers ? $borrowers->count() : 0 }}">{{  $borrowers ? $borrowers->count() : 0 }}</span></h4>
                                            <a href="{{ route('borrowers') }}" class="text-decoration-underline">See more</a>
                                        </div>
                                        <div class="flex-shrink-0 avatar-sm">
                                            <span class="rounded avatar-title bg-primary-subtle fs-3">
                                                <i class="bx bx-user-circle text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                    {{-- <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="border-0 card-header align-items-center d-flex">
                                    <h4 class="mb-0 card-title flex-grow-1">Revenue</h4>
                                    <div>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            ALL
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            1M
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            6M
                                        </button>
                                        <button type="button" class="btn btn-soft-primary btn-sm">
                                            1Y
                                        </button>
                                    </div>
                                </div><!-- end card header -->

                                <div class="p-0 border-0 card-header bg-light-subtle">
                                    <div class="text-center row g-0">
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="7585">0</span></h5>
                                                <p class="mb-0 text-muted">Orders</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1">$<span class="counter-value" data-target="22.89">0</span>k</h5>
                                                <p class="mb-0 text-muted">Earnings</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="367">0</span></h5>
                                                <p class="mb-0 text-muted">Refunds</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-3">
                                            <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                <h5 class="mb-1 text-success"><span class="counter-value" data-target="18.92">0</span>%</h5>
                                                <p class="mb-0 text-muted">Conversation Ratio</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div><!-- end card header -->

                                <div class="p-0 pb-2 card-body">
                                    <div class="w-100">
                                        <div id="customer_impression_charts" data-colors='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <!-- card -->
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="mb-0 card-title flex-grow-1">Sales by Locations</h4>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-primary btn-sm">
                                            Export Report
                                        </button>
                                    </div>
                                </div><!-- end card header -->

                                <!-- card body -->
                                <div class="card-body">

                                    <div id="sales-by-locations" data-colors='["--vz-light", "--vz-secondary", "--vz-primary"]' style="height: 269px" dir="ltr"></div>

                                    <div class="px-2 py-2 mt-1">
                                        <p class="mb-1">Canada <span class="float-end">75%</span></p>
                                        <div class="mt-2 progress" style="height: 6px;">
                                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75"></div>
                                        </div>

                                        <p class="mt-3 mb-1">Greenland <span class="float-end">47%</span>
                                        </p>
                                        <div class="mt-2 progress" style="height: 6px;">
                                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="47"></div>
                                        </div>

                                        <p class="mt-3 mb-1">Russia <span class="float-end">82%</span></p>
                                        <div class="mt-2 progress" style="height: 6px;">
                                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="82"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div> --}}

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="mb-0 card-title flex-grow-1"><b>Recent 5 Open Loans</b></h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table mb-0 align-middle table-hover table-centered table-nowrap">
                                            <tbody>
                                                @forelse ($this->getOpenLoanRequests('auto')->take(5) as $loan)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="p-1 rounded avatar-sm bg-light me-2">
                                                                @if (!empty($loan->user->photos->toArray()))
                                                                     @foreach ($loan->user->photos->take(1) as $photo )
                                                                         <img src="{{ url('public/storage/' . $photo->path) }}" alt="user-img" class="img-fluid rounded-cirrounded-circle" />
                                                                     @endforeach
                                                                 @else
                                                                     @if ($loan->user->gender !== null)
                                                                         @if ($loan->user->gender === 'Female')
                                                                             <img src="public/assets/images/girl.png" alt="user-img" class="img-fluid rounded-cirrounded-circle" />
                                                                         @else
                                                                             <img src="public/assets/images/boy.png" alt="user-img" class="img-fluid rounded-cirrounded-circle" />
                                                                         @endif
                                                                     @else
                                                                         <img src="public/assets/images/user.png" alt="user-img" class="img-fluid rounded-cirrounded-circle" />
                                                                     @endif
                                                                 @endif
                                                            </div>
                                                            <div>
                                                                <h5 class="my-1 fs-14"><a href="apps-ecommerce-product-details.html" class="text-reset">{{ $loan->user->fname.' '. $loan->user->lname }}</a></h5>
                                                                <span class="text-muted">{{ $loan->created_at->toFormattedDateString() }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="my-1 fs-14 fw-normal">K{{ number_format($loan->amount, 2, '.', ',') }}</h5>
                                                        <span class="text-muted">{{ $loan->loan_product->name }} Loan</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="my-1 fs-14 fw-normal">{{ $loan->repayment_plan }} </h5>
                                                        <span class="text-muted">Months</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="my-1 fs-14 fw-normal"><span class="badge bg-suceess-subtle text-suceess">Open</span></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="my-1 fs-14 fw-normal">K{{
                                                            number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id), 2, '.', ',')
                                                        }}</h5>
                                                        <span class="text-muted">Repayment</span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <div class="px-3 text-muted">
                                                    <p>No Closed Loan</a>
                                                </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="mb-0 card-title flex-grow-1"><b>Recent 5 Closed Loans</b></h4>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table mb-0 align-middle table-centered table-hover table-nowrap">
                                            <tbody>
                                               @forelse ($this->getClosedLoanRequests('auto')->take(5) as $loan)
                                               <tr>
                                                   <td>
                                                       <div class="d-flex align-items-center">
                                                           <div class="p-1 rounded avatar-sm bg-light me-2">
                                                               @if (!empty($loan->user->photos->toArray()))
                                                                    @foreach ($loan->user->photos->take(1) as $photo )
                                                                        <img src="{{ url('public/storage/' . $photo->path) }}" alt="user-img" class="img-fluid rounded-circle" />
                                                                    @endforeach
                                                                @else
                                                                    @if ($loan->user->gender !== null)
                                                                        @if ($loan->user->gender === 'Female')
                                                                            <img src="public/assets/images/girl.png" alt="user-img" class="img-fluid rounded-circle" />
                                                                        @else
                                                                            <img src="public/assets/images/boy.png" alt="user-img" class="img-fluid rounded-circle" />
                                                                        @endif
                                                                    @else
                                                                        <img src="public/assets/images/user.png" alt="user-img" class="img-fluid rounded-circle" />
                                                                    @endif
                                                                @endif
                                                           </div>
                                                           <div>
                                                               <h5 class="my-1 fs-14"><a href="apps-ecommerce-product-details.html" class="text-reset">{{ $loan->user->fname.' '. $loan->user->lname }}</a></h5>
                                                               <span class="text-muted">{{ $loan->created_at->toFormattedDateString() }}</span>
                                                           </div>
                                                       </div>
                                                   </td>
                                                   <td>
                                                       <h5 class="my-1 fs-14 fw-normal">K{{ number_format($loan->amount, 2, '.', ',') }}</h5>
                                                       <span class="text-muted">{{ $loan->loan_product->name }} Loan</span>
                                                   </td>
                                                   <td>
                                                       <h5 class="my-1 fs-14 fw-normal">{{ $loan->repayment_plan }} </h5>
                                                       <span class="text-muted">Months</span>
                                                   </td>
                                                   <td>
                                                       <h5 class="my-1 fs-14 fw-normal"><span class="badge bg-suceess-subtle text-suceess">Open</span></h5>
                                                   </td>
                                                   <td>
                                                       <h5 class="my-1 fs-14 fw-normal">K{{
                                                           number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id), 2, '.', ',')
                                                       }}</h5>
                                                       <span class="text-muted">Repayment</span>
                                                   </td>
                                               </tr>
                                               @empty
                                               <div class="px-3 text-muted">
                                                   <p>No Closed Loan</a>
                                               </div>
                                               @endforelse
                                            </tbody>
                                        </table><!-- end table -->
                                    </div>

                                </div> <!-- .card-body-->
                            </div> <!-- .card-->
                        </div> <!-- .col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="mb-0 card-title flex-grow-1"><b>Recent 7 Loan Requests</b></h4>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('view-loan-requests') }}" class="btn btn-soft-info btn-sm">
                                            <i class="align-middle ri-file-list-3-line"></i> View more
                                        </a>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table mb-0 align-middle table-borderless table-centered table-nowrap">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col">Loan ID</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Occupation</th>
                                                    <th scope="col">Principal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Sex</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse($all_loan_requests as $loan)
                                                <tr>
                                                    <td>
                                                        <a target="_blank" href="{{ route('detailed', ['id' => $loan->id]) }}" class="fw-medium link-primary">{{ $loan->uuid }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                @if (!empty($loan->user->photos->toArray()))
                                                                    @foreach ($loan->user->photos->take(1) as $photo )
                                                                        <img src="{{ url('public/storage/' . $photo->path) }}" alt="user-img" class="avatar-xs rounded-circle" />
                                                                    @endforeach
                                                                @else
                                                                    @if ($loan->user->gender !== null)
                                                                        @if ($loan->user->gender === 'Female')
                                                                            <img src="public/assets/images/girl.png" alt="user-img" class="avatar-xs rounded-circle" />
                                                                        @else
                                                                            <img src="public/assets/images/boy.png" alt="user-img" class="avatar-xs rounded-circle" />
                                                                        @endif
                                                                    @else
                                                                        <img src="public/assets/images/user.png" alt="user-img" class="avatar-xs rounded-circle" />
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <a target="_blank" href="{{ route('client-account', ['key'=>$loan->user->id]) }}">{{ ucwords($loan->user->fname).' '.ucwords($loan->user->lname) }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{  $loan->user->phone ?? 'No Phone' }}</td>
                                                    <td>{{ $loan->user->occupation ?? 'No Occupation' }}</td>
                                                    <td>
                                                        <span class="text-lg text-info h5"><b>K{{ $loan->amount }}</b></span>
                                                    </td>
                                                    <td>
                                                        @if($loan->status == 0)
                                                        <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                        @elseif($loan->status == 1)
                                                        <span class="badge bg-success-subtle text-success">Open</span>
                                                        @elseif($loan->status == 2)
                                                        <span class="badge bg-primary-subtle text-primary">Pending</span>
                                                        @elseif($loan->status = 3)
                                                        <span class="badge bg-danger-subtle text-danger">Danger</span>
                                                        @else
                                                        <span class="badge bg-success-subtle text-success">Paid</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <h5 class="mb-0 fs-14 fw-medium"><span class="text-muted fs-11 ms-1">{{ $loan->user->gender }}</span></h5>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <div class="px-3 text-muted">
                                                        No Loans have been requested.
                                                    </div>
                                                </tr>
                                                @endforelse

                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                </div>
                            </div> <!-- .card-->
                        </div> <!-- .col-->
                    </div> <!-- end row-->

                    {{-- Graphs --}}
                    @include('livewire.dashboard.__parts.admin-dashboard-graph')
                </div> <!-- end .h-100-->

            </div> <!-- end col -->

            @include('livewire.dashboard.__parts.admin-dashboard-left-bar')
        </div>

    </div>
    <!-- container-fluid -->
</div>

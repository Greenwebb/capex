<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-n4 mx-n4 card-border-effect-none">
                    <div class="bg-primary-subtle">
                        <div class="card-body pb-0 px-4">
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-auto">
                                            <div class="avatar-md">
                                                <div class="avatar-title bg-white rounded-circle">
                                                    @if ($loan->user->profile_photo_path)
                                                        <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt="" class="avatar-xs">
                                                    @else
                                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt="image" class="avatar-xs"/>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div>
                                                <h4 class="fw-bold">{{ $loan->loan_product->name }} Loan of K  {{ number_format($loan->amount, 2, '.', ',') }}</h4>
                                                <div class="hstack gap-3 flex-wrap">
                                                    <div><i class="ri-building-line align-bottom me-1"></i> {{ $loan->user->fname.' '.$loan->user->lname }}</div>
                                                    <div class="vr"></div>
                                                    <div>Date Applied : <span class="fw-medium">{{ $loan->created_at->toFormattedDateString() }}</span></div>
                                                    <div class="vr"></div>
                                                    {{-- <div>Due Date : <span class="fw-medium">29 Dec, 2021</span></div> --}}
                                                    <div class="vr"></div>

                                                    @if($loan->status == 0)
                                                    <div class="badge rounded-pill bg-warning fs-12">Pending </div>
                                                    @elseif($loan->status == 1)
                                                    <div class="badge rounded-pill bg-info fs-12">Open </div>
                                                    @elseif($loan->status == 2)
                                                    <div class="badge rounded-pill bg-success fs-12">Processing </div>
                                                    @elseif($loan->status == 3)
                                                    <div class="badge rounded-pill bg-danger fs-12">Rejected/ Denied</div>
                                                    @else
                                                    <div class="badge rounded-pill bg-success fs-12">Closed</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-auto">
                                    <div class="hstack gap-1 flex-wrap">
                                        <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                            <i class="ri-star-fill"></i>
                                        </button>
                                        <button type="button" class="btn py-0 fs-16 text-body">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button type="button" class="btn py-0 fs-16 text-body">
                                            <i class="ri-flag-line"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>

                            <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                        Overview
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab">
                                        Repayments
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-activities" role="tab">
                                        Assigned Staff
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                        Statement
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content text-muted">
                    <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-muted">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                            <p>{{ $loan->desc ?? 'No Description' }}. {{ $loan->note }}</p>

                                            {{-- <ul class="ps-4 vstack gap-2">
                                                <li>kjkjk</li>
                                            </ul> --}}

                                            <div>
                                                <button type="button" class="btn btn-link link-primary p-0">{{ $loan->loan_type->name }}</button>
                                                <button type="button" class="btn btn-link link-primary p-0">{{ $loan->loan_child_type->name }}</button>
                                                <button type="button" class="btn btn-link link-primary p-0">{{ $loan->loan_product->name }}</button>
                                            </div>

                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <div class="row gy-3">

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Principal Amount :</p>
                                                            <h5 class="fs-15 mb-0"> {{ number_format($loan->amount, 2, '.',',') }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Duration :</p>
                                                            <div class="fs-12">{{ $loan->repayment_plan }} Months</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Priority :</p>
                                                            <div class="badge bg-primary fs-12">Normal</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                                            @if($loan->status == 0)
                                                                <div class="badge bg-warning fs-12">Pending</div>
                                                            @elseif($loan->status == 1)
                                                                <div class="badge bg-success fs-12">Open (Pending Repayment)</div>
                                                            @elseif($loan->status == 2)
                                                                <div class="badge bg-primary fs-12">Processing</div>
                                                            @else
                                                                <div class="badge bg-danger fs-12">Rejected</div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <div class="row gy-3">

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Est. Repayment Amount :</p>
                                                            <h5 class="fs-15 mb-0">{{ number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id), 2, '.', ',') }}</h5>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Current Pending Repayment :</p>
                                                            <h5 class="fs-15 mb-0"> {{ number_format(App\Models\Loans::loan_balance($loan->id), 2, '.', ',') }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-2 border-top border-top-dashed mt-4">
                                                <h6 class="mb-3 fw-semibold text-warning text-uppercase">Uploaded Attachments</h6>
                                                <div class="d-flex gap-2 p-4">
                                                    <!-- end col -->
                                                    @if ($loan->user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                                    <a target="_blank" href="{{ 'https://admin.capexfinancialservices.org/public/'.Storage::url($loan->user->uploads->where('name', 'nrc_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                    <div class="col-md-3">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-primary rounded fs-24">
                                                                            <i class="ri-file-ppt-2-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">{{ $loan->user->fname.' '.$loan->user->lname }}'s NRC</a></h5>
                                                                    <div>{{ $loan->user->uploads->where('name', 'nrc_file')->first()->created_at->toFormattedDateString() }}</div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    @endif
                                                    
                                                    @if ($loan->user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                                    <a target="_blank" href="{{ 'https://admin.capexfinancialservices.org/public/'.Storage::url($loan->user->uploads->where('name', 'tpin_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                    <div class="col-md-3">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-primary rounded fs-24">
                                                                            <i class="ri-file-ppt-2-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">{{ $loan->user->fname.' '.$loan->user->lname }}'s TPIN</a></h5>
                                                                    <div>{{ $loan->user->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    @endif
                                                    @if ($loan->user->uploads->where('name', 'payslip_file')->isNotEmpty())
                                                    <a target="_blank" href="{{ 'https://admin.capexfinancialservices.org/public/'.Storage::url($loan->user->uploads->where('name', 'payslip_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                    <div class="col-md-3">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-primary rounded fs-24">
                                                                            <i class="ri-file-ppt-2-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">{{ $loan->user->fname.' '.$loan->user->lname }}'s Payslip </a></h5>
                                                                    <div>{{ $loan->user->uploads->where('name', 'payslip_file')->first()->created_at->toFormattedDateString() }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    @endif
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->


                                <!-- end card -->
                            </div>
                            <!-- ene col -->
                          
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end tab pane -->
                </div>
            </div>
            <!-- end col -->
        </div>
        
        @include('livewire.dashboard.loans.__parts.more-loan-info')
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">

                            <div class="pt-3 border-top border-top-dashed mt-4">
                                <div class="row gy-3">

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium">Principal Amount :</p>
                                            <h5 class="fs-15 mb-0"> {{ $loan->amount }}</h5>
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
                                                <div class="badge bg-success fs-12">Inprogress</div>
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
                                            <h5 class="fs-15 mb-0">{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium">Current Pending Repayment :</p>
                                            <h5 class="fs-15 mb-0"> {{ App\Models\Loans::customer_balance($loan->user->id) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 border-top border-top-dashed mt-4">
                                <h6 class="mb-3 fw-semibold text-uppercase">Attachments</h6>
                                <div class="row g-3">
                                    <!-- end col -->
                                    @if ($loan->user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                    <a href="{{ 'https://capexlms.greenwebbtech,com/public/'.Storage::url($loan->user->uploads->where('name', 'nrc_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                    <div class="col-xxl-4 col-lg-6">
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
                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">NRC</a></h5>
                                                    <div>2.4MB</div>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                    @endif
                                    @if ($loan->user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                    <a href="{{ 'https://capexlms.greenwebbtech,com/public/'.Storage::url($loan->user->uploads->where('name', 'tpin_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                    <div class="col-xxl-4 col-lg-6">
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
                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">Tax Payer Identification Number</a></h5>
                                                    <div>2.4MB</div>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                        </div>
                                                    </div>
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
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Assigned Staff</h5>
                        <div class="d-flex flex-wrap gap-2 fs-16">
                            {{-- <div class="badge fw-medium bg-primary-subtle text-primary">Bremah Nyeleti</div> --}}
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                {{-- 
                <div class="card">
                    <div class="card-header align-items-center d-flex border-bottom-dashed">
                        <h4 class="card-title mb-0 flex-grow-1">Guarantors</h4>
                    
                    </div>

                    <div class="card-body">
                        <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                            <div class="vstack gap-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end list -->
                        </div>
                    </div>
                    <!-- end card body -->
                </div> --}}
                <!-- end card -->

                
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end tab pane -->
        <div class="tab-pane fade" id="project-activities" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assigned Staff</h5>
                    
                </div>
            </div>
        </div>
        @can('approve loan')
        <div class="d-flex align-items-start gap-3 mt-4">
            <button wire:click="accept({{$loan->id}})" type="button" class="btn btn-primary btn-label right ms-auto nexttab nexttab" data-nexttab="steparrow-description-info-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Approve Verification</button>
        </div>
        @endcan
    </div>
</div>
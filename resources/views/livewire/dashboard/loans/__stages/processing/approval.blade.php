?<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Approve {{ $loan->user->fname.' '.$loan->user->mname.' '.$loan->user->lname }}'s Loan Request</h3>
            </div>


            @can('approve loan')
            <div class="justify-between col-12 d-flex">
                <a title="Undo" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_review_rollback" wire:click="setLoanID({{$loan->id}})" class="btn btn-warning btn-label left nexttab"><i class="align-middle ri-arrow-left-line label-icon fs-16 ms-2"></i> Rollback </a>
                @can('disburse fund')
                    <button title="Open loan application" wire:click="accept({{$loan->id}})" type="button" class="btn btn-success btn-label right ms-auto nexttab" data-nexttab="steparrow-description-info-tab"><i class="align-middle ri-arrow-right-line label-icon fs-16 ms-2"></i>Approve Application </button>
                @endcan
            </div>
            @endcan
        </div>

        <div class="p-2 mt-4 border-top border-top-dashed">
            <div class="p-4 row gy-3">

                <div class="col-lg-3 col-sm-6">
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Principal Amount :</p>
                        <h5 class="mb-0 fs-15"> {{ $loan->amount }}</h5>
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

        <div class="p-2 mt-4 border-top border-top-dashed">
            <div class="p-4 row gy-3">

                <div class="col-lg-3 col-sm-6">
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Est. Repayment Amount :</p>
                        <h5 class="mb-0 fs-15">{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Current Pending Repayment :</p>
                        <h5 class="mb-0 fs-15"> {{ App\Models\Loans::customer_balance($loan->user->id) }}</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Applied From (Source) :</p>
                        <h5 class="mb-0 fs-15"> {{ $loan->source}}</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="row">
                        <img title="Verified" style="border-radius: 100%; width:100px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8q9mvX7X4-2GZ3TlCE6ieSrWOks5DQgT00Q&s" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="p-2 mt-4 border-top border-top-dashed">
            <h6 class="mb-3 fw-semibold text-warning text-uppercase">Uploaded Attachments</h6>
            <div class="gap-2 p-4 d-flex">
                <!-- end col -->
                @php
                    function getFileUrl($upload) {
                        return $upload->source === 'admin'
                            ? url('public/' . Storage::url($upload->path))
                            : 'https://app.capexfinancialservices.org/public/' . Storage::url($upload->path);
                    }

                    function renderFileBlock($upload, $label, $user) {
                        return '
                            <a target="_blank" href="' . getFileUrl($upload) . '" class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="public/' . Storage::url($upload->path) . '">
                                <div class="col-md-3">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm">
                                                    <div class="rounded avatar-title bg-light text-primary fs-24">
                                                        <i class="ri-file-ppt-2-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden flex-grow-1">
                                                <h5 class="mb-1 fs-13">
                                                    <a href="#" class="text-body text-truncate d-block">' . $user->fname . ' ' . $user->lname . '\'s ' . $label . '</a>
                                                </h5>
                                                <div>' . $upload->created_at->toFormattedDateString() . '</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>';
                    }
                @endphp

                @if ($loan?->user?->uploads?->where('name', 'nrc_file')->isNotEmpty())
                    {!! renderFileBlock($loan->user->uploads->where('name', 'nrc_file')->first(), 'NRC Front', $loan->user) !!}
                @endif

                @if ($loan?->user?->uploads?->where('name', 'nrc_b_file')->isNotEmpty())
                    {!! renderFileBlock($loan->user->uploads->where('name', 'nrc_b_file')->first(), 'NRC Back', $loan->user) !!}
                @endif

                @if ($loan?->user?->uploads?->where('name', 'tpin_file')->isNotEmpty())
                    {!! renderFileBlock($loan->user->uploads->where('name', 'tpin_file')->first(), 'TPIN', $loan->user) !!}
                @endif

                @if ($loan?->user?->uploads?->where('name', 'payslip_file')->isNotEmpty())
                    {!! renderFileBlock($loan->user->uploads->where('name', 'payslip_file')->first(), 'Payslip', $loan->user) !!}
                @endif

                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- ene col -->

    @include('livewire.dashboard.loans.__parts.more-loan-info')
</div>

<div class="content">
    <div class="border-0 shadow-lg card">
        <div class="text-white card-header bg-gradient-danger">
            <div class="d-flex justify-content-between align-items-center">
                <div class="card-title">
                    <h3 class="mb-0 d-flex align-items-center">
                        <i class="ri-close-circle-line me-2 fs-20"></i>
                        Denied Loan Request:
                        <a class="ms-2 text-warning" target="_blank" href="{{ route('client-account', ['key'=>$loan->user->id]) }}">
                            {{ $loan->user->fname.' '.$loan->user->mname.' '.$loan->user->lname }}
                        </a>
                    </h3>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div class="status-badge">
                    <span class="px-3 py-2 badge bg-danger-subtle text-danger fs-5 rounded-pill">
                        <i class="ri-error-warning-line me-1"></i>
                        {{ $current->status }}
                    </span>
                </div>

                <button title="Open loan application" wire:click="accept({{$loan->id}})" type="button" 
                    class="btn btn-light btn-label right ms-auto nexttab" data-nexttab="steparrow-description-info-tab">
                    <span class="d-flex align-items-center">
                        Verify
                        <i class="ri-arrow-right-line label-icon fs-16 ms-2"></i>
                    </span>
                </button>
            </div>
        </div>

        <div class="position-relative">
            <div class="top-0 position-absolute end-0 mt-n4 me-4">
                <div class="p-3 text-white alert-icon bg-danger rounded-circle">
                    <i class="ri-file-damage-line fs-24"></i>
                </div>
            </div>
        </div>

        <div class="p-4 mt-2">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="p-3 rounded shadow-sm loan-info-card border-start border-danger border-3">
                        <p class="mb-1 text-uppercase text-muted fs-12 fw-semibold">Principal Amount</p>
                        <h5 class="mb-0 fs-18 text-danger">{{ $loan->amount }}</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="p-3 rounded shadow-sm loan-info-card border-start border-warning border-3">
                        <p class="mb-1 text-uppercase text-muted fs-12 fw-semibold">Duration</p>
                        <h5 class="mb-0 fs-18">{{ $loan->repayment_plan }} Months</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="p-3 rounded shadow-sm loan-info-card border-start border-primary border-3">
                        <p class="mb-1 text-uppercase text-muted fs-12 fw-semibold">Priority</p>
                        <div class="px-3 py-2 badge bg-primary fs-12">Normal</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="p-3 rounded shadow-sm loan-info-card border-start border-info border-3">
                        <p class="mb-1 text-uppercase text-muted fs-12 fw-semibold">Status</p>
                        @if($loan->status == 0)
                            <div class="px-3 py-2 badge bg-warning fs-12">Pending</div>
                        @elseif($loan->status == 1)
                            <div class="px-3 py-2 badge bg-success fs-12">In Progress</div>
                        @elseif($loan->status == 2)
                            <div class="px-3 py-2 badge bg-primary fs-12">Processing</div>
                        @else
                            <div class="px-3 py-2 badge bg-danger fs-12">Rejected</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 mt-2 bg-light">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="p-3 bg-white rounded shadow-sm financial-info-card">
                        <div class="mb-2 d-flex align-items-center">
                            <i class="ri-refund-2-line text-danger me-2 fs-20"></i>
                            <p class="mb-0 text-uppercase text-muted fs-12 fw-semibold">Est. Repayment Amount</p>
                        </div>
                        <h5 class="mb-0 fs-18">{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id, $loan) }}</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="p-3 bg-white rounded shadow-sm financial-info-card">
                        <div class="mb-2 d-flex align-items-center">
                            <i class="ri-money-dollar-circle-line text-warning me-2 fs-20"></i>
                            <p class="mb-0 text-uppercase text-muted fs-12 fw-semibold">Current Pending Repayment</p>
                        </div>
                        <h5 class="mb-0 fs-18">{{ App\Models\Loans::customer_balance($loan->user->id) }}</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="p-3 bg-white rounded shadow-sm financial-info-card">
                        <div class="mb-2 d-flex align-items-center">
                            <i class="ri-database-2-line text-info me-2 fs-20"></i>
                            <p class="mb-0 text-uppercase text-muted fs-12 fw-semibold">Applied From (Source)</p>
                        </div>
                        <h5 class="mb-0 fs-18">{{ $loan->source }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 mt-2">
            <div class="mb-3 attachment-header d-flex align-items-center">
                <div class="p-2 rounded attachment-icon bg-warning-subtle text-warning me-2">
                    <i class="ri-attachment-2 fs-20"></i>
                </div>
                <h6 class="mb-0 fw-semibold text-uppercase">Uploaded Attachments</h6>
            </div>
            
            <div class="row g-3">
                @php
                    function getFileUrl($upload) {
                        return $upload->source === 'admin'
                            ? url('public/' . Storage::url($upload->path))
                            : 'https://app.capexfinancialservices.org/public/' . Storage::url($upload->path);
                    }

                    function renderFileBlock($upload, $label, $user) {
                        $iconClass = 'ri-file-text-line';
                        if (strpos(strtolower($label), 'nrc') !== false) {
                            $iconClass = 'ri-id-card-line';
                        } elseif (strpos(strtolower($label), 'tpin') !== false) {
                            $iconClass = 'ri-government-line';
                        } elseif (strpos(strtolower($label), 'payslip') !== false) {
                            $iconClass = 'ri-money-dollar-box-line';
                        } elseif (strpos(strtolower($label), 'bank') !== false) {
                            $iconClass = 'ri-bank-line';
                        }

                        return '
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <a target="_blank" href="' . getFileUrl($upload) . '" class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="public/' . Storage::url($upload->path) . '">
                                    <div class="p-3 bg-white border rounded shadow-sm attachment-card hover-shadow">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm">
                                                    <div class="rounded avatar-title bg-danger-subtle text-danger fs-20">
                                                        <i class="' . $iconClass . '"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden flex-grow-1">
                                                <h5 class="mb-1 fs-13 text-truncate">
                                                    ' . $user->fname . '\'s ' . $label . '
                                                </h5>
                                                <div class="text-muted fs-12">' . $upload->created_at->toFormattedDateString() . '</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>';
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

                @if ($loan->user->uploads->where('name', 'bankstatement')->isNotEmpty())
                    {!! renderFileBlock($loan->user->uploads->where('name', 'bankstatement')->first(), 'Bank Statement', $loan->user) !!}
                @endif
            </div>
        </div>
    </div>

    @include('livewire.dashboard.loans.__parts.more-loan-info')
</div>

<style>
.bg-gradient-danger {
    background: linear-gradient(135deg, #ff4d4d 0%, #d10000 100%);
}

.hover-shadow:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.loan-info-card, .financial-info-card, .attachment-card {
    transition: all 0.2s ease;
}

.loan-info-card:hover, .financial-info-card:hover {
    background-color: #fff9f9;
}

.attachment-card:hover {
    border-color: #ff4d4d !important;
}

.shadow-lg {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}
</style>
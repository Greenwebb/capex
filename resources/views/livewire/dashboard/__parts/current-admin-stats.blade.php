<div class="row g-5 g-xl-8">
    <div class="col-xl-4" >
        <!--begin::Statistics Widget 5-->
        <a href="{{ route('borrowers') }}" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <i class="ki-duotone ki-basket text-primary fs-2x ms-n1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="mt-5 mb-2 text-gray-900 fw-bold fs-2">K {{  App\Models\Application::totalAmountLoanedOut() }}</div>
                <div class="text-gray-400 fw-semibold">TOTAL LOAN TO BORROWERS</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="{{ route('view-loan-requests') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <i class="text-white ki-duotone ki-element-11 fs-2x ms-n1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="mt-5 mb-2 text-white fw-bold fs-2">K {{ $all_loan_requests->sum('amount') }}</div>
                <div class="text-white fw-semibold">PENDING BORROWED AMOUNT</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="{{ route('closed-loans') }}" class="mb-5 card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <i class="text-gray-100 ki-duotone ki-chart-simple fs-2x ms-n1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="mt-5 mb-2 text-gray-100 fw-bold fs-2">K {{ App\Models\Transaction::total_collected() }}</div>
                <div class="text-gray-100 fw-semibold">TOTAL COLLECTED AMOUNT</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
</div>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="bg-transparent page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Loan Arears</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Loan Arears</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="alert alert-danger" role="alert">
            This page displays all loans that are in arrears—loans where the borrower has missed scheduled repayments or is overdue. Use this table to review, track, and take action on overdue loans.
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 card-title">Loan Arears</h5>
                    </div>
                    <div class="card-body">
                        <table id="fixed-header" class="table align-middle table-bordered dt-responsive nowrap table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-left">Loan #.</th>
                                    <th class="text-left">Borrower</th>
                                    <th class="text-left">Loan Type</th>
                                    <th class="text-left">Principal</th>
                                    <th class="text-left">Total Payback Amount</th>
                                    <th class="text-left">Balance to Be Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loan_requests as $loan)
                                    <tr>
                                        <td class="text-left">#{{ $loan->loan_number }}</td>
                                        <td class="text-left">
                                            <a target="_blank" href="{{ route('client-account', ['key' => $loan->user->id]) }}">
                                                {{ $loan->user->fname.' '. $loan->user->lname }}
                                            </a>
                                        </td>
                                        
                                        <td class="text-left">{{ $loan->loan_product->name }} Loan</td>
                                        <td class="text-left">K{{ $loan->amount }}</td>
                                        <td class="text-left">K{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id, $loan ) }}</td>
                                        <td class="text-left">
                                                K{{ App\Models\Loans::loan_balance($loan->id) }}
                                            
                                        </td>
                                        <td class="text-left actions-btns d-flex">
                                            <div class="btn sharp btn-primary tp-btn ms-auto">
                                                <a title="Track Loan Repayments" href="{{ route('detailed',['id' => $loan->id]) }}?tab=repayment">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                      </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <div class="col-span-12 intro-y md:col-span-6">
                                    <div class="text-center box">
                                        <p>Nothing Found.</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
</div>

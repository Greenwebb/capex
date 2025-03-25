<div class="tab-pane fade" id="loan-repayment-schedule" role="tabpanel">
@php
    $loan = (object) [
    'loan_number' => 'LN-2024001',
    'amount' => 50000,
    'repayment_plan' => '12 Months',
    'interest' => 'Reducing Balance - Equal Installments',
    'total_paid' => 25000,
    'remaining_balance' => 25000,
    'repayment_schedule' => [
        (object) [
            'due_date' => '2024-04-01',
            'installment_amount' => 4500.00,
            'principal' => 4000.00,
            'interest' => 500.00,
            'remaining_balance' => 46000.00,
            'status' => 'Paid',
        ],
        (object) [
            'due_date' => '2024-05-01',
            'installment_amount' => 4500.00,
            'principal' => 4100.00,
            'interest' => 400.00,
            'remaining_balance' => 41900.00,
            'status' => 'Paid',
        ],
        (object) [
            'due_date' => '2024-06-01',
            'installment_amount' => 4500.00,
            'principal' => 4200.00,
            'interest' => 300.00,
            'remaining_balance' => 37700.00,
            'status' => 'Paid',
        ],
        (object) [
            'due_date' => '2024-07-01',
            'installment_amount' => 4500.00,
            'principal' => 4300.00,
            'interest' => 200.00,
            'remaining_balance' => 33400.00,
            'status' => 'Pending',
        ],
        (object) [
            'due_date' => '2024-08-01',
            'installment_amount' => 4500.00,
            'principal' => 4400.00,
            'interest' => 100.00,
            'remaining_balance' => 29000.00,
            'status' => 'Pending',
        ],
        (object) [
            'due_date' => '2024-09-01',
            'installment_amount' => 4500.00,
            'principal' => 4500.00,
            'interest' => 0.00,
            'remaining_balance' => 24500.00,
            'status' => 'Pending',
        ],
        (object) [
            'due_date' => '2024-10-01',
            'installment_amount' => 4500.00,
            'principal' => 4600.00,
            'interest' => 0.00,
            'remaining_balance' => 19900.00,
            'status' => 'Overdue',
        ],
        (object) [
            'due_date' => '2024-11-01',
            'installment_amount' => 4500.00,
            'principal' => 4700.00,
            'interest' => 0.00,
            'remaining_balance' => 15200.00,
            'status' => 'Overdue',
        ],
    ],
];

@endphp


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        <h3 class="mb-3 fw-semibold text-uppercase">Loan Repayment Schedule</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table align-middle table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Payment Date</th>
                                        <th scope="col">Installment Amount</th>
                                        <th scope="col">Principal</th>
                                        <th scope="col">Interest</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loan->repayment_schedule as $key => $installment)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ date('d M, Y', strtotime($installment->due_date)) }}</td>
                                            <td class="fw-bold text-primary">{{ number_format($installment->installment_amount, 2, '.', ',') }}</td>
                                            <td>{{ number_format($installment->principal, 2, '.', ',') }}</td>
                                            <td>{{ number_format($installment->interest, 2, '.', ',') }}</td>
                                            <td class="text-danger fw-semibold">{{ number_format($installment->remaining_balance, 2, '.', ',') }}</td>
                                            <td>
                                                @if ($installment->status == 'Paid')
                                                    <span class="badge bg-success">Paid</span>
                                                @elseif ($installment->status == 'Pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @else
                                                    <span class="badge bg-danger">Overdue</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pt-3 mt-4 border-top border-top-dashed">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-2 text-uppercase fw-medium">Total Paid:</p>
                                    <h5 class="mb-0 text-success">{{ number_format($loan->total_paid, 2, '.', ',') }}</h5>
                                </div>
                                <div>
                                    <p class="mb-2 text-uppercase fw-medium">Remaining Balance:</p>
                                    <h5 class="mb-0 text-danger">{{ number_format($loan->remaining_balance, 2, '.', ',') }}</h5>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary">Download Schedule</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

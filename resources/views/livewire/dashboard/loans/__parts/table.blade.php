<div class="table-responsive">
    @php
        $runningBalance = \App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id, $loan);
    @endphp

    <table class="table align-middle table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Entry Date</th>
                <th>Description</th>
                <th class="text-danger">Debit (Loan, Charges)</th>
                <th class="text-success">Credit (Payments, Adjustments)</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Initial balance from payback
                $runningBalance = \App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id, $loan);
            @endphp

            @foreach ($balance_statement as $entry)
                <tr>
                    <td>E{{ $entry->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($entry->payment_date)->format('F j, Y') }}</td>
                    <td>{{ $entry->description }}</td>
                    <td class="text-danger fw-semibold">
                        {{ $entry->debit > 0 ? number_format($entry->debit, 2, '.', ',') : '-' }}
                    </td>
                    <td class="text-success fw-semibold">
                        {{ $entry->credit > 0 ? number_format($entry->credit, 2, '.', ',') : '-' }}
                    </td>
                    <td class="fw-bold {{ $runningBalance < 0 ? 'text-danger' : 'text-primary' }}">
                        {{ $loop->last ? number_format(App\Models\Application::loanBalance($loan->id), 2, '.', ',') : number_format($runningBalance, 2, '.', ',') }}
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editBalanceStatementModal-{{ $entry->id }}">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBalanceStatementModal-{{ $entry->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                @php
                    // After showing the current balance, apply this entry's impact
                    if(!$loop->last){
                        $runningBalance -= $entry->debit;
                        $runningBalance += $entry->credit;
                    }
                @endphp
            @endforeach

        </tbody>
    </table>

</div>

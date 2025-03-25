
<div class="tab-pane fade" id="loan-balance-statement" role="tabpanel">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        <h3 class="mb-3 fw-semibold text-uppercase">Loan Balance Statement</h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table align-middle table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th class="text-danger">Debit (Loan, Charges)</th>
                                        <th class="text-success">Credit (Payments, Adjustments)</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($balance_statement as $key => $entry)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ date('d M, Y', strtotime($entry->payment_date)) }}</td>
                                            <td>{{ $entry->description }}</td>
                                            <td class="text-danger fw-semibold">
                                                {{ $entry->debit > 0 ? number_format($entry->debit, 2, '.', ',') : '-' }}
                                            </td>
                                            <td class="text-success fw-semibold">
                                                {{ $entry->credit > 0 ? number_format($entry->credit, 2, '.', ',') : '-' }}
                                            </td>
                                            <td class="fw-bold text-primary">
                                                {{ number_format($entry->balance_after_payment, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pt-3 mt-4 border-top border-top-dashed">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-2 text-uppercase fw-medium">Total Loan Amount:</p>
                                    <h5 class="mb-0 text-danger">
                                        {{ number_format($loan->amount, 2, '.', ',') }}
                                    </h5>
                                </div>
                                <div>
                                    <p class="mb-2 text-uppercase fw-medium">Total Paid:</p>
                                    <h5 class="mb-0 text-success">
                                        {{ number_format(collect($loan->balance_statement)->sum('credit'), 2, '.', ',') }}
                                    </h5>
                                </div>
                                <div>
                                    <p class="mb-2 text-uppercase fw-medium">Outstanding Balance:</p>
                                    <h5 class="mb-0 text-danger">
                                        {{ number_format(collect($loan->balance_statement)->last()->balance_after_payment, 2, '.', ',') }}
                                    </h5>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary">Download Statement</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

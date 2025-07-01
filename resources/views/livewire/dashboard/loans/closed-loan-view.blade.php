<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="bg-transparent page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Closed Loans</h4>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Closed Loans</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="alert alert-info" role="alert">
            List of loan which have been paid back & closed.
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 card-title">Closed Loans</h5>
                    </div>
                    <div class="card-body">
                        <table id="fixed-header" class="table align-middle table-bordered dt-responsive nowrap table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Loan #.</th>
                                    <th>Borrower</th>
                                    <th>Loan Type</th>
                                    <th>Principal</th>
                                    <th>Due</th>
                                    <th>Paid</th>
                                    <th>Date Complete</th>
                                    <th class="actions-btns">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loan_requests as $loan)
                                    <tr>
                                        <td style="">#{{ $loan->loan_number }}</td>
                                        <td style="">
                                            <a href="{{ route('client-account', ['key' => $loan->user->id]) }}" target="_blank">
                                            {{ $loan->user->fname.' '. $loan->user->lname }}
                                            </a>
                                        </td>
                                        <td style="">{{ $loan->loan_product->name }} Loan</td>
                                        <td style="">K{{ $loan->amount }}</td>
                                        <td style="">K{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id, $loan) }}</td>
                                        <td style="">K{{ App\Models\Loans::loan_settled($loan->id) }}</td>

                                        <td style="">
                                            @php
                                                $date_str = $loan->date_paid;
                                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                                echo $date->format('F j, Y, g:i a');
                                            @endphp
                                        </td>
                                        <td class="actions-btns d-flex">
                                            <a class="btn btn-sm btn-light" href="{{ route('detailed',['id' => $loan->id]) }}">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                </svg> View
                                            </a>
                                            
                                            <form action="{{ route('delete-loan', ['id' => $loan->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this loan?');" class="ms-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                                  </svg> Delete</button>
                                            </form>
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

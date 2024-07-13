<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">Closed Loans</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Closed Loans</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="alert alert-danger" role="alert">
            This is <strong>Datatable</strong> page in wihch we have used <b>jQuery</b> with cnd link!
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Closed Loans</h5>
                    </div>
                    <div class="card-body">
                        <table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Loan #.</th>
                                    <th>Borrower</th>
                                    <th>Loan Type</th>
                                    <th>Principal</th>
                                    <th>Due</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                    <th>Date Complete</th>
                                    <th class="actions-btns">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loan_requests as $loan)
                                    @if($loan->application->type != null)
                                    <tr>
                                        <td style="">#{{ $loan->application->id }}</td>
                                        <td style="">{{ $loan->application->fname.' '. $loan->application->lname }}</td>
                                        <td style="">{{ $loan->application->type }} Loan</td>
                                        <td style="">K{{ $loan->application->amount }}</td>
                                        <td style="">K{{ App\Models\Application::payback($loan->application->amount, $loan->application->repayment_plan) }}</td>
                                        <td style="">K{{ App\Models\Loans::loan_settled($loan->application->id) }}</td>
                                        <td>
                                            <span class="badge badge-sm light badge-success">
                                                <i class="fa fa-circle text-info me-1"></i>
                                                Closed
                                            </span>
                                        </td>
                                        <td style="">
                                            @php 
                                                $date_str = $loan->repaid_at;
                                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                                echo $date->format('F j, Y, g:i a');
                                            @endphp
                                        </td>
                                        <td class="actions-btns d-flex">
                                            <div class="btn sharp btn-primary tp-btn ms-auto">
                                                <a href="{{ route('loan-details',['id' => $loan->application->id]) }}">  
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>                                                
                                                </a>
                                            </div>
                                        </td>	
                                    </tr>
                                    @endif
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
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

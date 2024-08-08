<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">Edit Loan Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Loans</a></li>
                            <li class="breadcrumb-item active">Edit Loan Information</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Loan Information</h4>

                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ route("update-loan-details") }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label for="loanType" class="form-label">Loan Type
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span></label>
                                    <select name="loan_type_id" id="loanType" class="form-select" wire:model="selectedLoanType">
                                        <option value="">Choose...</option>
                                        @foreach ($loan_types as $lt)
                                            <option value="{{ $lt->id }}" {{ $lt->id == $selectedLoanType ? 'selected' : '' }}>{{ $lt->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="loanCategory" class="form-label">Loan Category
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select name="loan_child_type_id" id="loanCategory" class="form-select" wire:model="selectedLoanCategory">
                                        <option value="">Choose...</option>
                                        @foreach ($loan_child_types as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $selectedLoanCategory ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="loanPackage" class="form-label">Loan Package
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select name="loan_product_id" id="loanPackage" class="form-select" wire:model="selectedLoanProduct">
                                        <option value="">Choose...</option>
                                        @foreach ($loan_products as $lp)
                                            <option value="{{ $lp->id }}" {{ $lp->id == $selectedLoanProduct ? 'selected' : '' }}>{{ $lp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label for="inputState" class="form-label">Customer
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select id="inputState" class="form-select" data-choices data-choices-sorting="true">
                                        <option value="{{ $user['fname'].' '.$user['lname']}}"  selected>{{ $user['fname'].' '.$user['lname']}}</option>
                                    </select>
                                    <input type="hidden" value="{{ $user['id'] }}" name="borrower_id" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Principal Amount
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <input type="number" value="{{$loan->amount}}" name="amount" class="form-control" id="fullnameInput" placeholder="Principal Amount">
                                    <input type="hidden" value="{{$loan->id}}" name="loan_id"/>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Duration
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select id="inputState" name="repayment_plan" class="form-select" data-choices data-choices-sorting="true">
                                        <option {{ $loan->repayment_plan == 1 ? 'selected':'' }} value="1">1 Month</option>
                                        <option {{ $loan->repayment_plan == 2 ? 'selected':'' }} value="2">2 Months</option>
                                        <option {{ $loan->repayment_plan == 3 ? 'selected':'' }} value="3">3 Months</option>
                                        <option {{ $loan->repayment_plan == 4 ? 'selected':'' }} value="4">4 Months</option>
                                        <option {{ $loan->repayment_plan == 5 ? 'selected':'' }} value="5">5 Months</option>
                                        <option {{ $loan->repayment_plan == 6 ? 'selected':'' }} value="6">6 Months</option>
                                        <option {{ $loan->repayment_plan == 7 ? 'selected':'' }} value="7">7 Months</option>
                                        <option {{ $loan->repayment_plan == 8 ? 'selected':'' }} value="8">8 Months</option>
                                        <option {{ $loan->repayment_plan == 9 ? 'selected':'' }} value="9">9 Months</option>
                                        <option {{ $loan->repayment_plan == 10 ? 'selected':'' }} value="10">10 Months</option>
                                        <option {{ $loan->repayment_plan == 11 ? 'selected':'' }} value="11">11 Months</option>
                                        <option {{ $loan->repayment_plan == 12 ? 'selected':'' }} value="12">12 Months</option>
                                    </select>
                                    <input type="hidden" value="{{ $user['id'] }}" name="borrower_id" class="form-control">
                                </div>
                                <br>
                                <hr>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">First Name</label>
                                    <input type="text" value="@php echo App\Models\NextOfKing::customer_nok($loan->user_id)->first()->fname @endphp" name="nok_fname" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Last Name</label>
                                    <input type="text" value="@php  echo App\Models\NextOfKing::customer_nok($loan->user_id)->first()->fname @endphp" name="nok_lname" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Phone</label>
                                    <input type="text" value="@php echo App\Models\NextOfKing::customer_nok($loan->user_id)->first()->phone @endphp" name="nok_phone" name="nok_phone" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Email Address</label>
                                    <input type="text" value="@php echo App\Models\NextOfKing::customer_nok($loan->user_id)->first()->phone @endphp" name="nok_phone" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Relationship</label>
                                    <input type="text" value="@php echo App\Models\NextOfKing::customer_nok($loan->user_id)->first()->relation @endphp" name="nok_relation" class="form-control" id="fullnameInput" placeholder="Enter your Relationship">
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" id="submitButton" class="btn btn-primary">Save Update</button>
                                    </div>
                                </div>
                            </form>

                            <script>
                                document.getElementById('submitButton').addEventListener('click', function() {

                                    var button = this;
                                    // Disable the button and show a loading spinner
                                    // button.disabled = true;
                                    button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';

                                    // Simulate form submission (e.g., via AJAX)
                                    setTimeout(function() {
                                        // Re-enable the button after the operation completes
                                        button.disabled = false;
                                        button.innerHTML = 'Save Loan';
                                        // Submit the form programmatically if necessary
                                        // document.querySelector('form').submit();
                                    }, 2000); // Simulate a 2-second delay for the operation
                                });
                            </script>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

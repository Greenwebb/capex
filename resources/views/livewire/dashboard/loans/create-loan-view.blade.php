<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">Add Loan Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Loans</a></li>
                            <li class="breadcrumb-item active">Add Loan Information</li>
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
                            <form action="{{ route("proxy-apply-loan") }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label for="loanType" class="form-label">Loan Type
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select name="loan_type_id" id="loanType" class="form-select" wire:model="selectedLoanType">
                                        <option selected>Choose...</option>
                                        @forelse ($loan_types as $lt)
                                            <option value="{{ $lt->id }}">{{ $lt->name }}</option>
                                        @empty
                                            <option>No loan types available</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="loanCategory" class="form-label">Loan Category
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select name="loan_child_type_id" id="loanCategory" class="form-select" wire:model="selectedLoanCategory">
                                        <option selected>Choose...</option>
                                        @forelse ($loan_child_types as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                            <option>No loan categories available</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="loanPackage" class="form-label">Loan Package
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select name="loan_product_id" id="loanPackage" class="form-select">
                                        <option selected>Choose...</option>
                                        @forelse ($loan_products as $lp)
                                            <option value="{{ $lp->id }}">{{ $lp->name }}</option>
                                        @empty
                                            <option>No loan packages available</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputState" class="form-label">Customer
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="You can select from this list of customers who do not have any current loan requests or open loans.">
                                            <i class="ri-information-line" style="cursor: pointer;"></i>
                                        </span>
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select id="inputState" name="borrower_id" class="form-select">
                                        <option selected>Choose...</option>
                                        @forelse ($borrowers as $b)
                                        <option value="{{ $b->id }}">{{ $b->fname.' '.$b->lname.' | '.$b->phone }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Principal Amount (K)
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the total principal amount you need.">
                                            <i class="ri-information-line" style="cursor: pointer;"></i>
                                        </span>
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span>
                                    </label>
                                    <input type="number" name="amount" class="form-control" placeholder="Principal Amount">
                                </div>
                                <script>
                                    document.getElementById('fullnameInput').addEventListener('input', function(e) {
                                        let value = e.target.value;
                                        // Remove any non-digit characters
                                        value = value.replace(/\D/g, '');

                                        // Format the number as money
                                        value = new Intl.NumberFormat('en-US', {
                                            minimumFractionDigits: 0,
                                            maximumFractionDigits: 0
                                        }).format(value);

                                        // Update the input value
                                        e.target.value = value.replace('K', '').trim();
                                    });
                                </script>


                                <div class="col-md-4 mb-4">
                                    <label for="inputState" class="form-label">Duration
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <select id="inputState" name="repayment_plan" class="form-select" data-choices data-choices-sorting="true">
                                        <option  value="1">1 Month</option>
                                        <option  value="2">2 Months</option>
                                        <option  value="3">3 Months</option>
                                        <option  value="4">4 Months</option>
                                        <option  value="5">5 Months</option>
                                        <option  value="6">6 Months</option>
                                        <option  value="7">7 Months</option>
                                        <option  value="8">8 Months</option>
                                        <option  value="9">9 Months</option>
                                        <option  value="10">10 Months</option>
                                        <option  value="11">11 Months</option>
                                        <option  value="12">12 Months</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Due Date
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Select the date when this loan is due for final repayments.">
                                            <i class="ri-information-line" style="cursor: pointer;"></i>
                                        </span>
                                        <span>
                                            <i class="text-danger ri-asterisk"></i>
                                        </span> </label>
                                    <input type="text" name="due_date" class="form-control" id="dueDate" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Related Party</label>
                                    <input type="text" name="related_party" class="form-control" id="fullnameInput" placeholder="Related Party">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Loan Description</label>
                                    <textarea cols="5"rows="10" name="desc" class="form-control" id="fullnameInput" placeholder="Description"> </textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Note</label>
                                    <textarea cols="5"rows="10" name="note" class="form-control" id="fullnameInput" placeholder="Note"></textarea>
                                </div>

                                <br>
                                <h5 class="card-title mt-4 flex-grow-1">Guarantor</h5>
                                <hr>
                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">First Name</label>
                                    <input type="text" name="nok_fname" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Last Name</label>
                                    <input type="text" name="nok_lname" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Guarantor's Phone Number</label>
                                    <input type="number" name="nok_phone" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4">
                                    <label for="fullnameInput" class="form-label">Guarantor's Email Address</label>
                                    <input type="text" name="nok_email" class="form-control" id="fullnameInput" placeholder="Enter your name">
                                </div>

                                <div class="col-md-4 ">
                                    <label for="fullnameInput" class="form-label">Guarantor's Relationship</label>
                                    <input type="text" name="nok_relation" class="form-control" id="fullnameInput" placeholder="Enter your Relationship">
                                </div>


                                <br>
                                <h5 class="card-title mt-5 flex-grow-1">Support Ducuments</h5>
                                <div class="card-body border-top p-9">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">NRC</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="file" name="nrc_file" class="form-control" id="nrcFile">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Payslip</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="file" name="payslip_file" class="form-control" id="payslip_file" >
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">TPIN</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="file" name="tpin_file" class="form-control" id="tpin_file" >
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Agreed to terms and conditions?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save Loan</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

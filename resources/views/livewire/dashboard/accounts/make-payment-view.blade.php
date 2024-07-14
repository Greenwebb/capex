
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                    <h4 class="mb-sm-0">Repayments</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Repayments</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="ref">Ref</th>
                                            <th class="sort" data-sort="loan">Loan</th>
                                            <th class="sort" data-sort="borrower">Borrower</th>
                                            <th class="sort" data-sort="total_collectable">Total Collectable</th>
                                            <th class="sort" data-sort="amount_paid">Amount Paid</th>
                                            <th class="sort" data-sort="balance">Balance</th>
                                            <th class="sort" data-sort="process_by">Processed By</th>
                                            <th class="sort" data-sort="done_on">Done On</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse($transactions as $data)
                                            <tr>
                                                <td style=""></td>
                                                <td >{{ $data->ref_no ?? $data->application_id }}</td>
                                                <td >{{ $data->application->loan_product->name }} Loan</td>
                                                <td >{{ $data->application->fname.' '.$data->application->lname }}</td>

                                                <td >K{{ App\Models\Application::payback($data->application->amount, $data->application->repayment_plan) }}</td>
                                                <td style="color:green;font-weight:bold">K{{ $data->amount_settled }}</td>
                                                <td >K {{ App\Models\Loans::loan_balance( $data->application->id) }}</td>
                                                <td >{{ $data->proccess_by ?? '' }}</td>
                                                <td >{{ $data->created_at->toFormattedDateString() }}</td>
                                                {{-- <td class="d-flex">
                                                    <div class="btn sharp tp-btn ms-auto" title="View More Details">
                                                        <a target="_blank" href="{{ route('loan-details',['id' => $data->application_id]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @empty
                                            <div class="intro-y col-span-12 md:col-span-6">
                                                <div class="box text-center">
                                                    <p>Nothing Found.</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascript:void(0);">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>


        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form class="tablelist-form" autocomplete="off">
                        <div class="modal-body">
                            <div class="mb-3" id="modal-id" style="display: none;">
                                <label for="id-field" class="form-label">ID</label>
                                <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                            </div>

                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Customer Name</label>
                                <input type="text" id="customername-field" class="form-control" placeholder="Enter Name" required />
                                <div class="invalid-feedback">Please enter a customer name.</div>
                            </div>

                            <div class="mb-3">
                                <label for="email-field" class="form-label">Email</label>
                                <input type="email" id="email-field" class="form-control" placeholder="Enter Email" required />
                                <div class="invalid-feedback">Please enter an email.</div>
                            </div>

                            <div class="mb-3">
                                <label for="phone-field" class="form-label">Phone</label>
                                <input type="text" id="phone-field" class="form-control" placeholder="Enter Phone no." required />
                                <div class="invalid-feedback">Please enter a phone.</div>
                            </div>

                            <div class="mb-3">
                                <label for="date-field" class="form-label">Joining Date</label>
                                <input type="text" id="date-field" class="form-control" placeholder="Select Date" required />
                                <div class="invalid-feedback">Please select a date.</div>
                            </div>

                            <div>
                                <label for="status-field" class="form-label">Status</label>
                                <select class="form-control" data-trigger name="status-field" id="status-field" required>
                                    <option value="">Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Block">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you Sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->

    </div>
    <!-- container-fluid -->
</div>

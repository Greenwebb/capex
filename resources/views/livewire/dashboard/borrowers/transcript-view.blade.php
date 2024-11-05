
<style>
.details-container {
    display: flex;
    flex-direction: row; /* Arrange children in a row */
    justify-content: space-between; /* Space between the columns */
}

.details-column {
    display: flex;
    flex-direction: column;
    flex: 1; /* Each column takes equal width */
}

.details-item {
    display: flex;
    margin-top: 20px; /* Space between items */
    align-items: baseline; /* Align items in a way that their baselines align */
}

.fw-bold {
    width: 150px; /* Fixed width for labels */
    font-weight: bold; /* Bold font style */
}

.text-gray-600 {
    color: #6c757d; /* Gray text color */
    flex-grow: 1; /* Take available space */
}


</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl ">

            <div class="mb-5 card mb-xl-8 container-xxl">

                <div class="card-body pt-15">

                    <div class="mb-5 d-flex flex-center flex-column">
                        <div class="flex flex-center flex-column">
                            <div class="p-4 symbol symbol-100px symbol-circle mb-7 bg-primary">
                                @if($data->profile_photo_path == null)
                                    @if($data->fname != null && $data->lname != null)
                                        <span class="text-white">{{ $data->fname[0].' '.$data->lname[0] }}</span>
                                    @else
                                        <span>{{ $data->name[0] }}</span>
                                    @endif
                                @else
                                    <img class="rounded-circle bg-primary" src="{{ 'public/'.Storage::url($data->profile_photo_path) }}" />
                                @endif
                            </div>

                            <a href="#" class="mb-1 text-gray-800 fs-3 text-hover-primary fw-bold">
                                {{ $data->fname.' '.$data->lname }}
                            </a>

                            {{-- <div class="mb-6 fs-5 fw-semibold text-muted">
                                @foreach ($data->roles as $role)
                                    @if($role->name == 'user')
                                    <span>Borrower</span>
                                    @else
                                    <p>{{ ucwords($role->name) }}</p>
                                    @endif
                                @endforeach
                            </div> --}}
                        </div>
                        <div class="flex-wrap d-flex gap">
                            @include('livewire.dashboard.borrowers.__parts.stats')
                            {{-- <div class="px-3 py-3 mb-3 border border-gray-300 border-dashed rounded">
                                <div class="text-gray-700 fs-4 fw-bold">
                                    <span class="w-50px">K {{ App\Models\Loans::loan_balance($data->loans->first()->id) }}</span>
                                </div>
                                <small class="text-xs fw-semibold text-muted">Pending Repayment</small>
                            </div>
                            <div class="px-3 py-3 mb-3 border border-gray-300 border-dashed rounded">
                                <div class="text-gray-700 fs-4 fw-bold">
                                    <span class="w-50px">K {{ App\Models\Loans::customer_total_paid($data->id) }}</span>
                                </div>
                                <div class="fw-semibold text-muted">Settled Repayment Amount</div>
                            </div> --}}
                        </div>
                    </div>


                    <div id="kt_customer_view_details" class="collapse show">
                        <div class="py-5 details-container fs-6">
                            <div class="details-column">
                                <div class="details-item">
                                    <div class="fw-bold">Account ID</div>
                                    <div class="text-gray-600">ID-{{ $data->id }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Phone Number</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $data->phone ?? $data->phone2 }}</a>
                                    </div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $data->email }}</a>
                                    </div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Address</div>
                                    <div class="text-gray-600">
                                        {{ $data->address ?? 'No Address' }}
                                    </div>
                                </div>
                            </div>
                            <div class="details-column">
                                <div class="details-item">
                                    <div class="fw-bold">Date of Birth</div>
                                    <div class="text-gray-600">{{ $data->dob ?? 'Not Set' }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">ID Type</div>
                                    <div class="text-gray-600">{{ $data->id_type ?? 'Not Set' }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">National ID</div>
                                    <div class="text-gray-600">{{ $data->nrc_no ?? $data->nrc ?? 'Not Set' }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Signed Up</div>
                                    <div class="text-gray-600">{{ $data->created_at->toFormattedDateString() }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- Loan History --}}
                    <div class="py-3 d-flex flex-stack fs-4">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Loan History
                            <span class="rotate-180 ms-2">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="my-3 separator separator-dashed"></div>
                    <div id="kt_customer_view_details" class="collapse show">

                        <table id="kt_customer_view_statement_table_1" class="table text-gray-600 align-middle table-row-dashed fs-6 fw-semibold gy-4">
                            <thead class="border-gray-200 border-bottom">
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-100px">Date</th>
                                    <th class="w-100px">Loan</th>
                                    <th class="w-300px">Principal(K)</th>
                                    <th class="w-100px">Payback(K)</th>
                                    <th class="w-100px">Balance(K)</th>
                                    <th class="w-100px text-end pe-7">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($data->loans as $loan)
                                <tr>
                                    <td>{{ $loan->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $loan->loan_product->name }}</a>
                                    </td>
                                    <td> <b>{{ $loan->amount }}</b> </td>
                                    <td class="text-xs text-danger">
                                        {{
                                            number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id, $loan), 2, '.', ',')
                                        }}
                                    </td>
                                    <td>
                                        {{ App\Models\Loans::loan_balance( $loan->id) }}
                                    </td>
                                    <td class="">
                                        @if($loan->status == 0)
                                            <span class="badge badge-light-warning">Pending</span>
                                        @elseif($loan->status == 1)
                                            <span class="badge badge-light-success">Open</span>
                                        @elseif($loan->status == 2)
                                            <span class="badge badge-light-primary">Processing</span>
                                        @else
                                            <span class="badge badge-light-danger">Denied</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>

                    <br>
                    {{-- Repayment History --}}
                    <div class="py-3 d-flex flex-stack fs-4">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Repayments History
                            <span class="rotate-180 ms-2">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="my-3 separator separator-dashed"></div>
                    <div id="kt_customer_view_details" class="collapse show">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                            <thead class="border-gray-200 border-bottom">
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-100px">Date</th>
                                    <th class="w-100px">Loan</th>
                                    <th class="w-300px">Principal(K)</th>
                                    <th class="w-100px">Payback(K)</th>
                                    <th class="w-100px">Amount Settled(K)</th>
                                    <th class="w-100px">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fs-6 fw-semibold">
                                @forelse (App\Models\Transaction::customer_transactions($data->id) as $item)
                                <tr>
                                    <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="#" class="mb-1 text-gray-600 text-hover-primary">{{ $item->application->loan_product->name }}</a>
                                    </td>
                                    <td><b>K {{ $item->application->amount }}</b></td>
                                    <td >
                                        <a href="#" class="bg-active-light-primary">
                                        K {{
                                            number_format(App\Models\Application::payback($item->application->amount, $item->application->repayment_plan, $item->application->loan_product_id, $loan), 2, '.', ',')
                                        }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="bg-light-success">
                                            K {{  $item->amount_settled  }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">
                                            Repayment
                                        </span>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>

                    </div>
                    <br>
                    {{-- Loan History --}}
                    <div class="py-3 d-flex flex-stack fs-4">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                            Next of Kin
                            <span class="rotate-180 ms-2">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="my-3 separator separator-dashed"></div>
                    <div id="kt_customer_view_details" class="collapse show">
                        <table class="table text-gray-600 align-middle table-row-dashed fw-semibold fs-6 gy-5" id="kt_table_customers_logs">
                            <tbody>
                                @forelse (App\Models\NextOfKing::customer_nok($data->id) as $refs)
                                <tr>
                                    <td class="min-w-70px">
                                        {{ $refs->fname.' '.$refs->lname }}
                                    </td>
                                    <td>{{ '+'.$refs->phone }} </td>
                                    <td>{{ $refs->email }} </td>
                                    <td>{{ $refs->relation }} </td>
                                    {{-- <td class="pe-0 text-end min-w-200px">{{ }}</td> --}}
                                </tr>
                                @empty
                                <tr class="text-muted">
                                    Not Set
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


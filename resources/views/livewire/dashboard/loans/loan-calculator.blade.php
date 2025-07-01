<div class="min-h-screen bg-gradient-to-br to-blue-50 page-content from-slate-50">
    <!-- Header Section -->
    <div class="mb-6 row">
        <div class="px-4 col-12">
            <div class="p-6 rounded-xl border-l-4 border-blue-500 shadow-lg backdrop-blur-sm bg-white/80 page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="p-3 mr-4 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v4.995c0 .02-.01.04-.024.054L8.5 10.5v3.5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8.5zm-8 2v8h6V3H4z"/>
                            <path d="M5 4h4v1H5V4zm0 2h4v1H5V6zm0 2h2v1H5V8z"/>
                        </svg>
                    </div>
                    <h4 class="mb-0 text-2xl font-bold text-gray-800">Loan Calculator</h4>
                </div>

                <div class="page-title-right">
                    <ol class="px-4 py-2 m-0 text-sm rounded-full breadcrumb bg-white/50">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}" class="text-blue-600 transition-colors hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="inline mr-1 bi bi-house-door" viewBox="0 0 16 16">
                                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li class="text-gray-600 breadcrumb-item active">Loan Calculator</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Amortization Table -->
    <div class="px-8">
        @if ($amortization_table)
        <div class="overflow-hidden mt-2 border-0 shadow-2xl card">
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 border-0 card-header">
                <div class="d-flex align-items-center">
                    <div class="p-2 mr-3 rounded-lg bg-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                            <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.736.024.08.05.15.089.432z"/>
                        </svg>
                    </div>
                    <h3 class="mb-0 text-xl font-bold text-white card-title">Amortization Schedule</h3>
                </div>
            </div>
            <div class="p-0 bg-gradient-to-br from-blue-600 to-indigo-700 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 text-white table-hover">
                        <thead class="bg-black/20">
                            <tr class="text-xs font-semibold tracking-wider uppercase">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="mr-2 bi bi-calendar3" viewBox="0 0 16 16">
                                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                        Due Date
                                    </div>
                                </th>
                                <th class="px-4 py-3">Principal</th>
                                <th class="px-4 py-3">Interest</th>
                                <th class="px-4 py-3">Fees</th>
                                <th class="px-4 py-3">Penalty</th>
                                <th class="px-4 py-3 font-bold">Due Amount</th>
                                <th class="px-4 py-3">Balance</th>
                                <th class="px-4 py-3">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($amortization_table['installments'] as $index => $row)
                            <tr class="text-sm border-b transition-colors border-white/10 hover:bg-white/10">
                                <td class="px-4 py-3 font-medium">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">{{ $row['due_date'] }}</td>
                                <td class="px-4 py-3 font-mono">{{ $row['principal'] }}</td>
                                <td class="px-4 py-3 font-mono">{{ $row['interest'] }}</td>
                                <td class="px-4 py-3 font-mono">{{ $row['fees'] }}</td>
                                <td class="px-4 py-3 font-mono">{{ isset($row['penalty']) ? $row['penalty'] : '0.00' }}</td>
                                <td class="px-4 py-3 font-mono font-bold text-yellow-300">{{ $row['due'] }}</td>
                                <td class="px-4 py-3 font-mono">{{ $row['principal_balance'] }}</td>
                                <td class="px-4 py-3 text-xs">{{ $row['description'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Main Calculator Form -->
    <div class="mt-6 post d-flex flex-column-fluid" id="kt_post">
        <form wire:submit.prevent="calculateLoan()" id="kt_content_container" class="container-xxl">
            <!-- Info Alert -->
            <div class="mb-6">
                <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-r-xl border-l-4 border-blue-400 shadow-lg">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0 p-2 mr-3 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-blue-600 bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </div>
                        <div class="text-sm text-blue-800">
                            <p class="mb-0">
                                <strong>Calculator Tool:</strong> Use this page to calculate loan values for customer inquiries. To add a loan to the system, visit 
                                <a href="{{ route('new-loan') }}" class="font-medium text-blue-600 underline hover:text-blue-800">
                                    Loans → Add Loan
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="overflow-hidden mb-5 border-0 shadow-2xl card">
                <!-- Loan Product Selection -->
                <div class="p-6 bg-white border-b">
                    <div class="row align-items-center">
                        <label class="font-bold text-gray-700 col-lg-4 col-form-label d-flex align-items-center">
                            <div class="p-2 mr-3 bg-purple-100 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-purple-600 bi bi-bag-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                            </div>
                            Loan Product <span class="text-red-500">*</span>
                        </label>
                        <div class="col-lg-8">
                            <select type="text" wire:model.lazy="loan_product_id" class="px-4 py-3 rounded-xl border-2 border-gray-200 transition-all form-control focus:border-purple-500 focus:ring focus:ring-purple-200" wire:change="prefillLoanProductValues" placeholder="E.g Business Loan" required>
                                <option value="">-- Select Loan Product --</option>
                                @forelse ($this->get_all_loan_products() as $lp)
                                <option {{ $loan->loan_product_id == $lp->id ? 'selected':'' }} value="{{ $lp->id }}">{{ $lp->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Principal Section -->
                <div class="p-4 text-white bg-gradient-to-r from-green-500 to-emerald-600">
                    <div class="d-flex align-items-center">
                        <div class="p-2 mr-3 rounded-lg bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 16 16">
                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                            </svg>
                        </div>
                        <h3 class="mb-0 text-xl font-bold">Principal Amount</h3>
                    </div>
                </div>

                <div class="p-6 bg-white">
                    <div class="mb-4 row">
                        <label class="font-bold text-gray-700 col-lg-4 col-form-label d-flex align-items-center">
                            <span class="mr-2 text-green-600">$</span>
                            Principal Amount <span class="ml-1 text-red-500">*</span>
                        </label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <span class="font-bold text-green-700 bg-green-100 border-green-200 input-group-text">$</span>
                                <input type="text" wire:model.lazy="principal" class="px-4 py-3 font-mono text-lg rounded-r-xl border-2 border-gray-200 transition-all form-control focus:border-green-500 focus:ring focus:ring-green-200" placeholder="0.00" required/>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label class="font-bold text-gray-700 col-lg-4 col-form-label d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2 text-green-600 bi bi-calendar-date" viewBox="0 0 16 16">
                                <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            Release Date <span class="ml-1 text-red-500">*</span>
                        </label>
                        <div class="col-lg-8">
                            <input type="text" id="release_date_picker" wire:model.lazy="release_date" class="px-4 py-3 rounded-xl border-2 border-gray-200 transition-all form-control focus:border-green-500 focus:ring focus:ring-green-200" placeholder="Select date" required>
                        </div>
                    </div>
                </div>

                <!-- Interest Section -->
                <div class="p-4 text-white bg-gradient-to-r from-blue-500 to-cyan-600">
                    <div class="d-flex align-items-center">
                        <div class="p-2 mr-3 rounded-lg bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 16 16">
                                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.576ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                            </svg>
                        </div>
                        <h3 class="mb-0 text-xl font-bold">Interest Configuration</h3>
                    </div>
                </div>

                <div class="p-6 bg-white">
                    <div class="mb-4 row">
                        <label class="font-bold text-gray-700 col-lg-4 col-form-label">Interest Method</label>
                        <div class="col-lg-8">
                            <select type="text" wire:model.lazy="loan_interest_method" class="px-4 py-3 rounded-xl border-2 border-gray-200 transition-all form-control focus:border-blue-500 focus:ring focus:ring-blue-200">
                                @forelse ($interest_methods as $option)
                                <option value="{{ $option->name }}">{{ $option->name }}</option>
                                @empty
                                    <option>No Methods Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label class="font-bold text-gray-700 col-lg-4 col-form-label">
                            Interest Type <span class="text-red-500">*</span>
                        </label>
                        <div class="col-lg-8">
                            <div class="flex-wrap gap-3 mt-2 d-flex">
                                @forelse ($interest_types as $option)
                                    <label for="{{ $option->name }}" class="p-3 bg-blue-50 rounded-xl border-2 border-blue-100 transition-all cursor-pointer form-check form-check-custom hover:bg-blue-100 hover:border-blue-300">
                                        <input id="{{ $option->name }}" class="form-check-input" wire:model.lazy="loan_interest_type" type="radio" value="{{ $option->id }}" />
                                        <span class="ml-2 text-gray-700 fw-semibold">{{ $option->description }}</span>
                                    </label>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label class="font-bold text-gray-700 col-lg-4 col-form-label">Interest Rate</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="input-group">
                                        <input type="text" wire:model.lazy="loan_interest_value" class="px-4 py-3 font-mono text-lg rounded-l-xl border-2 border-gray-200 transition-all form-control focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="0.00" required/>
                                        <span class="font-bold text-blue-700 bg-blue-100 rounded-r-xl border-blue-200 input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <select type="text" wire:model.lazy="loan_interest_period" class="px-4 py-3 rounded-xl border-2 border-gray-200 transition-all form-control focus:border-blue-500 focus:ring focus:ring-blue-200">
                                        <option value="per-day">Per Day</option>
                                        <option value="per-week">Per Week</option>
                                        <option value="per-month" selected>Per Month</option>
                                        <option value="per-year">Per Year</option>
                                        <option value="per-loan">Per Loan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Duration Section -->
                <div class="p-4 text-white bg-gradient-to-r from-purple-500 to-pink-600">
                    <div class="d-flex align-items-center">
                        <div
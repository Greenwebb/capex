<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            {{-- @can('company financial stats') --}}
            @include('livewire.dashboard.__parts.current-admin-stats')
            {{-- @endcan --}}
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::List Widget 1-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="pt-5 border-0 card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Projects Overview</span>
                                <span class="mt-1 text-muted fw-semibold fs-7">Pending 0 tasks</span>
                            </h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                {{-- <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button> --}}
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b784c40707d">
                                    <!--begin::Header-->
                                    <div class="py-5 px-7">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Menu separator-->
                                    <div class="border-gray-200 separator"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Form-->
                                    <div class="py-5 px-7">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Status:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div>
                                                <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b784c40707d" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="1">Approved</option>
                                                    <option value="2">Pending</option>
                                                    <option value="2">In Process</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Member Type:</label>
                                            <!--end::Label-->
                                            <!--begin::Options-->
                                            <div class="d-flex">
                                                <!--begin::Options-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                    <span class="form-check-label">Author</span>
                                                </label>
                                                <!--end::Options-->
                                                <!--begin::Options-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                    <span class="form-check-label">Customer</span>
                                                </label>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Notifications:</label>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                <label class="form-check-label">Enabled</label>
                                            </div>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="pt-5 card-body">
                            <!--begin::Item-->
                            <small>No Projects</small>
                            {{-- <div class="d-flex align-items-center mb-7">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-abstract-26 fs-2x text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary fs-6 fw-bold">Project Briefing</a>
                                    <span class="text-muted fw-bold">Project Manager</span>
                                </div>
                                <!--end::Text-->
                            </div> --}}

                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 1-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Tables Widget 5-->
                    <div class="mb-5 card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="pt-5 border-0 card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="mb-1 card-label fw-bold fs-3">Latest 7 Loan Requests</span>
                                <span class="mt-1 text-muted fw-semibold fs-7">More than {{ $all_loan_requests->count() }} total loan requests</span>
                            </h3>
                            <div class="card-toolbar">
                                {{-- <ul class="nav">
                                    <li class="nav-item">
                                        <a class="px-4 nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold me-1 active" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="px-4 nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="px-4 nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">Day</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="py-3 card-body">
                            <div class="tab-content">
                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed table-row-gray-200 gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>

                                                @forelse($all_loan_requests as $loan)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-45px me-2" style="box-shadow: rgba(0, 0, 0, 0.1) -4px 9px 25px -6px;">
                                                            {{-- <span class="symbol-label"> --}}
                                                                <img src="{{ asset('/public/icons/mfs/loan.png') }}" class="h-50 align-self-center" alt="" />
                                                            {{-- </span> --}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="mb-1 text-dark fw-bold text-hover-primary fs-6">
                                                            {{ ucwords($loan->user->fname).' '.ucwords($loan->user->lname) }}
                                                        </a>
                                                        <span class="text-muted fw-semibold d-block">
                                                            <a href="tel:{{ $loan->user->phone }}">{{ $loan->user->phone }}</a> <br> {{ $loan->email }} </span>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold"><small>Requested on</small><br>{{ $loan->created_at->toFormattedDateString() }}</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-primary">K {{ $loan->amount }}</span>
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
                                                    <td class="text-end">
                                                        @can('processes loans')
                                                        <a href="{{ route('loan-details',['id' => $loan->id]) }}" class="btn btn-sm btn-icon btn-bg-primary btn-active-color-primary">
                                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <div>
                                                        No Loans have been requested.
                                                    </div>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <div class="items-center justify-center p-4 col-xl-12 justify-content-center">
                                            <a class="items-center justify-center btn btn-sm justify-content-center"  href="{{ route('view-loan-requests') }}">View More</a>
                                        </div>
                                    </div>
                                    <!--end::Table-->
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tables Widget 5-->
                </div>
                <!--end::Col-->
                {{-- @can('view calculator') --}}
                <div class="w-full gap-4 d-flex">
                    <a href="{{ route('loan-calculator') }}" class="text-white btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>
                </div>
                {{-- @endcan --}}
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            {{-- <div class="row g-5 g-xl-8">
                <div class="col-xl-4">
                    <!--begin::List Widget 3-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="border-0 card-header">
                            <h3 class="card-title fw-bold text-dark">Todo</h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu 3-->
                                <div class="py-3 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                    <!--begin::Heading-->
                                    <div class="px-3 menu-item">
                                        <div class="px-3 pb-2 menu-content text-muted fs-7 text-uppercase">Payments</div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link">Create Invoice</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link flex-stack">Create Payment
                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                            <i class="ki-duotone ki-information fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span></a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link">Generate Bill</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                        <a href="#" class="px-3 menu-link">
                                            <span class="menu-title">Subscription</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Plans</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Billing</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Statements</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="my-2 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 menu-content">
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                        <!--end::Input-->
                                                        <!--end::Label-->
                                                        <span class="form-check-label text-muted fs-6">Recuring</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 my-1 menu-item">
                                        <a href="#" class="px-3 menu-link">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 3-->
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="pt-2 card-body">
                            <!--begin::Item-->
                            <div class="mb-8 d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-success"></span>
                                <!--end::Bullet-->
                                <!--begin::Checkbox-->
                                <div class="mx-5 form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Create FireStone Logo</a>
                                    <span class="text-muted fw-semibold d-block">Due in 2 Days</span>
                                </div>
                                <!--end::Description-->
                                <span class="badge badge-light-success fs-8 fw-bold">New</span>
                            </div>
                            <!--end:Item-->
                            <!--begin::Item-->
                            <div class="mb-8 d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                <!--end::Bullet-->
                                <!--begin::Checkbox-->
                                <div class="mx-5 form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Stakeholder Meeting</a>
                                    <span class="text-muted fw-semibold d-block">Due in 3 Days</span>
                                </div>
                                <!--end::Description-->
                                <span class="badge badge-light-primary fs-8 fw-bold">New</span>
                            </div>
                            <!--end:Item-->
                            <!--begin::Item-->
                            <div class="mb-8 d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-warning"></span>
                                <!--end::Bullet-->
                                <!--begin::Checkbox-->
                                <div class="mx-5 form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Scoping & Estimations</a>
                                    <span class="text-muted fw-semibold d-block">Due in 5 Days</span>
                                </div>
                                <!--end::Description-->
                                <span class="badge badge-light-warning fs-8 fw-bold">New</span>
                            </div>
                            <!--end:Item-->
                            <!--begin::Item-->
                            <div class="mb-8 d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                <!--end::Bullet-->
                                <!--begin::Checkbox-->
                                <div class="mx-5 form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">KPI App Showcase</a>
                                    <span class="text-muted fw-semibold d-block">Due in 2 Days</span>
                                </div>
                                <!--end::Description-->
                                <span class="badge badge-light-primary fs-8 fw-bold">New</span>
                            </div>
                            <!--end:Item-->
                            <!--begin::Item-->
                            <div class="mb-8 d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-danger"></span>
                                <!--end::Bullet-->
                                <!--begin::Checkbox-->
                                <div class="mx-5 form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Project Meeting</a>
                                    <span class="text-muted fw-semibold d-block">Due in 12 Days</span>
                                </div>
                                <!--end::Description-->
                                <span class="badge badge-light-danger fs-8 fw-bold">New</span>
                            </div>
                            <!--end:Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-success"></span>
                                <!--end::Bullet-->
                                <!--begin::Checkbox-->
                                <div class="mx-5 form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Customers Update</a>
                                    <span class="text-muted fw-semibold d-block">Due in 1 week</span>
                                </div>
                                <!--end::Description-->
                                <span class="badge badge-light-success fs-8 fw-bold">New</span>
                            </div>
                            <!--end:Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end:List Widget 3-->
                </div>
                <div class="col-xl-8">
                    <!--begin::Charts Widget 1-->
                    <div class="mb-5 card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="pt-5 border-0 card-header">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="mb-1 card-label fw-bold fs-3">Recent Statistics</span>
                                <span class="text-muted fw-semibold fs-7">More than 400 new members</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b784c407352">
                                    <!--begin::Header-->
                                    <div class="py-5 px-7">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Menu separator-->
                                    <div class="border-gray-200 separator"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Form-->
                                    <div class="py-5 px-7">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Status:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div>
                                                <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b784c407352" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="1">Approved</option>
                                                    <option value="2">Pending</option>
                                                    <option value="2">In Process</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Member Type:</label>
                                            <!--end::Label-->
                                            <!--begin::Options-->
                                            <div class="d-flex">
                                                <!--begin::Options-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                    <span class="form-check-label">Author</span>
                                                </label>
                                                <!--end::Options-->
                                                <!--begin::Options-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                    <span class="form-check-label">Customer</span>
                                                </label>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Notifications:</label>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                <label class="form-check-label">Enabled</label>
                                            </div>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_1_chart" style="height: 350px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Charts Widget 1-->
                </div>
            </div> --}}
            <!--end::Row-->
            <!--begin::Row-->
            {{-- <div class="row g-5 g-xl-8">
                <div class="col-xl-6">
                    <!--begin::List Widget 7-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="mt-4 border-0 card-header align-items-center">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bold text-dark">Latest Media</span>
                                <span class="mt-1 text-muted fw-semibold fs-7">Articles and publications</span>
                            </h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b784c4073c3">
                                    <!--begin::Header-->
                                    <div class="py-5 px-7">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Menu separator-->
                                    <div class="border-gray-200 separator"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Form-->
                                    <div class="py-5 px-7">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Status:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div>
                                                <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b784c4073c3" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="1">Approved</option>
                                                    <option value="2">Pending</option>
                                                    <option value="2">In Process</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Member Type:</label>
                                            <!--end::Label-->
                                            <!--begin::Options-->
                                            <div class="d-flex">
                                                <!--begin::Options-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                    <span class="form-check-label">Author</span>
                                                </label>
                                                <!--end::Options-->
                                                <!--begin::Options-->
                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                    <span class="form-check-label">Customer</span>
                                                </label>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-semibold">Notifications:</label>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                <label class="form-check-label">Enabled</label>
                                            </div>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="pt-3 card-body">
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60px symbol-2by3 me-4">
                                    <div class="symbol-label" style="background-image: url('assets/media/stock/600x400/img-20.jpg')"></div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="flex-wrap d-flex flex-row-fluid align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Cup & Green</a>
                                        <span class="pt-1 text-muted fw-semibold d-block">Size: 87KB</span>
                                    </div>
                                    <span class="my-2 badge badge-light-success fs-8 fw-bold">Approved</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60px symbol-2by3 me-4">
                                    <div class="symbol-label" style="background-image: url('assets/media/stock/600x400/img-19.jpg')"></div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="flex-wrap d-flex flex-row-fluid align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Yellow Background</a>
                                        <span class="pt-1 text-muted fw-semibold d-block">Size: 1.2MB</span>
                                    </div>
                                    <span class="my-2 badge badge-light-warning fs-8 fw-bold">In Progress</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60px symbol-2by3 me-4">
                                    <div class="symbol-label" style="background-image: url('assets/media/stock/600x400/img-25.jpg')"></div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="flex-wrap d-flex flex-row-fluid align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Nike & Blue</a>
                                        <span class="pt-1 text-muted fw-semibold d-block">Size: 87KB</span>
                                    </div>
                                    <span class="my-2 badge badge-light-success fs-8 fw-bold">Success</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60px symbol-2by3 me-4">
                                    <div class="symbol-label" style="background-image: url('assets/media/stock/600x400/img-24.jpg')"></div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="flex-wrap d-flex flex-row-fluid align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Red Boots</a>
                                        <span class="pt-1 text-muted fw-semibold d-block">Size: 345KB</span>
                                    </div>
                                    <span class="my-2 badge badge-light-danger fs-8 fw-bold">Rejected</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 7-->
                </div>
                <div class="col-xl-6">
                    <!--begin::List Widget 6-->
                    <div class="mb-5 card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="border-0 card-header">
                            <h3 class="card-title fw-bold text-dark">Notifications</h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu 3-->
                                <div class="py-3 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                    <!--begin::Heading-->
                                    <div class="px-3 menu-item">
                                        <div class="px-3 pb-2 menu-content text-muted fs-7 text-uppercase">Payments</div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link">Create Invoice</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link flex-stack">Create Payment
                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                            <i class="ki-duotone ki-information fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span></a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link">Generate Bill</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                        <a href="#" class="px-3 menu-link">
                                            <span class="menu-title">Subscription</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Plans</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Billing</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Statements</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="my-2 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 menu-content">
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                        <!--end::Input-->
                                                        <!--end::Label-->
                                                        <span class="form-check-label text-muted fs-6">Recuring</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 my-1 menu-item">
                                        <a href="#" class="px-3 menu-link">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 3-->
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="pt-0 card-body">
                            <!--begin::Item-->
                            <div class="p-5 rounded d-flex align-items-center bg-light-warning mb-7">
                                <i class="ki-duotone ki-abstract-26 text-warning fs-1 me-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Title-->
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Group lunch celebration</a>
                                    <span class="text-muted fw-semibold d-block">Due in 2 Days</span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="py-1 fw-bold text-warning">+28%</span>
                                <!--end::Lable-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="p-5 rounded d-flex align-items-center bg-light-success mb-7">
                                <i class="ki-duotone ki-abstract-26 text-success fs-1 me-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Title-->
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Navigation optimization</a>
                                    <span class="text-muted fw-semibold d-block">Due in 2 Days</span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="py-1 fw-bold text-success">+50%</span>
                                <!--end::Lable-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="p-5 rounded d-flex align-items-center bg-light-danger mb-7">
                                <i class="ki-duotone ki-abstract-26 text-danger fs-1 me-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Title-->
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Rebrand strategy planning</a>
                                    <span class="text-muted fw-semibold d-block">Due in 5 Days</span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="py-1 fw-bold text-danger">-27%</span>
                                <!--end::Lable-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="p-5 rounded d-flex align-items-center bg-light-info">
                                <i class="ki-duotone ki-abstract-26 text-info fs-1 me-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Title-->
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Product goals strategy</a>
                                    <span class="text-muted fw-semibold d-block">Due in 7 Days</span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="py-1 fw-bold text-info">+8%</span>
                                <!--end::Lable-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 6-->
                </div>
            </div> --}}
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

<div class="col-auto layout-rightside-col">
    <div class="overlay"></div>
    <div class="layout-rightside">
        <div class="card h-100 rounded-0 card-border-effect-none">
            <div class="p-0 card-body">
                <div class="p-3">
                    <h6 class="mb-0 text-muted text-uppercase fw-semibold">Recent Repayment Transactions</h6>
                </div>
                <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                    <div class="acitivity-timeline acitivity-main">
                        @forelse ($this->get_repayments() as $trans)
                            <div class="acitivity-item d-flex">
                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 lh-base">{{ $trans->user->fname.' '.$trans->user->lname }} paid {{ $trans->amount_settled }} via {{ $trans->method }}</h6>
                                    <p class="mb-1 text-muted">{{
                                            $trans->application && $trans->application->loan_product
                                            ? $trans->application->loan_product->name : 'Other'
                                        }}</p>
                                    <small class="mb-0 text-muted">{{ $trans->created_at->toFormattedDateString() }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="acitivity-item d-flex">
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1 text-muted">
                                        No Transactions yet
                                    </p>
                                </div>
                            </div> 
                        @endforelse
                        
                        
                    </div>
                </div>

                <div class="p-3 mt-2">
                    <h6 class="mb-3 text-muted text-uppercase fw-semibold">Top Loan Products
                    </h6>
                  
                    <ol class="ps-3 text-muted">
                        @forelse ($this->get_all_loan_products() as $product)
                            <li class="py-1">
                                <a href="#" class="text-muted">{{ $product->name }} <span class="float-end">({{ $this->count_loans_by_product($product->id).' '.'Loan'}})</span></a>
                            </li>
                        @empty
                            
                        @endforelse
                    </ol>
                    <div class="mt-3 text-center">
                        {{-- <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Categories</a> --}}
                    </div>
                </div>

                <div class="p-3 mt-2">
                    <h6 class="mb-3 text-muted text-uppercase fw-semibold">Top Loan Categories
                    </h6>
                  
                    <ol class="ps-3 text-muted">
                        @forelse ($this->get_all_loan_categories() as $cat)
                            <li class="py-1">
                                <a href="#" class="text-muted">{{ $cat->name }} <span class="float-end">({{ $this->count_loans_by_category($cat->id).' '.'Loan'}})</span></a>
                            </li>
                        @empty
                            
                        @endforelse
                    </ol>
                    <div class="mt-3 text-center">
                        {{-- <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Categories</a> --}}
                    </div>
                </div>

                <div class="p-3 mt-2">
                    <h6 class="mb-3 text-muted text-uppercase fw-semibold">Top Loan Sub-Categories
                    </h6>
                  
                    <ol class="ps-3 text-muted">
                        @forelse ($this->get_all_loan_child_categories() as $subcat)
                            <li class="py-1">
                                <a href="#" class="text-muted">{{ $subcat->name }} <span class="float-end">({{ $this->count_loans_by_sub_category($subcat->id).' '.'Loan'}})</span></a>
                            </li>
                        @empty
                            
                        @endforelse
                    </ol>
                    <div class="mt-3 text-center">
                        {{-- <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Categories</a> --}}
                    </div>
                </div>
                {{-- <div class="p-3">
                    <h6 class="mb-3 text-muted text-uppercase fw-semibold">Customer Reviews</h6>
                    <div class="px-3 py-2 mb-2 bg-light rounded-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="align-middle fs-16 text-warning">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-half-fill"></i>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <h6 class="mb-0">4.5 out of 5</h6>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews</div>
                    </div>

                    <div class="mt-3">
                        <div class="row align-items-center g-2">
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0">5 star</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-1">
                                    <div class="progress animated-progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0 text-muted">2758</h6>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row align-items-center g-2">
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0">4 star</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-1">
                                    <div class="progress animated-progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0 text-muted">1063</h6>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row align-items-center g-2">
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0">3 star</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-1">
                                    <div class="progress animated-progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0 text-muted">997</h6>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row align-items-center g-2">
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0">2 star</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-1">
                                    <div class="progress animated-progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0 text-muted">227</h6>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row align-items-center g-2">
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0">1 star</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-1">
                                    <div class="progress animated-progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="p-1">
                                    <h6 class="mb-0 text-muted">408</h6>
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div>
                </div> --}}

                {{-- <div class="mx-4 mt-3 mb-0 text-center border-0 card sidebar-alert bg-light">
                    <div class="card-body">
                        <img src="assets/images/giftbox.png" alt="">
                        <div class="mt-4">
                            <h5>Invite New Seller</h5>
                            <p class="text-muted lh-base">Refer a new seller to us and earn $100 per refer.</p>
                            <button type="button" class="btn btn-primary btn-label rounded-pill"><i class="align-middle ri-mail-fill label-icon rounded-pill fs-16 me-2"></i> Invite Now</button>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div> <!-- end card-->
    </div> <!-- end .rightbar-->

</div>
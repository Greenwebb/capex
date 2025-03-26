<?php

namespace App\Http\Controllers;

use App\Models\LoanRepayment;
use App\Http\Requests\StoreLoanRepaymentRequest;
use App\Http\Requests\UpdateLoanRepaymentRequest;

class LoanRepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoanRepaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanRepaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanRepayment  $loanRepayment
     * @return \Illuminate\Http\Response
     */
    public function show(LoanRepayment $loanRepayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanRepayment  $loanRepayment
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanRepayment $loanRepayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanRepaymentRequest  $request
     * @param  \App\Models\LoanRepayment  $loanRepayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanRepaymentRequest $request, LoanRepayment $loanRepayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanRepayment  $loanRepayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanRepayment $loanRepayment)
    {
        //
    }
}

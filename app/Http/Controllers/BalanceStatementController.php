<?php

namespace App\Http\Controllers;

use App\Models\BalanceStatement;
use App\Http\Requests\StoreBalanceStatementRequest;
use App\Http\Requests\UpdateBalanceStatementRequest;

class BalanceStatementController extends Controller
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
     * @param  \App\Http\Requests\StoreBalanceStatementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBalanceStatementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceStatement $balanceStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceStatement $balanceStatement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBalanceStatementRequest  $request
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBalanceStatementRequest $request, BalanceStatement $balanceStatement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceStatement $balanceStatement)
    {
        //
    }
}

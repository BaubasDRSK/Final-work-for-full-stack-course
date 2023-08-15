<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredonationRequest;
use App\Http\Requests\UpdatedonationRequest;
use App\Models\donation;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredonationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedonationRequest $request, donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(donation $donation)
    {
        //
    }
}

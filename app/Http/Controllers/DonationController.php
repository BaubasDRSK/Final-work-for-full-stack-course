<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoredonationRequest;
// use App\Http\Requests\UpdatedonationRequest;
use App\Models\Donation;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request, Story $story)

    {
        if (!Auth::id()){
            return redirect()->back()->withErrors('You must be loged in');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'donationAmount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            []
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $donation = new Donation();
        $donation->donation_amount= $request->donationAmount;
        $donation->story_id = $story->id;
        $donation->user_id =  Auth::id();

        $donation->save();

        return redirect()->back()->with('success', 'Donated ...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }
}

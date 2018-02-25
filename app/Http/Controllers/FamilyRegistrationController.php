<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use App\Models\FamilyRegistration;
use Illuminate\Http\Request;

class FamilyRegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = FamilyRegistration::where('status', 0)->get();
        $completedRegistrations = FamilyRegistration::whereIn('status', [1, 2])->get();
        $count = $registrations->count();
        $completeCount = $completedRegistrations->count();

        foreach ($registrations as $registration) {
            $registration->statusString = $registration->getStatusString();
        }

        foreach ($completedRegistrations as $completedRegistration) {
            $completedRegistration->statusString = $completedRegistration->getStatusString();
        }

        return view('registration', [
            'count' => $count,
            'completeCount' => $completeCount,
            'registrations' => $registrations,
            'completed' => $completedRegistrations
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyRegistration  $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyRegistration $familyRegistration)
    {
        return view('registration_detail', [
            'data' => $familyRegistration,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyRegistration  $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyRegistration $familyRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamilyRegistration  $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyRegistration $familyRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyRegistration  $familyRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyRegistration $familyRegistration)
    {
        //
    }
}

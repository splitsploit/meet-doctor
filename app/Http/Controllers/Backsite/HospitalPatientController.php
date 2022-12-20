<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Gate;
use Auth;

// use App\Http\Requests\Specialist\StoreSpecialistRequest;
// use App\Http\Requests\Specialist\UpdateSpecialistRequest;

use App\Models\User;
use App\Models\Operational\Appointment;
use App\Models\Operational\Transaction;
use App\Models\Operational\Doctor;
use App\Models\MasterData\Specialist;
use App\Models\MasterData\Consultation;
use App\Models\MasterData\ConfigPayment;


class HospitalPatientController extends Controller
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
        $hospital_patient = User::whereHas('detail_user', function (Builder $query)
        {
            $query->where('type_user_id', 3); // only load user type patient or id 3 in type user table
        })->orderBy('created_at', 'desc')->get();

        return view('pages.backsite.operational.hospital-patient.index', compact('hospital_patient'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

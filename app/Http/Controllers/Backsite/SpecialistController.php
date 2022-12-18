<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Gate;
use Auth;

use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

use App\Models\MasterData\Specialist;

class SpecialistController extends Controller
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
        $data = Specialist::orderBy('created_at', 'desc')->get();
        dd($data);

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {
        // $data = $request['name'];

        $data = $request->all();

        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Successfully added new Specialist');
        return redirect()->route('backsite.specialist.index');

        // bisa juga menggunakan cara seperti dibawah ini

        // $specialist = new Specialist;
        // $specialist->name = $request->name;
        // $specialist->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        // dd($specialist);

        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        // dd($specialist);

        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        $data = $request->all();

        $specialist->update($data);

        alert()->success('Success Message', 'Successfully update Specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        $data = Specialist::find(1);

        $data->forceDelete();

        alert('Success Message', 'Successfully delete data');

        return back();
    }
}

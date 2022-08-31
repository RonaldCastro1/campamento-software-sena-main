<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcamRequest;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Metodo json de los response trasmite en formato JSON
        //parametro:: datos a trasmitir, codiho HTTP del response
        return response()->json(["success"=>true, "data"=>bootcamp::all()],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcamRequest $request)
    {
        return response()->json(["success"=>true, "data"=>bootcamp::create($request->all())],201);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(["success"=>true, "data"=>bootcamp::find($id)],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $b=Bootcamp::find($id);
        $b->update($request->all());
        return response()->json(["success"=>true, "data"=> $b],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bootcamp  $bootcamp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b=Bootcamp::find($id);
        $b->delete();
        return response()->json(["success"=>true, "data"=>$b],201);
    }
}

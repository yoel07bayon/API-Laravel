<?php

namespace App\Http\Controllers\API;

use App\Models\AnioLectivo;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\AnioLectivo as AnioLectivoResource;

class AnioLectivoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anio = AnioLectivo::all();

        return $this->sendResponse(AnioLectivoResource::collection($anio), 'Anio retrieved successfully.');


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
     * @param  \App\Models\AnioLectivo  $anioLectivo
     * @return \Illuminate\Http\Response
     */
    public function show(AnioLectivo $anioLectivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnioLectivo  $anioLectivo
     * @return \Illuminate\Http\Response
     */
    public function edit(AnioLectivo $anioLectivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnioLectivo  $anioLectivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnioLectivo $anioLectivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnioLectivo  $anioLectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnioLectivo $anioLectivo)
    {
        //
    }
}

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
        $anios = AnioLectivo::all();

        return $this->sendResponse(AnioLectivoResource::collection($anios), 'Anios retrieved successfully.');

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
        $input = $request->all();

        $validator = Validator::make($input, [
            'estado' => 'required',
            'nombre' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $anio = AnioLectivo::create($input);

        return $this->sendResponse(new AnioLectivoResource($anio), 'Anio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnioLectivo  $anio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $anio = AnioLectivo::find($id);

        if (is_null($anio)) {
            return $this->sendError('Anio not found.');
        }

        return $this->sendResponse(new AnioLectivoResource($anio), 'Anio retrieved successfully.');
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
    public function update(Request $request, AnioLectivo $anio)
    {
        //
        $input = $request->all();

        $validator = Validator::make($input, [
            'estado' => 'required',
            'nombre' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $anio->estado = $input['estado'];
        $anio->nombre = $input['nombre'];
        $anio->save();

        return $this->sendResponse(new AnioLectivoResource($anio), 'Anio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnioLectivo  $anio
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnioLectivo $anio)
    {
        //
        $anio->delete();

        return $this->sendResponse([], 'Anio deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Asignatura as AsignaturaResource;
use Validator;


class AsignaturaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asignaturas = Asignatura::all();

        return $this->sendResponse(AsignaturaResource::collection($asignaturas), 'Asignaturas retrieved successfully.');
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
            'name' => 'required',
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $asignatura = Asignatura::create($input);

        return $this->sendResponse(new AsignaturaResource($asignatura), 'Asignatura created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $asignatura = Asignatura::find($id);

        if (is_null($asignatura)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new AsignaturaResource($asignatura), 'Asignatura retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        //
        $input = $request->all();

        $validator = Validator::make($input, [
            'titulo' => 'required',
            'rasgo' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $asignatura->name = $input['titulo'];
        $asignatura->detail = $input['rasgo'];
        $asignatura->save();

        return $this->sendResponse(new AsignaturaResource($asignatura), 'Asignatura updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
        $asignatura->delete();

        return $this->sendResponse([], 'Asignatura deleted successfully.');
    }
}

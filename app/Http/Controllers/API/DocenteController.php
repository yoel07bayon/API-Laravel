<?php

namespace App\Http\Controllers\API;

use App\Models\Docente;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Docente as DocenteResource;
use Validator;

class DocenteController extends     BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $docentes = Docente::all();

        return $this->sendResponse(DocenteResource::collection($docentes), 'Docentes retrieved successfully.');

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
                'doc_nombres' => 'required',
                'description' => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $docente = Docente::create($input);

            return $this->sendResponse(new DocenteResource($docente), 'Docente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $docente = Docente::find($id);

        if (is_null($docente)) {
            return $this->sendError('Docente not found.');
        }

        return $this->sendResponse(new DocenteResource($docente), 'Docente retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
        $input = $request->all();

        $validator = Validator::make($input, [
            'doc_nombres' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $docente->doc_nombres = $input['doc_nombres'];
        $docente->description = $input['description'];
        $docente->save();

        return $this->sendResponse(new DocenteResource($docente), 'Docente updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
        $docente->delete();

        return $this->sendResponse([], 'Docente deleted successfully.');
    }
}

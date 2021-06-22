<?php

namespace App\Http\Controllers\API;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Curso as CursoResource;
use Validator;

class CursoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cursos = Curso::all();

        return $this->sendResponse(CursoResource::collection($cursos), 'Cursos retrieved successfully.');
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

        //
        {
            $input = $request->all();

            $validator = Validator::make($input, [
                'nombre' => 'required',
                'detalle' => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $curso = Curso::create($input);

            return $this->sendResponse(new CursoResource($curso), 'Curso created successfully.');
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $curso = Curso::find($id);

        if (is_null($curso)) {
            return $this->sendError('Curso not found.');
        }

        return $this->sendResponse(new CursoResource($curso), 'Curso retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Curso $curso )
    //public function update(Request $request, $id)

    {
        //
        $input = $request->all();


       //$curso= Curso::findOrFail($id);
       // se implemento


        $validator = Validator::make($input, [
            'nombre' => 'required',
            'detalle' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $curso->nombre = $input['nombre'];
        $curso->detalle = $input['detalle'];
        $curso->save();

        return $this->sendResponse(new CursoResource($curso), 'Curso updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
        $curso->delete();

        return $this->sendResponse([], 'Curso deleted successfully.');
    }
}

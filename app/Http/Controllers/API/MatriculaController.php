<?php

namespace App\Http\Controllers\API;

use App\Models\Matricula;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Matricula as MatriculaResource;
use Validator;



class MatriculaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matriculas = Matricula::all();

        return $this->sendResponse(MatriculaResource::collection($matriculas), 'matriculas retrieved successfully.');
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
            'state' => 'required',
            'inscription' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matricula = Matricula::create($input);

        return $this->sendResponse(new MatriculaResource($matricula), 'matricula created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $matricula = Matricula::find($id);

        if (is_null($matricula)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new MatriculaResource($matricula), 'matricula retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
        $input = $request->all();

        $validator = Validator::make($input, [
            'state' => 'required',
            'inscription' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $matricula->state = $input['state'];
        $matricula->inscription = $input['inscription'];
        $matricula->save();

        return $this->sendResponse(new MatriculaResource($matricula), 'matricula updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
        $matricula->delete();

        return $this->sendResponse([], 'matricula deleted successfully.');
    }
}

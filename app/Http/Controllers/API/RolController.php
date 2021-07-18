<?php

namespace App\Http\Controllers\API;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\Rol as RolResource;

class RolController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rols = Rol::all();

        return $this->sendResponse(RolResource::collection($rols), 'Rols retrieved successfully.');
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
            'description' => 'required',
            'estado' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $rol = Rol::create($input);

        return $this->sendResponse(new RolResource($rol), 'Rol created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rol = Rol::find($id);

        if (is_null($rol)) {
            return $this->sendError('Rol not found.');
        }

        return $this->sendResponse(new RolResource($rol), 'Rol retrieved successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        //
        $input = $request->all();

        $validator = Validator::make($input, [
            'description' => 'required',
            'estado' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $rol->description = $input['description'];
        $rol->estado = $input['estado'];
        $rol->save();

        return $this->sendResponse(new RolResource($rol), 'Rol updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
        $rol->delete();

        return $this->sendResponse([], 'Rol deleted successfully.');

    }
}

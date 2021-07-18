<?php

namespace App\Http\Controllers\API;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\RegisterController as UserController;
use Validator;
use App\Http\Resources\Alumno as AlumnoResource;
use Illuminate\Support\Facades\DB;




class AlumnoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

            $alumnosuser=array();


            $sql="select
            a.id, a.cod_alumno, a.user_id, u.id, u.appaterno, u.apmaterno, u.name
            from alumno a, USERs u
            where a.id=u.id";
            $alumnos= DB::select($sql);

            $alumnosuser['data']=$alumnos;

            return $alumnosuser;
        //    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumnos retrieved successfully.');
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
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $alumnosuser=array();


        $sql="select
        a.id, a.cod_alumno, a.user_id, u.id, u.appaterno, u.apmaterno, u.name
        from alumno a, USERs u
        where a.id=u.id  and  a.id='".$id."' ";
        $alumno= DB::select($sql);

        $alumnosuser['data']=$alumno;

        return $alumno;
    //    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumno retrieved successfully.');

    }

public function ReporteAlumnos()
{
    $alumnos = Alumno::all();
return $alumnos;
//    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumnos retrieved successfully.');
}

public function ReporteAlumnoId($id)
{
    $alumno = Alumno::find($id);

    if (is_null($alumno)) {
        return $this->sendError('Alumno not found.');
    }
    return $alumno;
    //return $this->sendResponse(new AlumnoResource($alumno), 'Alumno retrieved successfully.');
}



public function ReporteAlumnosUser()
{
    $UserClass = new RegisterController();
    $alumnosuser=array();
    $alumnos =self::ReporteAlumnos();

    foreach($alumnos as $alum){
        $datouser=$UserClass->showUser($alum->id);

        $datas=[
                'id'=>$alum->id,
                'cod_alumno'=>$alum->cod_alumno,
                'user_id'=>$alum->user_id,
                'user'=>$datouser,
                'created_at'=>$alum->created_at,
                'updated_at'=>$alum->updated_at
        ];

        $alumnosuser[]=$datas;

    }

    $jalumnosuser['data']=$alumnosuser;

    return response()->json($alumnosuser);
      //return $this->sendResponse(AlumnoResource::collection($alumnosuser), 'Alumnos retrieved successfully.');
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

//Modelos
use App\User;
use App\Rol;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('estado',1)->orderBy('id')->get();
 
  
        return View('administracion.usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::where('estado',1)->orderBy('id')->get();
 
        return view('administracion.usuarios.create', compact('roles'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function usuarios_ajax(Request $request)
    {

        $usuarios = User::where('estado',1)->get();
        
        //$roles = DB::select("SELECT * FROM rol WHERE estado = 1");
        //SELECT * FROM rol WHERE estado = 1;

        return Datatables::of($usuarios)
                ->addIndexColumn()
                ->setRowId('id')
            
                ->addColumn('accion', function($row){

                    $url = route('usuarios.edit',['parameters' => $row->id]);

                        $btn = '<a title="Editar" style="cursor:pointer;" href="'.$url. '" role="button"><i class="fa fa-edit"></i></a> <a title="Eliminar" style="cursor:pointer;"   onclick="eliminar_usuario('.$row->id.')" class="btn-delete" role="button"><i class="fa fa-trash"></i></a>';
    
                        return $btn;
                })
                ->rawColumns(['accion'])
                ->make(true);
      
    }
}

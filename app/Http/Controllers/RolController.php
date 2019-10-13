<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DataTables; 
use App\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $usuarios = Rol::where('estado',1)->orderBy('id')->get();   
        $roles = Rol::where('estado',1)->orderBy('id')->get();     
         
        return View('administracion.roles.index',compact('roles')); // a lado de roles puedo agregar otro como usuarios
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       ///dd($request); este se inserto para ver los parametros ingresados mediante consola en la vista

        Rol::create([
            'rol' =>  $request->rol,
            'descripcion' =>  $request->descripcion,
            'fecha_registro' =>  $request->fecha_registro,
      
        
        ]);

        return Redirect::to('administracion/roles')->with('mensaje-registro', 'El rol.-  '.  $request->rol . '  -.se registro correctamente');

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
        $rol = Rol::find($id);
       // dd($rol); ES PARA VER A NIVEL DE CONSOLA EL RESULTADO EN TABLA
        return view('administracion.roles.edit',compact('rol'));
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

     
        $rol = Rol::find($id);

        $rol->fill([

            'rol' =>  $request->rol,
            'descripcion' => $request->descripcion,
            'fecha_registro' => $request->fecha_registro,

       ]);

           
       if($rol->save()){
        return Redirect::to('administracion/roles')->with('mensaje-registro', 'El rol- '.  $request->rol . ' -se actualizo correctamente');
       }
       else
       {
        return Redirect::to('administracion/roles')->with('mensaje-registro', 'Ocurrio un error al hacer la actualizacion');
       

       }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Request $request, $id)
    {
        $rol = Rol::find($id);
        $rol->estado = 0;
        $rol->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
               
                'message' => $message
            ]);
        }
    }

    public function roles_ajax(Request $request)
    {

              // select * from rol where estado=1           
            $roles = Rol::where('estado',1)->get();
           // o tambien esta parte $roles = DB::select("select * from rol where estado=1")

            return Datatables::of($roles)
                    ->addIndexColumn()
                    ->setRowId('id')  // campo para busqueda con el id se le puede cambiar por cedula ejmplo
              
                    ->addColumn('accion', function($row){

                        $url = route('roles.edit',['parameters' => $row->id]);
   
                           $btn = '<a title="Editar" style="cursor:pointer;" href="'.$url. '" role="button"><i class="fa fa-edit"></i></a> <a title="Eliminar" style="cursor:pointer;"   onclick="eliminar_rol('.$row->id.')" class="btn-delete" role="button"><i class="fa fa-trash"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['accion'])
                    ->make(true);
    
    }

}

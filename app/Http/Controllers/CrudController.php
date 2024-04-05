<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CrudController extends Controller
{
    public function index(){
        $datos=DB::select(" select * from practicante ");
        return view("welcome")->with("datos",$datos);
    }
    public function create(Request $request)
    {
        try{
            $sql=DB::insert("insert into practicante (DNI,Nombre,Apellido,Edad,Correo,Telefono,Fecha_Inicio,ID_Usuario,Nombre_Carrera,Nombre_Actividad) values (?,?,?,?,?,?,?,?,?,?) ",[
                $request->txtdni,
                $request->txtnombre,
                $request->txtapellido,
                $request->txtedad,
                $request->txtcorreo,
                $request->txttelefono,
                $request->txtfecha_inicio,
                $request->txtid_usuario,
                $request->txtcarrera,
                $request->txtactividad,
               ]);

        }catch(\Throwable $th) {
            $sql =  0;
        }
        if ($sql==true) {
            return back()->with("correcto", "producto registrado correctamente");
        } else {
            return  back()->with("incorrecto", "Error al registrar");
        }
    }

        public function update(Request $request)
         {
            try{
             $sql = DB::update("UPDATE practicante SET Nombre=?, Apellido=?, Edad=?, Correo=?, Telefono=? WHERE DNI=? ",[
                 $request->txtnombre,
                 $request->txtapellido,
                 $request->txtedad,
                 $request->txtcorreo,
                 $request->txttelefono,
                 $request->txtdni,
             ]);
             if($sql==0){
                $sql = 1;
             }
            }catch(\Throwable $th){
                $sql=0;
            }
             if ($sql == true) {
                 return back()->with("correcto", "El practicante ha sido modificado correctamente.");
             } else {
                 return back()->with("incorrecto", "Hubo un error al modificar el practicante. Por favor, inténtelo de nuevo.");
             }
         }
        public function delete($id)
        {
            try{
                $sql = DB::delete("delete from practicante where DNI=$id ");
               }catch(\Throwable $th){
                   $sql=0;
               }
                if ($sql == true) {
                    return back()->with("correcto", "El practicante ha sido borrado correctamente.");
                } else {
                    return back()->with("incorrecto", "Hubo un error al  borrar el practicante.");
                }
        }
}

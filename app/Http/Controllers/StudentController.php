<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request){

        $validate = $request->validate([
            'first_name' => "required",
            "last_name" => "required",
            "age" => "required|integer",
        ]);

        try{
            $student = new Student();
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->age = $request->age;
            $student->cell_phone = $request->cell_phone;
            $student->address = $request->address;
            $student->save();
            return response()->json(['message' => 'El estudiente fue creado exitosamente']);
        }
        catch (\Exception $exc){
            return response()->json(['messege' => 'Error al momento de crear el registro, se debe a: ' . $exc]);
        }

    }

    public function show($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function update($id, Request $request){

        $validated = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "age" => "required|integer",
            "cell_phone" => "required"
        ]);

        try{
            $student = Student::find($id);
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->age = $request->age;
            $student->cell_phone = $request->cell_phone;
            $student->address = $request->address;
            $student->save();

            return response()->json(['messege' => 'El registro del estudiente ' . $student->first_name . ' fue actualizado correctamente']);
        }
        catch (\Exception $exc){
            return response()->json(['messege' => 'Error al momento de crear el registro, se debe a: ' . $exc]);
        }
    }

    public function destroy($id){
        try{
            $student = Student::where('id', '=', $id)->first();
            $student->delete();
            return response()->json(['messege' => 'El registro se elimino correctamente']);
        }
        catch (\Exception $exc){
            return response()->json(['messege' => 'Error al momento de elimiar el registro, se debe a: ' . $exc]);
        }
    }



}

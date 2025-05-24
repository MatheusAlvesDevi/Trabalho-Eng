<?php

use App\Models\Departament;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/employee' , function (Request $request) {
    $employee = new Employee();
    $employee->name = $request->input('name');
    $employee->departament = $request->input('departament' );
    $employee->data_nascimento = $request->input('data_nascimento');
    $employee->matricula = $request->input('matricula');
    $departament_id = $request->input('departament_id');
    $departament = Departament::find($departament_id );
    $employee->save();
    return response()->json($employee);
   });

Route::post('/departament' , function (Request $request) {
    $departament = new Departament();
    $departament->name = $request->input('name');
    $departament->employee = $request->input('employee' );
    $departament->save();
    return response()->json($departament);
   });

Route::get('/employee_all', function(){
    $employee = Employee::all();
    return response()->json($employee);
    });

Route::get('/employee/{id}' , function ($id) {
    $employee = Employee::find($id);
    return response()->json($employee);
   });

 Route::get('/departament/{id}' , function ($id) {
    $departament = Departament::find($id);
    return response()->json($departament);
   });

Route::get('/departament_all', function(){
    $departament = Departament::all();
    return response()->json($departament);
});

   
Route::get('/employee/departament/{id}', function ($id) {
    $employee = Employee::find($id);
    $departament = $employee->departament;
    return response()->json($departament);
   });

   Route::get('/departament/employee/{id}', function ($id) {
    $departament = Departament::find($id);
    $employee = $departament->employee;
    return response()->json($employee);
   });

Route::patch('/employee/{id}', function (Request $request, $id) {
    $employee = Employee::find($id);
    if($request->input('name') !== null){
    $employee->name = $request->input('name');
    }
    if($request->input('departament') !== null){
    $employee->departament = $request->input('departament');
    }
    if($request->input('data_nascimento') !== null){
    $employee->data_nascimento = $request->input('departament');
    }
    if($request->input('matricula') !== null){
    $employee->matricula = $request->input('matricula');
    }
    $employee->save();
    return response()->json($employee);
   });


Route::patch('/departament/{id}', function (Request $request, $id) {
    $departament = Departament::find($id);
    if($request->input('name') !== null){
    $departament->name = $request->input('name');
    }
    if($request->input('employee') !== null){
    $departament->employee = $request->input('employee');
    }
    $departament->save();
    return response()->json($departament);
   });

   Route::delete('/employee/{id}' , function ($id) {
    $employee = Employee::find($id);
    $employee->delete();
    return response()->json($employee);
   });

   Route::delete('/departament/{id}' , function ($id) {
    $departament = Departament::find($id);
    $departament->delete();
    return response()->json($departament);
   });

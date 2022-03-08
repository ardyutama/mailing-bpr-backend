<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
// use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = DB::table('employees')
        ->join('roles', 'employees.role_id', '=', 'roles.id')
        ->join('departements', 'employees.departement_id', '=', 'departements.id')
        ->select('employees.id', 'employees.first_name', 'employees.last_name' ,'roles.roles_name', 'departements.departement_name')
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $employee,
        ]);
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::table('employees')
        -> select('employees.id', 'employees.first_name', 'employees.last_name', 'roles.id as roles_id', 'roles.roles_name', 'departements.id as departements_id', 'departements.departement_name')
        ->join('roles','employees.role_id','=','roles.id')
        ->join('departements','employees.departement_id','=','departements.id')
        ->where('employees.id',$id)
        ->first();
        // dd($employee);

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    
}

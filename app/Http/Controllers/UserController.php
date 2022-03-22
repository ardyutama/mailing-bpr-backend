<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->join('divisions', 'users.division_id', '=', 'divisions.id')
        ->select('users.id', 'users.first_name', 'users.last_name', 'roles.id as roles_id','roles.name as roles_name', 'divisions.id as divisions_id','divisions.name as divisions_name')
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::with(['roles:id,name as roles_name','divisions:id,name as divisions_name'])->get();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')
        ->select('users.id', 'users.first_name', 'users.last_name', 'roles.id as roles_id', 'roles.name as roles_name', 'divisions.id as divisions_id', 'divisions.name as divisions_name')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->join('divisions', 'users.division_id', '=', 'divisions.id')
        ->where('users.id', $id)
        ->first();
    
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function roles($roles_id)
    {
        $user = DB::table('users')
        ->select('users.id', 'users.first_name', 'users.last_name', 'roles.id as roles_id', 'roles.roles_name', 'divisions.id as divisions_id', 'divisions.division_name')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->join('divisions', 'users.division_id', '=', 'divisions.id')
        ->where('users.role_id', $roles_id)
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $user,
        ]);
    }

    public function users($roles_id,$division_id)
    {
        $user = DB::table('users')
        ->select('users.id', 'users.first_name', 'users.last_name', 'roles.id as roles_id', 'roles.roles_name', 'divisions.id as divisions_id', 'divisions.division_name')
        ->where('users.role_id', $roles_id)
        ->where('users.division_id', $division_id)
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->join('divisions', 'users.division_id', '=', 'divisions.id')
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $user,
        ]);
    }
}

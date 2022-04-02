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
        $user = User::with('roles','divisions')->get();
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $user,
        ]);
    }

    public function roles($roles_id)
    {
        $user = User::with('roles', 'divisions')->whereHas('divisions', function ($query) use ($roles_id) {
            $query->where('role_id', $roles_id);
        })->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $user,
        ]);
    }
    public function division ($division_id) {
        $division = User::with('roles','divisions')->whereHas('divisions', function ($query) use ($division_id) {
            $query->where('division_id', $division_id);
        })->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $division,
        ]);
    }
}

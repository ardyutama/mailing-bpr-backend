<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'division_id' => 'required',
            'role_id' => 'required',
            'NIP' => 'required',
            'password' => 'required',
        ]);

        try {
            $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'division_id' => $request->division_id,
                    'role_id' => $request->role_id,
                    'NIP' => $request->NIP,
                    'password' => Hash::make($request->password),
                ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => Response::HTTP_CREATED,
                'data' => $user,
                'access_token' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed created',
                'message' => 'Failed ' . $e,
            ]);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['NIP','password']);
        
        if (! Auth::attempt($credentials)){
            return response()->json([
                'message' => Response::HTTP_UNAUTHORIZED,
            ]);
        }
            $nip = User::with('roles','divisions')
            ->where('NIP', $request['NIP'])->firstOrFail();
            $token = $nip->createToken('auth_token')->plainTextToken;

            return $this->respondWithToken($token, $nip);  
    }      
    
    protected function respondWithToken($token, $data)
    {
        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token,
            'data' => $data
        ], 200);
    }
    public function logout(User $user)
    {
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Logout Suucessfull'
        ]);
    }
}

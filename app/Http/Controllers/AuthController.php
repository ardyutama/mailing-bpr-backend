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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'departement_id' => ['required'],
            'role_id'=>['required'],
            'NIP' => ['required'],
            'password' => ['required'],
        ]);

        try {
            $data = 
            $employee = Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'departement_id' => $request->departement_id,
                'role_id' => $request->role_id,
            ]);
            $user = User::create([
                    'NIP'=> $request->NIP,
                    'password'=> Hash::make($request->password),
                    'employee_id'=> $employee->id,
                ]);
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'message' => Response::HTTP_CREATED,
                    'data' => $data,
                    'access_token' => $token,
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'failed created',
                    'message' => 'Failed ' .$e,
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
                $nip = User::where('NIP', $request['NIP'])->firstOrFail();
                $token = $nip->createToken('auth_token')->plainTextToken;

                return $this->respondWithToken($token, $nip);  
            
        } 
    
          
    protected function respondWithToken($token, $data)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60,
            'data' => $data
        ], 200);
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token, true);
        return response()->json([
            'code' => 200,
            'access_token' => $newToken
        ], 200);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // auth()->user()->tokens()->delete();
        return redirect('/login');
    }
}

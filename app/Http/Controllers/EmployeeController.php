<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    public function login(Request $request){
        try {
            $request->validate([
                'NIP' => ['required','numeric'],
                'password' => ['required'],
            ]);
            // $nip = $request->input('NIP');
            // $password = $request->input('password');
            // $data = Employee::where('NIP',$nip)->first();
            // echo $password;
            $credentials = $request->only('NIP','password');
            // echo $credentials;
            // echo Hash::check($password,$data->password);
            // if (Hash::check($password, $data->password))
            // echo Auth::attempt($credentials);
            if ( !Auth::attempt($credentials))
            {
                return response()->json([
                    'message' => Response::HTTP_UNAUTHORIZED,
                ]);
            } 
            $data = Employee::where('NIP',$request['NIP'])->first();
            $token = $data->createToken('auth_token')->plainTextToken;
            return $this->respondWithToken($token,$data);
                
            } 
         catch (\Exception $th) {
            return response()->json([
                'message' => "Failed ".$th->errorInfo
            ]);
        }
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
        //
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

    protected function respondWithToken($token, $data)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
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
}

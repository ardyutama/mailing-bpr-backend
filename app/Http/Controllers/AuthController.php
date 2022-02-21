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
            $employee = Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'departement_id' => $request->departement_id,
                'role_id' => $request->role_id,
            ]);
                User::create([
                    'NIP'=> $request->NIP,
                    'password'=> Hash::make($request->password),
                    'employee_id'=> $employee->id,
                ]);
                $employee->save();
                return response()->json([
                    'message' => Response::HTTP_CREATED,
                    'data' => $employee
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Failed ' .$e,
                ]);
            }
            // $data = new Employee();
            // $data->name = $request->input('first_name');
            // $data->email = $request->input('last_name');
            // $data->departement_id = $request->input('departement_id');
            // $data->role_id = $request->input('role_id');
            // $data->password = Hash::make($request->input('password'));

            // $data->save();
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'NIP' => ['required'],
                'password' => ['required'],
            ]);
            $nip = $request->input('NIP');
            $password = $request->input('password');
            $data = User::where('NIP',$nip)->first();
            // echo Hash::make('password');
            if(Hash::check($password, $data->password))
            {
                if(! $token = auth()->login($data)){
                    return response()->json([
                        'message' => Response::HTTP_UNAUTHORIZED,
                    ]);
                } else {
                    $user = User::where('NIP', $request->NIP)->first();
                    $user->save();
                    return $this->respondWithToken($token,$data);
                }

            }else{
                return response()->json([
                    'message' => 'Password anda salah',
                ]);
            }
            // echo $password;
            // $credentials = $request->only('NIP', 'password');
            // echo $credentials;
            // echo Hash::check($password,$data->password);
            // if (Hash::check($password, $data->password))
            // echo Auth::attempt($credentials);
            // if (!Auth::attempt($credentials)) {
            //     return response()->json([
            //         'message' => Response::HTTP_UNAUTHORIZED,
            //     ]);
            // }
            // $data = Employee::where('id', $request['employee_id'])->first();
            // $token = $data->createToken('auth_token')->plainTextToken;
            // return $this->respondWithToken($token, $data);
        } catch (\Exception $th) {
            return response()->json([
                'message' => "Failed " . $th->errorInfo
            ]);
        }
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

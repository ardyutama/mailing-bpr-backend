<?php

namespace App\Http\Controllers;

use App\Models\Approver;
use App\Models\Nota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class NotaController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'tgl_nota' => ['required'],
            'no_nota' => ['required'],
            'perihal' => ['required', 'string'],
            'creator_id' => ['required'],
            'receiver_id' => ['required'],
            'openedAt' => ['nullable'],
            'lastOpened_id' => ['nullable'],
        ]);

        try {
            $nota = Nota::create([
                'tgl_nota' => Carbon::parse($request->tgl_nota),
                'no_nota' => $request->no_nota,
                'perihal' => $request->perihal,
                'creator_id' => $request->creator_id,
                'receiver_id' => $request->receiver_id,
                'openedAt' => Carbon::parse($request->openedAt),
                'lastOpened_id' => $request->lastOpened_id,
            ]);
            
            return response()->json([
                'message' => Response::HTTP_CREATED,
                'data' => $nota,
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status' => 'failed created' . $th,
                'message' => Response::HTTP_BAD_REQUEST
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // $eagerKeluar = Nota::with('usersCreator')->get();

        // return response()->json([
        //     'message' => Response::HTTP_ACCEPTED,
        //     'data' => $eagerKeluar,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($division_id)
    {
        $nota = Nota::where('division_id', $division_id)->get();
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $nota,
        ]);
    }

    public function notaMasuk($division_id)
    {
        $nota = Nota::with(
            [
                'usersCreator',
                'usersReceiver',
                'usersCreator.divisions:id,name as divisions_name',
                'usersCreator.roles:id,name as roles_name',
                'usersReceiver.divisions:id,name as divisions_name',
                'usersReceiver.roles:id,name as roles_name',
                'approverNota',
            ]
        )
        ->whereHas('usersReceiver', function ($query) use ($division_id) {
            $query->where('division_id', $division_id);
        })
        ->whereDoesntHave('approverNota', function ($query) {
            $query->where('isApproved',0);
        })
        ->orderBy('tgl_nota', 'desc')
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $nota,
        ]);
    }
    public function notaKeluar($id)
    {
        $nota = Nota::where("divisionFrom_id",$id)
        ->join('users', 'notas.creator_id', '=', 'users.id')
        ->select('notas.*', 'users.first_name', 'users.last_name')
        ->get();
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $nota,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaRequest  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }

    public function notaCoba($division_id) {
        $eagerKeluar = Nota::with(
            ['usersCreator',
            'usersReceiver',
            'usersCreator.divisions:id,name as divisions_name',
            'usersCreator.roles:id,name as roles_name',
            'usersReceiver.divisions:id,name as divisions_name',
            'usersReceiver.roles:id,name as roles_name'])
        ->whereHas('usersCreator' , function($query) use ($division_id){
            $query->where('division_id',$division_id);
        })
        ->orderBy('tgl_nota','desc')
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $eagerKeluar,
        ]);
    }

    public function coba($id){
        $findUser = Nota::with(
        ['usersApproverOne', 'usersApproverTwo', 'usersApproverThree'])
        ->where('approverOne_id',$id)
        ->orWhere('approverTwo_id', $id)
        ->orWhere('approverThree_id', $id)
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $findUser,
        ]);
    }
    public function approver(Nota $nota , $id) {
        $show = $nota::with(['approverNota' => function ($query) use($id){
            $query->where('user_id', $id);
        }])
        ->with(['approverNota.users'])
        ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $show,
        ]);
    }
}

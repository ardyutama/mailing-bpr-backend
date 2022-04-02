<?php

namespace App\Http\Controllers;

use App\Models\Approver;
use App\Models\Nota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Response;
use PDF;
class NotaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'tgl_nota' => ['required'],
            'no_nota' => ['required'],
            'perihal' => ['required', 'string'],
            'creator_id' => ['required'],
            'receiver_id' => ['required'],
            'document' => 'required|mimes:pdf,doc,docx|max:10000',
            'openedAt' => ['nullable'],
            'lastOpened_id' => ['nullable'],    
        ]);

        try {
            $dokumen = $request->file('document');
            $fileName = time() . '.' . $request->file('document')->getClientOriginalExtension();
            $dokumen->storeAs('uploads', $fileName);
            $nota = Nota::create([
                'tgl_nota' => Carbon::parse($request->tgl_nota),
                'no_nota' => $request->no_nota,
                'perihal' => $request->perihal,
                'document' => $fileName,
                'creator_id' => $request->creator_id,
                'receiver_id' => $request->receiver_id,
                'openedAt' => Carbon::parse($request->openedAt),
                'lastOpened_id' => $request->lastOpened_id,
            ]);

            $nota->save();
            
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
   
    public function notaKeluar($division_id) {
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
    public function notaPending($division_id)
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
            ->whereHas('usersCreator', function ($query) use ($division_id) {
                $query->where('division_id', $division_id);
            })
            ->whereHas('approverNota', function ($query) {
                $query->where('isApproved', 0);
            })
            ->orderBy('tgl_nota', 'desc')
            ->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $nota,
        ]);
    }
}

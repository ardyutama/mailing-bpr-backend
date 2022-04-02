<?php

namespace App\Http\Controllers;

use App\Models\DispositionRegister;
use App\Http\Requests\StoreDispositionRegisterRequest;
use App\Http\Requests\UpdateDispositionRegisterRequest;
use App\Models\DispositionMail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DispositionRegisterController extends Controller
{
    public function store (Request $request)
    {
         $this->validate($request , [
            'tgl_register' => ['required'],
            'creator_id' => ['required'],
            'nota_id' => ['required'],
         ]);

         try {
             $nota = DispositionRegister::create([
                 'tgl_register' => $request->tgl_register,
                 'creator_id' => $request->creator_id,
                 'nota_id' => $request->nota_id,
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
    public function show($id)
    {
        $disposition = DispositionRegister::with
        ([
            'dispositionMails.creators.roles:id,name as roles_name',
        'dispositionMails.creators.divisions:id,name as divisions_name',
        'dispositionMails.dispositionTo'])->where('nota_id',$id)
        ->get();
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $disposition,
        ]);
    }
}

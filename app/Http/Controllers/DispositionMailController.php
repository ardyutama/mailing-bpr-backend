<?php

namespace App\Http\Controllers;

use App\Models\DispositionMail;
use App\Models\DispositionRegister;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DispositionMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_disposisi' => ['required'],
            'register_id' => ['required'],
            'creator_id' => ['required'],
            'disposisiTo_id' => ['required'],
            'comment' => ['required'],
        ]);

        try {
            $nota = DispositionMail::create([
                'tgl_disposisi' => $request->tgl_disposisi,
                'register_id' => $request->register_id,
                'creator_id' => $request->creator_id,
                'disposisiTo_id' => $request->disposisiTo_id,
                'comment' => $request->comment,
                
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
     * Display the specified resource.
     *
     * @param  \App\Models\DispositionMail  $dispositionMail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disposition = DispositionMail::with('dispositionMails')->where('nota_id', $id)->get();
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $disposition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DispositionMail  $dispositionMail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DispositionMail $dispositionMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DispositionMail  $dispositionMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DispositionMail $dispositionMail)
    {
        //
    }
}

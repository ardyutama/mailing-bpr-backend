<?php

namespace App\Http\Controllers;

use App\Models\InboxMail;
use App\Http\Requests\StoreInboxMailRequest;
use App\Http\Requests\UpdateInboxMailRequest;
use App\Http\Resources\InboxMailResource;
use App\Models\DispositionMail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InboxMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inbox = InboxMail::orderBy('tgl_surat_masuk','DESC')->get();
        $response = [
            'message' => 'List Inbox mail order by time',
            'data'=> $inbox
        ];
        return response()->json($response,Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'tgl_surat_masuk' => ['required', 'string'],
            'perihal' => ['required', 'string'],
            'tipe_surat_id' => ['required'],
            'sifat_surat' => ['required'],
            'pengirim_surat' => ['required'],
            'penerima_surat' => ['required'],
            'creator_id' => ['required'],
        ]);

        try {
            $inbox = InboxMail::create([
                'tgl_surat_masuk' => $request->tgl_surat_masuk,
                'perihal' => $request->perihal,
                'tipe_surat_id' => $request->tipe_surat_id,
                'sifat_surat' => $request->sifat_surat,
                'pengirim_surat' => $request->pengirim_surat,
                'penerima_surat' => $request->penerima_surat,
                'creator_id' => $request->creator_id,
            ]);
            return response()->json([
                'message' => Response::HTTP_CREATED,
                'data' => $inbox,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => Response::HTTP_BAD_REQUEST
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInboxMailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInboxMailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InboxMail  $inboxMail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inbox = InboxMail::where('penerima_surat', $id)->get();
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $inbox,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InboxMail  $inboxMail
     * @return \Illuminate\Http\Response
     */
    public function edit(InboxMail $inboxMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInboxMailRequest  $request
     * @param  \App\Models\InboxMail  $inboxMail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInboxMailRequest $request, InboxMail $inboxMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InboxMail  $inboxMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InboxMail $inboxMail)
    {
        //
    }
    public function detail ($id){

        $inbox = DispositionMail::with('inboxMails')->where('inbox_id',$id)->get();
        // echo $inbox;
        // $mail = InboxMail::where('id', $id)->get();
        // $inbox = DispositionMail::where('inbox_id', $id)->get();
        
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $inbox,
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\OutwardMail;
use App\Http\Requests\StoreOutwardMailRequest;
use App\Http\Requests\UpdateOutwardMailRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutwardMailController extends Controller
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
            'tgl_surat_masuk' => ['required', 'string'],
            'perihal' => ['required', 'string'],
            'tipe_surat_id' => ['required'],
            'sifat_surat' => ['required'],
            'pengirim_surat' => ['required'],
            'penerima_surat' => ['required'],
            'creator_id' => ['required'],
        ]);

        try {
            $inbox = OutwardMail::create([
                'tgl_surat_keluar' => $request->tgl_surat_masuk,
                'perihal' => $request->perihal,
                'tipe_surat_id' => $request->tipe_surat_id,
                'sifat_surat' => $request->sifat_surat,
                'pengirim_surat' => $request->pengirim_surat,
                'penerima_surat' => $request->penerima_surat,
                'approver' => $request->approver,
                'creator_id' => $request->creator_id,
            ]);
            return response()->json([
                'message' => Response::HTTP_CREATED,
                'data' => $inbox,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed created',
                'message' => Response::HTTP_BAD_REQUEST
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOutwardMailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutwardMailRequest $request)
    {
        // $request->rules(Request $data);
        // $validator = Validator::make($request->all(), [
        //     'perihal' => ['required'],
        //     'sifat_surat' => ['required', 'in:Terbuka, Rahasia, Urgent'],

        // ]);

        // if ($validator->fails()) {
        //     return response()->json(
        //         $validator->errors(),
        //         Response::HTTP_UNPROCESSABLE_ENTITY
        //     );
        // }

        // try {
        //     $inbox = OutwardMail::create($request->all());
        //     $response = [
        //         'message' => 'Membuat Mail sukses',
        //         'data' => $inbox
        //     ];
        //     return response()->json($response, Response::HTTP_CREATED);
        // } catch (QueryException $e) {
        //     return response()->json([
        //         'message' => "Failed " . $e->errorInfo,
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutwardMail  $outwardMail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outward = OutwardMail::where('pengirim_surat', $id)->get();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $outward,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutwardMail  $outwardMail
     * @return \Illuminate\Http\Response
     */
    public function edit(OutwardMail $outwardMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutwardMailRequest  $request
     * @param  \App\Models\OutwardMail  $outwardMail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutwardMailRequest $request, OutwardMail $outwardMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutwardMail  $outwardMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutwardMail $outwardMail)
    {
        //
    }
}

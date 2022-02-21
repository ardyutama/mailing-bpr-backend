<?php

namespace App\Http\Controllers;

use App\Models\OutwardMail;
use App\Http\Requests\StoreOutwardMailRequest;
use App\Http\Requests\UpdateOutwardMailRequest;
use Illuminate\Http\Request;

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
    public function create()
    {
        //
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
    public function show(OutwardMail $outwardMail)
    {
        //
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

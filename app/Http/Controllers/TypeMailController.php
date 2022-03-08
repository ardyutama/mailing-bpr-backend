<?php

namespace App\Http\Controllers;

use App\Models\TypeMail;
use App\Http\Requests\StoreTypeMailRequest;
use App\Http\Requests\UpdateTypeMailRequest;
use Symfony\Component\HttpFoundation\Response;

class TypeMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeMail = TypeMail::all();
        
        return response()->json([
            'message' => Response::HTTP_CREATED,
            'data' => $typeMail,
        ]);
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
     * @param  \App\Http\Requests\StoreTypeMailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeMailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeMail  $typeMail
     * @return \Illuminate\Http\Response
     */
    public function show(TypeMail $typeMail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeMail  $typeMail
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeMail $typeMail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeMailRequest  $request
     * @param  \App\Models\TypeMail  $typeMail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeMailRequest $request, TypeMail $typeMail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeMail  $typeMail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeMail $typeMail)
    {
        //
    }
}

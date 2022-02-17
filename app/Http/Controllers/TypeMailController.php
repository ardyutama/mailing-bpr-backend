<?php

namespace App\Http\Controllers;

use App\Models\Type_Mail;
use App\Http\Requests\StoreType_MailRequest;
use App\Http\Requests\UpdateType_MailRequest;

class TypeMailController extends Controller
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
     * @param  \App\Http\Requests\StoreType_MailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreType_MailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type_Mail  $type_Mail
     * @return \Illuminate\Http\Response
     */
    public function show(Type_Mail $type_Mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type_Mail  $type_Mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_Mail $type_Mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateType_MailRequest  $request
     * @param  \App\Models\Type_Mail  $type_Mail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateType_MailRequest $request, Type_Mail $type_Mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type_Mail  $type_Mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_Mail $type_Mail)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\InboxMail;
use App\Http\Requests\StoreInboxMailRequest;
use App\Http\Requests\UpdateInboxMailRequest;

class InboxMailController extends Controller
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
    public function show(InboxMail $inboxMail)
    {
        //
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
}

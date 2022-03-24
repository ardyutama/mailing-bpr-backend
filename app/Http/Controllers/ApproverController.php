<?php

namespace App\Http\Controllers;

use App\Models\Approver;
use App\Http\Requests\StoreApproverRequest;
use App\Http\Requests\UpdateApproverRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApproverController extends Controller
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
            'user_id' => ['required'],
            'isApproved' => ['nullable'],
            'approved_time' => ['nullable'],
            'nota_id' => ['required'],
            
        ]);
        try {
        $approver = Approver::create([
            'user_id' => $request->user_id,
            'isApproved' => $request->input('isApproved',0),
            'approved_time' => $request->approved_time,
            'nota_id' => $request->nota_id
        ]);
        return response()->json([
                'message' => Response::HTTP_CREATED,
                'data' => $approver,
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
     * @param  \App\Http\Requests\StoreApproverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Approver::where('user_id', $id)
            ->with(
            'users.roles:id,name',
            'users.divisions:id,name',
            'notas',
            'notas.usersCreator.divisions:id,name',
            'notas.usersCreator.roles:id,name'
            )
       ->get();
    // $show = Approver::where('user_id',$id)->with('notas')->first();

        return response()->json([
            'message' => Response::HTTP_CREATED,
            'data' => $show,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function edit(Approver $approver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApproverRequest  $request
     * @param  \App\Models\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id,$nota_id)
    {
        $data = Approver::where('user_id',$user_id)
        ->where('nota_id',$nota_id)
        ->update([
            'isApproved' => $request->isApproved,
            'approved_time' => Carbon::parse($request->approved_time),
        ]);
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approver  $approver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approver $approver)
    {
        //
    }
}

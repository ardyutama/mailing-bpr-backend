<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use Symfony\Component\HttpFoundation\Response;

class DivisionController extends Controller
{
    public function index()
    {
        $division = Division::all();

        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $division,
        ]);

    }

    public function show($id)
    {
        $division = Division::with('users')->find($id);
        return response()->json([
            'message' => Response::HTTP_ACCEPTED,
            'data' => $division,
        ]);
    }
}

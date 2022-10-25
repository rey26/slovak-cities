<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    public function index()
    {
        return view('list')
            ->with('settlements', Settlement::paginate(10));
    }

    public function show(Settlement $settlement)
    {
        return view('detail')
            ->with('settlement', $settlement);
    }

    public function search()
    {
        return view('search');
    }

    public function searchApi(Request $request): JsonResponse
    {
        return new JsonResponse([
            'result' => Settlement::search($request->get('name'))->paginate(10)->toArray(),
        ]);
    }
}

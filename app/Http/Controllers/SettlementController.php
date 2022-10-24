<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    public function index()
    {
        return view('partials.list')
            ->with('settlements', Settlement::paginate(10));
    }

    public function show(Settlement $settlement)
    {
        return view('partials.detail')
            ->with('settlement', $settlement);
    }
}

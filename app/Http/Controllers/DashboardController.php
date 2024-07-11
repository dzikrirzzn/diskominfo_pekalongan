<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AccessLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAccess = AccessLog::sum('access_count');
        $accessLogs = AccessLog::all();

        return view('dashboard', compact('totalAccess', 'accessLogs'));
    }
}
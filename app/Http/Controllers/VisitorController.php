<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\Facades\Analytics;


class VisitorController extends Controller
{
    public function index()
    {
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    
        return view('dashboard', [
            'analyticsData' => $analyticsData,
        ]);
    }
    

}
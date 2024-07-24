<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PageVisited;

class PageController extends Controller
{
    public function show(Request $request, $page)
    {
        // Dispatch event untuk mencatat kunjungan
        event(new PageVisited($request->fullUrl(), $request->ip()));

        // Lanjutkan dengan logika controller
        // Misalnya, menampilkan halaman
        return view("pages.$page");
    }
}
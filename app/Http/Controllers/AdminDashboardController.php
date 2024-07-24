<?php

namespace App\Http\Controllers;

use App\Models\PageVisit;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $monthlyVisits = PageVisit::selectRaw('MONTH(visited_at) as month, COUNT(DISTINCT ip_address) as count')
            ->whereYear('visited_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        foreach ($monthlyVisits as $visit) {
            $labels[] = Carbon::create()->month($visit->month)->format('F');
            $data[] = $visit->count;
        }

        $pageStats = PageVisit::selectRaw('url, COUNT(*) as count')
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('labels', 'data', 'pageStats'));
    }
}
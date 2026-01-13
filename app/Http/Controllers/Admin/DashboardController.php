<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\PageVisit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'services' => Service::count(),
            'visits_today' => PageVisit::whereDate('created_at', today())->count(),
            'visits_total' => PageVisit::count(),
        ];

        $recent_visits = PageVisit::latest()->take(10)->get();
        $products = Product::orderBy('order')->get();

        return view('admin.dashboard', compact('stats', 'recent_visits', 'products'));
    }
}

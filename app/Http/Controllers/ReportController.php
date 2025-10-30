<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $inactiveProducts = Product::where('status', 'inactive')->count();
        $lowStockProducts = Product::where('stock', '<', 5)->count();
        
        $totalValue = Product::sum(DB::raw('price * stock'));
        $averagePrice = Product::avg('price');
        
        // Datos para gráficos
        $productsByStatus = Product::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();
        
        $stockAnalysis = Product::selectRaw('name, stock, price, (stock * price) as total_value')
            ->orderBy('stock', 'asc')
            ->limit(10)
            ->get();
        
        // Datos de precios
        $priceRanges = [
            'under_50' => Product::where('price', '<', 50)->count(),
            '50_100' => Product::whereBetween('price', [50, 100])->count(),
            '100_500' => Product::whereBetween('price', [100, 500])->count(),
            'over_500' => Product::where('price', '>', 500)->count(),
        ];
        
        return view('reports.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'lowStockProducts',
            'totalValue',
            'averagePrice',
            'productsByStatus',
            'stockAnalysis',
            'priceRanges'
        ));
    }
    
    public function productReport()
    {
        $products = Product::all();
        return view('reports.products', compact('products'));
    }
    
    public function stockReport()
    {
        $products = Product::where('stock', '<', 5)
            ->orderBy('stock', 'asc')
            ->get();
        return view('reports.stock', compact('products'));
    }
}

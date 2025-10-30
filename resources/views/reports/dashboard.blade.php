@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">📊 Dashboard de Reportes</h1>
        <p class="text-gray-600">Resumen completo de tu inventario y productos</p>
    </div>

    <!-- Cards de Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Productos -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-blue-100 text-sm font-semibold">Total Productos</p>
                    <p class="text-4xl font-bold mt-2">{{ $totalProducts }}</p>
                </div>
                <div class="text-5xl opacity-20">📦</div>
            </div>
        </div>

        <!-- Productos Activos -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-green-100 text-sm font-semibold">Productos Activos</p>
                    <p class="text-4xl font-bold mt-2">{{ $activeProducts }}</p>
                </div>
                <div class="text-5xl opacity-20">✅</div>
            </div>
        </div>

        <!-- Stock Bajo -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-yellow-100 text-sm font-semibold">Stock Bajo (&lt;5)</p>
                    <p class="text-4xl font-bold mt-2">{{ $lowStockProducts }}</p>
                </div>
                <div class="text-5xl opacity-20">⚠️</div>
            </div>
        </div>

        <!-- Valor Total -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-purple-100 text-sm font-semibold">Valor Total Inventario</p>
                    <p class="text-3xl font-bold mt-2">${{ number_format($totalValue, 2) }}</p>
                </div>
                <div class="text-5xl opacity-20">💰</div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Gráfico: Productos por Estado -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">📈 Productos por Estado</h2>
            <canvas id="statusChart"></canvas>
        </div>

        <!-- Gráfico: Rango de Precios -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">💵 Distribución de Precios</h2>
            <canvas id="priceChart"></canvas>
        </div>
    </div>

    <!-- Tabla de Stock Bajo -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">⚠️ Productos con Stock Bajo</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100 border-b-2 border-gray-300">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-gray-800">Producto</th>
                        <th class="px-6 py-3 font-semibold text-gray-800">Stock</th>
                        <th class="px-6 py-3 font-semibold text-gray-800">Precio</th>
                        <th class="px-6 py-3 font-semibold text-gray-800">Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stockAnalysis as $product)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->name }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full font-bold">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">${{ number_format($product->total_value, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            No hay productos con stock bajo
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botones de Acción -->
    <div class="flex gap-4 mb-8">
        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition">
            📦 Ver Productos
        </a>
        <a href="{{ route('reports.products') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition">
            📋 Reporte Completo
        </a>
        <a href="{{ route('reports.stock') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition">
            ⚠️ Stock Bajo
        </a>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    // Gráfico de Productos por Estado
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusData = {
        labels: [
            @foreach($productsByStatus as $status)
                '{{ ucfirst($status->status) }}',
            @endforeach
        ],
        datasets: [{
            label: 'Cantidad de Productos',
            data: [
                @foreach($productsByStatus as $status)
                    {{ $status->count }},
                @endforeach
            ],
            backgroundColor: [
                '#10B981',
                '#EF4444',
            ],
            borderColor: [
                '#059669',
                '#DC2626',
            ],
            borderWidth: 2
        }]
    };
    
    new Chart(statusCtx, {
        type: 'doughnut',
        data: statusData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    // Gráfico de Rango de Precios
    const priceCtx = document.getElementById('priceChart').getContext('2d');
    const priceData = {
        labels: ['< $50', '$50-$100', '$100-$500', '> $500'],
        datasets: [{
            label: 'Cantidad de Productos',
            data: [
                {{ $priceRanges['under_50'] }},
                {{ $priceRanges['50_100'] }},
                {{ $priceRanges['100_500'] }},
                {{ $priceRanges['over_500'] }}
            ],
            backgroundColor: [
                '#3B82F6',
                '#8B5CF6',
                '#EC4899',
                '#F59E0B',
            ],
            borderColor: [
                '#1E40AF',
                '#6D28D9',
                '#BE185D',
                '#D97706',
            ],
            borderWidth: 2
        }]
    };
    
    new Chart(priceCtx, {
        type: 'bar',
        data: priceData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

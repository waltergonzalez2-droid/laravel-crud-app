@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">⚠️ Reporte de Stock Bajo</h1>
        <p class="text-gray-600">Productos con stock inferior a 5 unidades</p>
    </div>

    <!-- Botones de Acción -->
    <div class="flex gap-4 mb-8">
        <a href="{{ route('reports.dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition">
            ← Volver al Dashboard
        </a>
        <button onclick="printReport()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition">
            🖨️ Imprimir
        </button>
    </div>

    @if($products->count() > 0)
    <!-- Tabla de Productos con Stock Bajo -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gradient-to-r from-yellow-500 to-red-500 text-white">
                    <tr>
                        <th class="px-6 py-4 font-semibold">ID</th>
                        <th class="px-6 py-4 font-semibold">Producto</th>
                        <th class="px-6 py-4 font-semibold">SKU</th>
                        <th class="px-6 py-4 font-semibold">Stock Actual</th>
                        <th class="px-6 py-4 font-semibold">Precio</th>
                        <th class="px-6 py-4 font-semibold">Valor Total</th>
                        <th class="px-6 py-4 font-semibold">Urgencia</th>
                        <th class="px-6 py-4 font-semibold">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-b hover:bg-gray-50 transition {{ $product->stock == 0 ? 'bg-red-50' : '' }}">
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->id }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->sku }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full font-bold text-lg">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">${{ number_format($product->price * $product->stock, 2) }}</td>
                        <td class="px-6 py-4">
                            @if($product->stock == 0)
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full font-bold">🔴 CRÍTICO</span>
                            @elseif($product->stock <= 2)
                                <span class="bg-orange-500 text-white px-3 py-1 rounded-full font-bold">🟠 MUY BAJO</span>
                            @else
                                <span class="bg-yellow-500 text-white px-3 py-1 rounded-full font-bold">🟡 BAJO</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded transition text-sm">
                                ✏️ Editar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Resumen de Stock Bajo -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-red-50 rounded-lg p-6 border-l-4 border-red-500">
            <p class="text-gray-600 text-sm font-semibold">🔴 Crítico (0)</p>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $products->where('stock', 0)->count() }}</p>
        </div>
        <div class="bg-orange-50 rounded-lg p-6 border-l-4 border-orange-500">
            <p class="text-gray-600 text-sm font-semibold">🟠 Muy Bajo (1-2)</p>
            <p class="text-3xl font-bold text-orange-600 mt-2">{{ $products->whereBetween('stock', [1, 2])->count() }}</p>
        </div>
        <div class="bg-yellow-50 rounded-lg p-6 border-l-4 border-yellow-500">
            <p class="text-gray-600 text-sm font-semibold">🟡 Bajo (3-4)</p>
            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $products->whereBetween('stock', [3, 4])->count() }}</p>
        </div>
        <div class="bg-purple-50 rounded-lg p-6 border-l-4 border-purple-500">
            <p class="text-gray-600 text-sm font-semibold">📦 Total Afectados</p>
            <p class="text-3xl font-bold text-purple-600 mt-2">{{ $products->count() }}</p>
        </div>
    </div>

    @else
    <!-- Mensaje cuando no hay stock bajo -->
    <div class="bg-green-50 border-2 border-green-500 rounded-lg p-8 text-center">
        <div class="text-6xl mb-4">✅</div>
        <h2 class="text-2xl font-bold text-green-600 mb-2">¡Excelente! Todo tu stock está bien</h2>
        <p class="text-gray-600">No hay productos con stock bajo. Todos tus productos tienen 5 o más unidades en inventario.</p>
    </div>
    @endif
</div>

<script>
    function printReport() {
        window.print();
    }
</script>
@endsection

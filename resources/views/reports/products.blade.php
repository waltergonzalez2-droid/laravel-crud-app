@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">📋 Reporte de Productos</h1>
        <p class="text-gray-600">Lista completa de todos los productos en tu inventario</p>
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

    <!-- Tabla de Productos -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-4 font-semibold">ID</th>
                        <th class="px-6 py-4 font-semibold">Nombre</th>
                        <th class="px-6 py-4 font-semibold">SKU</th>
                        <th class="px-6 py-4 font-semibold">Descripción</th>
                        <th class="px-6 py-4 font-semibold">Precio</th>
                        <th class="px-6 py-4 font-semibold">Stock</th>
                        <th class="px-6 py-4 font-semibold">Estado</th>
                        <th class="px-6 py-4 font-semibold">Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->id }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->sku }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->description }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-bold">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($product->status === 'active')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-bold">✅ Activo</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full font-bold">❌ Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800">${{ number_format($product->price * $product->stock, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No hay productos registrados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Resumen -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-blue-50 rounded-lg p-6 border-l-4 border-blue-500">
            <p class="text-gray-600 text-sm font-semibold">Total de Productos</p>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $products->count() }}</p>
        </div>
        <div class="bg-green-50 rounded-lg p-6 border-l-4 border-green-500">
            <p class="text-gray-600 text-sm font-semibold">Valor Total Inventario</p>
            <p class="text-3xl font-bold text-green-600 mt-2">${{ number_format($products->sum(function($p) { return $p->price * $p->stock; }), 2) }}</p>
        </div>
        <div class="bg-purple-50 rounded-lg p-6 border-l-4 border-purple-500">
            <p class="text-gray-600 text-sm font-semibold">Precio Promedio</p>
            <p class="text-3xl font-bold text-purple-600 mt-2">${{ number_format($products->avg('price'), 2) }}</p>
        </div>
    </div>
</div>

<script>
    function printReport() {
        window.print();
    }
</script>
@endsection

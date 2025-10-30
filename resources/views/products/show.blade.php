@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>{{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>ID:</strong> {{ $product->id }}
                        </div>
                        <div class="col-md-6">
                            <strong>Estado:</strong>
                            <span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>SKU:</strong> {{ $product->sku }}
                        </div>
                        <div class="col-md-6">
                            <strong>Precio:</strong> ${{ number_format($product->price, 2) }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Stock:</strong> {{ $product->stock }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Descripción:</strong>
                        <p>{{ $product->description ?? 'Sin descripción' }}</p>
                    </div>

                    <div class="row mb-3 text-muted">
                        <div class="col-md-6">
                            <small><strong>Creado:</strong> {{ $product->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                        <div class="col-md-6">
                            <small><strong>Actualizado:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

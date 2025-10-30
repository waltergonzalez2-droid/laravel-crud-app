@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>{{ $role->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $role->id }}
                    </div>

                    <div class="mb-3">
                        <strong>Descripción:</strong>
                        <p>{{ $role->description ?? 'Sin descripción' }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Permisos:</strong>
                        <div>
                            @forelse($role->permissions as $permission)
                                <span class="badge bg-info">{{ $permission->name }}</span>
                            @empty
                                <span class="text-muted">Sin permisos asignados</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="row mb-3 text-muted">
                        <div class="col-md-6">
                            <small><strong>Creado:</strong> {{ $role->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                        <div class="col-md-6">
                            <small><strong>Actualizado:</strong> {{ $role->updated_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

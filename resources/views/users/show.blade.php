@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>{{ $user->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $user->id }}
                    </div>

                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>

                    <div class="mb-3">
                        <strong>Rol:</strong>
                        @if($user->role)
                            <span class="badge bg-warning">{{ $user->role->name }}</span>
                        @else
                            <span class="text-muted">Sin rol asignado</span>
                        @endif
                    </div>

                    <div class="row mb-3 text-muted">
                        <div class="col-md-6">
                            <small><strong>Creado:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                        <div class="col-md-6">
                            <small><strong>Actualizado:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

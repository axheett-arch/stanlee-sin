@extends('layouts.plantilla')

@section('contenido')
<div class="container-fluid py-4 font-monospace">
    <div class="mb-4 border-bottom border-secondary pb-3">
        <h2 class="text-white fw-bold m-0 hansip-font">
            <span class="text-magenta">//</span> CONTROL DE USUARIOS
        </h2>
        <small class="text-secondary">Gestión de credenciales, roles y permisos de la plataforma.</small>
    </div>

    <div class="table-responsive bg-black border border-secondary p-3">
        <table class="table table-dark table-hover align-middle m-0" style="--bs-table-bg: #000000;">
            <thead>
                <tr class="text-secondary border-bottom border-secondary">
                    <th scope="col" class="bg-black">ID</th>
                    <th scope="col" class="bg-black">NOMBRE</th>
                    <th scope="col" class="bg-black">EMAIL</th>
                    <th scope="col" class="bg-black">RANGO</th>
                    <th scope="col" class="bg-black">REGISTRO</th>
                    <th scope="col" class="text-end bg-black">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                    <tr class="border-bottom border-dark">
                        <td class="text-secondary bg-black">#{{ $user->id }}</td>
                        <td class="text-white fw-bold bg-black">{{ $user->name }}</td>
                        <td class="text-secondary-light bg-black">{{ $user->email }}</td>
                        <td class="bg-black">
                            @if($user->is_admin)
                                <span class="badge bg-transparent text-magenta border border-magenta px-2 py-1" style="font-size: 0.75rem;">
                                    ⚡ CREW ADMIN
                                </span>
                            @else
                                <span class="badge bg-transparent text-info border border-info px-2 py-1" style="font-size: 0.75rem;">
                                    🛒 CLIENTE
                                </span>
                            @endif
                        </td>
                        <td class="text-secondary small bg-black">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="text-end bg-black">
                            @if($user->id !== Auth::id())
                                <form action="{{ route('admin.usuarios.toggle-role', $user->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-light rounded-0" style="font-size: 0.8rem;">
                                        <i class="ti ti-arrows-exchange me-1"></i> Cambiar Rango
                                    </button>
                                </form>
                            @else
                                <span class="text-secondary small italic">// Eres tú</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .text-secondary-light { color: #a0a6ac !important; }
</style>
@endsection

@extends('layouts.main')
@section('contenido')
<div class="container"> <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Listado de productos
                    <a href="{{ route ('products.create') }}" class="btn btn-success btn-sm float-end ">Nuevo producto</a>
                </div>
                <div class="card-body">
                    @if(session('info'))
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                    @endif

                    <table class="table table-hover table-sm">
                        <thead>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach($products as $producto)
                            <tr>
                                <td>
                                    {{$producto->description}}
                                </td>
                                <td>
                                    {{$producto->price}} {{"€"}}
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $producto->id)}}" class="btn btn-warning btn-sm">Editar</a>


                                    <a href="javascript: document.getElementById('delete-{{$producto->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <form action="{{route('products.destroy', $producto->id)}}" id="delete-{{$producto->id}}" method="POST">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    Bienvenido {{auth()->user()->name}}
                    <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-end">Cerrar sesión</a>
                    <form id="logout" action="{{route('logout')}}" method="POST" style="display:none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
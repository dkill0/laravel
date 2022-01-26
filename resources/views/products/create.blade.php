@extends('layouts.main')
@section('contenido')
<div class="container"> <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Nuevo producto
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('products.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
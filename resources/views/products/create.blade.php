@extends('layouts.app')
@section('content')

<form action="{{route('products.store')}}" method="POST" files="true" enctype="multipart/form-data">
    @csrf

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container p-6">
    <div class="row">
        <div class="col-md-6">
            <br>
   
                <div class="card">
                    <div class="card-header">
                        Ingresar Producto
                    </div>
                    <div class="card-body">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        
                    </div>
                    <div class="card-body">
                        <label for="">Precio</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                    </div>
                    <div class="card-body">
                        <label for="">Imágen</label>
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                        <div class="card-body">
                            <label for="">Cantidad</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ old('quantity') }}">
                        </div>
                    <div class="card-footer text-muted">
                        

                    </div>
                </div>
                <br>
                <Button class="btn btn-primary" type="submit">Guardar</Button>
            </form>
        </div>
    </div>
</div>

@endsection
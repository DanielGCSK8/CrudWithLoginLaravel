@extends('layouts.app')
@section('content')
<form action="{{route('products.update', $Products->id)}}" method="POST" files="true" enctype="multipart/form-data">
    @method('PATCH')
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
                        Editar Producto
                    </div>
                    <div class="card-body">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $Products->name }}">
                        
                    </div>
                    <div class="card-body">
                        <label for="">Precio</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $Products->price }}">
                    </div>
                    <div class="card-body">
                        <label for="">Imágen</label>
                        <br>
                        <img style="width:200px" src="/images/{{ $Products->image }}">
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                        <div class="card-body">
                            <label for="">Cantidad</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $Products->quantity }}">
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
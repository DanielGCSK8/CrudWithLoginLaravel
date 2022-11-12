@extends('layouts.app')
@section('content')


@if(count($Products) >= 1)
  <table class="table table-bordered table-sm">
    <tr>
        <h4>Lista De Productos</h4>
    </tr>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Precio</td>
        <td>Imagen</td>
        <td>Cantidad</td>
        <td>Creado</td>
        <td>Actualizado</td>
        <td>Acciones</td>


    </thead>
    <tbody>
    @foreach ($Products as $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->name}}</td>
            <td>{{$products->price}}</td>
            <td style="width: 15%">
                <center>
                <img style="max-width:40%;width:auto;height:auto;" src="images/{{ $products->image }}">
                </center>
            </td>
            <td>{{$products->quantity}}</td>
            <td>{{$products->created_at}}</td>
            <td>{{$products->updated_at}}</td>
            <td>
                <center>
                <a href="{{route('products.edit', $products->id)}}"> <i class="fas fa-edit"></i></a>
                </center>
            </td>
            <td>
                <form action="{{route('products.destroy', $products->id)}}" method="POST">
                @method('DELETE')
                @csrf
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form></td>

        </tr>
    @endforeach
    </tbody>
</table>
<a href="/home"><button type="submit" name="button" class="btn btn-success">Volver</button> </a>
      <a href="{{route('products.create')}}"><button type="submit" name="button" class="btn btn-success">Crear Producto</button> </a>
@else
<center>
    <hr>
    <h3 style="font-family: Times New Roman">
      Aún no hay registros de productos<h3>
      <a href="/home"><button type="submit" name="button" class="btn btn-success">Volver</button> </a>
      <a href="{{route('products.create')}}"><button type="submit" name="button" class="btn btn-success">Crear Producto</button> </a>
      </center>
@endif


@endsection
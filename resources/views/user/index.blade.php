@extends('layout.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuarios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('user.create') }}" class="btn btn-info" >Añadir Usuario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Apellido paterno</th>
               <th>Apellido materno</th>
               <th>Edad</th>
               <th>Dirección</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($users->count())
              @foreach($users as $user)
              <tr>
                <td>{{$user->nombre}}</td>
                <td>{{$user->ape_paterno}}</td>
                <td>{{$user->ape_materno}}</td>
                <td>{{$user->edad}}</td>
                <td>{{$directions->find($user->id)->calle}}
                {{$directions->find($user->id)->colonia}}
                {{$directions->find($user->id)->delegacion}}
                {{$directions->find($user->id)->numero}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $user->id, $directions->find($user->id))}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      {{ $users->links() }}
    </div>
  </div>
</section>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-10">
            <h1>Listado de tiendas</h1>
            <table class="table">
              <thead>
                <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">Shop name</th>
                  <th scope="col">Direction</th>
                  <th scope="col">Distance</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($shops as $shop)
                <tr>
                  <!-- <th scope="row">{{$shop->id}}</th> -->
                  <td>{{$shop->name}}</td>
                  <td>{{$shop->direction}}</td>
                  <td>{{$shop->distance}}</td>
                  <td>Icon Like | Icon discard</td>
                </tr>
                @endforeach    
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
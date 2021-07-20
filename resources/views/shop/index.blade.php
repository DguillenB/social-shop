@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-12">
            <h1>Listado de tiendas</h1>
            <table class="table">
              <thead>
                <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">{{ __('Shop name') }}</th>
                  <th scope="col">{{ __('Direction') }}</th>
                  <th scope="col">{{ __('Distance') }}</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($shops as $shop)
                <tr>
                  <!-- <th scope="row">{{$shop->id}}</th> -->
                  <td>{{$shop->name}}</td>
                  <td>{{$shop->direction}}</td>
                  <td>{{$shop->distance}} m</td>
                  <td>Icon Like | Icon discard</td>
                </tr>
                @endforeach    
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
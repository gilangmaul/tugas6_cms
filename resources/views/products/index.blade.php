@extends('layouts.app')

@section('title','Product Data')

@section('content')
    
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">@yield('title','Data Barang')</h6>
                        </div>
                        <div class="card-body">
                             <a href="{{route('products.create')}}">
                                <button class="btn btn-primary mb-4" type="button">Tambah</button></a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    @php($no = 1)
                                    @foreach ($products as $item )
                                        <tr>
                                            <th>{{$no++}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->category->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>
                                                <a href="{{route('products.edit',$item->id)}}" class="btn btn-warning">edit</a>
                                                <a href="{{route('destroy',$item->id)}}" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


@endsection
@extends('layouts.app')

@section('title','Tambah Barang')

@section('content')

<form action="{{route('products.create')}}" method="post">
    @csrf
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="code_product">Name</label>
                        <input type="text" name="product_name" id="product_name">
                    </div>
                     <div class="form-group">
                        <label for="code_product">Description</label>
                        <input type="text" name="product_desc" id="product_desc">
                    </div>
                    <div class="form-group">
                        <label for="code_product">Price</label>
                        <input type="text" name="product_price" id="product_price">
                    </div>
                    <select class="form-select mb-3 @error('category_id') is-invalid  @enderror" aria-label="Default select example" name="category_id">
                                <option selected>Pilih Category</option>
                                        @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->id}} - {{$item->name}}</option>
                                         @endforeach
                    </select>
                    <div class="form-group">
                        <label for="product_qty">Qty</label>
                        <input type="text" name="product_qty" id="product_qty">
                    </div>
                 </div>
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection


@extends('layouts.app')

@section('title','Tambah Barang')

@section('content')

<form action="{{route('products.create')}}" method="post">
    @csrf
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Category</h6>
            </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="code_category">Name</label>
                        <input type="text" name="category_name" id="category_name">
                    </div>                     
                 </div>
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection


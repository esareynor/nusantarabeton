@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Tambah Produk</div>
            </div>
            <!-- Form -->
            <div class="container">
                <form action="/add_product" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product    ">Nama Produk</label>
                            <input type="text" class="form-control" name="name_product"
                                placeholder="Paving, U Ditch, dll">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

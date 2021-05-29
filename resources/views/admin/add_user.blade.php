@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Tambah Pengguna</div>
            </div>
            <!-- Form -->
            <div class="container">
                <form action="/add_user" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="johndoe@gmail.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="otoritas">Otoritas</label>
                            <select id="inputState" class="form-control" name="otoritas">
                                <option selected value="">Pilih Otoritas</option>
                                <option value="marketing">Marketing</option>
                                <option value="produksi">Produksi</option>
                                <option value="inventory">Inventory</option>
                            </select>
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

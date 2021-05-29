@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Tambah Project</div>
            </div>
            <!-- Form -->
            <div class="container">
                <form action="/add_project" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="pic_project">Gambar Project</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                name="pic_project">
                        </div>
                        <div class="form-group col-12">
                            <label for="category_product">Kategori Produk</label>
                            <select id="inputState" class="form-control" name="category_product">
                                <option value="">Pilih Kategori</option>
                                <option value="Paving">Paving</option>
                                <option value="Panel & Kolom">Panel & Kolom</option>
                                <option value="Saluran">Saluran</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="company_name">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="company_name"
                                placeholder="PT. Nusantara Beton">
                        </div>
                        <div class="form-group col-12">
                            <label for="company_address">Alamat Perusahaan</label>
                            <input type="text" class="form-control" name="company_address"
                                placeholder="Jl. Ir. Soekarno">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

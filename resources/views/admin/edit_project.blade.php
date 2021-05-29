@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Edit Project</div>
            </div>
            <!-- Form -->
            <div class="container">
                @foreach($edit_project_view as $pr)
                <form action="/edit_project_save" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $pr -> id }}" />
                        <div class="form-group col-12">
                            @if(empty($pr -> pic_project))
                            <label for="exampleFormControlFile1">Tambah Gambar Project</label>
                            @elseif($pr -> pic_project)
                            <img src="{{ URL::asset($p -> pic_project) }}" width="100%" />
                            <label for="exampleFormControlFile1">Ubah Gambar Project</label>
                            @endif
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                name="pic_project">
                        </div>
                        <div class="form-group col-12">
                            <label for="company_name">Nama Project</label>
                            <input type="text" class="form-control" name="company_name"
                                value="{{ $pr -> company_name }}" placeholder="Paving, U Ditch, dll">
                        </div>
                        <div class="form-group col-12">
                            <label for="category_project">Kategori Project</label>
                            <select id="inputState" class="form-control" name="category_product">
                                <option selected value="{{ $pr -> category_product }}">
                                    {{ $pr -> category_product }}
                                </option>
                                @if($pr -> category_product == "Paving")
                                <option value="Panel & Kolom">Panel & Kolom</option>
                                <option value="Saluran">Saluran</option>
                                @elseif($pr -> category_product == "Panel & Kolom")
                                <option value="Paving">Paving</option>
                                <option value="Saluran">Saluran</option>
                                @elseif($pr -> category_product == "Saluran")
                                <option value="Paving">Paving</option>
                                <option value="Panel & Kolom">Panel & Kolom</option>
                                @else
                                <option value="Paving">Paving</option>
                                <option value="Panel & Kolom">Panel & Kolom</option>
                                <option value="Saluran">Saluran</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="company_address">Alamat Project</label>
                            <input type="text" class="form-control" name="company_address"
                                value="{{ $pr -> company_address }}" placeholder="Paving, U Ditch, dll">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                @endforeach
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

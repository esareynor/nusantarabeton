@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Edit Produk</div>
            </div>
            <!-- Form -->
            <div class="container">
                @foreach($edit_product_view as $p)
                <form action="/edit_product_save" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $p -> id }}" />
                        <div class="form-group col-12">
                            @if(empty($p -> pic_product))
                            <label for="exampleFormControlFile1">Tambah Gambar Produk</label>
                            @elseif($p -> pic_product)
                            <img src="{{ URL::asset($p -> pic_product) }}" width="100%" />
                            <label for="exampleFormControlFile1">Ubah Gambar Produk</label>
                            @endif
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                name="pic_product">
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Nama Produk</label>
                            <input type="text" class="form-control" name="name_product" value="{{ $p -> name_product }}"
                                placeholder="Paving, U Ditch, dll">
                        </div>
                        <div class="form-group col-12">
                            <label for="category_product">Kategori Produk</label>
                            <select id="inputState" class="form-control" name="category_product">
                                <option selected value="{{ $p -> category_product }}">
                                    @if($p -> category_product == 1)
                                    Paving
                                    @elseif($p -> category_product == 2)
                                    Panel & Kolom
                                    @elseif($p -> category_product == 3)
                                    Saluran
                                    @endif
                                </option>
                                @if($p -> category_product == 1)
                                <option value="2">Panel & Kolom</option>
                                <option value="3">Saluran</option>
                                @elseif($p -> category_product == 2)
                                <option value="1">Paving</option>
                                <option value="3">Saluran</option>
                                @elseif($p -> category_product == 3)
                                <option value="1">Paving</option>
                                <option value="2">Panel & Kolom</option>
                                @else
                                <option value="1">Paving</option>
                                <option value="2">Panel & Kolom</option>
                                <option value="3">Saluran</option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="size_product">Ukuran Produk (cm)</label>
                            <input type="text" class="form-control" name="size_product" value="{{ $p -> size_product }}"
                                placeholder="21 x 10,5 x 6">
                        </div>
                        <div class="form-group col-12">
                            <label for="total_product">Total Produk (pcs)</label>
                            <input type="text" class="form-control" name="total_product"
                                value="{{ $p -> total_product }}" placeholder="1000">
                        </div>
                        <div class="form-group col-12">
                            <label for="weight_product">Berat Produk (kg)</label>
                            <input type="text" class="form-control" name="weight_product"
                                value="{{ $p -> weight_product }}" placeholder="5 kg">
                        </div>
                        <div class="form-group col-12">
                            <label for="color_product">Warna Produk</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="color_product[]" value="1"
                                    id="flexCheckDefault" @if($p -> color_product == 1 || $p -> color_product == 12 ||
                                $p -> color_product ==
                                123 || $p -> color_product == 13)
                                checked
                                @else
                                {{--  --}}
                                @endif
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    Abu - Abu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="color_product[]" value="2"
                                    id="flexCheckDefault" @if($p -> color_product == 2 || $p -> color_product == 12 ||
                                $p -> color_product ==
                                123 || $p -> color_product == 23)
                                checked
                                @else
                                {{--  --}}
                                @endif
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    Merah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="color_product[]" value="3"
                                    id="flexCheckDefault" @if($p -> color_product == 3 || $p -> color_product == 13 ||
                                $p -> color_product ==
                                123 || $p -> color_product == 23)
                                checked
                                @else
                                {{--  --}}
                                @endif
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    Hitam
                                </label>
                            </div>
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

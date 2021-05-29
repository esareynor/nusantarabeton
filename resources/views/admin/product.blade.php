@extends('layouts.app')

@section('content')
{{-- PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class=" px-md-4 col-xl-12 col-md-12 container">
        <a href="/add_product_view" class="btn btn-primary">
            Tambah Produk
        </a>
    </div>
    <div class="py-4 px-3 px-md-4 col-xl-12 col-md-12 container">
        <div class="card mb-3 mb-md-4">
            <div class="card-body">
                <div class="container col table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-primary text-white row">
                                <th class="col-1 text-center">Gambar Produk</th>
                                <th class="col text-center">Nama Produk</th>
                                <th class="col text-center">Kategori Produk</th>
                                <th class="col text-center">Ukuran Produk</th>
                                <th class="col text-center">Jumlah Stock</th>
                                <th class="col text-center">Berat</th>
                                <th class="col text-center">Warna</th>
                                <th class="col">Opsi</th>
                                <th class="col">Histori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_product as $p)
                            <tr class="row">
                                <td class="col-1 text-center"><img src="{{$p -> pic_product}}" width="100%" /></td>
                                <td class="col text-center">{{$p -> name_product}}</td>
                                <td class="col text-center">
                                    @if($p -> category_product == 1)
                                    <span>Paving</span>
                                    @elseif($p -> category_product == 2)
                                    <span>Panel & Kolom</span>
                                    @elseif($p -> category_product == 3)
                                    <span>Saluran</span>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td class="col text-center">{{$p -> size_product}} cm</td>
                                <td class="col text-center">
                                    @if($p -> total_product < 100) <span class="text-danger">
                                        <b>{{$p -> total_product}} pcs</b></span>
                                        <span class="gd-alert text-danger"></span>
                                        @else
                                        <span class="text-success"><b>{{$p -> total_product}} pcs</b></span>
                                        @endif
                                </td>
                                <td class="col text-center">{{$p -> weight_product}} Kg</td>
                                <td class="col text-center">
                                    @if($p -> color_product == 1)
                                    <span class="text-light">Abu - Abu</span>
                                    @elseif($p -> color_product == 12)
                                    <span class="text-light">Abu - Abu</span>
                                    <span class="text-dark">/</span>
                                    <span class="text-danger">Merah</span>
                                    @elseif($p -> color_product == 123)
                                    <span class="text-light">Abu - Abu</span>
                                    <span class="text-dark">/</span>
                                    <span class="text-danger">Merah</span>
                                    <span class="text-dark">/</span>
                                    <span class="text-dark">Hitam</span>
                                    @elseif($p -> color_product == 2)
                                    <span class="text-danger">Merah</span>
                                    @elseif($p -> color_product == 23)
                                    <span class="text-danger">Merah</span>
                                    <span class="text-dark">/</span>
                                    <span class="text-dark">Hitam</span>
                                    @elseif($p -> color_product == 13)
                                    <span class="text-danger">Abu - Abu</span>
                                    <span class="text-dark">/</span>
                                    <span class="text-dark">Hitam</span>
                                    @elseif($p -> color_product == 3)
                                    <span class="text-dark">Hitam</span>
                                    @else
                                    <span class="text-dark">-</span>
                                    @endif
                                </td>
                                <td class="col">
                                    <a class="media align-items-center" href="/edit_product_view/{{$p -> id}}">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-pencil text-primary"></i>
                                        </span>
                                        <span class="text-primary side-nav-fadeout-on-closed media-body">Edit</span>
                                    </a>
                                    <a class="media align-items-center" href="/delete_product/{{$p -> id}}">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-trash text-danger"></i>
                                        </span>
                                        <span class="text-danger side-nav-fadeout-on-closed media-body">Delete</span>
                                    </a>
                                    {{-- <a class="media align-items-center" href="/home">
                                    <span class="side-nav-menu-icon d-flex mr-3">
                                        <i class="gd-eye text-danger"></i>
                                    </span>
                                    <span class="text-danger side-nav-fadeout-on-closed media-body">Disable</span>
                                </a> --}}
                                </td>
                                <td class="col">
                                    <a class="media align-items-center" href="#">
                                        <span class="text-primary side-nav-fadeout-on-closed media-body">Histori
                                            Produk</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$view_product -> links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

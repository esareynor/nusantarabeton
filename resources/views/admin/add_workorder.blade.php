@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Tambah Work Order</div>
            </div>
            <!-- Form -->
            <div class="container">
                <form action="/add_workorder" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Jenis Perusahaan</label>
                            <div class="input-group mb-3">
                                <select class="custom-select col-xl-3 col-md-6" id="selectJenis" name="jenis">
                                    <option selected value="Null">Jenis</option>
                                    <option value="PT">PT</option>
                                    <option value="CV">CV</option>
                                    <option value="Instansi Pendidikan">Instansi Pendidikan</option>
                                    <hr>
                                    <option value="Tuan">Tuan</option>
                                    <option value="Nyonya">Nyonya</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <input type="text" class="form-control col-md-12" name="customer" style="height: 50px"
                                    placeholder="Contoh: Nusantara Beton">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Pilih Produk</label>
                            <div class="row input-group">
                                @foreach($product_1 as $p1)
                                <div class="col-xl-3 form-check">
                                    <div class="custom-control custom-radio image-checkbox">
                                        <input type="radio" class="custom-control-input" id="{{$p1 -> id}}"
                                            name="id_product" value="{{$p1 -> id}}">
                                        <label class="custom-control-label" for="{{$p1 -> id}}">
                                            <img src="{{$p1 -> pic_product}}" alt="{{$p1 -> name_product}}"
                                                height="100">
                                            <p class="text-center">{{$p1 -> name_product}}</p>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row input-group">
                                @foreach($product_2 as $p2)
                                <div class="col-xl-3 form-check">
                                    <div class="custom-control custom-radio image-checkbox">
                                        <input type="radio" class="custom-control-input" id="{{$p2 -> id}}"
                                            name="id_product" value="{{$p2 -> id}}">
                                        <label class="custom-control-label" for="{{$p2 -> id}}">
                                            <img src="{{$p2 -> pic_product}}" alt="{{$p2 -> name_product}}"
                                                height="100">
                                            <p class="text-center">{{$p2 -> name_product}}</p>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row input-group">
                                @foreach($product_3 as $p3)
                                <div class="col-xl-3 form-check">
                                    <div class="custom-control custom-radio image-checkbox">
                                        <input type="radio" class="custom-control-input" id="{{$p3 -> id}}"
                                            name="id_product" value="{{$p3 -> id}}">
                                        <label class="custom-control-label" for="{{$p3 -> id}}">
                                            <img src="{{$p3 -> pic_product}}" alt="{{$p3 -> name_product}}"
                                                height="100">
                                            <p class="text-center">{{$p3 -> name_product}}</p>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Total Produk (pcs)</label>
                            <input type="number" class="form-control col-md-12" name="total_order"
                                placeholder="Contoh: 2000 pcs" style="height: 50px">
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Tanggal Pengiriman</label>
                            <input type="date" class="form-control col-md-12" name="date_delivery" style="height: 50px">
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Alamat Pengiriman</label>
                            <input type="text" class="form-control col-md-12" name="address_delivery"
                                style="height: 42px"
                                placeholder="Contoh: Jl. Bisma No. 22, Kecamatan Rungkut, Kota Surabaya">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah ke Work Order</button>
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Detail Pesanan</div>
            </div>
            <!-- Form -->
            <div class="container">
                @foreach($view_order_detail as $od)
                <form action="/konfirmasi_pesanan/{{($od -> id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $od -> id }}" />
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Nama Produk</label>
                            <div class="d-flex p-2 border border-light">
                                {{($od -> name_product)}}
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Pemesan</label>
                            @foreach($view_user_detail as $ud)
                            @if($ud -> id == $od -> id_user)
                            <div class="d-flex p-2 border border-light">
                                {{($ud -> name)}}
                            </div>
                            @else
                            {{--  --}}
                            @endif
                            @endforeach
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Pemesan</label>
                            @foreach($view_user_detail as $ud)
                            @if($ud -> id == $od -> id_user)
                            <div class="d-flex p-2 border border-light">
                                {{($ud -> phone)}}
                            </div>
                            @else
                            {{--  --}}
                            @endif
                            @endforeach
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Perusahaan</label>
                            <div class="d-flex p-2 border border-light">
                                {{($od -> customer)}}
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Tanggal Pengiriman Produk</label>
                            <div class="d-flex p-2 border border-light">
                                {{($od -> date_delivery)}}
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Alamat Pengiriman Produk</label>
                            <div class="d-flex p-2 border border-light">
                                {{($od -> address_delivery)}}
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="name_product">Status Pesanan</label>
                            <div class="d-flex p-2">
                                @if($od -> status == 1)
                                <span class="text-warning">Menunggu Konfirmasi [ Marketing ]</span>
                                @elseif($od -> status == 2)
                                <span class="text-primary"><a href="/workorder"><u>Masuk Work Order</u></a>
                                </span>
                                @elseif($od -> status == 3)
                                <span class="text-light">Order Selesai</span>
                                @elseif($od -> status == 4)
                                <span class="text-danger">Order Dibatalkan</span>
                                @else
                                <span class="">-</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($od -> status == 1)
                    <button type="submit" class="btn btn-primary float-right">Konfirmasi ke Work Order</button>
                    @elseif($od -> status == 2)
                    {{--  --}}
                    </span>
                    @elseif($od -> status == 3)
                    {{--  --}}
                    @elseif($od -> status == 4)
                    {{--  --}}
                    @else
                    {{--  --}}
                    @endif
                </form>
                @endforeach
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

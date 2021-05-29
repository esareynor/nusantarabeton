@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class="row">
        <div class="col-12">
            <div class="border border-primary rounded card mb-3 mb-md-4">
                <div class="card-header">
                    <h5 class="font-weight-semi-bold mb-0">Order Online</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive-xl">
                        <table class="table table-hover mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="font-weight-semi-bold border-top-0 py-2">No Pesanan</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Nama Produk</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Pemesan</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Perusahaan</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Contact Member</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Total Pesanan</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Tanggal Pengiriman</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Alamat Pengiriman</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Status Pesanan</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($view_order as $o)
                                @foreach($view_user as $u)
                                @if($u -> id == $o -> id_user)
                                <tr>
                                    <td class="py-3">{{$o -> id}}</td>
                                    <td class="py-3">{{ $o -> name_product }}</td>
                                    @foreach($view_user as $u)
                                    @if($u-> id == $o -> id_user)
                                    <td class="py-3 text-primary">{{ $u -> name }} [ Member ]</td>
                                    @endif
                                    @endforeach
                                    <td class="py-3">{{ $o -> customer }}</td>
                                    <td class="py-3">
                                        @foreach($view_user as $u)
                                        @if($u-> id == $o -> id_user)
                                        {{$u->phone}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="py-3">{{ $o -> total_order }}</td>
                                    <td class="py-3">{{ $o -> date_delivery }}</td>
                                    <td class="py-3">{{ $o -> address_delivery }}</td>
                                    @if($o -> status == 1)
                                    <td class="py-3 text-warning">Menunggu Konfirmasi [ Marketing ]</td>
                                    @elseif($o -> status == 2)
                                    <td class="py-3 text-primary"><a href="/workorder"><u>Masuk Work Order</u></a>
                                    </td>
                                    @elseif($o -> status == 3)
                                    <td class="py-3 text-primary"><a href="/workorder"><u>Work Progress [ Produksi
                                                ]</u></a></td>
                                    @elseif($o -> status == 4)
                                    <td class="py-3 text-danger">Order Dibatalkan</td>
                                    @else
                                    <td class="py-3">-</td>
                                    @endif
                                    <td class="py-3">
                                        <a class="media align-items-center" href="/detail_pesanan/{{ $o -> id }}">
                                            <span class="side-nav-menu-icon d-flex mr-2">
                                                <i class="gd-eye text-primary"></i>
                                            </span>
                                            <span class="side-nav-fadeout-on-closed media-body">Detail</span>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

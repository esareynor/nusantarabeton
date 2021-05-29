@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class="row">
        <div class="col-12">
            <div class="card border border-primary rounded mb-3 mb-md-4">
                <div class="card-header row">
                    <h5 class="font-weight-semi-bold mb-0 col">Work Order</h5>
                    @if(Auth::user()->role == 'marketing')
                    <a href="/add_workorder_view">
                        <u>
                            <h5 class="font-weight-semi-bold mb-0 col">Tambah Work Order</h5>
                        </u>
                    </a>
                    @else
                    {{--  --}}
                    @endif
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
                                    <th class="font-weight-semi-bold border-top-0 py-2">Total Pesanan</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Tanggal Pengiriman</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Status</th>
                                    <th class="font-weight-semi-bold border-top-0 py-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($view_order as $o)
                                @if($o -> status == 2 )
                                @foreach($view_user as $u)
                                @if($u -> id == $o -> id_user)
                                <tr>
                                    <td class="py-3">{{$o -> id}}</td>
                                    <td class="py-3">{{$o-> name_product}} </td>
                                    <td class="py-3 text-primary">{{$u-> name}} [ Marketing ]</td>
                                    <td class="py-3"> {{$o-> customer}} </td>
                                    <td class="py-3">{{$o-> total_order}} </td>
                                    <td class="py-3">{{$o-> date_delivery}}</td>
                                    @if($o->status == 2)
                                    <td class="py-3 text-warning">Menunggu Konfirmasi [ Produksi ]</td>
                                    @elseif($o->status == 3)
                                    <td class="py-3 text-primary">Proses [ Produksi ]</td>
                                    @elseif($o->status == 4)
                                    <td class="py-3 text-success">Proses Pengiriman Ke Lokasi [ Supir ]</td>
                                    @elseif($o->status == 5)
                                    <td class="py-3 text-light">Produk Telah Terkirim</td>
                                    @else
                                    <td class="py-3">-</td>
                                    @endif
                                    </td>
                                    <td class="py-3">
                                        <a class="media align-items-center"
                                            href="/detail_workorder_view_2/{{$o -> id}}">
                                            <span class="side-nav-menu-icon d-flex mr-3">
                                                <i class="gd-eye text-primary"></i>
                                            </span>
                                            <span class="side-nav-fadeout-on-closed media-body">Detail</span>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
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

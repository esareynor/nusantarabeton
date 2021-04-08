@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class="col-lg-6 col-xl-4 mb-3 mb-lg-4">
        <!-- Card -->
        <div class="card h-100">
            <div class="card-header row">
                <h5 class="h6 col text-uppercase text-left font-weight-semi-bold mb-0">Stok menipis</h5>
            </div>
            @if($count_product > 0) <div class="card-body p-0">
                <div class="border-top p-3 px-md-4 mx-0">
                    @foreach($view_product as $p)
                    @if($p -> total_product < 100) <div class="row justify-content-between d-flex mb-2">
                        <div class="col">
                            <span class="text-primary mr-3">{{ $p -> name_product }}</span>
                        </div>
                        <div class="col-auto text-danger">
                            {{ $p -> total_product }}
                        </div>
                </div>
                @elseif($p -> total_product > 100)
                {{--  --}}
                @endif
                @endforeach
            </div>
        </div>
        @else
        <div class="card-body p-0">
            <div class="border-top p-3 px-md-4 mx-0">
                <div class="row justify-content-between d-flex mb-2">
                    <div class="col">
                        <span class="text-dark mr-3">Tidak ada stok yang menipis</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> <!-- End Card -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <div class="card-header">
                <h5 class="font-weight-semi-bold mb-0">Pesanan Aktif</h5>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive-xl">
                    <table class="table text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">No Pesanan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Jenis Pesanan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Total Pesanan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Status</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_order as $o)
                            <tr>
                                <td class="py-3">{{$o -> id}}</td>
                                <td class="py-3">
                                    <div>{{ $o -> name_order }}</div>
                                </td>
                                <td class="py-3">{{ $o -> total_order }}</td>
                                <td class="py-3">
                                    <span class="badge badge-pill badge-success">Dibayar</span>
                                </td>
                                <td class="py-3">
                                    <a class="media align-items-center" href="/home">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-eye"></i>
                                        </span>
                                        <span class="side-nav-fadeout-on-closed media-body">Detail</span>
                                    </a>
                                </td>
                            </tr>
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

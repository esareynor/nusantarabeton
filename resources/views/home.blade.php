@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class="col-lg-6 col-xl-4 mb-3 mb-lg-4">
        <!-- Card -->
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manajer')
        <div class="card h-100">
            <div class="card-header row">
                <h5 class="h6 col text-uppercase text-left font-weight-semi-bold mb-0">Stok menipis</h5>
                <a href="/product">
                    <h5 class="h6 col text-uppercase text-left font-weight-semi-bold mb-0 text-right">Lihat Semua</h5>
                </a>
            </div>
            @if($count_product > 0)
            <div class="card-body p-0">
                <div class="border-top p-3 px-md-4 mx-0">
                    @foreach($view_product as $p)
                    @if($p -> total_product < 100) <div class="row justify-content-between d-flex mb-2">
                        <div class="col">
                            <span class="text-primary mr-3">{{ $p -> name_product }}</span>
                        </div>
                        <div class="col-auto text-danger">
                            {{ $p -> total_product }} pcs
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
    @endif
</div>
</div>
@endsection

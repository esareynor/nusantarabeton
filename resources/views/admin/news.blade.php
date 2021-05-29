@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class=" px-md-4 col-xl-12 col-md-12 container">
        <a href="/add_news_view" class="btn btn-primary">
            Tambah Berita
        </a>
    </div>
    <div class="py-4 px-3 px-md-4 col-xl-12 col-md-12 container">
        <div class="card mb-3 mb-md-4">
            <div class="card-body">
                <div class="container col table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-primary text-white row">
                                <th class="col-2">Gambar Berita</th>
                                <th class="col">Judul Berita</th>
                                <th class="col">Penulis</th>
                                <th class="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_news as $n)
                            <tr class="row">
                                <td class="col-2">
                                    @if($n -> pic_news == null)
                                    <img src="https://www.freeiconspng.com/uploads/no-image-icon-6.png" width="50"
                                        alt="Icon No Download" />
                                    @else
                                    <img src="{{$n -> pic_news}}" width="50" />
                                    @endif
                                </td>
                                <td class="col">{{$n -> title_news}}</td>
                                <td class="col">{{$n -> author}}</td>
                                <td class="col">
                                    <a class="media align-items-center" href="/edit_news_view/{{$n -> id}}">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-pencil text-primary"></i>
                                        </span>
                                        <span class="text-primary side-nav-fadeout-on-closed media-body">Edit</span>
                                    </a>
                                    <a class="media align-items-center" href="/delete_news/{{$n -> id}}">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-trash text-danger"></i>
                                        </span>
                                        <span class="text-danger side-nav-fadeout-on-closed media-body">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$view_news -> links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

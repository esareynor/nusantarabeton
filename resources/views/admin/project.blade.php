@extends('layouts.app')

@section('content')
{{-- PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class=" px-md-4 col-xl-12 col-md-12 container">
        <a href="/add_project_view" class="btn btn-primary">
            Tambah Project
        </a>
    </div>
    <div class="py-4 px-3 px-md-4 col-xl-12 col-md-12 container">
        <div class="card mb-3 mb-md-4">
            <div class="card-body">
                <div class="container col table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-primary text-white row">
                                <th class="col-2">Gambar Project</th>
                                <th class="col">Kategori Produk</th>
                                <th class="col">Nama Perusahaan</th>
                                <th class="col">Alamat Perusahaan</th>
                                <th class="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_project as $pr)
                            <tr class="row">
                                <td class="col-2">
                                    @if($pr -> pic_project == null)
                                    <img src="https://www.freeiconspng.com/uploads/no-image-icon-6.png" width="50"
                                        alt="Icon No Download" />
                                    @else
                                    <img src="{{$pr -> pic_project}}" width="100%" />
                                    @endif
                                </td>
                                <td class="col">{{$pr -> category_product}}</td>
                                <td class="col">{{$pr -> company_name}}</td>
                                <td class="col">{{$pr -> company_address}}</td>
                                <td class="col">
                                    <a class="media align-items-center" href="/edit_project_view/{{$pr -> id}}">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-pencil text-primary"></i>
                                        </span>
                                        <span class="text-primary side-nav-fadeout-on-closed media-body">Edit</span>
                                    </a>
                                    <a class="media align-items-center" href="/delete_project/{{$pr -> id}}">
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
                    {{$view_project -> links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

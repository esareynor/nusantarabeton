@extends('layouts.app')

@section('content')
<div class="py-4 px-3 px-md-4">
    <div class=" px-md-4 col-xl-12 col-md-12 container">
        <a href="/add_user_view" class="btn btn-primary">
            Tambah Pengguna
        </a>
    </div>
    <div class="py-4 px-3 px-md-4 col-xl-12 col-md-12 container">
        <div class="card mb-3 mb-md-4">
            <div class="card-body">
                <div class="container col table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Nama Pengguna</th>
                                <th>Otoritas</th>
                                <th>E-Mail</th>
                                <th>No. HP</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_user as $p)
                            @if($p -> role == 'admin' || $p -> role == "manager")
                            {{--  --}}
                            @else
                            <tr>
                                <td>{{$p -> name}}</td>
                                <td class="text-capitalize">{{$p -> role}}</td>
                                <td>{{($p -> email)}}</td>
                                <td>{{$p -> phone}}</td>
                                <td>
                                    <a class="media align-items-center" href="/edit_user_view/{{$p -> id}}">
                                        <span class="side-nav-menu-icon d-flex mr-3">
                                            <i class="gd-pencil text-primary"></i>
                                        </span>
                                        <span class="text-primary side-nav-fadeout-on-closed media-body">Edit</span>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{$view_user -> links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

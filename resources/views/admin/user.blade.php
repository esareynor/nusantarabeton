@extends('layouts.app')

@section('content')
{{-- TAMBAH PENGGUNA --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Tambah Pengguna</div>
            </div>
            <!-- Form -->
            <div class="container">
                <form action="/add_user" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="johndoe@gmail.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name_product">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="otoritas">Otoritas</label>
                            <select id="inputState" class="form-control" name="otoritas">
                                <option selected value="">Pilih Otoritas</option>
                                <option value="marketing">Marketing</option>
                                <option value="produksi">Produksi</option>
                                <option value="inventory">Inventory</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>

{{-- PENGGUNA --}}
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
                                <a class="media align-items-center" href="/edit_product_view/{{$p -> id}}">
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
@endsection

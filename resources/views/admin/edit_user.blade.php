@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Edit Pengguna</div>
            </div>
            <!-- Form -->
            <div class="container">
                @foreach($edit_user_view as $u)
                <form action="/edit_user_save" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="hidden" name="id" value="{{ $u -> id }}" />
                            <label for="name">Nama</label>
                            <input type="text" value="{{$u -> name}}" class="form-control" name="name"
                                placeholder="John Doe">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="email">Email</label>
                            <input type="email" readonly class="form-control" value="{{$u -> email}}" name="email"
                                placeholder="johndoe@gmail.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="phone">Password Baru</label>
                            <input type="number" class="form-control" name="phone" placeholder="Nomor HP"
                                value="{{$u -> phone}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="otoritas">Otoritas</label>
                            <select id="inputState" class="form-control" name="otoritas">
                                <option selected value="{{$u -> role}}">{{$u -> role}}</option>
                                @if($u -> role == "marketing")
                                <option value="produksi">Produksi</option>
                                <option value="inventory">Inventory</option>
                                <option value="member">Member</option>
                                @elseif($u -> role == "produksi")
                                <option value="marketing">Marketing</option>
                                <option value="inventory">Inventory</option>
                                <option value="member">Member</option>
                                @elseif($u -> role == "inventory")
                                <option value="marketing">Marketing</option>
                                <option value="produksi">Produksi</option>
                                <option value="member">Member</option>
                                @elseif($u -> role == "member")
                                <option value="marketing">Marketing</option>
                                <option value="produksi">Produksi</option>
                                <option value="inventory">Inventory</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                @endforeach
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

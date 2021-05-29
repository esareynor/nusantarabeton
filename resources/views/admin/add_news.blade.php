@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Tambah Berita</div>
            </div>
            <!-- Form -->
            <div class="container">
                <form action="/add_news" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="pic_project">Gambar Berita</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pic_news">
                        </div>
                        <div class="form-group col-12">
                            <label for="title_news">Judul Berita</label>
                            <input type="text" class="form-control" name="title_news" placeholder="Test Gandar">
                        </div>
                        <div class="form-group col-12">
                            <label for="paragraph_news">Isi Berita</label>
                            <textarea name="paragraph_news" class="form-control"></textarea>
                            <script>
                                CKEDITOR.replace('paragraph_news');

                            </script>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
            <!-- End Form -->
        </div>
    </div>
</div>
@endsection

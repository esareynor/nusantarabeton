@extends('layouts.app')

@section('content')
{{-- TAMBAH PRODUK --}}
<div class="py-4 px-3 px-md-4">
    <div class="card mb-3 mb-md-4 col-md-12 col-xl-6 container">
        <div class="card-body">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Edit Project</div>
            </div>
            <!-- Form -->
            <div class="container">
                @foreach($edit_news_view as $n)
                <form action="/edit_news_save" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $n -> id }}" />
                        <div class="form-group col-12">
                            @if(empty($n -> pic_news))
                            <label for="exampleFormControlFile1">Tambah Gambar Berita</label>
                            @elseif($n -> pic_news)
                            <img src="{{ URL::asset($n -> pic_news) }}" width="100%" />
                            <label for="exampleFormControlFile1">Ubah Gambar Berita</label>
                            @endif
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pic_news">
                        </div>
                        <div class="form-group col-12">
                            <label for="title_news">Judul Berita</label>
                            <input type="text" class="form-control" name="title_news" value="{{ $n -> title_news }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="company_address">Isi Berita</label>
                            <textarea name="paragraph_news" class="form-control">{{ $n -> paragraph_news }}</textarea>
                            <script>
                                CKEDITOR.replace('paragraph_news');

                            </script>
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

@extends('baselayout')
@section('title', '- Dashboard admin')
@section('editStatus', 'active')
@section('content')
    <div class="row ml-4 mt-4">
        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Kategori</h5>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <a href="/kategoritable" class="btn btn-success mb-2">Lihat</a>
            </div>
        </div>

        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Kata Benda</h5>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <a href="/kbtable" class="btn btn-success mb-2">Lihat</a>
            </div>
        </div>
        
        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Kata Kerja</h5>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <a href="/kktable" class="btn btn-success mb-2">Lihat</a>
            </div>
        </div>
        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Komentar</h5>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <div class="row">
                    <div col-md-6>
                    <a href="#" class="btn btn-info mb-2 ml-2 mr-2">Kata Kerja</a>
                    </div>
                    <div col-md-6>
                    <a href="#" class="btn btn-info mb-2 ml-2 mr-2">Kata Kerja</a>
                    </div>
                    </div>
            </div>
        </div>

    <div>
@endsection
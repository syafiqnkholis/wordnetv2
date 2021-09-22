@extends('baselayout')
@section('title', '- Dashboard admin')
@section('editStatus', 'active')
@section('content')
<div>
<div class="pagesize row">
        <div class=" card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Kategori</h5>
                    <p style=" text-align: left;  height: 5rem;">Pengelolaan data kategori</p>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <a href="/kategoritable" class="btn btn-success mb-2">Lihat</a>
            </div>
        </div>

        <div class=" card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Kata Benda</h5>
                    <p style=" text-align: left;  height: 5rem;">Pengelolaan data kata benda.</p>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <a href="/kbtable" class="btn btn-success mb-2">Lihat</a>
            </div>
        </div>
        
        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Kata Kerja</h5>
                    <p style=" text-align: left;  height: 5rem;">Pengelolaan data kata kerja.</p>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <a href="/kktable" class="btn btn-success mb-2">Lihat</a>
            </div>
        </div>
        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Komentar</h5>
                    <p style=" text-align: left;  height: 5rem;">Lihat data komentar dan masukan yang telah dimasukkan user.</p>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <div class="row">
                    <div col-md-6>
                    <a href="/komentarkb" class="btn btn-info mb-2 ml-2 mr-2">Kata Kerja</a>
                    </div>
                    <div col-md-6>
                    <a href="/komentarkk" class="btn btn-info mb-2 ml-2 mr-2">Kata Kerja</a>
                    </div>
                    </div>
            </div>
        </div>

<div>
</div>
@endsection
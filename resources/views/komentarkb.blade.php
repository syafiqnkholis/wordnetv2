@extends('baselayout')
@section('title', '- Komentar kata benda')
@section('content')

    <div class="card-position pagesize">
        <div class="card ml-4" style="width: 15rem; text-align: center;">
            <h5 class="card-title">Komentar</h5>
            <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
            <div class="row">
            <div col-md-6>
            <a href="/komentarkb" class="btn btn-info mb-2 ml-2 mr-2">Kata Benda</a>
            </div>
            <div col-md-6>
            <a href="komentarkk" class="btn btn-info mb-2 ml-2 mr-2">Kata Kerja</a>
            </div>
            </div>
        </div>

            <!-- <ul class="list-group" style="width:200px">
            <?php $no=1 ?>
            @foreach($komentarkb as $masukannoun)
                <li class="list-group-item">
                    komentar {{$no++}} </br>{{$masukannoun->komentar_kb}}
                </li>
            @endforeach
            </ul> -->
    <div>
    </div>
@endsection

@extends('baselayout')
@section('title', '- Komentar kata kerja')
@section('editStatus', 'active')
@section('content')
    <div class="row ml-4 mt-4">
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


        <div class="tabelpost">
            <table>
            <tr>
                <th>Komentar verb</th>
            </tr>
                <tr> 
                <td> 
                    @foreach($komentarkk as $masukanverb)
                    <li>{{$masukanverb->komentar_kk}}</li>
                    @endforeach
                </td>
                </tr>
            </table>
        </div>

    <div>
@endsection
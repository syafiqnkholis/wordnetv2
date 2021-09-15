@extends('baselayout')
@section('title', '- Komentar kata benda')
@section('editStatus', 'active')
@section('content')
    <div class="row ml-4 mt-4">
        <div class="card-position ml-4">
            <div class="card" style="width: 15rem; text-align: center;">
                    <h5 class="card-title">Komentar</h5>
                    <!-- <p class="card-text">Lihat data komentar dan masukan yang telah dimasukkan user.</p> -->
                    <div class="row">
                    <div col-md-6>
                    <a href="/komentarkb" class="btn btn-info mb-2 ml-2 mr-2">Kata Benda</a>
                    </div>
                    <div col-md-6>
                    <a href="/komentarkk" class="btn btn-info mb-2 ml-2 mr-2">Kata Kerja</a>
                    </div>
                    </div>
            </div>
        </div>


        <div class="tabelpost">
            <table>
            <tr>
                <th>Komentar Noun</th>
            </tr>
                <tr> 
                <td> 
                    @foreach($komentarkb as $masukannoun)
                    <li>{{$masukannoun->komentar_kb}}</li>
                    @endforeach
                </td>
                </tr>
            </table>
        </div>

    <div>
@endsection
@extends('baselayout')
@section('title', '- Komentar kata benda')
@section('content')

    <div class=" card-position pagesize" style="padding:20px">
            <div style="width:300px; padding:0 0 0 20px">
            <table class="table table-bordered table-sm">
                <thead>
                    <th scope="col" style="color:white">Komentar Kata Kerja</th>
                </thead>
                <tbody>
                <?php $no=1 ?>
                @foreach($komentarkk as $masukanverb)
                <tr>
                    <!-- <th scope="col">komentar {{$no++}} </th> -->
                    <td class="table-light">{{$masukanverb->komentar_kk}}</td>
                <tr>
                @endforeach
                </tbody>
            </table>
            </div>
    <div>
    </div>
@endsection
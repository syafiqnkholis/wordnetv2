@extends('baselayout')
@section('title', '- Komentar kata benda')
@section('editStatus', 'active')
@section('content')

    <div class="pagesize" ml-4 mt-4">
        <ul class="list-group" style="width:200px">
            <?php $no=1 ?>
            @foreach($komentarkb as $masukannoun)
                <li class="list-group-item">
                    komentar {{$no++}} </br>{{$masukannoun->komentar_kb}}
                </li>
            @endforeach
        </ul>
    <div>
@endsection
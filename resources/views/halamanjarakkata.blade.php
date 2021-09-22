@extends('baselayout')
@section('title', '- tampilkan halaman jarak kata benda')
@section('editStatus', 'active')
@section('content')
<div class="bg pagesize">
    <div style="padding-bottom: 26px;">
    <div class="row" style="margin:0">
    <!-- jarak kata -->
        <div class="col-md-4"></div>
        <div class="col-md-8 mt-3" >
                <h6 class="ml-4" style="color: #fff; font-size: 20px;">Hitung Jarak Kata</h6>
                <div class=" mt-3 w-50" id="kolomjk">
                <div class="ml-4 mb-1">
                    <div class="isihip">
                        <div class="ml-2" id="tambahHipernim" style="color:#fff ">
                            <form method="POST" action="{{ action('NounController@jarak') }}">
                            @csrf
                                masukkan kata 1
                                <input type="text" name="katasatu" class="form-control mb-1 formjk">
                                masukkan kata
                                <input type="text" name="katadua" class="form-control mb-1 formjk">
                                <button type="submit" class="btn btn-success mt-1 col-md-6" style="width: 80px;">Hitung</button></br>
                                
                                @if(isset($kedalaman))
                                <h7 style="color: #fff; font-size: 15px;">Hasil jarak: {{$kedalaman}}</h7>
                                @elseif ($message = Session::get('error1'))
                                        <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>

                                @elseif ($message = Session::get('error2'))
                                        <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>

                                @elseif ($message = Session::get('error3'))
                                        <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>
                                    

                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
</div>

@endsection
@section("footer")


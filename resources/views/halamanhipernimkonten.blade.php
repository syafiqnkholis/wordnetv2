@extends('baselayout')
@section('title', '- tampilkan hasil hipernim')
@section('editStatus', 'active')
@section('content')
<div class="bg pagesize">
    <div style="padding-bottom: 26px;">
        <!-- navbar -->
        <div class="row" style="margin:0">
            <!-- konten tengah  =============================================== --> 
            <div class="col-md-6 mt-6 offset-md-3" >
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="color: #fff; font-size: 20px;">Pencarian Kata</h2>
                    </div>
                    <div class="col-md-12 mt-2" >
                        <div class="mb-3">
                            <input type="text" id="inputquery" class="form-control mr-1 input" name="searchnoun" placeholder="&#xF002; cari" >
                        </div>
                        <div class="col-md-12 mt-2" id="resultContainer"></div> 
                    </div>
                    <div class="col-md-12">
                        <h2 style="color: #fff; font-size: 20px;">Hasil Pencarian</h2>
                    </div>
                    <div class="card mx-3 w-100">
                        <div class="card-body" style="font-family: -webkit-body;">
                            ➨{{$noun->nama_kb}} </br>
                            <div> {{$noun->desc_kb}}  </br> </div>
                            @foreach($noun->relations as $hipernim)
                            &emsp;
                            ➥ {{$hipernim->hipernim->hipernim}}
                            <div style="padding-left:7%;">
                            {{$hipernim->hipernim->desc_hipernim}}
                            </div>
                            @endforeach
                        </div>
                    </div> 
                    @guest
                    @else
                    <div class="mx-3 w-100">
                    <h6 style="color: #fff; font-size: 16px;">Tambah komentar</h6>
                        <form action="{{route('komentarkb',$noun->id_kb)}}" method="POST">
                            @csrf
                            <textarea name="masukkankomentarkb" class="form-control" id="isi" rows="3"placeholder="Masukkan komentar atau masukan" name="isi"></textarea>
                            <button class="btn btn-primary" type="submit" style="width:100%; margin-top:1%;">Tambahkan</button>
                        </form> 
                        </div>  
                    </div>  
                    @endguest
                </div>
            </div> 
         </div>
    </div>
</div>

<script>

$('#inputquery').on('input', function(){
    $.get('/api/pencarian/noun', 
    { "searchnoun": $(this).val() },
        function(data) {
            $("#resultContainer").html("");
            $.each(data, function(i,kb){
                var relationElement = "";
                var element = `
                    <a href="/halamanhipernimkonten/`+kb['id_kb']+`" class="container button result btn text-left">`+kb['nama_kb']+`</a>
                `;
                $("#resultContainer").append(element);
            });
        }
    )
});

</script>
@endsection

                    <!-- tampilan data hipernim
                    <p>`+kb['desc_kb']+`</p>
                    <div class=" mb-2" >
                    `
                    +relationElement+
                    `
                    </div> -->


@extends('baselayout')
@section('title', '- tampilkan hasil hipernim')
@section('editStatus', 'active')
@section('content')
    <div class="pagesize" style="padding-bottom: 26px;"> 
        <div>
        </div>
        <div class="row bg" style="margin:0">
    <!-- jarak kata -->
        <div class="col-md-3 mt-3">
        </div>

        <!-- konten tengah  =============================================== --> 
        <div class="col-md-6 mt-3 ">
            <div class="row">
            <div class="col-md-12">
                <h2 style="color: #fff; font-size: 20px;">Pencarian Kata Benda</h2>
            </div>    
                <div class="col-md-12" >
                    <div class="mt-4">
                    <input type="text" id="inputquery" class="form-control mr-1 input" name="searchnoun" placeholder="&#xF002; cari" >
                    </div>
                    
                </div>
                <!-- <div class="mt-2 ml-1" id="resultContainer"> -->
                <div class="col-md-12 mt-2" id="resultContainer">
                    </div>  
                </div>
            </div> 
    </div>
</div>


    <script>
        //jqueri untuk menampilkan kata yang dicari
    $('#inputquery').on('input', function(){
        $.get('/api/pencarian/noun', 
        { "searchnoun": $(this).val() },
        function(data) {
            $("#resultContainer").html(""); 
            if(data.length<1) $("#resultContainer").html("<p style='color:red'>tidak ada pencarian</p>"); 
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
@section("footer")


@extends ('baselayout')
@section('title', '- Home')
@section('content')
<div class="row bg">
    <div class="col-md-3 wrapper">
        <div class="mt-4">
                <button type="button" class="btn btn-default hp ml-4 mb-2 " style="width: 200px">
                <i class="fas fa-cog mt-1 mr-2" style="float: left;"></i><b style="float:left">Pengaturan</b>
                </button>
        </div>
        <div class="kolomkata">
            <div class="form-group">
                <h6> Rekomendasi kata</h6>
                <select multiple class="form-control" id="listkata" style="height:400px; width:200px";>
                    <option>properti</option>
                    <option>meja</option>
                    <option>kursi</option>
                    <option>buku</option>
                    <option>karpet</option>
                    <option>properti</option>
                    <option>meja</option>
                    <option>kursi</option>
                    <option>buku</option>
                    <option>karpet</option>
                    <option>properti</option>
                    <option>meja</option>
                    <option>kursi</option>
                    <option>buku</option>
                    <option>karpet</option>
                    <option>properti</option>
                    <option>meja</option>
                    <option>kursi</option>
                    <option>buku</option>
                    <option>karpet</option>
                </select>
            </div>
        </div>
        
    </div>

   

        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 wrapper">
            <div class="row">
                <div class="col-md-12" >
                    <h6 class="titlehp mt-4 mb-1">Hipernim kata benda</h6>
                    <div class="row">
                    <input type="text" class="form-control col-md-9 mr-1 input" placeholder="&#xF002; cari" style="box-shadow: 3px 10px 8px #c4c4c4;">  
                    <button type="button" class="btn btn-default hp col-md-2" style="box-shadow: 3px 10px 8px #c4c4c4;"><b>cari</b></button>
                    </div>
                </div>
                <div class="container">
                    

                </div>
            </div> 
        </div>


        <!-- konten samping kanan =============================================== -->
        <div class="col-md-3 wrapper">
        <div class=" mr-4 ml-5">
                <h6>Hitung jarak kata</h6>
                <div class="isihip"  >
                            <h7 class="ml-2">Masukkan kata 1</h7>
                            <input type="text" class="form-control ml-2 mb-2 " style="width: 95%;" >
                            <h7 class="ml-2">Masukkan kata 2</h7>
                            <input type="text" class="form-control ml-2 mb-2" style="width: 95%;">
                            <button type="button" class="btn btn-default hp ml-2 " style="width: 95%;">hitung</button>
                            <h7 class="ml-2">Hasil</h7>
                            <input type="text" class="form-control ml-2 mb-2" style="width: 95%;">
                </div>
            </div>
        </div>
</div>
    <script>
        $('#listkata').on('change', function(){
            $('#editkata').val(this.value);
        });
        $('#exampleRadios1').on('change', function(){
            $('#tambahHipernim input[type=text]').prop('disabled',false);
            $('#pilihHipernim input[type=text]').prop('disabled',true);
        });
        $('#exampleRadios2').on('change', function(){
            $('#tambahHipernim input[type=text]').prop('disabled',true);
            $('#pilihHipernim input[type=text]').prop('disabled',false);
        });
    </script>
@endsection
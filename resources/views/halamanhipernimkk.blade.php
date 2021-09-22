@extends('baselayout')
@section('title', '- tampilkan hasil hipernim')
@section('editStatus', 'active')
@section('content')
    <div class="pagesize" style="padding-bottom: 26px;">
        <div>
                <!-- <div class="mt-1">
                    <button class="btn setting" id="btn-jarak">
                    <i class="fas fa-chevron-circle-down mt-1 mr-1 mb-1" style="color: #fff;" ></i>
                    Jarak kata
                    </button>
                </div><br> -->
        </div>
    <div class="row bg" style="margin:0">
    <!-- jarak kata -->
        <div class="col-md-3 mt-3">
                <!-- <div class="mt-1">
                    <button class="btn setting" id="btn-jarak">
                    <i class="fas fa-chevron-circle-down mt-1 mr-1 mb-1" style="color: #fff;" ></i>
                    Jarak kata
                    </button>
                </div><br>
                
                <div class=" mt-3" id="kolomjk" style="display:none">
                <div class="ml-4 mb-1">
                    <div class="isihip">
                        <div class="ml-2" id="tambahHipernim" style="color:#fff ">
                                masukkan kata 1
                                <input type="text" class="form-control mb-1 formjk">
                                masukkan kata
                                <input type="text" class="form-control mb-1 formjk">
                                <button type="button" class="btn btn-success mt-1 col-md-6" style="width: 80px;">Hitung</button></br>
                                Hasil
                                <input type="text" class="form-control mb-2 formjk">
                        </div>
                    </div>
                </div>
                </div> -->
        </div>

   

        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 mt-3">
            <div class="row">
            <div class="col-md-12">
                <h2 style="color: #fff; font-size: 20px;">Pencarian Kata Kerja</h2>
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
    //hidden jarak kata
    $("#btn-jarak").on("click", function(){
        $("#kolomjk").toggle();
        $("i", this).toggleClass("fas fa-chevron-circle-down fas fa-chevron-circle-up");
    });
    //hidden konten wordnet opacity naik
    // $('#inputquery').on('focus',function(){
    //     $isFocused = $(this).is(":focus");
    //     console.log($isFocused);
    //     $('.desc').attr("hidden",true);
    //     $(this).css("opacity","1");
    // });
    
    // $('#inputquery').on('focusout',function(){
    //     $isFocused = $(this).is(":focus");
    //     console.log($isFocused);
    //     $(this).css("opacity","0.5");
    // });

    $('#inputquery').on('input', function(){
        $.get('/api/pencarian/verb', 
        { "searchverb": $(this).val() },
        function(data) {
            $("#resultContainer").html("");
            $.each(data, function(i,kk){
                var relationElement = "";
                $.each(kk['relations'], function(i,relation){
                    relationElement += `
                    `+relation['hipernim'].hipernim_kk+`</br>
                        ➨ `+relation['hipernim'].desc_hipernim_kk+`<br>
                    `
                    });
                    // <div class="container ml-1 result">
                var element = `
                    <a href="/halamanhipernimkontenkk/`+kk['id_kk']+`" class="container button result btn text-left">`+kk['nama_kk']+`</a>
                `;
                $("#resultContainer").append(element);
                // $("body").height = resultHeight;
            });
            $("body").removeClass("full-height");
                var resultHeight = $("#resultContainer").height;
                $("body").height = resultHeight;
        }
        )
    });

    // side up info

    $(document).ready(function(){
        var isHide = false;
        $("#informasi").click(function(){
            $("#desc").slideToggle(300);
            $("i", this).toggleClass("fas fa-chevron-circle-up fas fa-chevron-circle-down");
            $("#informasi span").text(($("#informasi span").text() == 'Tampilkan informasi') ? 'Sembunyikan informasi' : 'Tampilkan informasi');
            // $("#informasi").text("tampikan");
        });
    });

    </script>
@endsection
@section("footer")

                    <!-- tampilan data hipernim
                    <p>`+kb['desc_kb']+`</p>
                    <div class=" mb-2" >
                    `
                    +relationElement+
                    `
                    </div> -->


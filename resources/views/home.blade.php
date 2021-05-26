<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@800&display=swap" rel="stylesheet">   
        <script src="https://kit.fontawesome.com/7563762252.js" crossorigin="anonymous"></script>  
        <title>WordNet UGM</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('style.css') }}">


    </head>
    <body class="bg" style="padding-bottom: 26px;">
        <nav class="row navbar" style="width:100%; background-color: #0F3057;">
            <div class="col-md-10" style="justify-content:left;">
            <a class="navbar-brand" href="/" style="font-family: times new romance; color:#939698">
            <img src="https://ugm.ac.id/images/optimasi/ugm_header.png" width="25" height="25" alt="">
            WordNet UGM
            </a>
            </div>
            <div class="row col-md-2" style="justify-content:right;">
                <button class="btn col-md-6" style="color: #fff;">Daftar</button>
                <button class="btn col-md-6" style="color: #fff;">Masuk</button>
            </div>
        </nav>
        <!-- navbar -->
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
                <div style="color: #fff; font-size: 20px;">Pencarian hipernim</div>
                <div class="col-md-12 mt-2" >
                    <div class="mt-4">
                    <input type="text" id="inputquery" class="form-control mr-1 input" name="searchnoun" placeholder="&#xF002; cari" >
                    </div>
                    
                </div>
                <div class="mt-2 ml-1" id="resultContainer">
                    </div>  
                </div>
            </div> 
    </div>
    
    
        <div class="sideup">
            <button class="btn mt-3" id="informasi" style="color:#8c8c8c">
                <i class="fas fa-chevron-circle-up mt-1 mr-1 mb-1" style="color: #8c8c8c;" ></i>
                <span>Tampilkan informasi</span>
            </button>
            <div id="desc" style="padding-left: 350px; padding-right: 330px;padding-bottom:150px ;display:none; "> 
                <h6 class="titlehp mt-2 ml-3 ">WordNet UGM</h6>
                <p class="ml-3  desc-lay">WordNet® UGM merupakan sistem WordNet berbahasa Indonesia yang dikembangkan oleh dosen dan mahasiswa UGM. WordNet ini dibangun dengan maksud untuk membantu pengguna dalam menemukan makna suatu kata, relasi antar kata, dan kedalaman antar kata. Yang difokuskan dalam WordNet ini yakni penggunaan hipernim dan hiponim kata. Sehingga diharapkan sistem ini dapat membantu pengguna dalam membantu memberikan informasi dan tolak ukur dalam kegiatan penulisan berbahasa Indonesia.</p>
                <h6 class="titlehp mt-2 ml-3" style="font-size: 30px;">Jarak Kata</h6>
                <p class=" ml-3  desc-lay" > Jarak kata merupakan salah satu fitur dalam WordNet UGM yang mana berguna untuk menghitung jarak hubungan tiap katanya. Kata yang dapat dicari jaraknya hanyalah kata yang berkategori kata benda. Fitur ini diharapkan dapat bermanfaat untuk membantu pengguna dalam menentukan kedekatan hubungan antara kata benda satu dengan kata benda lainnya, serta membantu dalam proses pelatihan bahasa untuk kecerdasan buatan.</p>
            </div>
            <!-- <p class="mt-2 mr-2" style="float: right;">&copy; 2020</p> -->
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
        $.get('/api/pencarian/noun', 
        { "searchnoun": $(this).val() },
        function(data) {
            $("#resultContainer").html("");
            $.each(data, function(i,kb){
                var relationElement = "";
                $.each(kb['relations'], function(i,relation){
                    relationElement += `
                    `+relation['hipernim'].hipernim+`</br>
                        ➨ `+relation['hipernim'].desc_hipernim+`<br>
                    `
                    });
                var element = `
                <div class="container mt-2 ml-1 result">
                    <h6>`+kb['nama_kb']+`</h6>
                    <p>`+kb['desc_kb']+`</p>
                    <div class=" mb-2" >
                    `
                    +relationElement+
                    `
                    </div>
                </div>
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

    //side up info

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
    </body>
</html>

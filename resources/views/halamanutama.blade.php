@extends('baselayout')
@section('title', '- tampilkan hasil hipernim')
@section('editStatus', 'active')
@section('content')
    <div class="bg" style="padding-bottom: 26px;">
    <div class="bg">
        <div class="row">
        <div class="col-md-3 mt-3">
        <div class=" ml-4" style="color:white; padding-left:20px"><a href="#desc">Apa itu WordNet UGM? </a></div>    
        </div>

   

        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 mt-3">
            <div class="row" style="margin-top: 100px;">
                <div>
                <img src="{{ asset('img/logo-putih.png') }}" style="width: 200px;" alt="Logo UGM">
                </div>
                <div class="ml-4">
                    <div class="judulhome" >Wordnet UGM</div>
                    <div class="ml-4" style="float:center;">
                        <div class="row">
                        <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="width: 200px; color:#0F3057">
                            <b>Pencarian<b>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/halamanhipernim">Kata Benda</a>
                            <a class="dropdown-item" href="/halamanhipernimkk">Kata Kerja</a>
                            </div>
                        <button onclick="window.location.href='/halamanjarakkata'" class="btn btn-light" style="width: 200px; color:#0F3057" ><b>Hitung jarak kata</b></button>
                        </div>                        
                    </div>
                </div>
            </div>
            
            <!-- <button class="btn mt-1" id="informasi" style="color:#8c8c8c">
                <i class="fas fa-chevron-circle-up mt-1 mr-1 mb-1" style="color: #8c8c8c;" ></i>
                <span>Tampilkan informasi</span>
            </button> -->
            
            <!-- <p class="mt-2 mr-2" style="float: right;">&copy; 2020</p> -->
        </div>

    </div> 
        

        
        <div class="sideup" id="desc" style="padding-left: 350px; padding-right: 330px;padding-bottom:30px;margin-top: 320px;"> 
                <h6 class="titlehp mt-2 ml-3" style="color:#fff">Apa itu WordNet Bahasa Indonesia?</h6>
                <p class="ml-3  desc-lay">WordNet berbahasa Indonesia merupakan basis data leksikal bahasa Indonesia yang mengacu pada struktur sistem WordNet yang diciptakan oleh Princeton University. Dimana masing-masing kata dapat memiliki makna yang jamak juga dapat memiliki relasi antara kata satu dengan kata lainnya.</p>
                <h6 class="titlehp mt-2 ml-3" style="color:#fff">WordNet UGM</h6>
                <p class="ml-3  desc-lay">WordNet® UGM merupakan sistem WordNet berbahasa Indonesia yang dikembangkan oleh dosen dan mahasiswa UGM. WordNet ini dibangun dengan maksud untuk membantu pengguna dalam menemukan makna suatu kata, relasi antar kata, dan kedalaman antar kata. Yang difokuskan dalam WordNet ini yakni penggunaan hipernim dan hiponim kata. Sehingga diharapkan sistem ini dapat membantu pengguna dalam membantu memberikan informasi dan tolak ukur dalam kegiatan penulisan berbahasa Indonesia.</p>
                <h6 class="titlehp mt-2 ml-3" style="font-size: 30px; color:#fff">Jarak Kata</h6>
                <p class=" ml-3  desc-lay" > Jarak kata merupakan salah satu fitur dalam WordNet UGM yang mana berguna untuk menghitung jarak hubungan tiap katanya. Kata yang dapat dicari jaraknya hanyalah kata yang berkategori kata benda. Fitur ini diharapkan dapat bermanfaat untuk membantu pengguna dalam menentukan kedekatan hubungan antara kata benda satu dengan kata benda lainnya, serta membantu dalam proses pelatihan bahasa untuk kecerdasan buatan.</p>
                <button class="btn btn-info"  onclick="window.location.href='#'">Kembali</button>
                
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

            /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }

    </script>

@endsection
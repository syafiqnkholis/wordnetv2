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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
    /* css navbar */

        .bg{
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/img/Gedung-Perpustakaan-UGM-by-aghniahifdzi.jpg');
            width: 100%;
            height: 100%;
        }

        .setting{
            float: left; 
            margin-left:100px;
            color: #fff;
        }

        .setting:hover{
            background-color:#0F3057;
            color: #e7e7de;
        }
        .container{
            width: 620px;
            background-color: #fff;
            z-index: 1000;
            border-radius: 5px;
        }
        .input{
            font-family: FontAwesome, sans-serif;
            opacity: 0.5;
            height: 40px;
            margin-left: -10px;
            
        }

        .formjk{
            width: 97%;
        }


        #listkata{
            color: black;
            font-size: 15px;
            border-color: #0F3057;
        }

        h6, h7 {
            color: black;
        }

        .hp{
            background-color:#0F3057;
            color:#e7e7de;
        }
        .hp:hover{
            background-color:#00587A;
            color: #e7e7de;
        }

        .navbar-nav{
                color:#fff;
        }
        .wrapper {
            height: 100%;
            padding-top: 20px;
        }
        #sidebar-wrapper {
            position:fixed;
            width: 23%;
            height: 100%;
            background-color: #00587A;
            color: #e7e7de;
            margin-top: -10px;
        }
        .font {
            color: #e7e7de;
        }
        .kolomkata{
            padding: 0 20px 0 20px;
        }
        .isihip{
            border-style: solid;
            border-width: 1px;
            border-radius: 5px;
            border-color:#ced4da ;
            padding: 1px;
            background-color: #fff;
            width: 100%; 
            background-color:rgba(99,107,111,0.5); 
            border:none;
        }
        .search{
                opacity: 0.5;
            }
        .desc-lay{
            color:#fff; 
            font-size:13px; 
            width:90%; 
            text-align:justify;
            }
          .titlehp{
            padding-top: 30px;
            font-family: 'Baloo Tammudu 2', cursive;
            font-size: 35px;
            color: #fff;
        }
            
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #0F3057;
            color: white;
            text-align: center;
            }

        .konten row{
                    display: inline block;
            }

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        </style>


    </head>
    <body>
    <div class="row bg" style="margin:0">
    <div class="col-md-3 mt-3">
            <div class="mt-1">
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

            </div>
            

        <!-- <div class="mt-4">
                <button type="button" class="btn btn-default hp ml-4 mb-2 " style="width: 200px">
                <i class="fas fa-cog mt-1 mr-2" style="float: left;"></i><b style="float:left">Pengaturan</b>
                </button>
        </div> -->
        <!-- <div class="kolomkata">
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
        </div> -->
        
    </div>

   

        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 mt-3">
            <div class="row">
                <div class="col-md-12 mt-4" >
                    <h6 class="titlehp mt-4 ml-3 desc">WordNet UGM</h6>
                    <p class="ml-3 desc desc-lay">WordNet® UGM merupakan sistem WordNet berbahasa Indonesia yang dikembangkan oleh dosen dan mahasiswa UGM. WordNet ini dibangun dengan maksud untuk membantu pengguna dalam menemukan makna suatu kata, relasi antar kata, dan kedalaman antar kata. Yang difokuskan dalam WordNet ini yakni penggunaan hipernim dan hiponim kata. Sehingga diharapkan sistem ini dapat membantu pengguna dalam membantu memberikan informasi dan tolak ukur dalam kegiatan penulisan berbahasa Indonesia.</p>
                    <div class="mt-4">
                    <input type="text" id="inputquery" class="form-control mr-1 input" name="searchnoun" placeholder="&#xF002; cari" >
                    </div>
                </div>
                <div class="container mt-2 ml-1" style="font-size: 15px; display:none" >
                    <h6>CPU</h6>
                    <p>(n) CPU, UPP, Unit Pengolah Pusat, pengolah pusat, ( bidang komputer ) bagian komputer yang paling banyak melakukan pengolahan data.</p>
                    <div class=" mb-2" >
                    <tr>
                        <td> Peranti elektronik</td></br>
                        <td> ➨ Perangkat yang mengandung kendali konduksi elektron</td><br>
                        <td> Peranti</td></br>
                        <td> ➨ Suatu alat yang dibutuhkan untuk suatu usaha atau untuk melakukan layanan</td> 
                        <td> Peranti elektronik</td></br>
                        <td> ➨ Perangkat yang mengandung kendali konduksi elektron</td><br>
                        <td> Peranti</td></br>
                        <td> ➨ Suatu alat yang dibutuhkan untuk suatu usaha atau untuk melakukan layanan</td> 
                        <td> Peranti elektronik</td></br>
                        <td> ➨ Perangkat yang mengandung kendali konduksi elektron</td><br>
                        <td> Peranti</td></br>
                        <td> ➨ Suatu alat yang dibutuhkan untuk suatu usaha atau untuk melakukan layanan</td> 
                        <td> Peranti elektronik</td></br>
                        <td> ➨ Perangkat yang mengandung kendali konduksi elektron</td><br>
                        <td> Peranti</td></br>
                        <td> ➨ Suatu alat yang dibutuhkan untuk suatu usaha atau untuk melakukan layanan</td>               
                    </tr>
                    </div>  
                </div>
            </div> 
        </div>


        <!-- konten samping kanan =============================================== -->
        <div class="col-md-3 wrapper">

            <div class="mt-1">
                <button class="btn setting" style="float: right;color: #fff;">
                <i class="fas fa-cog fa-sm mt-1 mr-1 mb-1" style="color: #fff;" ></i> Pengaturan 
            </button>
            </div>
            
            
        </div>
    </div>
    <div class="footer" style="height: 30px;">
            <p class="mt-2 mr-2" style="float: right;">&copy; 2020</p>
    </div>


    <script>
    //hidden jarak kata
    $("#btn-jarak").on("click", function(){
        $("#kolomjk").toggle();
        $("i", this).toggleClass("fas fa-chevron-circle-down fas fa-chevron-circle-up");
    });
    //hidden konten wordnet opacity naik
    $('#inputquery').on('focus',function(){
        $isFocused = $(this).is(":focus");
        console.log($isFocused);
        $('.desc').attr("hidden",true);
        $(this).css("opacity","1");
    });
    
    // $('#inputquery').on('focusout',function(){
    //     $isFocused = $(this).is(":focus");
    //     console.log($isFocused);
    //     $('.desc').attr("hidden",false);
    // });

    // $('#inputquery').on('input',function(){
    //     $.ajax({
    //            type:'GET',
    //            url:'/api/pencarian/noun',
    //            data: $(this).val(),
    //            success:function(data) {
    //                console.log(data);
    //               alert("success");
    //            }
    //         });
    // });

    //list rekomendasi kata 
        // $('#listkata').on('change', function(){
        //     $('.input').val(this.value);
        // });
       
        
    </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">     

        <title>WordNet UGM @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
    /* css navbar */
            .navbar-nav{
                color:#fff;
            }
    /* ================== */

        .wrapper {
            height: 100%;
            padding-top: 60px;
        }

        #sidebar-wrapper {
            position:fixed;
            width: 23%;
            height: 100%;
        }

        .kolomkata{
            padding: 0 20px 0 20px;
        }
    /*===================*/

    .isihip{
        border-style: solid;
        border-width: 1px;
        border-radius: 5px;
        border-color:#ced4da ;
        padding: 1px;
        

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
    
        <!-- navbar ================================================= -->
        <nav class="navbar fixed-top " style="background-color: #1A2C43; justify-content:left">
            <a class="navbar-brand" href="/" style="font-family: times new romance; color:#939698">
            <img src="https://ugm.ac.id/images/optimasi/ugm_header.png" width="30" height="30" alt="">
                WordNet UGM
            </a>
            <div class="navbar-nav">
            <a class="nav-item nav-lin" style="color:#fff" href="#">Hipernim</a>
            </div>
        </nav>
        
    <div class="row">
        <!-- sidebar  =============================================== -->
        <div class="col-md-3 wrapper">
            <!-- <div class="d-flex" id="wrapper"> -->
                <div class="bg-light border-right" id="sidebar-wrapper">
                    <div class="bg-light bg">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action bg-light">Tambah hipernim</a>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Kelola hipernim</a>
                    </div>
                    <br>
                    <div class="kolomkata">
                            <div class="form-group">
                                <label for="">pilih kata</label>
                                
                                <input type="text" class="form-control" placeholder="search">
                            
                                <select multiple class="form-control" id="listkata" style="height:300px";>
                                <option>properti</option>
                                <option>meja</option>
                                <option>kursi</option>
                                <option>buku</option>
                                <option>karpet</option>
                                </select>
                            </div>
                    </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <!-- konten tengah  =============================================== --> 
    @yield('content')

    </div>
    </body>
</html>

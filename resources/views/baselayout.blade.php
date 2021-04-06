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
        <title>WordNet UGM @yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
    /* css navbar */
        .titlehp{
            font-family: 'Baloo Tammudu 2', cursive;
            font-size: 30px;
            color: #0F3057;
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


        .navbar{
            width: 23%;
        }
        .wrapper {
            height: 100%;
            /* padding-top: 60px; */
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
            border: solid;
            border-color: #0F3057;
            border-width: thin;
            padding: 1px;
            background-color: #fff;
            margin-bottom: 5px;
            }
            .search{
                opacity: 0.5;
                font-family: FontAwesome, sans-serif;
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
    
        <!-- navbar ================================================= -->
        <!-- <nav class="navbar fixed-top " style="background-color: #0F3057; justify-content:left">
            <a class="navbar-brand" href="/" style="font-family: times new romance; color:#939698">
            <img src="https://ugm.ac.id/images/optimasi/ugm_header.png" width="25" height="25" alt="">
                WordNet UGM
            </a>
        </nav> -->

    @yield('content')

        <div class="footer" >
            <p style="float: right;">&copy; 2020</p>
        </div>

    </body>
    
    </script>
</html>

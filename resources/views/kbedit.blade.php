@extends('baselayout')
@section('title', '- Tambah Kata Benda')
@section('baruStatus', 'active')
@section('content')

    <div class="row kblayout">
    
        <!-- konten tengah  =============================================== --> 
        
        <div class="col-md-8" >
            <form method="POST" action="{{ action('NounController@editFormProcess') }}">
            @csrf
            <h4 style="color: #fff;" >EDIT KATA BENDA</h4>
            <div class="row mt-4">
                <div class=" col-md-4" >
                    <h6 style="color: #fff;">Kata baru</h6>
                    @if($message = Session::get('error3'))
                    <input id="katabaru" name="katabaru" type="text" class="form-control mb-1" style="width: 100%;">  
                        <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>       
                    @else
                    <input id="katabaru" name="katabaru" type="text" class="form-control mb-1" value="{{$noun->nama_kb}}"  style="width: 100%;">  
                    @endif
                </div>
                <div class="col-md-4">
                <h6 style="color: #fff;">Deskripsi</h6>
                    @if($message = Session::get('error4'))
                    <textarea id="descbaru" name="descbaru" class="form-control" rows="1" ></textarea>
                        <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>   
                    @else
                        <textarea id="descbaru" name="descbaru" class="form-control" rows="1" >{{$noun->desc_kb}}</textarea>
                    @endif
                </div>
                <div class="col-md-4">
                <h6 style="color: #fff;">Kategori</h6>
                <select name="id_kategori" class="form-control ">
                @foreach($kategori as $kategori)
                    <option value="{{$kategori->id_kategori}}" selected="{{$kategori->id_kategori == $noun->id_kategori}}">{{$kategori -> nama_kategori}}</option>
                @endforeach
                </select>
                </div>
            </div>    

            <!-- susunan hipernim ================================================ -->
            <div class="row" >
                <div class="col-md-12">
                    <div id="listContainer" class="col-md-12 mt-2" >
                    @foreach($noun->relations as $hipernim)
                    <div id="hipernim{{$hipernim->kedalaman}}">
                        <p style="color: #fff;">hipernim {{$hipernim->kedalaman}}</p>
                        <div class="card flex-row mb-2 row" style="padding-left: 5px;">    
                            <div class="col-md-10">{{$hipernim->hipernim->hipernim}}</br> ➨ {{$hipernim->hipernim->desc_hipernim}}</div>
                            <div class="col-md-2">
                                <a href="/deleteHipernim/{{$hipernim->id}}" class="btn btn-danger btn-delete mt-2 mb-2" style="width: 80px;">hapus</a>
                                <!-- <button type="button" data-id="{{$hipernim->id}}" class="btn btn-danger btn-delete mt-2 mb-2" style="width: 80px;">hapus</button> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <h6 style="color: #fff;"> masukkan hipernim <h6>
                    <!-- <form method="POST" action="{{ action('NounController@addHipernim') }}"> -->
                    <!-- @csrf -->
                    <input value="{{$id}}" name="id_kb" hidden/>
                    <input name="id_hipernim" id="id_hipernim" hidden/>
                    <div class="card mb-3">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-check" id="tambahh">
                                    <input type="text" class="form-control" id="hipernim" name="hipernim" value="{{ Session::get('hipernim') }}" placeholder="tambah hipernim"/>
                                    @if($message = Session::get('error1'))
                                        <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>       
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="desc_hipernim" name="desc_hipernim" rows="1" placeholder="tambah hipernim">{{ Session::get('desc_hipernim') }}</textarea>
                                @if($message = Session::get('error2'))
                                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold"> {{ $message }} </p>       
                                @endif
                            </div>
                            <div class="col-md-2">
                                <div col-md-6>
                                <button type="submit" name="action" value="hipernim" onclick="window.location.href='/kbedittes/{id}'" class="btn btn-success " style="width: 80px;">ok</button>
                                <!-- <button type="button" id="btnOk" class="btn btn-success " style="width: 80px;">ok</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
                
            </div>
            <!-- susunan hipernim ================================================ -->
            <div class="mb-6" style="float:right; margin-bottom:60px">
                <button onclick="window.location.href='/kbtable'" type="button" class="btn btn-danger mt-2 col-md-6" style="width: 80px;">batal</button>
                <button type="submit" name="action" value="noun" class="btn btn-success mt-2 col-md-6" style="width: 80px;">simpan</button>
            </div>
        </form>
        </div>   
    </div>
    <script>
        var hipernims=[];
        var fd= new FormData();
        var simpanId =0;

        // $('#tambahh').on('change', function(){
        //     $('#tambahh input[type=text]').prop('disabled',false);
        //     $('#pilihh input[type=text]').prop('disabled',true);
        //     $('#deskripsi').prop('disabled',false);
        // });
        // $('#pilihh').on('change', function(){
        //     $('#tambahh input[type=text]').prop('disabled',true);
        //     $('#pilihh input[type=text]').prop('disabled',false);
        //     $('#deskripsi').prop('disabled',true);
        // });

    // ketika klik ok
        $currentKedalaman = 0;
        
        $('#btnOk').click(function(){
            $hipernim = $('#hipernim').val();
            $deskripsi = $('#deskripsi').val();

            $currentKedalaman++;
            $('#listContainer').append(`
            <div id="hipernim`+$currentKedalaman+`">
                <p style="color: #fff;">hipernim `+$currentKedalaman+`</p>
                <div class="card flex-row mb-2 row" style="padding-left: 5px;">    
                    <div class="col-md-10">`+$hipernim+`</br> ➨ `+$deskripsi+`</div>
                    <div class="col-md-2">
                        <button type="button" data-id="`+$currentKedalaman+`" class="btn btn-danger btn-delete mt-2 mb-2" style="width: 80px;">hapus</button>
                    </div>
                </div>
            </div>
            `);
            hipernims.push(new Classhipernim(
                simpanId, $hipernim, $deskripsi,
            ));
            fd.append("hipernims[]", 
                simpanId+"___"+$hipernim+"___"+$deskripsi
            );
            simpanId=0;
            console.log($hipernim);
            
            $('#hipernim').val("")
            $('#deskripsi').val("")
        });
        
        // ketika klik remove
        $(document).on('click', '.btn-delete', function(){
            $id =  $(this).data('id');
            $('#hipernim'+$id).remove();
            for (let $i = $id+1; $i <= $currentKedalaman; $i++) {
                $current = $i-1;
                console.log($i);
                $('#hipernim'+$i).attr('id', 'hipernim'+$current);    
                $('#hipernim'+$current+' button').attr("data-id", $current);     
                $('#hipernim'+$current+' p').text('Hipernim '+$current);           
            }
            hipernims.splice($id-1,1);
            $currentKedalaman--;
        });
    // });
    
    // search hipernim
    $(function () {
        
        $('#hipernim').autocomplete({
            position: { my : "left top", at: "left bottom" },
            source:function(request,response){
                $.get('/hipernim', 
                { "searchhipernim": request.term },
                function(data) {
                    var array = $.map(data,function(row){
                            return {
                                value:row.hipernim,
                                id:row.id_hipernim,
                                label:row.hipernim,
                                hipernim:row.hipernim,
                                desc_hipernim:row.desc_hipernim
                            }
                        })

                        response($.ui.autocomplete.filter(array,request.term).slice(0,5));
                }
            )
               
            },
            minLength:1,
            delay:500,
            select:function(event,ui){
                $('#hipernim').val(ui.item.hipernim)
                $('#desc_hipernim').val(ui.item.desc_hipernim)
                $('#id_hipernim').val(ui.item.id)
                simpanId = ui.item.id
            }
        })
    });

    class Classhipernim{
        constructor(id,hipernim,desc_hipernim){
            this.id = id;
            this.hipernim = hipernim;
            this.desc_hipernim = desc_hipernim;
        }
    }

    // simpan
    $('#simpan').click(function(){
            console.log("tes2");
            fd.append('nama',$(katabaru).val());
            fd.append('desc',$(descbaru).val());
            // fd.append('hipernim[]',hipernims);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name-csrf-token]').attr('content') },
                url: '/api/savekb',
                method: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) { 

                }
        })

    });

    
    </script>
@endsection
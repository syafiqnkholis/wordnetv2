@extends('baselayout')
@section('title', '- Tambah Kata Benda')
@section('baruStatus', 'active')
@section('content')

    <div class="row kblayout">
    
        <!-- <div class="col-md-3 wrapper">
            <div class="mt-3 ml-5 kolomkata">
                            <div class="form-group">
                                pilih kata
                                <input type="text" class="form-control mb-2 search" placeholder="&#xF002; cari">
                            
                                <select multiple class="form-control search" id="listkata" style="height:300px">
                                
                                </select>
                            </div>
                            <div id="hasilkata">

                            </div>
                    </div>
        </div> -->
        <!-- konten tengah  =============================================== --> 
        
        <div class="col-md-8" >
            <h4 style="color: #fff;" >KATA BENDA</h4>
            <div class="row mt-4">
                <div class=" col-md-4" >
                    <h6 style="color: #fff;">kata baru</h6>
                    <input id="katabaru" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;">  
                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorKata" hidden="true"> Tidak boleh kosong </p>       
                </div>
                <div class="col-md-4">
                <h6 style="color: #fff;">Deskripsi</h6>
                    <textarea id="descbaru" class="form-control" rows="1" ></textarea>
                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorDesc" hidden="true"> Tidak boleh kosong </p>       
                </div>
                <div class="col-md-4">
                <h6 style="color: #fff;">Kategori</h6>
                <select name="id_kategori" class="form-control ">
                @foreach($kategori as $kategori)
                    <option value="{{$kategori->id_kategori}}" >{{$kategori -> nama_kategori}}</option>
                @endforeach
                </select>
                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorDesc" hidden="true"> Tidak boleh kosong </p>       
                </div>
            </div>    

            <!-- susunan hipernim ================================================ -->
            <div class="row" >
                <div class="col-md-12">
                    <h6 style="color: #fff;"> masukkan hipernim <h6>
                    <div id="listContainer" class="col-md-12 mt-2" >
                    </div>
                    <div class="card mb-3">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-check" id="tambahh">
                                    <input type="text" class="form-control" id="hipernim" placeholder="tambah hipernim"/>
                                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorHipernim" hidden="true"> Tidak boleh kosong </p>       
                                </div>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="deskripsi" rows="1" placeholder="tambah hipernim"></textarea>
                                <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorDescHipernim" hidden="true"> Tidak boleh kosong </p>       
                            </div>
                            <div class="col-md-2">
                                <div col-md-6>
                                <button type="button" id="btnOk" class="btn btn-success " style="width: 80px;">ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- susunan hipernim ================================================ -->
            <div class="mb-6" style="float:right; margin-bottom:60px    ">
                <button onclick="window.location.href='/kktable'" type="button" class="btn btn-danger mt-2 col-md-6" style="width: 80px;">batal</button>
                <button type="button" class="btn btn-success mt-2 col-md-6" id="simpan" style="width: 80px;">simpan</button>
            </div>
        </div>   
    </div>
    <script>
        var hipernims=[];
        var fd= new FormData();
        var simpanId =0;

        $('#listkata').on('change', function(){
            $('#editkata').val(this.value);
        });
        $('#tambahh').on('change', function(){
            $('#tambahh input[type=text]').prop('disabled',false);
            $('#pilihh input[type=text]').prop('disabled',true);
            $('#deskripsi').prop('disabled',false);
        });
        $('#pilihh').on('change', function(){
            $('#tambahh input[type=text]').prop('disabled',true);
            $('#pilihh input[type=text]').prop('disabled',false);
            $('#deskripsi').prop('disabled',true);
        });

    // ketika klik ok
        $currentKedalaman = 0;
        
        $('#btnOk').click(function(){
            $hipernim = $('#hipernim').val();
            $deskripsi = $('#deskripsi').val();
            $('#errorHipernim').attr("hidden", true);
            $('#errorDescHipernim').attr("hidden", true);

            if($hipernim != "" && $deskripsi != ""){
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
            } else {
                if($hipernim == "") $('#errorHipernim').attr("hidden", false);
                if($deskripsi == "") $('#errorDescHipernim').attr("hidden", false);
            }
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
    // //search kata
    // $('.search').on('input', function(){
    //     $.get('/api/pencarian/noun', 
    //         { "searchnoun": $(this).val() },
    //         function(data) {
    //             console.log("tes");
    //             $("#listkata").html("");
    //             $.each(data, function(i,kb){
    //                 $("#listkata").append('<option value='+kb['id_kb']+'>'+kb['nama_kb']+'</option>');
    //             });
    //         }
    //     )
    // });
    
    // search hipernim
    $(function () {
        $('#hipernim').autocomplete({
            position: { my : "left top", at: "left bottom" },
            source:function(request,response){
                $.get('/hipernim', 
                { "searchhipernim": request.term },
                function(data) {
                    $.each(data, function(i,kb){
                        $("#listkata").append('<option value='+kb['id_kb']+'>'+kb['nama_kb']+'</option>');
                    });
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
                $('#deskripsi').val(ui.item.desc_hipernim)
                simpanId = ui.item.id
                console.log(ui.item.id)
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
        $('#errorKata').attr("hidden", true);
        $('#errorDesc').attr("hidden", true);
        if($(katabaru).val() != "" && $(descbaru).val() != ""){
            fd.append('nama',$(katabaru).val());
            fd.append('desc',$(descbaru).val());

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name-csrf-token]').attr('content') },
                url: '/api/savekk',
                method: "post",
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) { 

                }
            })
            window.location.href='/kktable'
        } else {
            if($(katabaru).val() == "") $('#errorKata').attr("hidden", false);
            if($(descbaru).val() == "") $('#errorDesc').attr("hidden", false);
        }
    });

    //sweet alert berhasil disimpan    
    </script>
@endsection

@section("footer")
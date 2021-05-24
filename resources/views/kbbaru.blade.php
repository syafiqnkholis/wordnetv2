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
        <h4>KATA BENDA BARU</h4>
            <div class="row mt-3 mb-1 ml-1">
                <div class=" col-md-4" >
                    kata baru
                    <input id="katabaru" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;">  
                </div>
                <div class="col-md-4">
                    deskripsi
                    <textarea id="descbaru" class="form-control" rows="1" ></textarea>
                </div>
            </div>    

            <!-- susunan hipernim ================================================ -->
            <div class="row  ml-1" >
                <div class="col-md-12">
                    masukkan hipernim
                    <div id="listContainer" class="col-md-12 mt-2" >
                    </div>
                    <div class="mb-3">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-check" id="tambahh">
                                        <input type="text" class="form-control" id="hipernim" placeholder="tambah hipernim"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="deskripsi" rows="1"></textarea>
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
            <div class="mb-6" style="float:right;">
                <button type="button" class="btn btn-danger mt-2 col-md-6" style="width: 80px;">batal</button>
                <button type="button" class="btn btn-success mt-2 col-md-6" id="simpan" style="width: 80px;">simpan</button>
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

            $currentKedalaman++;
            $('#listContainer').append(`
            <div id="hipernim`+$currentKedalaman+`">
                <p>hipernim `+$currentKedalaman+`</p>
                <div class=" mb-2 row" style="padding-left: 5px;">    
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
    //search kata
        $('.search').on('input', function(){
            $.get('/api/pencarian/noun', 
                { "searchnoun": $(this).val() },
                function(data) {
                    console.log("tes");
                    $("#listkata").html("");
                    $.each(data, function(i,kb){
                        $("#listkata").append('<option value='+kb['id_kb']+'>'+kb['nama_kb']+'</option>');
                    });
                }
            )
        });
    
    // search hipernim
    $(function () {
        $('#hipernim').autocomplete({
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

                        response($.ui.autocomplete.filter(array,request.term));
                }
            )
                // $.getJSON('/hipernim?'+request.term,function(data){
                //         var array = $.map(data,function(row){
                //             return {
                //                 value:row.id,
                //                 label:row.name,
                //                 name:row.name,
                //                 buy_rate:row.buy_rate,
                //                 sale_price:row.sale_price
                //             }
                //         })

                //         response($.ui.autocomplete.filter(array,request.term));
                // })
            },
            minLength:1,
            delay:500,
            select:function(event,ui){
                $('#hipernim').val(ui.item.hipernim)
                $('#deskripsi').val(ui.item.desc_hipernim)
                simpanId = ui.item.id
                console.log(ui.item.id)
                // $('#buy_rate').val(ui.item.buy_rate)
                // $('#sale_price').val(ui.item.sale_price)
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

        // $.post('/api/savekb', 
        //         fd,
        //         function(data) {
        //             console.log("tes");
        //             $("#listkata").html("");
        //             $.each(data, function(i,kb){
        //                 $("#listkata").append('<option value='+kb['id_kb']+'>'+kb['nama_kb']+'</option>');
        //             });
        //         },
        //         'application/json'
        //     )   
    });
    
    </script>
@endsection

@section("footer")
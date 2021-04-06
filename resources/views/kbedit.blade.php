@extends('baselayout')
@section('title', '- Edit Kata Benda')
@section('content')
        <div class="row">
        <div class="col-md-3 wrapper">
        @include('sidelayout')
        </div>

        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 wrapper">
            <div class="row">
                <div class=" col-md-6" >
                    Edit kata
                    <input id="editkata" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;">  
                </div>
                <div class="col-md-6">
                    Edit deskripsi
                    <textarea id="desc" class="form-control" rows="1" ></textarea>
                </div>
            </div>   

            <!-- susunan hipernim ================================================ -->
            <div class="row mt-3" >
                <div class="col-md-12">
                    Ubah susunan hipernim
                    <!-- susunan hipernim / row =================================== -->
                    <div>
                        
                        <div class="row" >
                        <div class="col-md-12">
                            <div id="listContainer" class="col-md-12 mt-1" >
                            </div>
                                <div id="containerHipernim">
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
                
            </div>
            <!-- susunan hipernim ================================================ -->
            <div style="float:right;">
                <button type="button" class="btn btn-danger mt-2 col-md-6" style="width: 80px;">batal</button>
                <button type="button" class="btn btn-success mt-2 col-md-6" style="width: 80px;">simpan</button>
            </div>
        </div>


        <!-- konten samping kanan =============================================== -->
        <div class="col-md-3 wrapper">
            <div class=" mt-2">
            Kelola hipernim
                <div class="isihip" style="width: 95%;" >
                    <div class="ml-2" id="tambahHipernim">
                        <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> 
                        tambah hipernim</br>
                            masukkan hipernim
                            <input type="text" class="form-control mb-1" style="width: 95%;" disabled>
                            masukkan deskripsi
                            <input type="text" class="form-control mb-1" style="width: 95%;" disabled>
                    </div>
                    <br>
                    <div class="ml-2" id="pilihHipernim">
                        <input type="radio" name="exampleRadios" id="exampleRadios2" value="option1" checked>
                        pilih hipernim</br>
                            masukkan hipernim
                            <input type="text" class="form-control mb-1" style="width: 95%;" >
                            masukkan deskripsi
                            <input type="text" class="form-control mb-1" style="width: 95%;" >
                    </div></br>
                    <div class="ml-2">
                            pilih kondisi
                            <input type="text" class="form-control mb-1" style="width: 95%;">
                    </div>
                    <div style="float:right;">
                <button type="button" class="btn btn-danger mt-2 col-md-6" style="width: 80px;">batal</button>
                <button type="button" class="btn btn-success mt-2 col-md-6" style="width: 80px;">simpan</button>
            </div>
                </div>
            </div>

        </div>
        </div>
    <script>
        //list kata muncul di kolom edit
        $('#listkata').on('change', function(){
            var idNoun = this.value;
            $.get('/api/noun', 
                { "id_kb": idNoun },
                function(data) {
                    $("#editkata").val(data['nama_kb']);
                    $("#desc").val(data['desc_kb']);
                    $.each(data['relations'], function(i,hipernim){
                      var hipernimItem = `
                       <div class="row isihip"> 
                            <div class="col-md-10">
                                <div id="tambahh isihip">
                                        `+hipernim['hipernim'].hipernim+`</br>
                                        ➨ <span class="ml-3"> `+hipernim['hipernim'].desc_hipernim+` <span>
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                <div col-md-6>
                                <button type="button" id="btnOk" class="btn btn-success " style="width: 80px;">edit</button>
                                </div>
                            </div>
                        </div>
                       `;
                       $("#containerHipernim").append(hipernimItem);
                    });
                }
            )
        });
        //radio button salah satu disable
        $('#exampleRadios1').on('change', function(){
            $('#tambahHipernim input[type=text]').prop('disabled',false);
            $('#pilihHipernim input[type=text]').prop('disabled',true);
        });
        $('#exampleRadios2').on('change', function(){
            $('#tambahHipernim input[type=text]').prop('disabled',true);
            $('#pilihHipernim input[type=text]').prop('disabled',false);
        });
        //opacity naik
        // $('.search').on('focus',function(){
        //     $isFocused = $(this).is(":focus");
        //     console.log($isFocused);
        //     $(this).css("opacity","1");
        // });
    
        // $('.search').on('focusout',function(){
        //     $isFocused = $(this).is(":focus");
        //     $(this).css("opacity","0.5");
        // });

        // search
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
        
    </script>
@endsection
@extends('baselayout')
@section('title', '- Edit Kata Benda')
@section('editStatus', 'active')
@section('content')

        <!-- modal sweet alert -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        ...
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dbtn-efault" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" id="btn-ok">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal hipernim baru -->
        <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        <div class="row kblayout">
        <!-- <div class="col-md-3">
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

        <div class="col-md-8 ">
            <h4 style="color: #fff;" >KELOLA KATA BENDA</h4>
            <div class="row flex-row">
                <!-- <div class="col-md-4">
                    pilih kata
                    <input type="text" class="form-control mb-2 search" placeholder="&#xF002; cari">
                    <select id="listkata"></select>
                </div> -->
                <div class="col-md-4" >
                <h6 style="color: #fff;">Edit Kata</h6>
                    <input id="editkata" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;">  
                </div>
                <div class="col-md-8">
                <h6 style="color: #fff;">Edit Deskripsi</h6>
                    <textarea id="desc" class="form-control" rows="1" ></textarea>
                </div>
            </div>   

            <!-- susunan hipernim ================================================ -->
            <div class="card mt-3" >
                <div class="col-md-12">
                    Pengaturan hipernim
                    <button type="button" class="btn btn-success col-md-6 ml-2 mb-2 mr-2" id="buatbaru" style="width: 100px;">
                    Buat Baru
                    </button>
                    <!-- susunan hipernim / row =================================== -->
                    <table id="kbedittabel" class="table-hipernim">                        
                    </table>
                    <!-- <table class="table-hipernim">
                    <tr>
                        <td colspan="3">
                            <div class="row">
                            <div class=" col-md-3" >
                                Edit kata
                                <input id="editkata" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;">  
                            </div>
                            <div class="col-md-6">
                                Edit deskripsi
                                <textarea id="desc" class="form-control" rows="1" ></textarea>
                            </div>
                            <div class="col-md-3 mt-3 row">
                                    <button class="btn btn-danger col-md-6 ">
                                    hapus
                                    </button>
                                    <button class="btn btn-success col-md-6">
                                    simpan
                                    </button>
                                
                            </div>
                        </td>
                    </tr>
                    </table> -->
                </div>
                
            </div>
            <!-- susunan hipernim ================================================ -->
            <div style="float:right; margin-bottom:60px">
                <button  onclick="window.location.href='/kbtable'" type="button" class="btn btn-danger mt-2 col-md-6" style="width: 80px;">batal</button>
                <button type="button" class="btn btn-success mt-2 col-md-6" style="width: 80px;">simpan</button>
            </div>
        </div>


        <!-- konten samping kanan =============================================== -->
        <div class="col-md-3">
            </div>
            <!-- <div class=" mt-3">
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
            </div> -->
        </div>

    </div>
    <script>
        $(document).ready( function () {
            const urlParams = new URLSearchParams(window.location.search);
            const idNoun  = urlParams.get('id');
            fillValues(idNoun)
        } );

        //list kata muncul di kolom edit
        $('#listkata').on('change', function(){
            var idNoun = this.value;
            fillValues(idNoun);
        });

        function fillValues(idNoun){
            
            $.get('/api/noun', 
                { "id_kb": idNoun },
                function(data) {
                    $("#kbedittabel > tr").remove()
                    var hipernimItem = ""
                    $("#editkata").val(data['nama_kb']);
                    $("#desc").val(data['desc_kb']);
                    $.each(data['relations'], function(i,hipernim){
                        hipernimItem = `
                        <tr>
                                <td>  `+hipernim['kedalaman']+`</td>
                                <td>  `+hipernim['hipernim'].hipernim+`</br>
                                ➨  `+hipernim['hipernim'].desc_hipernim+`
                                </td>
                                <td style="text-align: center;">
                                <button class="btn" >
                                    <i class="fas fa-trash-alt mt-1 mb-1" style="color: #000;" data-target='#confirm-delete'></i>
                                </button>
                                </td>
                            </tr>
                        
                        `;
                        $("#kbedittabel").append(hipernimItem);
                    });
                }
            )
        }

        //radio button salah satu disable
        $('#exampleRadios1').on('change', function(){
            $('#tambahHipernim input[type=text]').prop('disabled',false);
            $('#pilihHipernim input[type=text]').prop('disabled',true);
        });
        $('#exampleRadios2').on('change', function(){
            $('#tambahHipernim input[type=text]').prop('disabled',true);
            $('#pilihHipernim input[type=text]').prop('disabled',false);
        });

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
        
        //konten sideright
        function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block";  
        }

        $('#buatbaru').click(function(){
            $(this).append('<td></td>');
        });

        //modal delete hipernim
        $('#confirm-delete').on('click',function(){
            console.log('teeeeeeeeeees');
        });

        $('#confirm-delete').on('show.bs.modal', function(e) {
        console.log("show1",e);
        $(this).find('#btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('#btn-ok').on('click', function() {
            $.get($(e.relatedTarget).data('href'),
                function(data) {
                    $('#myTable').DataTable().ajax.reload()
                    $('#confirm-delete').modal('hide');
                    Swal.fire({
                        title: 'Success!',
                        text: 'Berhasil dihapus!',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                })
        })
    });
    
    $('#confirm-delete').on('hide.bs.modal', function(e) {
        $(this).find('#btn-ok').off('click');
    });

    //modal hipernim baru
    
    </script>
@endsection
@extends('baselayout')
@section('title', '- Kata Kerja')
@section('editStatus', 'active')
@section('content')
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Hapus kata kerja
            </div>
            <div class="modal-body">
                Apakah anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dbtn-efault" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" id="btn-ok">Hapus</button>
            </div>
        </div>
    </div>
</div>
<div class="row kblayout pagesize">
    <!-- konten tengah  =============================================== -->
    <div class="col-md-8 ">
        <div class="row">
            <h4 class="col-md-3" style="color: #fff;">TABEL KATA KERJA</h4>
            <a href="/kkbaru" type="button" class="btn btn-success mt-2 col-md-2" style="width: 80px; color:#fff">Buat baru</a>
        </div>
        <!-- susunan hipernim ================================================ -->
        <div class="row mt-3" style="margin-bottom: 100px;">
            <div class="card col-md-12">
                <!-- susunan hipernim / row =================================== -->
                <table id="myTable" class="table table-striped">
                    <thead class="thead-light">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Pengaturan</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>


            </div>

        </div>
        <!-- susunan hipernim ================================================ -->
    </div>


    <!-- konten samping kanan =============================================== -->
    <div class="col-md-3" style="margin-bottom: 60px;">
        <div class="row" style="margin-top:56px">
            <!-- <input type="text" class="form-control mb-2 search col-md-7 ml-2 mt-2" placeholder="&#xF002; cari">
                <button class="btn btn-success col-md-4 mt-2 ml-1" style="height: 32px;">
                    Preview
                </button> -->
            <div class="card ml-3 w-100" id="resultContainer" style="color:black; height:445px; overflow-y:auto">
                <tr>
                    Belum ada Informasi
                </tr>
            </div>
        </div>
    </div>

</div>

<script>
    //list kata muncul di kolom edit
    var idVerb = this.value;
    $.get('/api/verb', {
            "id_kk": idVerb
        },
        function(data) {
            $("#Mytabel > tr").remove()
            var hipernimItem = ""
            $("#kata").val(data['nama_kk']);
            $("#desc").val(data['desc_kk']);
        }
    )
    var table = $('#myTable').DataTable({
        "columnDefs": [
        { "width": "20%", "targets": 3 }
        ],
        
        "autoWidth": false,
        lengthMenu: [5, 10, 20, 50, 100, 200, 500],
        // "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": false,
        "paging": true,
        dom: "fltip",
        "pagingType": "full_numbers",
        "ajax": {
            "url": "/api/tampilkk",
            "type": "POST",
            "data": {
                // id_expediente: $("#expedientes").val()
            },
        },
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
            $('td:eq(3)', nRow).append(
                // "<a onClick=\"javascript: return confirm('please confirm');\" href='/api/hapuskk/"+aData['id_kk']+"'><i class='fas fa-trash-alt ml-2'></i></a>"+
                "<button class='btn btn-default' data-href='/api/hapuskk/" + aData['id_kk'] + "' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></button>" +
                "<a class='btn btn-default' href='/kkedit/" + aData['id_kk'] + "'><i class='fas fa-cog'></i></a>" +
                "<button class='btn btn-default btn-show' data-id='" + aData['id_kk'] + "'><i class='fas fa-info-circle'></i></button>"
                // "<i class='info fas fa-info-circle ml-2' data-id='" + aData['id_kk'] + "'></i> "
            );
        },
        "columns": [{
                "data": "id_kk"
            },
            {
                "data": "nama_kk"
            },
            {
                "data": "desc_kk"
            },
            {
                "data": null,
                "defaultContent": ""
            },
        ],

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


    $('#myTable tbody').on('click', '.btn-show', function(){
        $.get('/api/verb', 
        { "id_kk": $(this).data('id') },
        function(data) {
            $("#resultContainer").html("");
                var relationElement = "";
                $.each(data['relations'], function(i,relation){
                    relationElement += `
                    `+relation['hipernim'].hipernim_kk+`</br>
                    <div style="padding-left:7%;">
                        ➨ `+relation['hipernim'].desc_hipernim_kk+`<br></div>
                    `
                    });
                var element = `
                <div class="ml-1 result" style="z-index:0;font-size: 12px;">
                    <h6>`+data['nama_kk']+`</h6>
                    <p>`+data['desc_kk']+`</p>
                    <div class=" mb-2" >
                    `
                    +relationElement+
                    `
                    </div>
                </div>
                `;
                $("#resultContainer").append(element);
                // console.log(kk);
        
        }
        )
    });

</script>
@endsection
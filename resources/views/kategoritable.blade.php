@extends('baselayout')
@section('title', '- tabel kata kerja')
@section('editStatus', 'active')
@section('content')
<!-- Modal membuat kategori baru -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ action('KategoriController@createKategori') }}">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">BUAT KATEGORI</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <div class=" col-md-8">
                    <h6">Kategori baru</h6>
                    <input id="katabaru" name="kategori" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;" required>
                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorKata" hidden="true"> Tidak boleh kosong </p>       
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit    " class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal mengedit kategori -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ action('KategoriController@createKategori') }}">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT KATEGORI</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <div class=" col-md-8">
                    <h6">Kategori baru</h6>
                    <input id="old_category" name="kategori" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 100%;">
                    <p style="margin-left:6%; font-size:12px; color:#FF1C1C; font-weight: bold" id="errorKata" hidden="true"> Tidak boleh kosong </p>       
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnUpdate">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Hapus tabel
            </div>
            <div class="modal-body">
                Apakah anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dbtn-efault" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" id="btn-ok">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="row kblayout">
    <!-- konten tengah  =============================================== -->
    <div class="col-md-8 ">
        <div class="row">
            <h4 class="col-md-3" style="color: #fff;">TABEL KATEGORI</h4>
            <button href="/kkbaru" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success mt-2 col-md-2" style="width: 80px; color:#fff">Buat baru</a>
        </div>
        <!-- susunan hipernim ================================================ -->
        <div class="row mt-3" style="margin-bottom: 100px;">
            <div class="card col-md-12">
                <!-- susunan hipernim / row =================================== -->
                <table id="myTable" class="table table-striped">
                    <thead class="thead-light">
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>setting</th>
                    </thead>
                    <tbody>
                    @foreach($kategori as $cat)
                        <tr>
                            <td>{{$cat->id_kategori}}</td>
                            <td>{{$cat->nama_kategori}}</td>
                            <td>
                            <button class='btn btn-default' data-href='/api/hapuskategori/{{$cat->id_kategori}}' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></button>
                            <button class='btn btn-default' data-id='{{$cat->id_kategori}}' data-name="{{$cat->nama_kategori}}" data-toggle='modal' data-target='#modaledit'><i class='fas fa-cog'></i></button>
                            </td>
                        </tr>
                    @endforeach
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
        </div>
    </div>

</div>

<script>
    //list kata muncul di kolom edit
    // var idNoun = this.value;
    // $.get('/api/noun', {
    //         "id_kb": idNoun
    //     },
    //     function(data) {
    //         $("#Mytabel > tr").remove()
    //         var hipernimItem = ""
    //         $("#kata").val(data['nama_kb']);
    //         $("#desc").val(data['desc_kb']);
    //     }
    // )
    var table = $('#myTable').DataTable({
        // "columnDefs": [
        // { "width": "20%", "targets": 3 }
        // ],
        
        "autoWidth": true,
        lengthMenu: [5, 10, 20, 50, 100, 200, 500],
        // "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": false,
        "paging": true,
        dom: "fltip",
        "pagingType": "full_numbers",
        // "ajax": {
        //     "url": "/api/tampilkb",
        //     "type": "POST",
        //     "data": {
        //         // id_expediente: $("#expedientes").val()
        //     },
        // },
        // "fnCreatedRow": function(nRow, aData, iDataIndex) {
        //     $('td:eq(3)', nRow).append(
        //         // "<a onClick=\"javascript: return confirm('please confirm');\" href='/api/hapuskb/"+aData['id_kb']+"'><i class='fas fa-trash-alt ml-2'></i></a>"+
        //         "<button class='btn btn-default' data-href='/api/hapuskb/" + aData['id_kb'] + "' data-toggle='modal' data-target='#confirm-delete'><i class='fas fa-trash-alt'></i></button>" +
        //         "<a class='btn btn-default' href='/kbedit?id=" + aData['id_kb'] + "'><i class='fas fa-cog'></i></a>" +
        //         "<button class='btn btn-default btn-show' data-id='" + aData['id_kb'] + "'><i class='fas fa-info-circle'></i></button>"
        //         // "<i class='info fas fa-info-circle ml-2' data-id='" + aData['id_kb'] + "'></i> "
        //     );
        // },
        // "columns": [{
        //         "data": "id_kb"
        //     },
        //     {
        //         "data": "nama_kb"
        //     },
        //     {
        //         "data": "desc_kb"
        //     },
        //     {
        //         "data": null,
        //         "defaultContent": ""
        //     },
        // ],

    });

    $('#modaledit').on('show.bs.modal', function(e) {
        const oldCategory = $(e.relatedTarget).data('name');
        const id = $(e.relatedTarget).data('id');
        $('#old_category').val(oldCategory); //menampilkan category lama

        $(this).find('#btnUpdate').on('click', function() {
        const newCategory = $('#old_category').val();
            $.get("/api/editkategori/"+id,
            { "category_name": newCategory },
                function(data) {
                    $('#modaledit').modal('hide');
                    if(data['code'] == 200){
                        Swal.fire({
                            title: 'Success!',
                            text: 'Berhasil dihapus!',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then(function() {
                            window.location.href = '/kategoritable';
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Kategori digunakan!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                })
        })
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        console.log("show1",e);
        $(this).find('#btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('#btn-ok').on('click', function() {
            $.get($(e.relatedTarget).data('href'),
                function(data) {
                    $('#confirm-delete').modal('hide');
                    if(data['code'] == 200){
                        Swal.fire({
                            title: 'Success!',
                            text: 'Berhasil dihapus!',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then(function() {
                            window.location.href = '/kategoritable';
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Kategori digunakan!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                })
        })
    });
    
    $('#confirm-delete').on('hide.bs.modal', function(e) {
        $(this).find('#btn-ok').off('click');
    });


    $('#myTable tbody').on('click', '.btn-show', function(){
        $.get('/api/noun', 
        { "id_kb": $(this).data('id') },
        function(data) {
            $("#resultContainer").html("");
                var relationElement = "";
                $.each(data['relations'], function(i,relation){
                    relationElement += `
                    `+relation['hipernim'].hipernim+`</br>
                    <div style="padding-left:7%;">
                        ➨ `+relation['hipernim'].desc_hipernim+`<br></div>
                    `
                    });
                var element = `
                <div class="ml-1 result" style="z-index:0;font-size: 12px;">
                    <h6>`+data['nama_kb']+`</h6>
                    <p>`+data['desc_kb']+`</p>
                    <div class=" mb-2" >
                    `
                    +relationElement+
                    `
                    </div>
                </div>
                `;
                $("#resultContainer").append(element);
                console.log(kb);
        
        }
        )
    });

</script>
@endsection
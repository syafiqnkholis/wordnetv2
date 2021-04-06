@extends('baselayout')
@section('title', '- Tambah Kata Benda')
@section('content')

    <div class="row">
    
        <div class="col-md-3 wrapper">
            @include('sidelayout')
        </div>
        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 wrapper">
            <div class="row">
                <div class="col-md-12 mt-2" >
                    masukkan kata
                    <input type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 40%;">
                    masukkan deskripsi kata
                    
                    <input type="text" class="form-control" placeholder="deskripsi">
                </div>
            </div>    
            <br>

            <!-- susunan hipernim ================================================ -->
            <div class="row isihip" >
                <div class="col-md-12">
                    masukkan hipernim
                    <div id="listContainer" class="col-md-12 mt-2" >
                    </div>
                    <div>
                        pilih hipernim
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-check" id="tambahh" style="margin-top: 5px;">
                                    <input class="form-check-input" type="radio" style="margin-top: 12px;" name="exampleRadios"  value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        <input type="text" class="form-control" id="hipernim" placeholder="tambah hipernim"/>
                                    </label>
                                </div>
                                <div class="form-check" id="pilihh" style="margin-top: 5px;">
                                    <input class="form-check-input" type="radio" style="margin-top: 12px;" name="exampleRadios"  value="option1" >
                                    <label class="form-check-label mb-2" for="exampleRadios1">
                                        <input type="text" class="form-control" placeholder="pilih hipernim" disabled>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="col-md-2">
                                <div col-md-6>
                                <button type="button" class="btn btn-danger mb-2" style="width: 80px;">hapus</button>
                                </div>
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
                <button type="button" class="btn btn-success mt-2 col-md-6" style="width: 80px;">simpan</button>
            </div>
    </div>
    <script>
    

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

    // $(document).ready(function(){
        $currentKedalaman = 0;
        
        $('#btnOk').click(function(){
            $hipernim = $('#hipernim').val();
            $deskripsi = $('#deskripsi').val();

            $currentKedalaman++;
            $('#listContainer').append(`
            <div id="hipernim`+$currentKedalaman+`">
                <p>hipernim `+$currentKedalaman+`</p>
                <div class="isihip mb-2 row" style="padding-left: 5px;">    
                    <div class="col-md-10">`+$hipernim+`</br> ➨ `+$deskripsi+`</div>
                    <div class="col-md-2">
                        <button type="button" data-id="`+$currentKedalaman+`" class="btn btn-danger btn-delete mt-2 mb-2" style="width: 80px;">hapus</button>
                    </div>
                </div>
            </div>
            `);
        });
        
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
            $currentKedalaman--;
        });
    // });

    </script>
@endsection

@section("footer")
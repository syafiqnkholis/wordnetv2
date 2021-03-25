@extends('baselayout')
@section('title', '- Edit Kata Benda')
@section('content')
        <div class="row">
        <div class="col-md-3 wrapper">
            <!-- <div class="d-flex" id="wrapper"> -->
                <div class=" border-right" id="sidebar-wrapper">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action font" style="background-color: #00587A;">Tambah hipernim</a>
                        <a href="#" class="list-group-item list-group-item-action font" style="background-color: #0F3057;">Kelola hipernim</a>
                    </div>
                    <br>
                    <div class="kolomkata">
                            <div class="form-group">
                                <label >pilih kata</label>
                                <input type="text" class="form-control mb-2 search" placeholder="search">
                            
                                <select multiple class="form-control search  " id="listkata" style="height:300px";>
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

        <!-- konten tengah  =============================================== --> 

        <div class="col-md-6 wrapper">
            <div class="row">
                <div class="col-md-12 mt-2" >
                    Edit kata
                    <input id="editkata" type="text" class="form-control mb-1" placeholder="masukkan kata" style="width: 40%;">
                    Edit deskripsi
                    
                    <input type="text" class="form-control" placeholder="deskripsi">
                </div>
            </div>   

            <!-- susunan hipernim ================================================ -->
            <div class="row mt-3" >
                <div class="col-md-12">
                    Ubah susunan hipernim
                    <!-- susunan hipernim / row =================================== -->
                    <div>
                        hipernim 1
                        <div class="isihip mb-2" style="padding-left: 5px;">    
                            <tr>
                                <td> Peranti elektronik</td></br>
                                <td> ➨ Perangkat yang mengandung kendali konduksi elektron</td>                      
                            </tr>
                        </div>
                        hipernim 2
                        <div class="isihip mb-2" style="padding-left: 5px;">    
                            <tr>
                                <td> Peranti</td></br>
                                <td> ➨ Suatu alat yang dibutuhkan untuk suatu usaha atau untuk melakukan layanan</td>                      
                            </tr>
                        </div>
                        hipernim 3
                        <div class="isihip mb-2 " style="padding-left: 5px;"> 
                            <div class="row">
                                <div class="col-md-10">
                                <tr>
                                    <td> Instrumentasi</td></br>
                                    <td> ➨ Artefak (atau sistem artefak) yang berperan penting dalam mencapai suatu tujuan</td>                      
                                </tr>
                                </div> 
                                <div class="ol-md-2">
                                <button type="button" class="btn btn-danger mt-3" style="width: 80px;">batal</button>
                                </div> 
                            </div>
                        </div>
                        hipernim 4
                        <div class="isihip mb-2" style="padding-left: 5px;">    
                            <tr>
                                <td> Keseluruhan. satuan</td></br>
                                <td> ➨ Kumpulan bagian yang dianggap sebagai entitas tunggal; "seberapa besar bagian itu dibandingkan dengan keseluruhan?"; "tim adalah unit"</td>                      
                            </tr>
                        </div>
                        hipernim 5
                        <div class="isihip mb-2" style="padding-left: 5px;">    
                            <tr>
                                <td> benda, benda fisik</td></br>
                                <td> ➨ Entitas yang nyata dan terlihat; suatu entitas yang dapat memberikan bayangan; "wadah itu penuh dengan raket, bola dan benda-benda lainnya"</td>                      
                            </tr>
                        </div>
                        hipernim 6
                        <div class="isihip mb-2" style="padding-left: 5px;">    
                            <tr>
                                <td> Wujud fisik</td></br>
                                <td> ➨ Suatu entitas yang memiliki keberadaan fisik</td>                      
                            </tr>
                        </div>
                        hipernim 7
                        <div class="isihip mb-2" style="padding-left: 5px;">    
                            <tr>
                                <td> Benda</td></br>
                                <td> ➨ Apa yang dianggap atau diketahui atau disimpulkan memiliki keberadaannya sendiri yang berbeda (hidup atau tidak hidup)</td>                      
                            </tr>
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
            Edit hipernim
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
            $('#editkata').val(this.value);
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
    </script>
@endsection
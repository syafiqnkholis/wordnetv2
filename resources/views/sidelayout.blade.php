
            <!-- <div class="d-flex" id="wrapper"> -->
            <div class=" border-right" id="sidebar-wrapper">
                    <div class="list-group list-group-flush">
                         <nav class="navbar" style="width:100%; background-color: #0F3057; justify-content:left">
                            <a class="navbar-brand" href="/" style="font-family: times new romance; color:#939698">
                            <img src="https://ugm.ac.id/images/optimasi/ugm_header.png" width="25" height="25" alt="">
                                WordNet UGM
                            </a>
                        </nav>
                        <a href="/kbbaru" class="list-group-item list-group-item-action font @yield('baruStatus')">Kata baru</a>
                        <a href="/kbedit" class="list-group-item list-group-item-action font @yield('editStatus')">Kelola</a>
                    </div>
                    <br>
                    <div class="kolomkata">
                            <div class="form-group">
                                <label >pilih kata</label>
                                <input type="text" class="form-control mb-2 search" placeholder="&#xF002; cari">
                            
                                <select multiple class="form-control search" id="listkata" style="height:300px">
                                <!-- <option>properti</option>
                                <option>meja</option>
                                <option>kursi</option>
                                <option>buku</option>
                                <option>karpet</option> -->
                                </select>
                            </div>
                            <div id="hasilkata">

                            </div>
                    </div>
                </div>
<script>
//kolom opacity
// $('.search').on('focus',function(){
//             $isFocused = $(this).is(":focus");
//             console.log($isFocused);
//             $(this).css("opacity","1");
//         });
    
//         $('.search').on('focusout',function(){
//             $isFocused = $(this).is(":focus");
//             $(this).css("opacity","0.5");
//         });
//search
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
</script>
                
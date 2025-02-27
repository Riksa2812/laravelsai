    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Pendukung" tambah="true" :thead="array('Kode','Nama','Tgl Input','Action')" :thwidth="array(15,75,0,10)" :thclass="array('','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <div class="row mb-1">
                                    <div class="col-lg-3 col-sm-12">
                                        <label for="kode_dash">Kode</label>
                                        <input class='form-control' type="text" id="kode_dash" name="kode_dash" required> 
                                    </div>
                                    <div class="col-lg-9 col-sm-12">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" id="nama" name="nama" required></input>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-sm-12 div-kode_fs">
                                        <label for="kode_fs">Kode FS</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_fs" readonly="readonly" title=""></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_fs" id="kode_fs" name="kode_fs" value="" title="">
                                            <span class="info-name_kode_fs hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_fs"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 nav-grid" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Detail</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-grid" role="tabpanel">
                                <div class='col-xs-12 nav-control'>
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-1"></span>
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu dropdown-import" aria-labelledby="dropdown-import" x-placement="bottom-start" >
                                            <a class="dropdown-item" href="{{ config('api.url').'toko-auth/storage/template_upload_jurnal_esaku.xlsx' }}" target='_blank' id="download-template" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                        </div>
                                    </div>
                                    <a class="total-row"><span id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12 px-0 py-0 mx-0 my-0' id='sai-input-grid' style='min-height:420px;'>
                                    <table class="table table-bordered table-condensed gridexample table-grid" id="input-grid">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:2%; text-align:center;">No</th>
                                                <th style="width:3%; text-align:center;"></th>
                                                <th style="width:25%; text-align:center;">Kode Neraca</th>
                                                <th style="width:35%; text-align:center;">Nama Neraca</th>
                                                <th style="width:35%; text-align:center;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->
    
    @include('modal_upload')
    
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    // DEFAULT SETTING //
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $dtkode_pp = [];
    var $dtkode_neraca = [];
    var $dtkode_fs = [];
    var $noBukti = null;
    var $periode = null;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    // END DEFAULT SETTING //

    // FORM SETTINGS//

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    $('.selectize').selectize(); 
    // END FORM SETTINGS //

    // FUNCTION HELPERS //

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }
    // END FUNCTION HELPERS //

    function getDataTypeAhead(url,param,kode){
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode),name:result.daftar[i].nama}));  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/dash-ypt/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getDataTypeAhead("{{ url('dash-ypt-master/fs') }}","kode_fs","kode_fs");

    function getNeraca(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/dash-ypt-trans/pendukung-neraca') }}",
            dataType: 'json',
            data:{kode_neraca:id},
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                        }else{

                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-neraca').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.daftar.status && result.daftar.message == 'Unauthorized'){
                        window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode neraca tidak valid');
                    }
                }
            }
        });
    }

    function getFS(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/dash-ypt-master/fs') }}/"+ kode,
            dataType: 'json',
            async:false,
            success:function(result){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                        }else{
                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-fs').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                }
                else if(!result.daftar.status && result.daftar.message == 'Unauthorized'){
                        window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode PP tidak valid');
                    }
                }
            }
        });
    }
    // END FUNCTION GET DATA //

    // EVENT ACTION //
    $('#kode,#nama,#kode_fs').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode','nama','kode_fs'];
        if (code == 13 || code == 40) { // 13 = Enter 40 = Arrow Down 38 = Up Arrow
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }
    // END EVENT ACTION //

    // DATATABLE FUNCTION //
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-data",
        "{{ url('dash-ypt-trans/pendukung') }}", 
        [
            {
                "targets": [2],
                "visible": false,
                "searchable": false
            },
            {'targets': 3, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'kode_dash' },
            { data: 'nama'},
            { data: 'tgl_input' }
        ],
        "{{ url('dash-ypt/sesi-habis') }}",
        [[2 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END DATATABLE FUNCTION //

    // ACTION BUTTON FORM //
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('.information').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Pendukung');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-grid tbody').html('');
        $('#saku-datatable').hide();
        $('#informasi').hide();
        $('#saku-form').show();
        
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        setHeightForm();
        addRowGrid("dua");
    });

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    
    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'kode_fs' :
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('dash-ypt-master/fs') }}",
                    columns : [
                        { data: 'kode_fs' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar FS",
                    pilih : "fs",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                };
            break;
        }
        showInpFilterBSheet(settings);
    });

    $('#input-grid').on('click', '.search-item', function(){
        var id = $(this).closest('td').find('input').attr('name');
        console.log(id);
        switch(id){
            case 'kode_neraca[]' :
                var tmp = $(this).closest('tr').find('input[name="kode_neraca[]"]').attr('class');
                var tmp2 = tmp.split(" ");
                target1 = tmp2[2];
                
                tmp = $(this).closest('tr').find('input[name="nama_neraca[]"]').attr('class');
                tmp2 = tmp.split(" ");
                target2 = tmp2[2];

                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('dash-ypt-trans/pendukung-neraca') }}",
                    columns : [
                        { data: 'kode_neraca' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Unit",
                    pilih : "unit",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    parameter: {kode_fs:$('#kode_fs').val()},
                    width : ["30%","70%"],
                };
            break;
        }
        showInpFilterBSheet(settings);
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    
    // END ACTION BUTTON FORM //

    // GRID EVENT ACTION //
    function addRowGrid(param) {
        if(param == "copy"){
            var kode_neraca = $('#input-grid tbody tr.selected-row').find(".inp-kode").val();
            var nama_neraca = $('#input-grid tbody tr.selected-row').find(".inp-nama").val();
            var keterangan = $('#input-grid tbody tr.selected-row').find(".inp-keterangan").val();
        }else{
            var kode_neraca = "";
            var nama_neraca = "";
            var keterangan = "";
        }

        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='text-center'><span class='no-grid'>"+no+"</span><input type='hidden' class='no-grid' name='no_urut[]' value='"+no+"'></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode tdneracake"+no+" tooltip-span'>"+kode_neraca+"</span><input autocomplete='off' type='text' name='kode_neraca[]' class='form-control inp-kode neracake"+no+" hidden' value='"+kode_neraca+"' required='' style='z-index: 1;position: relative;'  id='neracakode"+no+"'><a href='#' class='search-item search-neraca search-neracake"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmneracake"+no+" tooltip-span'>"+nama_neraca+"</span><input autocomplete='off' type='text' name='nama_neraca[]' class='form-control inp-nama nmneracake"+no+" hidden'  value='"+nama_neraca+"' readonly></td>";
        input += "<td><span class='td-keterangan tdketeranganke"+no+" tooltip-span'>"+keterangan+"</span><input autocomplete='off' type='text' name='keterangan[]' class='form-control inp-keterangan keteranganke"+no+" hidden'  value='"+keterangan+"'></td>";
        input += "</tr>";

        $('#input-grid tbody').append(input);
        
        // if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
        // }
        $('#neracakode'+no).typeahead({
            source:$dtkode_neraca,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        if(param == "satu"){

            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-kode").show();
            $('#input-grid tbody tr:last').find(".td-kode").hide();
            $('#input-grid tbody tr:last').find(".search-neraca").show();
            $('#input-grid tbody tr:last').find(".inp-kode").focus();
        } 
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        hitungTotalRow();
        hideUnselectedRow();
    }

    $('#form-tambah').on('click', '.add-row', function(){
        addRowGrid("satu");
    });

    $('#input-grid').on('keydown','.inp-kode, .inp-nama, .inp-keterangan',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-keterangan'];
        var nxt2 = ['.td-kode','.td-nama','.td-keterangan'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-2;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find("span.no-grid").text();
                    var kode = $(this).val();
                    var target1 = "neracake"+noidx;
                    var target2 = "nmneracake"+noidx;
                    var target3 = "";
                    getNeraca(kode,target1,target2,target3,'tab');                    
                    break;
                case 1:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    break;
                case 2:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    var cek = $(this).parents('tr').next('tr').find('.td-kode');
                    if(cek.length > 0){
                        cek.click();
                    }else{
                        $('.add-row').click();
                    }
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_neraca = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_neraca = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var keterangan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-keterangan").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_neraca);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_neraca);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_neraca);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_neraca);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-keterangan").val(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-keterangan").text(keterangan);
                
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-neraca").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-keterangan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-keterangan").show();
                
            }
        })
    }

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('change', '.inp-kode', function(e){
        e.preventDefault();
        console.log('test')
        var noidx =  $(this).parents('tr').find('span.no-grid').text();
        target1 = "neracake"+noidx;
        target2 = "nmneracake"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getNeraca(kode,target1,target2,'','change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Neraca yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
                var kode_neraca = $(this).parents("tr").find(".inp-kode").val();
                var nama_neraca = $(this).parents("tr").find(".inp-nama").val();
                var keterangan = $(this).parents("tr").find(".inp-keterangan").val();
                
                var no = $(this).parents("tr").find("span.no-grid").text();

                $(this).parents("tr").find(".inp-kode").val(kode_neraca);
                $(this).parents("tr").find(".td-kode").text(kode_neraca);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-neraca").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-neraca").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama").val(nama_neraca);
                $(this).parents("tr").find(".td-nama").text(nama_neraca);
                if(idx == 3){
                    
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }

                $(this).parents("tr").find(".inp-keterangan").val(keterangan);
                $(this).parents("tr").find(".td-keterangan").text(keterangan);
                if(idx == 4){
                    
                    $(this).parents("tr").find(".inp-keterangan").show();
                    $(this).parents("tr").find(".td-keterangan").hide();
                    $(this).parents("tr").find(".inp-keterangan").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-keterangan").hide();
                    $(this).parents("tr").find(".td-keterangan").show();
                }
            }
        }
    });

    // COPY ROW //
    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            addRowGrid("copy");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });
    // END COPY ROW //

    // DELETE ROW //
    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('input.no-grid');
            var tdnom = $(this).closest('tr').find('span.no-grid');
            nom.val(no);
            tdnom.html(no);
            no++;
        });
        ;
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    // END DELETE ROW //

    // GRID EVENT ACTION //

    // SUBMIT ACTION //
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_dash:{
                required: true,
                maxlength:10   
            },
            nama:{
                required: true,
                maxlength:50   
            },
            kode_fs:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            var jumdet = $('#input-grid tr').length;

            var param = $('#id').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/dash-ypt-trans/pendukung') }}";
            }else{
                var url = "{{ url('/dash-ypt-trans/pendukung') }}";
            }
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        // alert('Input data '+result.message);
                        if(result.data.status){
                            // location.reload();
                            dataTable.ajax.reload();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Pendukung');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            addRowGrid("dua");
                            
                            msgDialog({
                                id:result.data.kode_dash,
                                type:'simpan'
                            });
                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                        $iconLoad.hide();
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END SUBMIT ACTION //

    // EDIT ACTION //
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#informasi').show();
        $('#judul-form').html('Edit Data Pendukung');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        editData(id);
    });

     $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#informasi').show();
        $('#judul-form').html('Edit Data Pendukung');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id);
    });
    // END EDIT ACTION //

    // BUTTON WITH SWEET ALERT //
     $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    // DELETE ACTION //
    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });
    // END DELETE ACTION //

    // END BUTTON WITH SWEET ALERT //

    // PREVIEW DATA //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 2){
            var id = $(this).closest('tr').find('td').eq(0).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('/dash-ypt-trans/pendukung-detail') }}",
                dataType: 'json',
                data:{kode_dash: id},
                async:false,
                success:function(result){
                    if(result.data.status){
                         var form = result.data.data;
                        var html = `<tr>
                            <td style='border:none'>Kode</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>`+form[0].nama+`</td>
                        </tr>
                        <tr>
                            <td>Kode FS</td>
                            <td>`+form[0].kode_fs+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-ju-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:10%; text-align:center;">No</th>
                                            <th style="width:20%; text-align:center;">Kode Neraca</th>
                                            <th style="width:35%; text-align:center;">Nama Neraca</th>
                                            <th style="width:35%; text-align:center;">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                        
                        $('#table-preview tbody').html(html);
                        var grid = result.data.detail;
                        if(grid.length > 0){
                            var input = '';
                            var no = 1;
                            for(var i=0;i<grid.length;i++){
                                var line =grid[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+line.kode_neraca+"</td>";
                                input += "<td >"+line.nama_neraca+"</td>";
                                input += "<td >"+line.keterangan+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-ju-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                    }
                }
            });
            
        }
    });
    // END PREVIEW DATA //

    // DELETE HANDLER //
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('dash-ypt-trans/pendukung') }}",
            dataType: 'json',
            data:{kode_dash:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Pendukung ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }
    // END DELETE HANDLER //

    // EDIT HANDLER //
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/dash-ypt-trans/pendukung-detail') }}",
            dataType: 'json',
            data:{kode_dash:id},
            async:false,
            success:function(result){
                if(result.data.status) {
                    var form = result.data.data;
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#kode_dash').val(id);
                    $('#nama').val(form[0].nama);
                    $('#kode_fs').val(form[0].kode_fs);
                    var grid = result.data.detail;
                    var input = "";
                    $('#input-grid tbody').html(input);
                    if(grid.length > 0) {
                        var no = 1;
                        for(var i=0;i<grid.length;i++) {
                            var data = grid[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='text-center'><span class='no-grid'>"+no+"</span><input class='no-grid' type='hidden' name='no_urut[]' value='"+no+"'></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-kode tdneracake"+no+" tooltip-span'>"+data.kode_neraca+"</span><input type='text' name='kode_neraca[]' class='form-control inp-kode neracake"+no+" hidden' value='"+data.kode_neraca+"' required='' style='z-index: 1;position: relative;' id='neracakode"+no+"'><a href='#' class='search-item search-neraca hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmneracake"+no+" tooltip-span'>"+data.nama_neraca+"</span><input type='text' name='nama_neraca[]' class='form-control inp-nama nmneracake"+no+" hidden'  value='"+data.nama_neraca+"' readonly></td>";
                            input += "<td><span class='td-keterangan tdketeranganke"+no+" tooltip-span'>"+data.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-keterangan keteranganke"+no+" hidden'  value='"+data.keterangan+"'></td>";
                            input += "</tr>";

                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        var no = 1;
                        for(var i=0;i<grid.length;i++){
                            var row = grid[i];
                            $('#neracakode'+no).typeahead({
                                source:$dtkode_neraca,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });

                            
                            no++;
                        }
                    }
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    setHeightForm();
                    showInfoField('kode_fs',form[0].kode_fs,form[0].nama_fs);
                    
                    ;
                    hitungTotalRow();
                }else if(!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('dash-ypt/sesi-habis') }}";
                }   
            }
        });
    }
    // END DELETE HANDLER //
    </script>
<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="max-height:560px !important">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Guru Mata Pelajaran 
                            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0">
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .hidden{
                                display:none;
                            }
                            .form-group{
                                margin-bottom:5px !important;
                            }
                            .form-control{
                                font-size:13px !important;
                                padding: .275rem .6rem !important;
                            }
                            .selectize-control, .selectize-dropdown{
                                padding: 0 !important;
                            }

                            i:hover{
                                cursor: pointer;
                                color: blue;
                            }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kode PP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card" style="min-height:560px !important">
                    <form id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Guru Mata Pelajaran
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:471px'>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">Kode PP</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_pp" id="kode_pp" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                    <div class="col-6">
                                        <label id="label_kode_pp" style="margin-top: 10px;"></label>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik_guru" class="col-3 col-form-label">NIK Guru</label>
                                <div class="input-group col-3">
                                    <input type='text' name="nik_guru" id="nik_guru" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                    <div class="col-6">
                                        <label id="label_nik_guru" style="margin-top: 10px;"></label>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="flag_aktif" class="col-3 col-form-label">Status</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                        <option value='' disabled>--- Pilih Status Aktif ---</option>
                                        <option value='1'>Aktif</option>
                                        <option value='0'>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                            </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    th{
                                        vertical-align:middle !important;
                                    }
                                    /* #input-jurnal td{
                                        padding:0 !important;
                                    } */
                                    #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
                                        border:0 !important;
                                        border-radius:0 !important;
                                    }
                                    .modal-header .close {
                                        padding: 1rem;
                                        margin: -1rem 0 -1rem auto;
                                    }
                                    .check-item{
                                        cursor:pointer;
                                    }
                                    .selected{
                                        cursor:pointer;
                                        background:#4286f5 !important;
                                        color:white;
                                    }
                                    #input-jurnal td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-jurnal td{
                                        overflow:hidden !important;
                                    }

                                    #input-jurnal td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-matpel" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:10%">Kode Matpel</th>
                                        <th style="width:20%">Nama Matpel</th>
                                        <th style="width:10%">Kode Status</th>
                                        <th style="width:12%">Nama Status</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                          
                            <!-- <button type="button" href="#" id="add-row" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id='mySidepanel' class='sidepanel close'>
            <h3 style='margin-bottom:20px;position: absolute;'>Filter Data</h3>
            <a href='#' id='btnClose'><i class="float-right ti-close" style="margin-top: 10px;margin-right: 10px;"></i></a>
            <form id="formFilter2" style='margin-top:50px'>
            <div class="row" style="margin-left: -5px;">
                <div class="col-sm-12">
                    <div class="form-group" style='margin-bottom:0'>
                        <label for="kode_pp">Kode PP</label>
                        <select name="kode_pp" id="kode_pp2" class="form-control">
                        <option value="">Pilih PP</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 28px;"><i class="fa fa-search" id="btnPreview2"></i> Preview</button>
                </div>
            </div>
            </form>
        </div>
    </div> 

    <!-- MODAL SEARCH AKUN-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script>
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

         function openFilter() {
            var element = $('#mySidepanel');
            
            var x = $('#mySidepanel').attr('class');
            var y = x.split(' ');
            if(y[1] == 'close'){
                element.removeClass('close');
                element.addClass('open');
            }else{
                element.removeClass('open');
                element.addClass('close');
            }
        }

        $('.sidepanel').on('click', '#btnClose', function(e){
            e.preventDefault();
            openFilter();
        });

        function getPP(){
            $.ajax({
                type: 'GET',
                url: "{{ url('tarbak/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select2 = $('#kode_pp2').selectize();
                            select2 = select2[0];
                            var control2 = select2.selectize;
                            for(i=0;i<result.daftar.length;i++){
                                control2.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp + '-' + result.daftar[i].nama}]);
                            }
                        }
                    }
                }
            });
        }

    getPP();

    function getDataPP(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('tarbak/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_pp').val(result.daftar[0].kode_pp);
                            $('#label_kode_pp').text(result.daftar[0].nama);
                        }else{
                            alert('Kode PP tidak valid');
                            $('#kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            });
    }

    function getLabelDataPP(id){
            $.ajax({
                type: 'GET',
                url: "{{ url('tarbak/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_pp === id){
                                $('#label_kode_pp').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode PP tidak valid');
                            $('#kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            });
    }

    function getNIKGuru(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getNIKGuru')}}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#nik_guru').val(result.daftar[0].nik);
                         $('#label_nik_guru').text(result.daftar[0].nama);
                    }else{
                        alert('NIK tidak valid');
                        $('#nik_guru').val('');
                        $('#nik_guru').focus();
                    }
                }
            }
        });
    }

    function getLabelNIKGuru(pp,nik){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getNIKGuru')}}/"+pp,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].nik === nik){
                            $('#label_nik_guru').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('NIK tidak valid');
                        $('#nik_guru').val('');
                        $('#nik_guru').focus();
                    }
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('tarbak/getGuruMatpel') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.data;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('tarbak/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'pp' },
        ],
        dom: 'lBfrtip',
        buttons: [
            {
                text: '<i class="fa fa-filter"></i> Filter',
                action: function ( e, dt, node, config ) {
                    openFilter();
                },
                className: 'btn btn-default ml-2' 
            }
        ]
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#method').val('post');
        $('#form-tambah')[0].reset();
        $('#label_kode_pp').text('');
        $('#label_nik_guru').text('');
        $('#input-matpel tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#flag_aktif')[0].selectize.setValue('');
        // $('#form-tambah #add-row').click();
    });

     $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){

        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

        function showFilter(param,target1,target2){
        var par = param;
        var pp  = $('#kode_pp').val();
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'kode_status[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('tarbak/getDaftarStatusGuru') }}";
                var columns = [
                    { data: 'kode_status' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Matpel";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
            case 'kode_matpel[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('tarbak/getDataMatpel') }}";
                var columns = [
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Matpel";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
            case 'kode_pp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('tarbak/getPP') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'nik_guru': 
            if(pp === ''){
                alert('PP harus dipilih dahulu');
            }else {
            header = ['NIK', 'Nama'];
            var toUrl = "{{ url('tarbak/getNIKGuru') }}/"+pp;
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar NIK Guru";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            }
            break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            // fixedHeader: true,
            // "scrollY": "300px",
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });

        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).attr('value',kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            console.log($target3);
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }

            if (e.keyCode == 13){
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getDataPP(par);
    });

    $('#form-tambah').on('change', '#nik_guru', function(){
        var par = $(this).val();
        getNikGuru(par);
    });

    $('#form-tambah').on('click', '#add-row', function(){
        var no=$('#input-matpel .row-matpel:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-matpel'>";
        input += "<td class='no-matpel text-center'>"+no+"</td>";
        input += "<td><span class='td-matpel tdmatpelke"+no+"'></span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nmatpel tdnmmatpelke"+no+"'></span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmmatpelke"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-status tdstatuske"+no+"'></span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nstatus tdnmstatuske"+no+"'></span><input type='text' name='nama_status[]' class='form-control inp-nstatus nmstatuske"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-matpel tbody').append(input);
        $('#input-matpel td').removeClass('px-0 py-0 aktif');
        $('#input-matpel tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-matpel tbody tr:last').find(".inp-matpel").show();
        $('#input-matpel tbody tr:last').find(".td-matpel").hide();
        $('#input-matpel tbody tr:last').find(".search-matpel").show();
        $('#input-matpel tbody tr:last').find(".inp-matpel").focus();
    });

     $('#input-matpel').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-matpel').each(function(){
            var nom = $(this).closest('tr').find('.no-matpel');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-matpel tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-matpel tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-matpel').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-matpel td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_matpel = $(this).parents("tr").find(".inp-matpel").val();
                var nama_matpel = $(this).parents("tr").find(".inp-nmatpel").val();
                var kode_status = $(this).parents("tr").find(".inp-status").val();
                var nama_status = $(this).parents("tr").find(".inp-nstatus").val();
                var no = $(this).parents("tr").find(".no-guru").text();
                $(this).parents("tr").find(".inp-matpel").val(kode_matpel);
                $(this).parents("tr").find(".td-matpel").text(kode_matpel);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-matpel").show();
                    $(this).parents("tr").find(".td-matpel").hide();
                    $(this).parents("tr").find(".search-matpel").show();
                    $(this).parents("tr").find(".inp-matpel").focus();
                }else{
                    $(this).parents("tr").find(".inp-matpel").hide();
                    $(this).parents("tr").find(".td-matpel").show();
                    $(this).parents("tr").find(".search-matpel").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nmatpel").val(nama_matpel);
                $(this).parents("tr").find(".td-nmatpel").text(nama_matpel);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nmatpel").show();
                    $(this).parents("tr").find(".td-nmatpel").hide();
                    $(this).parents("tr").find(".inp-nmatpel").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nmatpel").hide();
                    $(this).parents("tr").find(".td-nmatpel").show();
                }
        
                $(this).parents("tr").find(".inp-status").val(kode_status);
                $(this).parents("tr").find(".td-status").text(kode_status);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-status").show();
                    $(this).parents("tr").find(".td-status").hide();
                    $(this).parents("tr").find(".search-status").show();
                    $(this).parents("tr").find(".inp-status").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-status").hide();
                    $(this).parents("tr").find(".td-status").show();
                    $(this).parents("tr").find(".search-status").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nstatus").val(nama_status);
                $(this).parents("tr").find(".td-nstatus").text(nama_status);
                if(idx == 4){
                    
                    $(this).parents("tr").find(".inp-nstatus").show();
                    $(this).parents("tr").find(".td-nstatus").hide();
                    $(this).parents("tr").find(".inp-nstatus").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nstatus").hide();
                    $(this).parents("tr").find(".td-nstatus").show();
                }
            }
        }
    });

    $('#input-matpel').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_matpel[]': 
                var par2 = "nama_matpel[]";

            break;
            case 'kode_status[]': 
                var par2 = "nama_status[]";
            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        showFilter(par,target1,target2);
    });

    $('#input-matpel').on('change', '.inp-matpel', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-matpel').html();
        target1 = "matpelke"+noidx;
        target2 = "nmatpelke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-matpel').val()).length){
            var kode = $(this).val();
            getMatpel(kode,target1,target2,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Matpel yang dimasukkan tidak valid');
            return false;
        }
    });

    function getMatpel(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('/tarbak/getMatpel') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                        }else{

                            $("#input-matpel td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-matpel').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
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
                    }
                    alert('Kode akun tidak valid');
                }
            }
        });
    }

    function getStatusGuru(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('/tarbak/getStatusGuru') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                        }else{

                            $("#input-matpel td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-matpel').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
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
                    }
                    alert('Kode akun tidak valid');
                }
            }
        });
    }

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var kode_matpel = $('#input-matpel tbody tr.selected-row').find(".inp-matpel").val();
            var nama_matpel = $('#input-matpel tbody tr.selected-row').find(".inp-nmatpel").val();
            var kode_status = $('#input-matpel tbody tr.selected-row').find(".inp-status").val();
            var nama_status = $('#input-matpel tbody tr.selected-row').find(".inp-nstatus").val();
            var no=$('#input-matpel .row-matpel:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-matpel'>";
            input += "<td class='no-matpel text-center'>"+no+"</td>";
            input += "<td ><span class='td-matpel tdmatpelke"+no+"'>"+kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+kode_matpel+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nmatpel tdnmmatpelke"+no+"'>"+nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmmatpelke"+no+" hidden'  value='"+nama_matpel+"' readonly></td>";
            input += "<td><span class='td-status tdstatuske"+no+"'>"+kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+kode_status+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nstatus tdnmstatuske"+no+"'>"+nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nmstatuske"+no+" hidden'  value='"+nama_status+"' readonly></td>";
            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-matpel tbody').append(input);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var id = $('#nik_guru').val();
        var parameter = $('#id_edit').val();
        if(parameter == "edit"){
            var url = "{{ url('/tarbak/postGuruMatpel') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('/tarbak/postGuruMatpel') }}";
            var pesan = "saved";
        }

        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
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
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                 
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('/tarbak/login') }}";
                    }) 
                }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var kode = $(this).closest('tr').find('td:eq(0)').html();      
                var temp = $(this).closest('tr').find('td').eq(2).html().split('-');
                var kode_pp = temp[0]; 
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('tarbak/deleteGuruMatpel') }}/"+kode +"/"+ kode_pp,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }else if(!result.data.status && result.data.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('tarbak/login') }}";
                            })
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var tmp= $(this).closest('tr').find('td').eq(2).html();
        var tmp = tmp.split("-");
        var kode_pp = tmp[0];
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getGuruMatpel')}}/"+id+"/"+kode_pp,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    console.log(result);
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#nik_guru').val(result.data[0].nik_guru);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    getLabelDataPP(kode_pp);
                    getLabelNIKGuru(kode_pp,id);
                    if(res.data.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-matpel'>";
                            input += "<td class='no-matpel text-center'>"+no+"</td>";
                            input += "<td ><span class='td-matpel tdmatpelke"+no+"'>"+line.kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+line.kode_matpel+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nmatpel tdnmmatpelke"+no+"'>"+line.nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmmatpelke"+no+" hidden'  value='"+line.nama_matpel+"' readonly></td>";
                            input += "<td ><span class='td-status tdstatuske"+no+"'>"+line.kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+line.kode_status+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nstatus tdnmstatuske"+no+"'>"+line.nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nmstatuske"+no+" hidden'  value='"+line.nama_status+"' readonly></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-matpel tbody').html(input);                        
                    }
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    </script>
    <!-- CSS tambahan -->
    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        input.error{
            border:1px solid #dc3545;
        }
        label.error{
            color:#dc3545;
            margin:0;
        }
        #table-data_paginate,#table-search_paginate
        {
            margin-top:0 !important;
        }

        #table-data_paginate ul,#table-search_paginate ul
        {
            float:right;
        }
        .form-body 
        {
            position: relative;
            overflow: auto;
        }

        #content-delete
        {
            position: relative;
            overflow: auto;
        }
        
        #table-search
        {
            border-collapse:collapse !important;
        }

        .hidden{
            display:none;
        }

        #table-search_filter label, #table-search_filter input
        {
            width:100%;
        }

        .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; }

        .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; }

        div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 25px; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; }

        .dataTables_wrapper .paginate_button.page-item {
            padding-left: 5px;
            padding-right: 5px; 
        }

        .dataTables_length select {
            border: 0;
            background: none;
            box-shadow: none;
            border:none;
            width:120px !important;
            transition-duration: 0.3s; 
        }

        #table-data_filter label
        {
            width:100%;
        }
        #table-data_filter label input
        {
            width:inherit;
        }
        #searchData
        {
            font-size: .75rem;
            height: 31px;
        }
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-aksi > .dropdown-item{
            font-size : 0.7rem;
        }
        .last-add::before{
            content: "***";
            background: var(--theme-color-1);
            border-radius: 50%;
            font-size: 3px;
            position: relative;
            top: -2px;
            left: -5px;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }

        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .input-group > .form-control 
        {
            border-radius: 0.5rem !important;
        }

        .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #e9ecef !important;
            border: 1px solid #e9ecef !important;
            border-radius: 0.25rem !important;
            color: var(--theme-color-1);
            font-weight:bold;
            cursor:pointer;
        }

        span[class^=info-name]{
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;

        }

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
        }

        .selectize-input {
            min-height: unset !important;
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            line-height: 30px;
            border-radius: 0.5rem;
        }

        label{
            margin-bottom: 0.2rem;
        }

        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
        }
    </style>
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                    <h6 style="position:absolute;top: 25px;">Data Jurusan</h6>
                    <!-- <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button> -->
                </div>
                <div class="separator mb-2"></div>
                <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                    <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                        <div class="page-countdata">
                            <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                        <div class="input-group input-group-sm" style="width:321px;float:right">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                            <div class="input-group-append" style="width:92px !important">
                                <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                    <div class="table-responsive ">
                        <table id="table-data" style='width:100%'>    
                            <thead>
                                <tr>
                                    <th>Kode Jurusan</th>
                                    <th>Nama</th>
                                    <th>Kode PP</th>
                                    <th>Tgl Input</th>
                                    <!-- <th>Action</th> -->
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
        <div class="col-sm-12" style="height: 90px;">
            <div class="card">
                <form id="form-tambah" style=''>
                    <div class="card-body pb-0">
                        <h6 class="card-title mb-4"><i class='fas fa-cube'></i> Form Jurusan
                        <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        </h6>
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
                                <label for="kode_jur" class="col-3 col-form-label">Kode</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Kode Jurusan" id="kode_jur" name="kode_jur" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Nama Jurusan" id="nama" name="nama">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="kode_pp" class="col-3 col-form-label">Kode PP</label>
                            <div class="input-group col-3">
                                <input type='text' name="kode_pp" id="kode_pp" class="form-control" value="" required>
                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-6">
                                <label id="label_kode_pp" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- MODAL SEARCH-->
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
    
    <!-- MODAL FILTER -->
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>Kode PP</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_pp" id="inp-filter_kode_pp">
                                <option value='' disabled>Pilih Kode PP</option>
                            </select>
                        </div>
                        <!-- <div class="form-group row">
                            <label>Status</label>
                            <select class="form-control selectize" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value='' disabled>Pilih Status</option>
                                <option value='AKTIF' selected>AKTIF</option>
                                <option value='NONAKTIF'>NONAKTIF</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
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

        function last_add(param,isi){
            var rowIndexes = [];
            dataTable.rows( function ( idx, data, node ) {             
                if(data[param] === isi){
                    rowIndexes.push(idx);                  
                }
                return false;
            }); 
            dataTable.row(rowIndexes).select();
            $('.selected td:eq(0)').addClass('last-add');
            console.log('last-add');
            setTimeout(function() {
                console.log('timeout');
                $('.selected td:eq(0)').removeClass('last-add');
                dataTable.row(rowIndexes).deselect();
            }, 1000 * 60 * 10);
        }
        

        $('.sidepanel').on('click', '#btnClose', function(e){
            e.preventDefault();
            openFilter();
        });

        function getPP(){
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah/getPP') }}",
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
            url: "{{ url('sekolah/getPP') }}",
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
            url: "{{ url('sekolah/getPP') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_pp === id){
                                $('#label_kode_pp').text(result.daftar[0].nama);
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

    
    var $dtPP = new Array();

    function getTAPp() {
        $.ajax({
            type:'GET',
            url:"{{ url('sekolah-master/pp') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                
                var select = $('#inp-filter_kode_pp').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status) {
                    
                    for(i=0;i<result.daftar.length;i++){
                        // $dtPP[i] = {kode_pp:result.daftar[i].kode_pp};  
                        control.addOption([{text:result.daftar[i].kode_pp+'-'+result.daftar[i].nama, value:result.daftar[i].kode_pp+'-'+result.daftar[i].nama}]);
                        // $dtPP[i] = {id:result.daftar[i].kode_pp,name:result.daftar[i].nama};  
                    }

                    if("{{ Session::get('kodePP') }}" != ""){
                        control.setValue("{{ Session::get('kodePP').'-'.Session::get('namaPP') }}");
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
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
                    window.location="{{ url('/sekolah-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getTAPp();
    jumFilter();

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = $('#table-data').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        "ordering": true,
        "order": [[3, "desc"]],
        'ajax': {
            'url': "{{ url('sekolah-master/jurusan') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else if(!json.status && json.message == "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    return [];
                }else{
                    return [];
                }
            }
        },
        'columnDefs': [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [3],
                "visible": false,
                "searchable": false
            }
            // {
            //     'targets': 4, data: null, 'defaultContent': action_html 
            // }
        ],
        'columns': [
            { data: 'kode_jur' },
            { data: 'nama' },
            { data: 'pp' },
            { data: 'tgl_input'}
        ],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            // lengthMenu: "Items Per Page _MENU_"
            "lengthMenu": 'Menampilkan <select>'+
            '<option value="10">10 per halaman</option>'+
            '<option value="25">25 per halaman</option>'+
            '<option value="50">50 per halaman</option>'+
            '<option value="100">100 per halaman</option>'+
            '</select>',
            
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;

    
    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#kode_akt').val('');
        $('#label_kode_pp').text('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

     $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        console.log(this);
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
        case 'kode_pp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('sekolah/getPP') }}";
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


    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#kode_jur').val();
        if(parameter == "edit"){
            var url = "{{ url('/sekolah/postJurusan') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('/sekolah/postJurusan') }}";
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
                    $('#btn-tampil').click();    
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
                        window.location.href = "{{ url('/sekolah/login') }}";
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
                    url: "{{ url('sekolah/deleteJurusan') }}/"+kode +"/"+ kode_pp,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            $('#btn-tampil').click();    
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
                                window.location.href = "{{ url('sekolah/login') }}";
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
        var temp = $(this).closest('tr').find('td').eq(2).html().split('-');
        var kode_pp = temp[0]; 
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah/getJurusan') }}/" + id + "/" + kode_pp,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    console.log(result);
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_jur').val(id);
                    $('#kode_jur').attr('readonly', true);
                    $('#nama').val(result.data[0].nama);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    getLabelDataPP(kode_pp);
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

    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var kode_pp = $('#inp-filter_kode_pp').val();
                // var status = $('#inp-filter_status').val();
                var col_kode_pp = data[2];
                // var col_status = data[4];
                if(kode_pp != ""){
                    if(kode_pp == col_kode_pp){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return true;
                }
            }
        );
        dataTable.draw();
        $.fn.dataTable.ext.search.pop();
        $('#modalFilter').modal('hide');
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_kode_pp')[0].selectize.setValue('');
        jumFilter()
        // $('#inp-filter_status')[0].selectize.setValue('');
        
    });

    $('[name^=inp-filter]').change(function(e){
        e.preventDefault();
        jumFilter();
    });
    
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });

    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });
    $('#btn-tampil').click();

    </script>
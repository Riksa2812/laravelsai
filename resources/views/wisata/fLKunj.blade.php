@php
function getBulan($bulan) {
    $arrayBulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 
    'September', 'Oktober', 'November', 'Desember');
    return $arrayBulan[$bulan-1];
}    
@endphp
<style>
        td,th{
            padding:8px !important;
        }
        .border-right-0{
            border-right:0;
        }
        .border-left-0{
            border-left:0;
        }
        .search-item{
            /* font-size:18px; */
            cursor:pointer;
        }
        .selectize-input{
            /* border-radius:0; */
            height:38.4px !important;
        }
        .hidden{
            display:none;
        }
        .form-control[readonly] {
            background-color: #e9ecef !important;
            opacity: 1;
        }
        .input-group-append >.input-group-text{
            background-color: #e9ecef !important;
        }

        #table-search,#table-search2
        {
            border-collapse:collapse !important;
        }
        
        #table-search tbody tr:hover,#table-search2 tbody tr:hover
        {
            background:#F8F8F8 !important;
            cursor:pointer;
        }

        #table-search tr.selected
        {
            background:#E8E8E8 !important;
        }

        #table-search_filter label, #table-search_filter input,
        #table-search2_filter label, #table-search2_filter input
        {
            width:100%;
        }

  
        .page-item.next .page-link, .page-item.all .page-link {
            background: #900604;
            color: #fff;
            border: 1px solid #900604; 
        }
        .page-item.prev .page-link {
            background: #900604;
            border: 1px solid #900604;
            color: #fff; 
        }
        .page-item.first .page-link, .page-item.last .page-link 
        {
            background: transparent;
            color: #900604;
            border: 1px solid #900604;
            border-radius: 30px; 
        }
        .page-item.first .page-link:hover, .page-item.last .page-link:hover 
        {
            background: #900604;
            color: white;
            border: 1px solid #900604; 
        }
        .page-item .page-link:hover 
        {
            background-color: transparent;
            border-color: #c20805;
            color: #900604; 
        }
        .page-item.active .page-link 
        {
            background: transparent;
            border: 1px solid #900604;
            color: #900604; 
        }
        .page-item.disabled .page-link 
        {
            border-color: #d7d7d7;
            color: #d7d7d7;
            background: transparent; 
        }

        .bootstrap-tagsinput{
            margin-bottom:10px
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
        padding-right: 5px; }

        ul.pagination .pagination-sm{
            float:right !important;
        }
        #table-search_paginate
        {
            margin-top:0;
        }

        .bootstrap-tagsinput input{
            width:auto !important;
        }
    </style>
        <div class="row" id="saku-filter">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body pt-4 pb-2 px-4" style="min-height:69.2px">
                        <h5 style="position:absolute;top: 25px;">Laporan Kunjungan</h5>
                        <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2 hidden" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
                        <div class="dropdown float-right">
                            <button id="btn-export" type="button" class="btn btn-outline-primary dropdown-toggle float-right hidden"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="simple-icon-share-alt mr-1"></i> Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btn-export" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                <a class="dropdown-item" href="#" id="sai-rpt-print"><img src="{{ asset('img/Print.svg') }}" style="width:16px;"> <span class="ml-2">Print</span></a>
                                <a class="dropdown-item" href="#" id="sai-rpt-print-prev"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">Print Preview</span></a>
                                <a class="dropdown-item" href="#" id="sai-rpt-excel"><img src="{{ asset('img/excel.svg') }}" style="width:16px;"> <span class="ml-2">Excel</span></a>
                                <a class="dropdown-item" href="#" id="sai-rpt-email"><img src="{{ asset('img/email.svg') }}" style="width:16px;height: 16px;margin-right: 3px;"><span class="ml-2">Email</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="collapse show" id="collapseFilter">
                                <div class="px-4 pb-4 pt-2">
                                    <form id="form-filter">
                                        <h6>Filter</h6>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>mitra</p>
                                            <label for="mitra" class="col-md-2 col-sm-12 col-form-label">Destinasi</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='mitra[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="mitra[]" id="mitra-from" readonly value="Menampilkan semua destinasi">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="mitra[]" id="mitra-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>bidang</p>
                                            <label for="bidang" class="col-md-2 col-sm-12 col-form-label">Bidang</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='bidang[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="bidang[]" id="bidang-from" readonly value="Menampilkan semua bidang">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="bidang[]" id="bidang-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>jenis</p>
                                            <label for="jenis" class="col-md-2 col-sm-12 col-form-label">Jenis</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='jenis[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="jenis[]" id="jenis-from" readonly value="Menampilkan semua jenis">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="jenis[]" id="jenis-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>subjenis</p>
                                            <label for="subjenis" class="col-md-2 col-sm-12 col-form-label">Sub Jenis</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='subjenis[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="subjenis[]" id="subjenis-from" readonly value="Menampilkan semua subjenis">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="subjenis[]" id="subjenis-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>bulan</p>
                                            <label for="bulan" class="col-md-2 col-sm-12 col-form-label">Bulan</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='bulan[]' class='form-control sai-rpt-filter-type selectize'><option value='=' selected>Sama dengan</option><option value='range'>Rentang</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="bulan[]" id="bulan-from" readonly value="{{ getBulan(intval(date('m')))}}">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="bulan[]" id="bulan-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>tahun</p>
                                            <label for="tahun" class="col-md-2 col-sm-12 col-form-label">Tahun</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='tahun[]' class='form-control sai-rpt-filter-type selectize'><option value='=' selected>Sama dengan</option><option value='range'>Rentang</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="tahun[]" id="tahun-from" readonly value="{{date('Y')}}">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="tahun[]" id="tahun-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                        <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="collapse" id="collapsePaging">
                                <div class="px-4 py-0 row"  style="min-height:63px">
                                    <div class='col-sm-3' style='padding-top: 0;margin:auto; padding-left:10px;'>
                                    <label class="pr-0" style="padding-top: 0;margin:auto;display:inline;">Menampilkan</label>
                                        <select name="show" id="show" class="" style='border:none;display:inline;'>
                                            <option value="10">10 per halaman</option>
                                            <option value="25">25 per halaman</option>
                                            <option value="50">50 per halaman</option>
                                            <option value="100">100 per halaman</option>
                                            <option value="All">Semua halaman</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9 text-center">
                                        <div id="pager">
                                            <ul id="pagination" class="pagination pagination-sm2 float-right mb-0"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row mt-2 hidden" id="saku-report">
            <div class="col-12">
                <div class="card px-4 py-4" style="min-height:200px">
                    <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb py-0 my-0">
                                <li class="breadcrumb-item active">
                                    Data Kunjungan
                                </li>
                            </ol>
                        </nav>            
                        <button type="button" id="btn-back" style="position: absolute;right: 25px;
                        top: 30px;" class="btn btn-light float-right">
                        <i class=""></i> Back</button>
                    </div>
                    <div id="canvasPreview" style="overflow-x:auto;">
                    </div>
                    <div class="row h-100" id="report-load" style="display: none;">
                        <div class="col-12 col-md-10 mx-auto my-auto">
                            <div style="box-shadow:none" class="card auth-card text-center">
                                <div style="padding:50px;width:50%;" class="my-auto mx-auto">
                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" id="report-load-bar">0.00%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h5 class="modal-title" style="position: absolute;"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                    </button> 
                    <ul class="nav nav-tabs col-12 hidden" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
                    </ul>
                </div>
                <div class="modal-body pt-3">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <div id="modalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id='formEmail'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Kirim Email</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='form-group row'>
                            <label for="modal-email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='email' id='modal-email' required>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type="button" disabled="" style="display:none" id='loading-bar2' class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>
                        <button type='submit' id='email-submit' class='btn btn-primary'>Kirim</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
    </div>
    @php
        date_default_timezone_set("Asia/Bangkok");
    @endphp
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script type="text/javascript">
    //INISIASI REPORT//
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
            }
        });
        var bidang = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
        var mitra = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
        var jenis = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
        var subjenis = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
        // var bulan = {
        //     type : "=",
        //     from : "{{ date('m') }}",
        //     fromname : "{{ getBulan(intval(date('m'))) }}",
        //     to : "",
        //     toname : "",
        // }
        var tahun = {
            type : "=",
            from : "{{ date('Y') }}",
            fromname : "{{ date('Y') }}",
            to : "",
            toname : "",
        }
        $.fn.DataTable.ext.pager.numbers_length = 5;
        $('.selectize').selectize();
    //END INISIASI REPORT//

    //BUTTON REPORT//
        $('#btn-filter').click(function(e){
            $('#collapseFilter').show();
            $('#collapsePaging').hide();
            if($(this).hasClass("btn-primary")){
                $(this).removeClass("btn-primary");
                $(this).addClass("btn-light");
            }
            
            $('#btn-filter').addClass("hidden");
            $('#btn-export').addClass("hidden");
        });
        $('#btn-tutup').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
        });
        $('#btn-tampil').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
        });
    //END BUTTON REPORT//

    //CBBL//
        function showFilter(param,target1,type = null){
            var par = param;

            var modul = '';
            var header = [];
            $target = target1;
            var tmp = $target.attr('id');
            tmp = tmp.split("-");
            target2 = tmp[1];
            target3 = tmp[1]+'name';
            
            switch(par){
                case 'bidang[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('wisata-master/bidang') }}";
                    var columns = [
                        { data: 'kode_bidang' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Bidang <span class='modal-subtitle'></span>";
                    var pilih = "bidang";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("bidang");
                    var display = "name";
                    var kunci = "bidang";
                    var orderby = [[0,"desc"]];
                break;
                case 'mitra[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('wisata-master/mitra') }}";
                    var columns = [
                        { data: 'kode_mitra' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Mitra <span class='modal-subtitle'></span>";
                    var pilih = "mitra";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("mitra");
                    var display = "name";
                    var kunci = "mitra";
                    var orderby = [[0,"desc"]];
                break;
                case 'jenis[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('wisata-master/jenis') }}";
                    var columns = [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Jenis <span class='modal-subtitle'></span>";
                    var pilih = "jenis";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("jenis");
                    var display = "name";
                    var kunci = "jenis";
                    var orderby = [[0,"desc"]];
                break;
                case 'subjenis[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('wisata-master/subjenis') }}";
                    var columns = [
                        { data: 'kode_subjenis' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Sub Jenis <span class='modal-subtitle'></span>";
                    var pilih = "subjenis";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("subjenis");
                    var display = "name";
                    var kunci = "subjenis";
                    var orderby = [[0,"desc"]];
                break;
                // case 'bulan[]': 
                //     header = ['Kode', 'Nama'];
                //     var toUrl = "{{ url('wisata-report/list-bulan') }}";
                //     var columns = [
                //         { data: 'kode' },
                //         { data: 'nama' }
                //     ];
                //     var judul = "Daftar Bulan <span class='modal-subtitle'></span>";
                //     var pilih = "bulan";
                //     $target = $target;
                //     $target2 = target2;
                //     var field = eval("bulan");
                //     var display = "name";
                //     var kunci = "bulan";
                //     var orderby = [[0,"desc"]];
                // break;
                case 'tahun[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('wisata-report/list-tahun') }}";
                    var columns = [
                        { data: 'tahun' },
                        { data: 'tahun' }
                    ];
                    var judul = "Daftar Tahun <span class='modal-subtitle'></span>";
                    var pilih = "tahun";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("tahun");
                    var display = "name";
                    var kunci = "tahun";
                    var orderby = [[0,"desc"]];
                break;
            }

            var header_html = '';
            var width = ["30%","70%"];
            for(i=0; i<header.length; i++){
                header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
            }

            if(type == "range"){
                var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table><table width='100%' id='table-search2'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table>";
                if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                    $('#modal-search .modal-header ul').addClass('hidden');
                    $('#modal-search .modal-header').css('padding-bottom','1.75rem');
                }
            }
            else if(type == "in"){
                var headerpilih_html = '';
                var width = ["25%","70%","5%"];
                for(i=0; i<header_pilih.length; i++){
                    headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header_pilih[i]+"</th>";
                }

                var table = `
                <div class="tab-content tabcontent-border col-12 p-0">
                    <div class="tab-pane active" id="list" role="tabpanel">
                        <table class='' width='100%' id='table-search'><thead><tr>`+header_html+`</tr></thead>
                        <tbody></tbody></table>
                    </div>
                    <div class="tab-pane" id="terpilih" role="tabpanel">
                        <table class='' width='100%' id='table-search2'><thead><tr>`+headerpilih_html+`</tr></thead>
                        <tbody></tbody></table>
                    </div>
                </div>
                <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
                $('#modal-search .modal-header').css('padding-bottom','0');
                $('#modal-search .modal-header ul').removeClass('hidden');
            }
            else{
                var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table>";
                if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                    $('#modal-search .modal-header ul').addClass('hidden');
                    $('#modal-search .modal-header').css('padding-bottom','1.75rem');
                }
            }


            $('#modal-search .modal-body').html(table);
            
            $('#btn-ok').addClass('disabled');
            $('#btn-ok').prop('disabled', true);

            var searchTable = $("#table-search").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                ajax: {
                    "url": toUrl,
                    "data": {'param':par},
                    "type": "GET",
                    "async": false,
                    "dataSrc" : function(json) {
                        return json.daftar;
                    }
                },
                columns: columns,
                order: orderby,
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
                    lengthMenu: "Items Per Page _MENU_"
                },
            });

            $('#modal-search .modal-title').html(judul);
            $('#modal-search').modal('show');
            searchTable.columns.adjust().draw();

            if(type == "range"){
                var searchTable2 = $("#table-search2").DataTable({
                    sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                    ajax: {
                        "url": toUrl,
                        "data": {'param':par},
                        "type": "GET",
                        "async": false,
                        "dataSrc" : function(json) {
                            return json.daftar;
                        }
                    },
                    columns: columns,
                    order: orderby,
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
                        lengthMenu: "Items Per Page _MENU_"
                    },
                });

                $('#modal-search .modal-subtitle').html('[Rentang Awal]');
                searchTable2.columns.adjust().draw();
                
                $('#table-search2_wrapper').addClass('hidden');

                $("<input class='form-control mb-1' type='text' id='rentang-tag'>").insertAfter('#table-search_filter label');
                $("<input class='form-control mb-1' type='text' id='rentang-tag2'>").insertAfter('#table-search2_filter label');
                $("#rentang-tag").tagsinput({
                    cancelConfirmKeysOnEmpty: true,
                    confirmKeys: [13],
                    itemValue: 'id',
                    itemText: 'text'
                });
                $("#rentang-tag2").tagsinput({
                    cancelConfirmKeysOnEmpty: true,
                    confirmKeys: [13],
                    itemValue: 'id',
                    itemText: 'text'
                });
                $('#rentang-tag').on('itemAdded', function(event) {
                    $('#rentang-tag2').tagsinput('add', {id:event.item.id,text:event.item.text});
                }); 
                
                $('#rentang-tag2').on('itemRemoved', function(event) {
                    $('#rentang-tag').tagsinput('remove', {id:event.item.id,text:event.item.text});
                    var rowIndexes = [];
                    searchTable.rows( function ( idx, data, node ) {             
                        if(data[kunci] === event.item.id){
                            rowIndexes.push(idx);                  
                        }
                        return false;
                    }); 
                    searchTable.row(rowIndexes).deselect();
                    
                    $('#table-search_wrapper').removeClass('hidden');
                    $('#table-search2_wrapper').addClass('hidden');
                    $('#modal-search .modal-subtitle').html('[Rentang Awal]');
                }); 
                $('.bootstrap-tagsinput').css({'text-align':'left','border':'0','min-height':'41.2px'});
            }else if(type == "in"){
                var searchTable2 = $("#table-search2").DataTable({
                    sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                    columns: columns,
                    order: orderby,
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
                        lengthMenu: "Items Per Page _MENU_"
                    },
                    "columnDefs": [{
                        "targets": 2, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
                    }]
                });
                searchTable2.columns.adjust().draw();
            }

            $('#table-search tbody').on('click', 'tr', function () {
                
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    if(type == "in"){
                        var datain = searchTable.rows('.selected').data();
                        if(datain.length > 1){
                            
                            $('#btn-ok').removeClass('disabled');
                            $('#btn-ok').prop('disabled', false);
                        }else{
                            
                            $('#btn-ok').addClass('disabled');
                            $('#btn-ok').prop('disabled', true);
                        }
                        searchTable2.clear().draw();
                        if(typeof datain !== 'undefined' && datain.length>0){
                            searchTable2.rows.add(datain).draw(false);
                        }
                    }
                }
                else {
                    if(type == "range"){
                        
                        searchTable.$('tr.selected').removeClass('selected');
                        searchTable2.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
    
                        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                        var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
                        field["from"] = kode;
                        field["fromname"] = nama;
                        
                        $('#rentang-tag').tagsinput('add', {id:kode,text:'Rentang Awal :'+kode});
                       
                        $('#table-search_wrapper').addClass('hidden');
                        $('#table-search2_wrapper').removeClass('hidden');
                        $('#modal-search .modal-subtitle').html('[Rentang Akhir]');
                    }
                    else if (type == "in"){
                        $(this).addClass('selected');
                        var datain = searchTable.rows('.selected').data();
                        if(datain.length > 1){
                            
                            $('#btn-ok').removeClass('disabled');
                            $('#btn-ok').prop('disabled', false);
                        }else{
                            
                            $('#btn-ok').addClass('disabled');
                            $('#btn-ok').prop('disabled', true);
                        }
                        searchTable2.clear().draw();
                        if(typeof datain !== 'undefined' && datain.length>0){
                            searchTable2.rows.add(datain).draw(false);
                        }
                    }
                    else{
                        
                        searchTable.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');

                        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                        var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
                        field[target2] = kode;
                        field[target3] = nama;
                        $('#modal-search').modal('hide');
                    }

                }
            });

            $('#table-search2 tbody').on('click', 'tr', function () {
                if(type == "range"){

                    if ( $(this).hasClass('selected') ) {
                        $(this).removeClass('selected');
                    }
                    else {
                        
                        searchTable.$('tr.selected').removeClass('selected');
                        searchTable2.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
    
                        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                        var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
    
                        field["to"] = kode;
                        field["toname"] = nama;   
                        console.log(field);      
                        
                        $('#rentang-tag2').tagsinput('add', { id: kode, text: 'Rentang akhir:'+kode });       
                        $('#modal-search').modal('hide');
                    }
                }
            });

            $('#table-search2 tbody').on('click', '.hapus-item', function () {
                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                searchTable2.row( $(this).parents('tr') ).remove().draw();
                console.log('bidang='+kode);
                var rowIndexes = [];
                searchTable.rows( function ( idx, data, node ) {             
                    if(data[kunci] === kode){
                        rowIndexes.push(idx);                  
                    }
                    return false;
                }); 
                console.log(rowIndexes);
                searchTable.row(rowIndexes).deselect();
            });

            $('#modal-search').on('click','#btn-ok',function(){
                var datain = searchTable.cells('.selected',0).data();
                console.log(datain.length);
                var kode = '';
                var nama = '';
                for(var i=0;i<datain.length;i++){
                    if(i == 0){
                        kode +=datain[i];
                    }else{
                        kode +=','+datain[i];
                    }
                }   
                $($target).val(kode);
                field[target2] = kode;
                field[target3] = kode;
                $('#modal-search').modal('hide');
            });
        }
    //END CBBL//

    //EVENT CHANGE SELECT REPORT//
    $('#form-filter').on('change', '.sai-rpt-filter-type', function(){
        var type = $(this).val();
        console.log(type);
        var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
        var field = eval(kunci);
        switch(type){
            case "all":    
                $aktif = '';
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+kunci);
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                    
                field.type = "all";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";
                $('#modal-search').on('hide.bs.modal', function (e) {
                    //
                });
                    
            break;
            case "=":
                    
                $aktif = "";
                var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                showFilter(par,target);
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                field.type = "=";
                field.from = field.from;
                field.to = "";
                field.fromname = field.fromname;
                field.toname = "";
                $('#modal-search').on('hide.bs.modal', function (e) {
                    //
                });
            break;
            case "range":
                    
                $aktif = $(this);
                var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                showFilter(par,target,"range");
                $('#modal-search').on('hide.bs.modal', function (e) {
                    if($aktif != ""){

                        field.type = "range";
                        field.from = field.from;
                        field.to = field.to;
                        field.fromname =  field.fromname ;
                        field.toname =  field.toname ;
                        console.log('close'); 
                        $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                        $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                        if(kunci == "bidang"){
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                        }else if(kunci == "mitra"){
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                        } else if(kunci == "jenis"){
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                        } else if(kunci == "subjenis"){
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname); 
                        } else if(kunci == "bulan"){
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                        } else if(kunci == "tahun"){
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                        }
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').removeClass('hidden');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').removeClass('hidden');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                        }
                    });
                    
            break;
            case "in":
                $aktif = '';
                var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                showFilter(par,target,"in");
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                    
                field.type = "in";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";
                $('#modal-search').on('hide.bs.modal', function (e) {
                    //
                });
                    
            break;
        }
        });
    //END EVENT CHANGE SELECT REPORT//

    //TRIGGER CBBL//
        $('#form-filter').on('click', '.search-item', function(){
            var par = $(this).closest('.input-group').find('input').attr('name');
            var target1 = $(this).closest('.input-group').find('input');
            
            var type = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-type')[0].selectize.getValue();
            console.log(type);
            if(type == "in"){
                showFilter(par,target1,type);
            }else{
                showFilter(par,target1);
            }
        });
    //END TRIGGER CBBL//

    //LOAD REPORT//
        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("bidang[]",bidang.type);
            $formData.append("bidang[]",bidang.from);
            $formData.append("bidang[]",bidang.to);
            $formData.append("mitra[]",mitra.type);
            $formData.append("mitra[]",mitra.from);
            $formData.append("mitra[]",mitra.to);
            $formData.append("jenis[]",jenis.type);
            $formData.append("jenis[]",jenis.from);
            $formData.append("jenis[]",jenis.to);
            $formData.append("subjenis[]",subjenis.type);
            $formData.append("subjenis[]",subjenis.from);
            $formData.append("subjenis[]",subjenis.to);
            // $formData.append("bulan[]",bulan.type);
            // $formData.append("bulan[]",bulan.from);
            // $formData.append("bulan[]",bulan.to);
            $formData.append("tahun[]",tahun.type);
            $formData.append("tahun[]",tahun.from);
            $formData.append("tahun[]",tahun.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('wisata-auth/form/rptKunjungan') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("bidang[]",bidang.type);
            $formData.append("bidang[]",bidang.from);
            $formData.append("bidang[]",bidang.to);
            $formData.append("mitra[]",mitra.type);
            $formData.append("mitra[]",mitra.from);
            $formData.append("mitra[]",mitra.to);
            $formData.append("jenis[]",jenis.type);
            $formData.append("jenis[]",jenis.from);
            $formData.append("jenis[]",jenis.to);
            $formData.append("subjenis[]",subjenis.type);
            $formData.append("subjenis[]",subjenis.from);
            $formData.append("subjenis[]",subjenis.to);
            // $formData.append("bulan[]",bulan.type);
            // $formData.append("bulan[]",bulan.from);
            // $formData.append("bulan[]",bulan.to);
            $formData.append("tahun[]",tahun.type);
            $formData.append("tahun[]",tahun.from);
            $formData.append("tahun[]",tahun.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('wisata-auth/form/rptKunjungan') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });
    //END LOAD REPORT//

// EXCEL EXPORT //
    $("#sai-rpt-excel").click(function(e) {
        e.preventDefault();
        $("#saku-report #canvasPreview").table2excel({
            // exclude: ".excludeThisClass",
            name: "Kunjungan_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Kunjungan_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });
    //END EXCEL REPORT //

    // EXPORT PDF //
    $('#sai-rpt-print').click(function(){
        $('#saku-report #canvasPreview').printThis({
            removeInline: true
        });
    });
    // END EXPORT PDF //
    </script>
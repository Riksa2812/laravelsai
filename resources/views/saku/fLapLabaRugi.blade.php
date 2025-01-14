<style>
        .sidepanel  {
            width: 0px;
            position: fixed;
            z-index: 1;
            height: 600px;
            top: 10px !important;
            right: 0;
            background-color:white;
            overflow-x: hidden;
            transition: 0.5s;
            padding: 10px;
            margin-top: 40px;
            border:1px solid #e9e9e9;
        }
        
        .close{
            width:0px;
            right: -30px;
        }
        .open{
            width:300px;
        }
        #subFixbar{
            width: calc(100% - 280px);
        }
        .mini-sidebar #subFixbar{
            width: calc(100% - 100px);
        }
    </style>
    <div class="row" style="">
        <div style="z-index: 1;position: fixed;right: auto;left: auto;margin-right: 15px;margin-left: 25px;margin-top:15px" class="col-sm-12" id="subFixbar">
            <div class="card " id="sai-rpt-filter-box;" style="padding:10px;">
                <div class="card-body" style="padding: 0px;">
                    <h4 class="card-title pl-1"><i class='fas fa-file'></i> Laporan Laba Rugi</h4>
                    <hr>
                    <form id="formFilter">
                        <div class="row" style="margin-left: -5px;">
                            <div class="col-sm-3">
                                <div class="form-group" style='margin-bottom:0'>
                                    <select name="periode" id="periode" class="form-control">
                                    <option value="">Pilih Periode</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 0" id="btnPreview"><i class="far fa-list-alt"></i> Preview</button>
                                <button type="button" id='btn-lanjut' class="btn btn-secondary" style="margin-left: 6px;margin-top: 0"><i class="fa fa-filter"></i> Filter</button>
                                <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                    <ul id="pagination" class="pagination pagination-sm2"></ul>
                                </div>
                            </div>
                            <div class='col-sm-1' style='padding-top: 0'>
                                <select name="show" id="show" class="form-control" style=''>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                            <div class='col-sm-2'>
                                <button type="button" class="btn btn-info float-right" style="margin-left: 6px;margin-top: 0" id="sai-rpt-print"><i class="fa fa-print"></i></button>
                                <button type="button" class="btn btn-success float-right" style="margin-left: 6px;margin-top: 0" id="btnExport"><i class="fa fa-file-excel"></i></button>
                                <button type="button" class="btn btn-primary float-right" style="margin-left: 6px;margin-top: 0" id="btnEmail" alt="Email"><i class="fa far fa-envelope"></i></button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id='mySidepanel' class='sidepanel close'>
        <h3 style='margin-bottom:20px;position: absolute;'>Filter Laporan</h3>
        <a href='#' id='btn-close'><i class="float-right ti-close" style="margin-top: 10px;margin-right: 10px;"></i></a>
        <form id="formFilter2" style='margin-top:50px'>
        <div class="row" style="margin-left: -5px;">
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="periode-selectized">Periode</label>
                    <select name="periode" id="periode2" class="form-control">
                    <option value="">Pilih Periode</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left: -5px;">
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="kode_fs-selectized">Kode FS</label>
                    <select name="kode_fs" id="kode_fs" class="form-control">
                    <option value="">Pilih Kode FS</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left: -5px;">
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="level-selectized">Level</label>
                    <select name="level" id="level" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left: -5px;">
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="format-selectized">Format</label>
                    <select name="format" id="format" class="form-control">
                    <option value="saldo_akhir">Saldo Akhir</option>
                    <option value="mutasi">Mutasi</option>
                    <option value="dc">DC</option>
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
    <div class="container-fluid" style="margin-top:155px">
        <div class="row" >
            <div class="col-sm-12">
                <div class="card " id="sai-rpt-filter-box;">
                    <div class='card-body' style='padding: 10px;'>
                        <div id="loading-bar" style="display:none"><button type="button" disabled="" class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button></div>
                    </div>
                    <div class="card-body table-responsive" id="content-lap" style='height:400px'>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <div class='form-group row'>
                            <label for="modal-nama" class="col-3 col-form-label">Nama</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='nama' id='modal-nama' required >
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

<script type="text/javascript">
    var $loadBar = $('#loading-bar');
    var $loadBar2 = $('#loading-bar2');
    function openNav() {
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

    $('.card-body').on('click', '#btn-lanjut', function(e){
        e.preventDefault();
        openNav();
    });

    

    $('.sidepanel').on('click', '#btn-close', function(e){
        e.preventDefault();
        openNav();
    });  

    $('#show').selectize();

   
    function getPeriode(){
        $.ajax({
            type: 'GET',
            url: "saku/gl_filter_periode",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){

                    var select = $('#periode').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();
                    
                    var select2 = $('#periode2').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){

                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                            control2.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                        }
                    }
                    control.setValue(result.periode);
                    control2.setValue(result.periode);
                }
            }
        });
    }

    function getFS(){
        $.ajax({
            type: 'GET',
            url: "saku/gl_filter_fs",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    var select = $('#kode_fs').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_fs+'-'+result.daftar[i].nama, value:result.daftar[i].kode_fs}]);
                        }
                    }
                    control.setValue('FS1');
                }
            }
        });
    }

    // $('#periode2').selectize({
    //     selectOnTab: true,
    //     onChange: function (){
    //         var periode = $('#periode2')[0].selectize.getValue();
    //         var modul = $('#modul')[0].selectize.getValue();
    //         var no_bukti = $('#no_bukti')[0].selectize.getValue();
    //         getModul(periode);
    //         getNoBukti(periode,no_bukti);
    //     }
    // });

    // $('#modul').selectize({
    //     selectOnTab: true,
    //     onChange: function (){
    //         var periode = $('#periode2')[0].selectize.getValue();
    //         var modul = $('#modul')[0].selectize.getValue();
    //         var no_bukti = $('#no_bukti')[0].selectize.getValue();
    //         getNoBukti(periode,no_bukti);
    //     }
    // });

    getPeriode();
    getFS();
    $('#level').selectize();
    $('#format').selectize();

    function sepNum(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            // if(x < 0){
                var x = parseFloat(x).toFixed(0);
            // }
            
            var parts = x.toString().split(",");
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,"$1.");
            return parts.join(".");
        }
    }

    var $formData = "";
    $('.card-body').on('submit', '#formFilter', function(e){
        e.preventDefault();
        $formData = new FormData(this);
        xurl = "saku/form/rptLabaRugi";
        $('#content-lap').load(xurl);
        // drawLapReg(formData);
    });

    $('.sidepanel').on('submit', '#formFilter2', function(e){
        e.preventDefault();
        $formData = new FormData(this);
        xurl = "saku/form/rptLabaRugi";
        $('#content-lap').load(xurl);
        // drawLapReg(formData);
    });

    $('#content-lap').on('click', '.nrclajur', function(e){
        e.preventDefault();
        var kode_neraca = $(this).data('kode_neraca');
        var back = true;
        
        $formData.delete('kode_neraca');
        $formData.append('kode_neraca', kode_neraca);

        $formData.delete('kode_fs');
        $formData.append('kode_fs', "FS1");

        $formData.delete('trail');
        $formData.append('trail', '1');

        $formData.delete('back');
        $formData.append('back', back);
        xurl ="saku/form/rptNrcLajur";
        $('#content-lap').load(xurl);
        // drawLapReg(formData);
    });

    $('#content-lap').on('click', '.bukubesar', function(e){
        e.preventDefault();
        var kode_akun = $(this).data('kode_akun');
        var back = true;
        
        $formData.delete('kode_akun');
        $formData.append('kode_akun', kode_akun);

        $formData.delete('back');
        $formData.append('back', back);
        xurl ="saku/form/rptBukuBesar";
        $('#content-lap').load(xurl);
        // drawLapReg(formData);
    });

    $('#content-lap').on('click', '.jurnal', function(e){
        e.preventDefault();
        var no_bukti = $(this).data('no_bukti');
        var back = true;
        
        $formData.delete('no_bukti');
        $formData.append('no_bukti', no_bukti);

        $formData.delete('back');
        $formData.append('back', back);
        xurl ="saku/form/rptBuktiJu";
        $('#content-lap').load(xurl);
        // drawLapReg(formData);
    });

    $('#content-lap').on('click', '#btn-back', function(e){
        e.preventDefault();
        $formData.delete('back');
        xurl = "saku/form/rptLabaRugi";
        $('#content-lap').load(xurl);
        // drawLapReg(formData);
    });


    $('#sai-rpt-print').click(function(){
        $('#canvasPreview').printThis();
    });

    $("#btnExport").click(function(e) {
        e.preventDefault();
        $('#canvasPreview').tblToExcel();
    });

    
    $("#btnEmail").click(function(e) {
        e.preventDefault();
        $('#formEmail')[0].reset();
        $('#modalEmail').modal('show');
    });

    $('#modalEmail').on('submit','#formEmail',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        var html= $('#canvasPreview').html();
        formData.append('html', html);
        $loadBar2.show();
        $.ajax({
            type: 'POST',
            url: "saku/gl_send_jurnal_form",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert(result.message);
                if(result.status){
                    $('#modalEmail').modal('hide');
                }
                $loadBar2.hide();
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
    });
    
</script>
   
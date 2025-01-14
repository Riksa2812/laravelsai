<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />

<x-list-data judul="Data Tagihan Project" tambah="true" :thead="array('No Tagihan', 'No Proyek', 'Tanggal', 'Nilai', 'Aksi')" :thwidth="array(15,15,10,10,10)" :thclass="array('','','','','text-center')" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" autocomplete="off" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="kode_cust" >Customer</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_cust" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_cust" autocomplete="off" id="kode_cust" name="kode_cust" value="" title="">
                                        <span class="info-name_kode_cust hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_cust"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" autocomplete="off" name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <label for="no_proyek" >No Proyek</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_proyek" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_proyek" autocomplete="off" id="no_proyek" name="no_proyek" value="" title="">
                                        <span class="info-name_no_proyek hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_no_proyek"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="nilai_kontrak">Nilai Kontrak</label>
                                    <input class="form-control currency" type="text" autocomplete="off" placeholder="Nilai Kontrak" id="nilai_kontrak" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 no_tagihan">
                                    <label for="no_tagihan">No Tagihan</label>
                                    <input class='form-control' type="text" autocomplete="off" id="no_tagihan" name="no_tagihan" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-tagihan" role="tab" aria-selected="true"><span class="hidden-xs-down">Rincian Tagihan</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-upload" role="tab" aria-selected="true"><span class="hidden-xs-down">Upload File</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-tagihan" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:70%">Uraian pekerjaan</th>
                                        <th style="width:15%">Harga</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                            <div class="info-transaction">
                                <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-2 col-sm-3">
                                        <span>Pajak</span>
                                    </div>
                                    <div class="col-md-1 col-sm-2">
                                        <div class="group-input">
                                            <input class="form-control currency" autocomplete="off" type="text" placeholder="Pajak" id="pajak" name="pajak" value="0">
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3" style="text-align: right;">
                                        <span id="nilai_pajak" class="nilai-pajak"></span>
                                    </div>
                                    <div class="col-md-1 col-sm-1"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-6 col-sm-5">
                                        <div class="separator mb-2"></div>
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-4 col-sm-4">
                                        Subtotal
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <span class="pull-right" id="subtotal-tagihan">Rp. 0</span>
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-4 col-sm-3">
                                        <span>Uang Muka</span>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <input class="form-control currency" autocomplete="off" type="text" placeholder="Uang Muka" id="uang_muka" name="uang_muka" value="0">
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                                 <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-6 col-sm-5">
                                        <div class="separator mb-2"></div>
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-4 col-sm-4">
                                        Kurang bayar
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <span class="pull-right" id="kurang-bayar-tagihan">Rp. 0</span>
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-upload" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                            </div>
                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="upload" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:20%">Jenis</th>
                                            <th style="width:30%">Path File</th>
                                            <th width="25%">Upload File</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" id="add-row-dok" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                            </div>
                        </div>
                    </div>
                    <div class="btn-div">
                        <button type="submit" class="btn btn-primary mb-2 mt-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    var $iconLoad = $('.preloader');
    var subtotal = 0;
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var valid = true;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    // Upload grid
    $('#upload').on('click', '.search-item', function() {
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('input[type="hidden"]').attr('class')
        var target3 = $(this).closest('tr').find('td:eq(3) input[type="file"]').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target3.split(" ")
        var tmp3 = target2.split(" ")
        target1 = tmp[2];
        target3 = tmp2[1]
        target2 = tmp3[1]
        console.log(target2)

        switch(param){
            case 'jenis[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('java-trans/dok-jenis') }}",
                    columns : [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jenis Dokumen",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        $('.'+target3).removeClass('hidden')
                        $('.'+target1).val(data.nama)
                        $('.'+target2).val(data.kode_jenis)
                    },
                    width : ["30%","70%"]
                };
            break;
        }

        showInpFilter(options);
    })

    function hitungTotalRowUpload(form){
        var total_row = $('#upload tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

    function addRowUpload() {
        var no=$('#upload .row-upload:last').index();
        no=no+2;
        var html = "";
        html += "<tr class='row-upload'>";
        html += "<td class='no-upload text-center'>"+no+"</td>"
        html += "<td class='px-0 py-0'><div class='inp-div-jenis'>"
        html += "<input type='hidden' name='kode_jenis[]' class='inp-jenis kode_jenis-ke-"+no+"'/>"
        html += "<input type='text' name='jenis[]' class='form-control inp-jenis inp-jenis-"+no+"' value='' style='z-index: 1;'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td class='td-nama_file tooltip-span'>-</td>";
        html += "<td><input type='file' name='file_dok[]' class='hidden file-dok-"+no+"'></td>"
        html += "<td class='text-center action-dok'><a class='hapus-dok' style='cursor: pointer;'><i class='simple-icon-trash' style='font-size:18px'></i></a></td>"
        html += "</tr>"

        $('#upload tbody').append(html);
        hitungTotalRowUpload()
    }

    

    $('#upload').on('click', '.hapus-dok', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-upload').each(function(){
            var nom = $(this).closest('tr').find('.no-upload');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
    });

    $('#add-row-dok').on('click', function() {
        addRowUpload()
    })

    $('#upload').on('click', '.hapus-dok-with-file', function(){
        var no_bukti = $('#no_proyek').val();
        var nama_file = $(this).closest('tr').find('.td-nama_file').html();
        var kode_jenis = $(this).closest('tr').find('.inp-jenis').val();
        var no_urut = $(this).closest('tr').find('.no-upload').html();
        var self = this
        
        msgDialog({
            id: kode_jenis,
            text: 'Dokumen akan terhapus secara permanen dari server dan tidak dapat mengurungkan.<br> ID Data : <b>'+kode_jenis+'</b> No urut : <b>'+no_urut+'</b>',
            param: {'kode_jenis':kode_jenis,'no_bukti':no_bukti,'fileName':nama_file, 'self':self, 'no_urut':no_urut},
            type:'hapusDok'
        });
       
    });

    function hapusDok(param){
        var no_bukti = param.no_bukti; 
        var kode_jenis= param.kode_jenis;
        var fileName= param.fileName;
        var no_urut = param.no_urut
        var self = param.self
        console.log(self)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-trans/proyek-file') }}",
            dataType: 'json',
            data: {'no_bukti':no_bukti,'kode_jenis':kode_jenis, 'fileName':fileName},
            success:function(result){
                // console.log(result.data.message);
                if(result.data.status){
                    $(self).closest('tr').remove();
                    no=1;
                    $('.row-upload').each(function(){
                        var nom = $(self).closest('tr').find('.no-upload');
                        nom.html(no);
                        no++;
                    });
                    hitungTotalRowUpload();
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
                    msgDialog({
                        id:no_bukti,
                        type:'sukses',
                        title:'Sukses',
                        text:'Dokumen Proyek '+kode_jenis+' dengan no urut: '+no_urut+' berhasil dihapus'
                    });

                }else{
                    msgDialog({
                        id:result.data.no_bukti,
                        title:'Error',
                        back: false,
                        text:result.data.message
                    });
                }
            }
        });
    }

    // Upload

    function resetForm() {
        $('#upload tbody').empty()
        $('.no_tagihan').hide();
        $('#search_no_proyek').show();
        $('#search_kode_cust').show();
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
        $('#input-grid tbody').empty();
    }

    function hitungSubtotal() {
        var pajak = toNilai($('#pajak').val())
        var uang_muka = toNilai($('#uang_muka').val())
        subtotal = 0;
        $('#input-grid tbody tr').each(function(index) {
            var total = toNilai($(this).find('.td-harga').text())
            subtotal += total
        })
        if(pajak == 0) {
            pajak = 0
        } else {
            pajak = parseInt(subtotal * (pajak/100))   
        }
        var totalAkhir = pajak + subtotal;
        var kurang_bayar = totalAkhir - uang_muka;
        if(kurang_bayar < 0) {
            kurang_bayar = 0;
        }
        $('#subtotal-tagihan').text('Rp. '+format_number(totalAkhir))
        $('#kurang-bayar-tagihan').text('Rp '+format_number(kurang_bayar))
    }

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
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

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
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

    function addRow(param) {
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='text-center no-grid'>"+no+"<input type='text' name='no[]' class='form-control inp-no noke"+no+" hidden'  value='"+no+"'></td>";
        input += "<td><span class='td-item tditemke"+no+" tooltip-span'></span><input type='text' name='item[]' class='form-control inp-item itemke"+no+" hidden'  value=''></td>";
        input += "<td class='text-right'><span class='td-harga tdhargake"+no+" tooltip-span'></span><input type='text' name='harga[]' class='form-control numeric inp-harga hargake"+no+" hidden'  value='0'></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";

        $('#input-grid tbody').append(input);

        $('.numeric').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        hideUnselectedRow();
        if(param == "add"){
            $('#input-grid tbody tr:last').click()
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-item").show();
            $('#input-grid tbody tr:last').find(".td-item").hide();
            $('#input-grid tbody tr:last').find(".inp-item").focus();
        }
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungSubtotal();
        hitungTotalRow();
    }

    function hideAllSelectedRow() {
        $('#input-grid tbody tr').removeClass('selected-row');
        $('#input-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#input-grid > tbody > tr').each(function(index, row) { 
            var item = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-item").val();
            var harga = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").val();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-item").val(item);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-item").text(item);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").val(harga);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-harga").text(harga);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-item").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-item").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-harga").show();
        })
    }

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var item = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-item").val();
                var harga = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-item").val(item);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-item").text(item);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").val(harga);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-harga").text(harga);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-item").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-item").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-harga").show();
            }
        })
    }

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        valid = true
        hitungTotalRow();
        hitungSubtotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('java-trans/tagihan-proyek') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {   'targets': 3, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_tagihan' },
            { data: 'no_proyek' },
            { data: 'tanggal' },
            { data: 'nilai' }
        ],
        "{{ url('java-auth/sesi-habis') }}",
        [[4 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({ trigger: "focus" });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Tagihan Proyek');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        resetForm();
        addRow("default");
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_vendor').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#form-tambah').on('click', '.add-row', function(){
        addRow("add");
    });

    function custTarget(target, tr) {
        var from = target;
        var keyString = '_'
        var fromTarget = from.substr(from.indexOf(keyString) + keyString.length, from.length);
        if(fromTarget === 'no_proyek') {
            var nilai = toNilai(tr.find('td:nth-child(3)').text());
            $('#nilai_kontrak').val(nilai)
        }
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var cust = $('#kode_cust').val();
        if(id == 'no_proyek') {
            if(cust == '') {
                alert('Pilih Customer terlebih dahulu')
                return false;
            }
        }
        
        switch(id) {
            case 'kode_cust': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('java-trans/customer') }}",
                    columns : [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Customer",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    }
            break;
            case 'no_proyek': 
                var settings = {
                    id : id,
                    header : ['No Proyek', 'Keterangan', 'Nilai'],
                    url : "{{ url('java-trans/tagihan-proyek-cbbl') }}",
                    columns : [
                        { data: 'no_proyek' },
                        { data: 'keterangan' },
                        { data: 'nilai', render: $.fn.dataTable.render.number( '.', '.', 0 ) }
                    ],
                    parameter: {
                        kode: cust
                    },
                    judul : "Daftar Proyek",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "custom",
                    target4 : "custom",
                    width : ["30%","70%"],
                }
            break;
            default:
            break;
        }
            showInpFilter(settings);
    });

    var $twicePress = 0;
    $('#input-grid').on('keydown','.inp-item, .inp-harga',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-item', '.inp-harga'];
        var nxt2 = ['.td-item', '.td-harga'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    if($.trim($(this).val()).length){
                        console.log(nxt[idx])
                        console.log(nxt2[idx])
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Keterangan yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 1:
                    if(isi != "" && isi != 0){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        hitungSubtotal();
                        if(code == 13 || code == 9) {
                            if($twicePress == 0) {
                                $(this).closest('tr').find(nxt[idx]).blur();
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                hitungSubtotal();
                                setTimeout(() => $(this).closest('tr').find(nxt[idx]).focus(), 800)
                            }
                            if($twicePress == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-item');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('.add-row').click();
                                }
                            }
                            $twicePress = 1
                            setTimeout(() => $twicePress = 0, 1000)
                        }
                    }else{
                        alert('Harga yang dimasukkan tidak valid');
                        return false;
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

    $(document).keydown(function(event){
        var code = (event.keyCode ? event.keyCode : event.which);
        if(event.ctrlKey && code == 13 ||event.ctrlKey && code == 9) {
            var cek = $('#input-grid tbody tr').length;
            console.log(cek)
            if(cek > 0){
                var cek = $('#input-grid').find('tr').last();
                var focus = cek.find('.td-item')
                focus.click();
            }else{
                $('.add-row').click();
            }
        } else if(event.ctrlKey && code == 16) {
            hideAllSelectedRow()
            hitungSubtotal()
            $('#pajak').focus()
        }
    });

    $('#pajak').on('focus', function(){
        hideAllSelectedRow()
        hitungSubtotal()
    })

    $('#input-grid').on('blur', '.inp-harga', function(){
        hitungSubtotal();
    })

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        hitungSubtotal();
        if(idx == 0 || idx == 3){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var keterangan = $(this).parents("tr").find(".inp-item").val();
                var harga = $(this).parents("tr").find(".inp-harga").val();
                var no = $(this).parents("tr").find(".no-grid").text();
                $(this).parents("tr").find(".inp-item").val(keterangan);
                $(this).parents("tr").find(".td-item").text(keterangan);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-item").show();
                    $(this).parents("tr").find(".td-item").hide();
                    $(this).parents("tr").find(".inp-item").focus();
                }else{
                    $(this).parents("tr").find(".inp-item").hide();
                    $(this).parents("tr").find(".td-item").show();   
                }

                $(this).parents("tr").find(".inp-harga").val(harga);
                $(this).parents("tr").find(".td-harga").text(harga);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-harga").show();
                    $(this).parents("tr").find(".td-harga").hide();
                    $(this).parents("tr").find(".inp-harga").focus();
                    hitungSubtotal();
                }else{
                    $(this).parents("tr").find(".inp-harga").hide();
                    $(this).parents("tr").find(".td-harga").show();
                }
            }
        }
        hitungSubtotal();
    });
    $('#pajak, #uang_muka').on('change', function() {
        hitungSubtotal()
    })

    $('#pajak').on('change', function() {
        var value = $(this).val();
        var nilai_pajak = 0;
        if(value < 0 || value == 0) {
            nilai_pajak = 0;
        } else {
            nilai_pajak = subtotal * (value/100)
        }
        $('#nilai_pajak').text('Rp. '+format_number(nilai_pajak))
    })

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            no_proyek:{
                required: true   
            },
            tanggal:{
                required: true   
            },
            kode_cust:{
                required: true  
            },
            keterangan:{
                required: true  
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            hideAllSelectedRow()
            // if(subtotal < 0) {
            //     alert('Harap mengisi detail tagihan dengan benar')
            //     valid = false;
            //     return false;
            // }
            $("#input-grid tbody tr td:not(:first-child):not(:last-child)").each(function() {
                if($(this).find('span').text().trim().length == 0) {
                    alert('Data tagihan tidak boleh kosong, harap dihapus untuk melanjutkan')
                    valid = false;
                    return false;
                } else {
                    console.log($(this).find('span'))
                }
            });

            var countDokRow = $('#upload tbody tr').length
            var parameter = $('#id_edit').val();
            var id = $('#no_tagihan').val();
            if(parameter == "edit"){
                var url = "{{ url('java-trans/tagihan-proyek-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('java-trans/tagihan-proyek') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            if(countDokRow > 0) {
                $('#upload tbody tr').each(function(index) {
                    formData.append('no_dok[]', $(this).find('.no-upload').text())
                })
                $('#upload tbody tr').each(function(){
                    var namaFile = $(this).find('.td-nama_file').text()
                    if(namaFile == '-') {
                        var files = $(this).find("td:eq(3) input[type='file']")[0]
                        var check = files.files.length
                        if(check == 0) {
                            alert('Upload dokumen tidak boleh kosong, hapus baris jika tidak diperlukan')
                            valid = false
                            return false
                        } else {
                            valid = true
                        }
                    }
                })
            }
            if(parameter === 'edit') {
                $('#upload tbody tr').each(function(index) {
                    formData.append('nama_file[]', $(this).find('.td-nama_file').text())
                })
            }
            // $('#input-grid tbody tr').each(function(index) {
            //     formData.append('no[]', $(this).find('.no-grid').text())
            // })
            formData.append('nilai', subtotal)
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            if(valid) {
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
                        if(result.data.status){
                            dataTable.ajax.reload();
                            $('#row-id').hide();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Tambah Data Tagihan Proyek');
                            $('#method').val('post');
                            $('#no_kontrak').attr('readonly', false);
                            $('#search_no_proyek').show();
                            $('#search_kode_cust').show();
                            resetForm();
                            msgDialog({
                                id:result.data.kode,
                                type:'simpan'
                            });
                            last_add("no_tagihan",result.data.kode);
                        }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                            window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                            
                        }else{
                            if(result.data.kode == "-" && result.data.jenis != undefined){
                                msgDialog({
                                    id: id,
                                    type: result.data.jenis,
                                    text:'No tagihan sudah digunakan'
                                });
                            }else{

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>'+result.data.message+'</a>'
                                })
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        var error = JSON.parse(xhr.responseText);
                        var detail = Object.values(error.errors)
                        Swal.fire({
                            type: 'error',
                            title: error.message,
                            text: detail[0]
                        })
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
                $('#btn-simpan').html("Simpan").removeAttr('disabled');
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('java-trans/tagihan-proyek-show') }}",
                data: { kode: id },
                dataType: 'json',
                async:false,
                success:function(res){ 
                    var result = res.data;
                    var nilai_tagihan = parseFloat(result.data[0].nilai)
                    var pajak = parseFloat(result.data[0].pajak)
                    var nilai_pajak = nilai_tagihan*(pajak/100)
                    var biaya_lain = parseFloat(result.data[0].biaya_lain)
                    var nilai_akhir = nilai_tagihan + (nilai_tagihan*(pajak/100)) + biaya_lain;
                    var uang_muka = parseFloat(result.data[0].uang_muka)
                    var kurang_bayar = nilai_akhir - uang_muka;

                    if(kurang_bayar < 0) {
                        kurang_bayar = 0
                    }
                    
                    var html = `<tr>
                        <td style='border:none'>No Tagihan</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>No Proyek</td>
                        <td>`+data.no_proyek+`</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>`+data.tanggal+`</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>`+result.data[0].keterangan+`</td>
                    </tr>
                    <tr>
                        <td>Vendor</td>
                        <td>`+result.data[0].kode_cust+` - `+result.data[0].nama+`</td>
                    </tr>
                    <tr>
                        <td>Nilai Tagihan</td>
                        <td>`+format_number(nilai_tagihan)+`</td>
                    </tr>
                    <tr>
                        <td>Biaya Lain</td>
                        <td>`+format_number(biaya_lain)+`</td>
                    </tr>
                    <tr>
                        <td>Pajak (`+pajak+`%)</td>
                        <td>`+format_number(nilai_pajak)+`</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>`+format_number(nilai_akhir)+`</td>
                    </tr>
                    <tr>
                        <td>Uang Muka</td>
                        <td>`+format_number(uang_muka)+`</td>
                    </tr>
                    <tr>
                        <td>Kurang Bayar</td>
                        <td>`+format_number(kurang_bayar)+`</td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <table class='table table-bordered' id='table-detail'>
                                <thead>
                                    <tr>
                                        <th>No</th>    
                                        <th>Uraian Pekerjaan</th>    
                                        <th>Harga</th>    
                                    </tr>    
                                </thead>
                                <tbody></tbody>
                            </table>
                        </td>
                    </tr>
                    `;
                    $('#table-preview tbody').html(html);
                    var html2;
                    for(var i=0;i<result.detail.length;i++) {
                        html2 += `<tr>
                            <td>`+result.detail[i].no+`</td>
                            <td>`+result.detail[i].item+`</td>
                            <td>`+format_number(result.detail[i].harga)+`</td>
                        </tr>` 
                    }    
                    $('#table-detail tbody').html(html2);
                    $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Anggaran Proyek').removeClass('py-2');
                    $('#modal-preview-id').text(id);
                    $('#modal-preview #content-preview').css({'overflow-y': 'scroll'}); 
                    $('#modal-preview').modal('show');      
                }
            })
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Tagihan Proyek');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Tagihan Proyek');
        editData(id);
    });

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/java-trans/tagihan-proyek-show') }}",
            dataType: 'json',
            data:{ 'kode':id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    var nilai_tagihan = parseFloat(result.data[0].nilai)
                    var pajak = parseFloat(result.data[0].pajak)
                    var nilai_pajak = nilai_tagihan*(pajak/100)
                    var biaya_lain = parseFloat(result.data[0].biaya_lain)
                    var nilai_akhir = nilai_tagihan + (nilai_tagihan*(pajak/100)) + biaya_lain;
                    var uang_muka = parseFloat(result.data[0].uang_muka)
                    var kurang_bayar = nilai_akhir - uang_muka;
                    
                    if(kurang_bayar < 0) {
                        kurang_bayar = 0
                    }

                    // $('#search_no_proyek').hide();
                    // $('#search_kode_cust').hide();
                    $('.no-tagihan').show();
                    $('#input-grid tbody').empty();
                    $('#id_edit').val('edit');
                    $('#id').val(id);
                    $('#no_tagihan').val(id);
                    $('#method').val('put');
                    $('#nilai').val(parseFloat(result.data[0].nilai))
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/'));
                    showInfoField('no_proyek',result.data[0].no_proyek,result.data[0].keterangan_proyek);
                    showInfoField('kode_cust',result.data[0].kode_cust,result.data[0].nama);
                    $('#biaya_lain').val(biaya_lain)
                    $('#pajak').val(pajak)
                    $('#subtotal-tagihan').text('Rp. '+nilai_akhir)
                    $('#uang_muka').val(uang_muka)
                    $('#kurang-bayar-tagihan').text('Rp. '+kurang_bayar)
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='text-center no-grid'>"+line.no+"<input type='text' name='no[]' class='form-control inp-no noke"+line.no+" hidden'  value='"+line.no+"' required></td>";
                            input += "<td><span class='td-item tditemke"+line.no+" tooltip-span'>"+line.item+"</span><input type='text' name='item[]' class='form-control inp-item itemke"+line.no+" hidden'  value='"+line.item+"' required></td>";
                            input += "<td class='text-right'><span class='td-harga tdhargake"+line.no+" tooltip-span'>"+format_number(line.harga)+"</span><input type='text' name='harga[]' class='form-control numeric inp-harga hargake"+no+" hidden'  value='"+parseFloat(line.harga)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        $('.numeric').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () {  }
                        });
                        no= 1;
                    }
                    if(result.file.length > 0) {
                        var no = 1;
                        var html = "";
                        for(var i=0;i<result.file.length;i++) {
                            var line = result.file[i]
                            var dok = "{{ config('api.url').'java-auth/storage' }}/"+line.file_dok;
                            html += "<tr class='row-upload'>"
                            html += "<td class='no-upload text-center'>"+no+"</td>"
                            html += "<td class='px-0 py-0'><div class='inp-div-jenis'>"
                            html += "<input type='hidden' name='kode_jenis[]' value='"+line.jenis+"' class='inp-jenis kode_jenis-ke-"+no+"'/>"
                            html += "<input type='text' name='jenis[]' value='"+line.nama+"' class='form-control inp-jenis inp-jenis-"+no+"' value='' style='z-index: 1;'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td class='td-nama_file tooltip-span'>"+line.file_dok+"</td>";
                            html += "<td><input type='file' name='file_dok[]' class='file-dok-"+no+"'></td>"
                            html += "<td class='text-center action-dok'><a class='download-dok' href='"+dok+"' target='_blank' title='Download'><i style='font-size:18px' class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok-with-file' style='cursor: pointer;'><i class='simple-icon-trash' style='font-size:18px'></i></a></td>"  
                            html += "</tr>"
                            no++
                        }
                        $('#upload tbody').append(html)   
                        hitungTotalRowUpload()                     
                    }
                    hitungTotalRow();
                    hitungSubtotal();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
            }
        });
    }

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-trans/tagihan-proyek') }}",
            dataType: 'json',
            data: {'kode':id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Tagihan ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
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

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });


</script>
    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Vendor" tambah="true" :thead="array('Kode','Nama','Alamat','Tgl Input','Aksi')" :thwidth="array(20,25,35,10,10)" :thclass="array('','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#umum" role="tab" aria-selected="true"><span class="hidden-xs-down">Umum</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#alamat-pane" role="tab" aria-selected="true"><span class="hidden-xs-down">Alamat</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab" aria-selected="true"><span class="hidden-xs-down">Bank</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pic-pane" role="tab" aria-selected="true"><span class="hidden-xs-down">PIC</span></a> </li>
                        </ul>
                        <div class="tab-content tab-form-content col-12 p-0">
                            <div class="tab-pane active" id="umum" role="tabpanel">
                                <div class="form-row">
                                    <div class="col-12">
                                        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                        <input type="hidden" id="method" name="_method" value="post">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                </div>
                                <div class="form-row" id="kode-vendor">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="kode_vendor">Kode</label>
                                        <input class="form-control" type="text" autocomplete="off" id="kode_vendor" name="kode_vendor" readonly>
                                    </div>
                                    <div class="error-side col-md-6 col-sm-12">
                                        <p class="error-text" id="error-vendor"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" autocomplete="off" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="no_telp">No Telepon</label>
                                        <input class="form-control" type="text" autocomplete="off" id="no_telp" name="no_telp" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" autocomplete="off" id="email" name="email" required>
                                    </div>
                                </div>
                                {{-- <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">    
                                        <label for="akun_hutang">Akun Relasi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_akun_hutang" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-akun_hutang" autocomplete="off" id="akun_hutang" name="akun_hutang" value="" title="">
                                            <span class="info-name_akun_hutang hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_akun_hutang"></i>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="tab-pane" id="alamat-pane" role="tabpanel">
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" rows="4" autocomplete="off" id="alamat" name="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="kode_pos">Kode POS</label>
                                        <input class="form-control" type="text" autocomplete="off" id="kode_pos" name="kode_pos">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="provinsi">Provinsi</label>
                                        <input class="form-control" type="text" id="provinsi-nama" name="provinsi_name">
                                        <input class="form-control hidden" type="text" id="provinsi" name="provinsi">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="kota">Kota</label>
                                        <input class="form-control" type="text" id="kota-nama" name="kota_name">
                                        <input class="form-control hidden" type="text" id="kota" name="kota">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input class="form-control" type="text" id="kecamatan-nama" name="kecamatan_name">
                                        <input class="form-control hidden" type="text" id="kecamatan" name="kecamatan">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="negara">Negara</label>
                                        <input class="form-control" type="text" id="negara" name="negara">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="bank" role="tabpanel">
                                <table id="table-bank">
                                    <thead>
                                        <th>Nama Rekening</th>
                                        <th>Info Bank</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            
                            <div class="tab-pane" id="pic-pane" role="tabpanel">
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="pic">Nama Penanggung Jawab (Person in Change)</label>
                                        <input class="form-control" type="text" id="pic" name="pic">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="no_pictel">No Telepon</label>
                                        <input class="form-control" type="text" id="no_telp_pic" name="no_telp_pic">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="email_pic">Email</label>
                                        <input class="form-control" type="text" id="email_pic" name="email_pic">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Save Button --}}
                    <div class="card-form-footer">
                        <div class="footer-form-container">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    @include('modal_search')

    <!-- MODAL BANK-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-bank">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Data Bank</h6>
                    <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="no_rek">No. Rekening</label>
                            <input class="form-control" type="text" id="no_rek" name="no_rek" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="nama_rek">Nama Rekening</label>
                            <input class="form-control" type="text" id="nama_rek" name="nama_rek" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="bank">Bank</label>
                            <input class="form-control" type="text" id="bank" name="bank" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="cabang">Cabang</label>
                            <input class="form-control" type="text" id="cabang" name="cabang" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="save-bank" class="btn btn-primary" type="button">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL --> 

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    // Small Form
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    $('#error-vendor').hide();
    var telp = '';
    var provinceCall = 0;
    var kotaCall = 0;
    var kecamatanCall = 0;
    var $dtProvinsi = []
    var $dtKota = []
    var $dtKecamatan = []
    var telp_pic = '';
    var valid = true;
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var dataBank = [];
    var tableBank = $('#table-bank').DataTable({
        'dom': '<"search-bank"f><"jumlah-data"><"tambah-bank"B>',
        'language': { search: '', searchPlaceholder: 'Cari Bank...'},
        'buttons': [
            {
                text: 'Tambah',
                action: function() {
                    $('#modal-bank').modal('show')
                    $('#save-bank').removeAttr("rowindex");
                    $('#modal-bank input').val('')
                }
            }
        ],
        "responsive": true,
        "paging": false, 
        'data': dataBank,
        'columns': [
            {
                name: "data-rek",
                data: function(row, type, set) {
                    return "<p class='nama-rek'>"+row.nama_rek+"</p>"+"<p>"+row.no_rek+"</p>"
                }
            },
            {
                name: "data-bank",
                data: function(row, type, set) {
                    return "<p class='nama-bank'>"+row.bank+"</p>"+"<p>"+row.cabang+"</p>"
                }
            },
            {
                data:null,
                defaultContent: "<i class='simple-icon-pencil edit-bank'></i>&nbsp;<i class='simple-icon-trash hapus-bank'></i>"
            }
        ]
    });
    var count = tableBank.data().count();
    
    $('#save-bank').attr('action', 'save');
    $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
    $('#table-bank_filter input[type="search"]').unbind().keyup(function(){
        tableBank.search($(this).val()).draw();
        count = tableBank.data().count();
        $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
    })
    $('#modal-bank #save-bank').click(function(){
        var data = {
            no_rek: $('#modal-bank #no_rek').val(),
            nama_rek: $('#modal-bank #nama_rek').val(),
            bank: $('#modal-bank #bank').val(),
            cabang: $('#modal-bank #cabang').val(),
        }
        if($(this).attr('action') === 'save') {
            dataBank.push(data);
            tableBank.row.add(data).draw();
            count = tableBank.data().count();
            $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
        } else if($(this).attr('action') === 'update') {
            tableBank.row($(this).attr('rowindex')).data(data).draw();
        }

        $('#modal-bank input').val('');
        $('#save-bank').attr('action', 'save');
        $('#save-bank').removeAttr("rowindex");
        $('#modal-bank').modal('hide')
    })
    $('#table-bank tbody').on('click', 'i.hapus-bank', function(){
        tableBank.row($(this).parents('tr')).remove().draw();
        count = tableBank.data().count();
        $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
    })
    $('#table-bank tbody').on('click', 'i.edit-bank', function(){
        var data = tableBank.row($(this).parents('tr')).data();
        var index = tableBank.row($(this).parents('tr')).index();
        $('#modal-bank input#no_rek').val(data.no_rek);
        $('#modal-bank input#nama_rek').val(data.nama_rek);
        $('#modal-bank input#bank').val(data.bank);
        $('#modal-bank input#cabang').val(data.cabang);
        $('#save-bank').attr('action', 'update');
        $('#save-bank').attr('rowindex', index);
        $('#modal-bank').modal('show');
    })

    $('#kode_vendor').blur(function() {
        cekVendor($(this).val())
    })

    function getProvinsi(value) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/provinsi') }}",
            data: { kode: value },
            dataType: 'json',
            success: function(result) {
                if(provinceCall == 0) {
                    $dtProvinsi.push(result.daftar.data)
                }
                provinceCall = 1

                $('#provinsi-nama').typeahead({
                    source:result.daftar.data,
                    displayText:function(item){
                        return item.province;
                    },
                    autoSelect:false,
                    changeInputOnSelect:false,
                    changeInputOnMove:false,
                    selectOnBlur:false,
                    afterSelect: function (item) {
                        $('#provinsi').val(item.province_id)
                        $('#provinsi-nama').val(item.province)
                        getKota(null,item.province_id)
                    }
                });
            }
        })
    }

    getProvinsi()

    function getKota(value, province) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/kota') }}",
            data: { kode: value, province: province },
            dataType: 'json',
            success: function(result) {
                if(kotaCall == 0) {
                    $dtKota.push(result.daftar.data)
                }
                kotaCall = 1

                $('#kota-nama').typeahead({
                    source:result.daftar.data,
                    displayText:function(item){
                        return item.city_name;
                    },
                    autoSelect:false,
                    changeInputOnSelect:false,
                    changeInputOnMove:false,
                    selectOnBlur:false,
                    afterSelect: function (item) {
                        $('#kota').val(item.city_id)
                        $('#kota-nama').val(item.city_name)
                        getKecamatan(null, item.city_id)
                    }
                });
            }
        })
    }

    function getKecamatan(value, city) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/kecamatan') }}",
            data: { kode: value, city: city },
            dataType: 'json',
            success: function(result) {
                if(kecamatanCall == 0) {
                    $dtKecamatan.push(result.daftar.data)
                }
                kecamatanCall = 1
                
                $('#kecamatan-nama').typeahead({
                    source:result.daftar.data,
                    displayText:function(item){
                        return item.subdistrict_name;
                    },
                    autoSelect:false,
                    changeInputOnSelect:false,
                    changeInputOnMove:false,
                    selectOnBlur:false,
                    afterSelect: function (item) {
                        $('#kecamatan').val(item.subdistrict_id)
                        $('#kecamatan-nama').val(item.subdistrict_name)
                    }
                });
            }
        })
    }

    function getOneKecamatan(value, city) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/kecamatan') }}",
            data: { kode: value, city: city },
            dataType: 'json',
            async: false,
            success: function(result) {
                var data = result.daftar.data;
                $('#kota-nama').val(data.city_name)
                $('#kota').val(data.city_id)
            }
        })
    }

    function cekVendor(value) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/vendor-check') }}",
            data: { kode: value },
            dataType: 'json',
            async:false,
            success:function(result){ 
                if(result.data) {
                    valid = true;
                    $('#error-vendor').text('')
                    $('#error-vendor').hide();
                } else {
                    valid = false;
                    $('#error-vendor').text('Kode Supplier sudah ada')
                    $('#error-vendor').show();
                }
            }
        })
    }

    function onChangeProvinsi(value,action=null) {
        if(action == 'change') {
            var filter = $dtProvinsi[0].filter(function(data){
                return data.province.toLowerCase() == value.toLowerCase()
            })
            $('#provinsi-nama').val(filter[0].province)
            $('#provinsi').val(filter[0].province_id)
            getKota(null, filter[0].province_id)
        }
    }

    function onChangeKota(value,action=null) {
        if(action == 'change') {
            var filter = $dtKota[0].filter(function(data){
                return data.city_name.toLowerCase() == value.toLowerCase()
            })
            $('#kota-nama').val(filter[0].city_name)
            $('#kota').val(filter[0].city_id)
            getKecamatan(null, filter[0].city_id)
        }
    }

    function onChangeKecamatan(value,action=null) {
        if(action == 'change') {
            var filter = $dtKecamatan[0].filter(function(data){
                return data.subdistrict_name.toLowerCase() == value.toLowerCase()
            })
            $('#kecamatan-nama').val(filter[0].subdistrict_name)
            $('#kecamatan').val(filter[0].subdistrict_id)
            getKecamatan(null, filter[0].subdistrict_id)
        }
    }

    $('#provinsi-nama').on('change', function(){
        var value = $(this).val()
        onChangeProvinsi(value, 'change')
    })

    $('#kota-nama').on('change', function(){
        var value = $(this).val()
        onChangeKota(value, 'change')
    })

    $('#kecamatan-nama').on('change', function(){
        var value = $(this).val()
        onChangeKecamatan(value, 'change')
    })


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
    
    // BAGIAN CBBL 
    var $target = "";
    var $target2 = "";
    
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

    function getAkun(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor-akun') }}",
            dataType: 'json',
            data:{'kode_akun':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('akun_hutang',result.daftar[0].kode_akun,result.daftar[0].nama);
                    }else{
                        $('#akun_hutang').attr('readonly',false);
                        $('#akun_hutang').css('border-left','1px solid #d7d7d7');
                        $('#akun_hutang').val('');
                        $('#akun_hutang').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id : id,
            header : ['Kode', 'Nama'],
            url : "{{ url('java-master/vendor-akun') }}",
            columns : [
                { data: 'kode_akun' },
                { data: 'nama' }
            ],
            judul : "Daftar Akun",
            pilih : "akun",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["30%","70%"],
        });
    });

    $('#form-tambah').on('change', '#akun_hutang', function(){
        var par = $(this).val();
        getAkun(par);
    });

    // END BAGIAN CBBL

    // SUGGESSION DI CBBL
    var $dtVendor = new Array();

    function getVendorAkun() {
        $.ajax({
            type:'GET',
            url:"{{ url('java-master/vendor-akun') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    
                    for(i=0;i<result.daftar.length;i++){
                        $dtVendor[i] = {kode_akun:result.daftar[i].kode_akun};  
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getVendorAkun();

    $('#akun_hutang').typeahead({
        source: function (cari, result) {
            result($.map($dtVendor, function (item) {
                return item.kode_akun;
            }));
        },
        afterSelect: function (item) {
            // console.log('cek');
        }
    });
    // END SUGGESTION

    // PLUGIN SCROLL di bagian preview dan form input
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('java-master/vendor') }}", 
        [
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
        ],
        [
            { data: 'kode_vendor' },
            { data: 'nama' },
            { data: 'alamat' },
            { data: 'tgl_input' },
        ],
        "{{ url('java-auth/sesi-habis') }}",
        [[3 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA


    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        tableBank.clear().draw();
        count = tableBank.data().count();
        $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
        $('#row-id').hide();
        $('#kode-vendor').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Supplier');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_vendor').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });
    // END BUTTON TAMBAH
    
    // BUTTON KEMBALI
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
    
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            nama:{
                required: true,
                maxlength:50   
            },
            no_telp:{
                required: true, 
                maxlength:50  
            },
            email:{
                required: true,
                maxlength:50  
            },
            akun_hutang:
            {
                required: true,
                maxlength:20
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_vendor').val();
            var telpNow = $('#no_telp').val();
            var telpPicNow = $('#no_telp_pic').val();
            if(parameter == "edit"){
                var url = "{{ url('java-master/vendor-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('java-master/vendor') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var bank = dataBank;
            var formData = new FormData(form);
            for(var i=0;i<bank.length;i++) {
                formData.append('no_rek[]', bank[i].no_rek)
                formData.append('nama_rek[]', bank[i].nama_rek)
                formData.append('bank[]', bank[i].bank)
                formData.append('cabang[]', bank[i].cabang)
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(valid == false) {
                Swal.fire({
                        type: 'error',
                        title: 'Gagal simpan data',
                        text: 'Kode supplier sudah tersimpan',
                        footer: ''
                })
                return;
            }

            if(parameter == 'edit') {
                if(telp_pic == telpPicNow || telp == telpNow) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal update data',
                        text: 'No telp dan No telp PIC mohon untuk diubah',
                        footer: ''
                    })
                    return;
                }
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
                    if(result.data.status){
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#kode-vendor').hide()
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Supplier');
                        $('#method').val('post');
                        $('#kode_vendor').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_vendor",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode vendor sudah digunakan'
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
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-master/vendor') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Supplier ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
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

    // END BUTTON HAPUS
    
    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/vendor-show') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    dataBank = [];
                    tableBank.clear().draw();
                    telp = result.data[0].no_tel;
                    telp_pic = result.data[0].no_pictel;
                    $('#kode-vendor').show()
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_vendor').attr('readonly', true);
                    $('#kode_vendor').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#no_telp').val(result.data[0].no_telp);
                    $('#email').val(result.data[0].email);
                    $('#alamat').val(result.data[0].alamat);
                    $('#kode_pos').val(result.data[0].kode_pos);
                    $('#provinsi').val(result.data[0].provinsi);
                    $('#provinsi-nama').val(result.data[0].provinsi_name);
                    $('#kecamatan').val(result.data[0].kecamatan);
                    $('#kecamatan-nama').val(result.data[0].kecamatan_name);
                    $('#kota').val(result.data[0].kota);
                    $('#kota-nama').val(result.data[0].kota_name);
                    $('#negara').val(result.data[0].negara);
                    $('#pic').val(result.data[0].pic);
                    $('#no_telp_pic').val(result.data[0].no_telp_pic);
                    $('#email_pic').val(result.data[0].email_pic);          
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('akun_hutang',result.data[0].akun_hutang,result.data[0].nama_akun);
                    if(result.bank.length > 0) {
                        for(var i=0;i<result.bank.length;i++) {
                            dataBank.push({
                                no_rek: result.bank[i].no_rek,
                                nama_rek: result.bank[i].nama_rekening,
                                bank: result.bank[i].bank,
                                cabang: result.bank[i].cabang,
                            })    
                        }
                        tableBank.rows.add(dataBank).draw();
                        count = tableBank.data().count();
                        $('div.jumlah-data').html("Menampilkan "+count+" per halaman");
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Vendor');
        editData(id);
    });
    // END BUTTON EDIT
    
    // // HANDLER untuk enter dan tab
    // $('#kode_vendor,#nama,#no_tel,#no_fax,#email,#npwp,#pic,#no_pictel,#bank,#cabang,#no_rek,#nama_rek,#alamat,#alamat2,#akun_hutang').keydown(function(e){
    //     var code = (e.keyCode ? e.keyCode : e.which);
    //     var nxt = ['kode_vendor','nama','no_tel','no_fax','email','npwp','pic','no_pictel','bank','cabang','no_rek','nama_rek','alamat','alamat2','akun_hutang'];
    //     if (code == 13 || code == 40) {
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx++;
    //         if(idx == 15){
    //             var akun = $('#akun_hutang').val();
    //             getAkun(akun);
    //         }else{
    //             $('#'+nxt[idx]).focus();
    //         }
    //     }else if(code == 38){
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx--;
    //         if(idx != -1){ 
    //             $('#'+nxt[idx]).focus();
    //         }
    //     }
    // });

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 3){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('java-master/vendor-show') }}",
                data: { kode: id },
                dataType: 'json',
                async:false,
                success:function(res){ 
                     var html = `<tr>
                        <td style='border:none'>Kode Supplier</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>Nama Customer</td>
                        <td>`+data.nama+`</td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>`+res.data.data[0].no_telp+`</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>`+res.data.data[0].email+`</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>`+data.alamat+`</td>
                    </tr>
                    <tr>
                        <td>Kode POS</td>
                        <td>`+res.data.data[0].kode_pos+`</td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>`+res.data.data[0].provinsi_name+`</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>`+res.data.data[0].kecamatan_name+`</td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td>`+res.data.data[0].kota_name+`</td>
                    </tr>
                    <tr>
                        <td>Negara</td>
                        <td>`+res.data.data[0].negara+`</td>
                    </tr>
                    <tr>
                        <td>PIC</td>
                        <td>`+res.data.data[0].pic+`</td>
                    </tr>
                    <tr>
                        <td>No. Telp PIC</td>
                        <td>`+res.data.data[0].no_telp_pic+`</td>
                    </tr>
                    <tr>
                        <td>Email PIC</td>
                        <td>`+res.data.data[0].email_pic+`</td>
                    </tr>
                    <tr>
                        <td>Akun Hutang</td>
                        <td>`+res.data.data[0].akun_hutang+`-`+res.data.data[0].nama_akun+`</td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <table class='table table-bordered' id='table-bank-detail'>
                                <thead>
                                    <tr>
                                        <th>No. Rekening</th>    
                                        <th>Nama</th>    
                                        <th>Bank</th>    
                                        <th>Cabang</th>    
                                    </tr>    
                                </thead>
                                <tbody></tbody>
                            </table>
                        </td>
                    </tr>
                    `;

                    $('#table-preview tbody').html(html);
                    var html2;
                    if(res.data.bank.length > 0) {
                        for(var i=0;i<res.data.bank.length;i++) {
                        html2 += `<tr>
                            <td>`+res.data.bank[i].no_rek+`</td>
                            <td>`+res.data.bank[i].nama_rekening+`</td>
                            <td>`+res.data.bank[i].bank+`</td>
                            <td>`+res.data.bank[i].cabang+`</td>
                            </tr>` 
                        }
                    }
                    $('#table-bank-detail tbody').html(html2);
                    $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Vendor').removeClass('py-2');
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
        $('#judul-form').html('Edit Data Vendor');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });


    </script>
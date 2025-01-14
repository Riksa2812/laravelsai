<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css') }}" />

{{-- LIST DATA --}}
<x-list-data judul="Data Karyawan" tambah="true" :thead="array('NIK','Nama','Alamat','Aksi')" :thwidth="array(10,30,50,10)" :thclass="array('','','','text-center')" />
{{-- END LIST DATA --}}

{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs nav-tabs-custom col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-pribadi" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pribadi</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-pegawai" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Kepegawaian</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-bank" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Bank</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-client" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Client</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dokumen" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Dokumen</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">
                        <div class="tab-pane active" id="data-pribadi" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <label for="nik">NIK</label>
                                            <input class="form-control" type="text" placeholder="NIK" id="nik" name="nik" autocomplete="off">
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_ktp">Nomor KTP</label>
                                            <input class="form-control" type="text" placeholder="Nomor KTP" id="no_ktp" name="no_ktp" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select class="form-control selectize" name="jk" id="jk">
                                                <option value="L" selected>Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_agama">Agama</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_agama" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_agama" id="kode_agama" name="kode_agama" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_agama hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_agama"></i>
                                            </div>
                                        </div>  
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_telp">Nomor Telepon</label>
                                            <input class="form-control" type="text" placeholder="Nomor Telepon" id="no_telp" name="no_telp" autocomplete="off">
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_hp">Nomor HP</label>
                                            <input class="form-control" type="text" placeholder="Nomor HP" id="no_hp" name="no_hp" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tempat">Tempat Lahir</label>
                                            <input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat" name="tempat" autocomplete="off">
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <span class="span-tanggal" id="tanggal-lahir"></span>
                                            <input class='form-control datepicker' id="tgl_lahir" name="tgl_lahir" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="alamat">Alamat</label>
                                            <input class="form-control" type="text" placeholder="Alamat" id="alamat" name="alamat" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="provinsi">Provinsi</label>
                                            <input class="form-control" type="text" placeholder="Provinsi" id="provinsi" name="provinsi" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kota">Kota</label>
                                            <input class="form-control" type="text" placeholder="Kota" id="kota" name="kota" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input class="form-control" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input class="form-control" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_pos">Kode Pos</label>
                                            <input class="form-control" type="text" placeholder="Kode Pos" id="kode_pos" name="kode_pos" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="t_badan">Tinggi Badan</label>
                                            <input class="form-control currency" type="text" placeholder="Tinggi Badan" id="t_badan" name="t_badan" autocomplete="off" >
                                            <span class="satuan">Cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="b_badan">Berat Badan</label>
                                            <input class="form-control currency" type="text" placeholder="Berat Badan" id="b_badan" name="b_badan" autocomplete="off" >
                                            <span class="satuan">Kg</span>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="gol_darah">Golongan Darah</label>
                                            <select class="form-control selectize" name="gol_darah" id="gol_darah">
                                                <option value="A" selected>A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_kk">Nomor KK</label>
                                            <input class="form-control" type="text" placeholder="Nomor KK" id="no_kk" name="no_kk" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="status_nikah">Status Nikah</label>
                                            <select class="form-control selectize" name="status_nikah" id="status_nikah">
                                                <option value="0" selected>Tidak Menikah</option>
                                                <option value="1">Menikah</option>
                                                <option value="2">Cerai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_nikah">Tanggal Nikah</label>
                                            <span class="span-tanggal" id="tanggal-nikah"></span>
                                            <input class='form-control datepicker' id="tgl_nikah" name="tgl_nikah" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane" id="data-pegawai" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_gol">Golongan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_gol" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_gol" id="kode_gol" name="kode_gol" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_gol hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_gol"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_sdm">Status SDM</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_sdm" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_sdm" id="kode_sdm" name="kode_sdm" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_sdm hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_sdm"></i>
                                            </div>
                                        </div>
                                    </div>    
                                </div>    
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_unit">Unit</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_unit" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_unit" id="kode_unit" name="kode_unit" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_unit hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_unit"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_pp">PP</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_pp hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                            </div>
                                        </div>
                                    </div>    
                                </div>    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_loker">Lokasi Kerja</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_loker" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_loker" id="kode_loker" name="kode_loker" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_loker hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_loker"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_masuk">Tanggal Masuk</label>
                                            <span class="span-tanggal" id="tanggal-masuk"></span>
                                            <input class='form-control datepicker' id="tgl_masuk" name="tgl_masuk" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="npwp">Nomor NPWP</label>
                                            <input class="form-control" type="text" placeholder="Nomor NPWP" id="npwp" name="npwp" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_bpjs">Nomor BPJS Kesehatan</label>
                                            <input class="form-control" type="text" placeholder="Nomor BPJS Kesehatan" id="no_bpjs" name="no_bpjs" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_bpjs_kerja">Nomor BPJS Ketenagakerjaan</label>
                                            <input class="form-control" type="text" placeholder="Nomor BPJS Ketenagakerjaan" id="no_bpjs_kerja" name="no_bpjs_kerja" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_profesi">Profesi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_profesi" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_profesi" id="kode_profesi" name="kode_profesi" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_profesi hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_profesi"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane" id="data-bank" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="bank">Bank</label>
                                            <input class="form-control" type="text" placeholder="Bank" id="bank" name="bank" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="cabang">Cabang</label>
                                            <input class="form-control" type="text" placeholder="Cabang" id="cabang" name="cabang" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_rek">Nomor Rekening</label>
                                            <input class="form-control" type="text" placeholder="Nomor Rekening" id="no_rek" name="no_rek" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="nama_rek">Nama Rekening</label>
                                            <input class="form-control" type="text" placeholder="Nama Rekening" id="nama_rek" name="nama_rek" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <div class="tab-pane" id="data-client" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="client">Nama Client</label>
                                            <input class="form-control" type="text" placeholder="Nama Client" id="client" name="client" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="fungsi">Fungsi</label>
                                            <input class="form-control" type="text" placeholder="Fungsi" id="fungsi" name="fungsi" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="skill">Skill</label>
                                            <input class="form-control" type="text" placeholder="Skill" id="skill" name="skill" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_kontrak">Nomor Kontrak</label>
                                            <input class="form-control" type="text" placeholder="Nomor Kontrak" id="no_kontrak" name="no_kontrak" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_kontrak">Tanggal Kontrak</label>
                                            <span class="span-tanggal" id="tanggal-kontrak"></span>
                                            <input class='form-control datepicker' id="tgl_kontrak" name="tgl_kontrak" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_kontrak_akhir">Tanggal Kontrak Akhir</label>
                                            <span class="span-tanggal" id="tanggal-kontrak_akhir"></span>
                                            <input class='form-control datepicker' id="tgl_kontrak_akhir" name="tgl_kontrak_akhir" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="area">Area</label>
                                            <input class="form-control" type="text" placeholder="Area" id="area" name="area" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kota_area">Kota Area</label>
                                            <input class="form-control" type="text" placeholder="Kota Area" id="kota_area" name="kota_area" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="fm">FM</label>
                                            <input class="form-control" type="text" placeholder="FM" id="fm" name="fm" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="bm">BM</label>
                                            <input class="form-control" type="text" placeholder="BM" id="bm" name="bm" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="loker_client">Lokasi Kerja</label>
                                            <input class="form-control" type="text" placeholder="Lokasi Kerja" id="loker_client" name="loker_client" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="jabatan_client">Jabatan</label>
                                            <input class="form-control" type="text" placeholder="Jabatan" id="jabatan_client" name="jabatan_client" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="atasan_langsung">Atasan Langsung</label>
                                            <input class="form-control" type="text" placeholder="Atasan Langsung" id="atasan_langsung" name="atasan_langsung" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="atasan_t_langsung">Atasan Tidak Langsung</label>
                                            <input class="form-control" type="text" placeholder="Atasan Tidak Langsung" id="atasan_t_langsung" name="atasan_t_langsung" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div> 
                        <div class="tab-pane" id="data-dokumen" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <table id="input-dokumen" class="table table-bordered">
                                        <thead>
                                            <th style="width:3%;">No</th>
                                            <th style="width:25%;">Jenis</th>
                                            <th style="width:20%;">Dokumen</th>
                                            <th style="width:15%;">Status</th>
                                            <th style="width:10%;"></th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>    
                                </div>    
                            </div>    
                        </div> 
                    </div>
                </div>
                <div class="card-body-footer row" style="padding: 0 25px;">
                    <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                        <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                    </div>
                    <div style="text-align: right;" class="col-md-2 p-0 ">
                        <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- END FORM --}}

<button id="trigger-bottom-sheet" style="display:none">&nbsp;</button>

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
<script type="text/javascript">
// SET UP FORM
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var scroll = document.querySelector('#content-preview');
new PerfectScrollbar(scroll);

var scrollForm = document.querySelector('#form-body');
new PerfectScrollbar(scrollForm);

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;
// END SET UP FORM

// OPTIONAL CONFIG
$('.selectize').selectize();

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    oncleared: function () { return false; }
});

$('#tgl_lahir').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-lahir',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_nikah').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-nikah',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_masuk').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-masuk',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_kontrak').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-kontrak',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_kontrak_akhir').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-kontrak_akhir',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})
// END OPTIONAL CONFIG

// BTN TAMBAH
$('#saku-datatable').on('click', '#btn-tambah', function() {
    $('#preview').hide();
    $('#nik').attr('readonly', false);
    $('#judul-form').html('Tambah Data Karyawan');
    newForm();
    setRowDefault()
});
//  END BTN TAMBAH

// BTN KEMBALI
$('#saku-form').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        type:'keluar'
    });
}); 
// END BTN KEMBALI

// SAKU TABLE
var actionHtmlDefault = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
var dataTable = 
generateTable(
    "table-data",
    "{{ url('esaku-trans/v2/sdm-karyawans') }}", 
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
        {'targets': 3 ,'className': 'text-center', 'defaultContent': actionHtmlDefault,'className': 'text-center' }
    ],
    [
        { data: 'nik' },
        { data: 'nama' },
        { data: 'alamat' }
    ],
    "{{ url('esaku-auth/sesi-habis') }}",
    [[0 ,"desc"]]
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
// END SAKU TABLE

// CBBL SAKU FORM
$('#form-tambah').on('click', '.search-item2', function(e) {
    var id = $(this).closest('div').find('input').attr('name');  
    var options = {}
    switch(id) {
        case 'kode_sdm':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-statuss') }}",
                columns : [
                    { data: 'kode_sdm' },
                    { data: 'nama' }
                ],
                judul : "Daftar Status SDM",
                pilih : "SDM",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_gol':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-golongans') }}",
                columns : [
                    { data: 'kode_gol' },
                    { data: 'nama' }
                ],
                judul : "Daftar Golongan SDM",
                pilih : "Golongan",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_unit':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-units') }}",
                columns : [
                    { data: 'kode_unit' },
                    { data: 'nama' }
                ],
                judul : "Daftar Unit SDM",
                pilih : "Unit",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_pp':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-pp') }}",
                columns : [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ],
                judul : "Daftar PP",
                pilih : "PP",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_loker':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-lokers') }}",
                columns : [
                    { data: 'kode_loker' },
                    { data: 'nama' }
                ],
                judul : "Daftar Lokasi Kerja",
                pilih : "Loker",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_agama':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-agamas') }}",
                columns : [
                    { data: 'kode_agama' },
                    { data: 'nama' }
                ],
                judul : "Daftar Agama",
                pilih : "Agama",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_profesi':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-profesis') }}",
                columns : [
                    { data: 'kode_profesi' },
                    { data: 'nama' }
                ],
                judul : "Daftar Profesi",
                pilih : "Profesi",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
    }
    showInpFilterBSheet(options);
})

$('.info-icon-hapus').click(function(){
    var par = $(this).closest('div').find('input').attr('name');
    $('#'+par).val('');
    $('#'+par).attr('readonly',false);
    $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_'+par).parent('div').addClass('hidden');
    $('.info-name_'+par).addClass('hidden');
    $(this).addClass('hidden');
    $('#'+par).trigger('change');
});
// END CBBL SAKU FORM

// GRID FORM
$(document).on('click', function() {
    hideAllSelectedRow()
})

function hideAllSelectedRow() {
    $('table[id^=input]').each(function(index, table) {
        $(table).children('tbody').each(function(index, tbody) {
            $(tbody).children('tr').each(function(index, tr) {
                $(tr).children('td').not(':first, :last').each(function(index, td) {
                    var value = $(td).children('.input-value').val()
                    $(td).children('.input-value').val(value)
                    $(td).children('span').not('.not-show, .readonly').text(value)
                    $(td).children('.input-value').hide()
                    $(td).children('a').not('.hapus-item, .download-item').hide()
                    $(td).children('span').not('.not-show').show()
                })
            })
        })
        $(table).find('tr').removeClass('selected-row')
        $(table).find('td').removeClass('selected-cell')
        $(table).find('.input-value').hide()
        $(table).find('a').not('.hapus-item, .download-item').hide()
        $(table).find('span').not('.not-show').show()
    })
}

function hideUnselectedRow(tbody) {
    tbody.find('tr').not('.selected-row').each(function(index, tr) {
        $(tr).find('td').not(':first, :last').each(function(index, td) {
            var value = $(td).children('.input-value').val()
            $(td).children('.input-value').val(value)
            $(td).children('span').not('.not-show, .readonly').text(value)
            $(td).children('.input-value').hide()
            $(td).children('a').not('.hapus-item, .download-item').hide()
            $(td).children('span').not('.not-show').show()
        })
    }) 
}

function hideUnselectedCell(tr) {
    tr.find('td').not(':first, :last, .readonly').each(function(index, td) {
        var value = $(td).children('.input-value').val()
        $(td).children('.input-value').val(value)
        $(td).children('span').not('.not-show, .readonly').text(value)
        if($(td).hasClass('selected-cell')) {
            $(td).children('span').hide()
            $(td).children('.input-value').show()
            $(td).children('a').not('.hapus-item, .download-item').show()
                setTimeout(function() {
                $(td).children('.input-value').focus()
            }, 500)
        } else {
            $(td).children('.input-value').hide()
            $(td).children('a').not('.hapus-item, .download-item').hide()
            $(td).children('span').not('.not-show').show()
        }
    }) 
}

function nextSelectedCell(tr, td, index) {
    var value = $(td).children('.input-value').val()
    $(td).children('.input-value').val(value)
    $(td).children('span').not('.not-show, .readonly').text(value)
    $(td).children('span').not('.not-show').show()
    $(td).children('.input-value').hide()
    $(td).children('a').not('.hapus-item, .download-item').hide()

    var nextindex = index + 1; 
    var tdnext = $(tr).find('td').eq(nextindex)
    var cekReadonly = $(tdnext).hasClass('readonly')
    if(cekReadonly) {
        nextindex = nextindex + 1
        tdnext = $(tr).find('td').eq(nextindex)
    }
    var cekCbbl = $(tdnext).has('a').length
    if(cekCbbl > 0) {
        $(tdnext).children('a').show()
    }

    $(tdnext).children('span').hide()
    $(tdnext).children('.input-value').show()
    setTimeout(function() {
        $(tdnext).children('.input-value').focus()
    }, 500)
}

function setRowDefault() {
    var jenis = ['CV', 'KTP', 'FOTO', 'NPWP', 'BPJS KESEHATAN', 'BPJS KETENAGAKERJAAN', 'BUKU REKENING', 'KARTU KELUARGA', 'KONTRAK']
    $('#input-dokumen tbody').empty()
    var no= $('#input-dokumen tbody > tr').length;
    no = no + 1;
    var html = null;
    for(var i=0;i<jenis.length;i++) {
        var idJenis = 'jenis-ke__'+no
        var idDokumen = 'dokumen-ke__'+no
        var idStatus = 'status-ke__'+no

        html += `<tr class="row-grid">
            <td class="text-center">
                <span class="no-grid ">${no}</span>
                <input type="hidden" name="nu[]" value="${no}">
            </td>
            <td id="${idJenis}">
                <span id="text-${idJenis}" class="tooltip-span">${jenis[i]}</span>
                <input autocomplete="off" type="hidden" id="value-${idJenis}" name="jenis[]" class="form-control input-value hidden" value="${jenis[i]}" >
            </td>
            <td id="${idDokumen}" style="word-wrap: break-word">
                <input id='value-${idDokumen}' type='file' name='file[]'>
                <input type="hidden" name="fileName[]" id="fileName-${idDokumen}" value="-">
                <input type="hidden" name="filePrevName[]" value="-">
                <input type="hidden" name="isUpload[]" id="checkUpload-${idDokumen}" value="false">
            </td>    
            <td id="${idStatus}">
                <span id="text-${idStatus}" class="tooltip-span">Belum Diupload</span>
                <input autocomplete="off" type="hidden" id="value-${idStatus}" name="sts_dokumen[]" class="form-control input-value hidden" value="0" >
            </td>
        </tr>
        `;

        no++;    
    }
    $('#input-dokumen tbody').append(html)

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });
}

$('#input-dokumen tbody').on('click', 'td', function(event) {
    event.stopPropagation();
    var tr = $(this).parent()
    var tbody = $(tr).parent()
    $(tr).addClass('selected-row')
    $(this).addClass('selected-cell');
    tr.children().not(this).removeClass('selected-cell');
    tbody.children().not($(tr)).removeClass('selected-row')
    hideUnselectedCell(tr);
    hideUnselectedRow(tbody)
});

$('#input-dokumen tbody').on('change', 'input[type="file"]', function() {
    var uid = $('#nik').val();
    var td = $(this).parent()
    var id = $(td).attr('id')
    var file = uid + '_' + $(this).val().replace(/C:\\fakepath\\/i, '')
    $(td).children('#fileName-'+id).val(file)
    $(td).children('#checkUpload-'+id).val("true")
    $(td).children('#value-'+id).val("1")
})
// END GRID FORM

// SAVE TRIGGER
$('#form-tambah').validate({
    ignore: [],
    rules: {},
    errorElement: "label",
    submitHandler: function (form, event) {
        event.preventDefault()
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "true"){
            var url = "{{ url('esaku-trans/v2/sdm-karyawan-update') }}";
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        } else {
            var url = "{{ url('esaku-trans/v2/sdm-karyawan') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+id;
        }

        var formData = new FormData(form);
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
                if(result.data.status){
                    var kode = result.data.kode;
                    dataTable.ajax.reload();
                    $('#preview').hide()
                    $('#judul-form').html('Tambah Data Karyawan');
                    $('#nik').attr('readonly', false);
                    resetForm();
                    msgDialog({
                        id: kode,
                        type: 'simpan'
                    });
                    last_add(dataTable,"nik", kode);
                    $('#id_edit').val('false')
                } else if(!result.data.status && result.data.message === "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            },
            error: function(xhr, status, error) {
                var error = JSON.parse(xhr.responseText);
                var detail = Object.values(error.errors);
                if(xhr.status == 422){
                    var keys = Object.keys(error.errors);
                    var tab =  $('#'+keys[0]).parents('.tab-pane').attr('id');
                    $('a[href="#'+tab+'"]').click();
                    $('#'+keys[0]).addClass('error');
                    $('#'+keys[0]).parent('.input-group').addClass('input-group-error');
                    $("label[for="+keys[0]+"]").append("<br/>");
                    $("label[for="+keys[0]+"]").append('<label id="'+keys[0]+'-error" class="error" for="'+keys[0]+'">'+detail[0]+'</label>');
                    $('#'+keys[0]).focus();
                }
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
// END SAVE TRIGGER

// EDIT DATA
$('#saku-form').on('click', '#btn-update', function(){
    var kode = $('#nik').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});

$('#saku-datatable').on('click', '#btn-edit', function(){
    var id= $(this).closest('tr').find('td').eq(0).html();
    $('#nik').attr('readonly', true);
    editData(id)
});

function editData(id, view = false) { 
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Karyawan');

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/v2/sdm-karyawan') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(res) {
            var jenis = ['CV', 'KTP', 'FOTO', 'NPWP', 'BPJS KESEHATAN', 'BPJS KETENAGAKERJAAN', 'BUKU REKENING', 'KARTU KELUARGA', 'KONTRAK']
            $('#input-dokumen tbody').empty()
            var data = res.data.data[0]
            var detail = res.data.data_detail
            console.log(res)
            console.log(data)
            if(res.data.status) {
                $('#id_edit').val('true')
                
                isiEdit(id, "text",'#nik', true);
                isiEdit(data.nama,"text",'#nama',view);
                isiEdit(data.no_ktp,"text",'#no_ktp',view);
                isiEdit(data.no_telp,"text",'#no_telp',view);
                isiEdit(data.no_hp,"text",'#no_hp',view);
                isiEdit(data.tempat,"text",'#tempat',view);
                isiEdit(data.alamat,"text",'#alamat',view);
                isiEdit(data.provinsi,"text",'#provinsi',view);
                isiEdit(data.kota,"text",'#kota',view);
                isiEdit(data.kecamatan,"text",'#kecamatan',view);
                isiEdit(data.kelurahan,"text",'#kelurahan',view);
                isiEdit(data.kode_pos,"text",'#kode_pos',view);
                isiEdit(data.no_kk,"text",'#no_kk',view);
                isiEdit(data.npwp,"text",'#npwp',view);
                isiEdit(data.no_bpjs,"text",'#no_bpjs',view);
                isiEdit(data.no_bpjs_kerja,"text",'#no_bpjs_kerja',view);
                isiEdit(data.bank,"text",'#bank',view);
                isiEdit(data.cabang,"text",'#cabang',view);
                isiEdit(data.no_rek,"text",'#no_rek',view);
                isiEdit(data.nama_rek,"text",'#nama_rek',view);
                isiEdit(data.client,"text",'#client',view);
                isiEdit(data.fungsi,"text",'#fungsi',view);
                isiEdit(data.skill,"text",'#skill',view);
                isiEdit(data.no_kontrak,"text",'#no_kontrak',view);
                isiEdit(data.area,"text",'#area',view);
                isiEdit(data.kota_area,"text",'#kota_area',view);
                isiEdit(data.fm,"text",'#fm',view);
                isiEdit(data.bm,"text",'#bm',view);
                isiEdit(data.loker_client,"text",'#loker_client',view);
                isiEdit(data.jabatan_client,"text",'#jabatan_client',view);
                isiEdit(data.atasan_langsung,"text",'#atasan_langsung',view);
                isiEdit(data.atasan_t_langsung,"text",'#atasan_t_langsung',view);
                
                isiEdit(parseFloat(data.t_badan),"number",'#t_badan',view);
                isiEdit(parseFloat(data.b_badan),"number",'#b_badan',view);
                
                isiEdit(data.tgl_lahir,"date",'#tgl_lahir',view);
                isiEdit(reverseDate(data.tgl_nikah,'-','/'),"date",'#tgl_nikah',view);
                isiEdit(data.tgl_masuk,"date",'#tgl_masuk',view);
                isiEdit(data.tgl_kontrak,"date",'#tgl_kontrak',view);
                isiEdit(data.tgl_kontrak_akhir,"date",'#tgl_kontrak_akhir',view);

                isiEdit(data.jk,"select",'#jk',view, "L");
                isiEdit(data.status_nikah,"select",'#status_nikah',view, "0");
                isiEdit(data.gol_darah,"select",'#gol_darah',view, "A");
                
                showInfoField('kode_agama', data.kode_agama, data.nama_agama)
                showInfoField('kode_gol', data.kode_gol, data.nama_gol)
                showInfoField('kode_sdm', data.kode_sdm, data.nama_sdm)
                showInfoField('kode_unit', data.kode_unit, data.nama_unit)
                showInfoField('kode_pp', data.kode_pp, data.nama_pp)
                showInfoField('kode_loker', data.kode_loker, data.nama_loker)
                showInfoField('kode_profesi', data.kode_profesi, data.nama_profesi)

                if(detail.length == jenis.length) {
                    var html = null
                    for(var i=0;i<detail.length;i++) {
                        var row = detail[i];
                        var idJenis = 'jenis-ke__'+row.nu
                        var idDokumen = 'dokumen-ke__'+row.nu
                        var idStatus = 'status-ke__'+row.nu
                        var status = null;
                        if(row.sts_dokumen.trim() == '0') {
                            status = 'Belum diupload'
                        } else {
                            status = 'Sudah diupload'
                        }
                        console.log(status)
                        html += `<tr class="row-grid">
                            <td class="text-center">
                                <span class="no-grid ">${row.nu}</span>
                                <input type="hidden" name="nu[]" value="${row.nu}">
                            </td>
                            <td id="${idJenis}">
                                <span id="text-${idJenis}" class="tooltip-span">${row.jenis}</span>
                                <input autocomplete="off" type="hidden" id="value-${idJenis}" name="jenis[]" class="form-control input-value hidden" value="${row.jenis}" >
                            </td>
                            <td id="${idDokumen}" style="word-wrap: break-word">
                                <input id='value-${idDokumen}' type='file' name='file[]'>
                                <input type="hidden" name="fileName[]" id="fileName-${idDokumen}" value="-">
                                <input type="hidden" name="filePrevName[]" value="${row.dokumen}">
                                <input type="hidden" name="isUpload[]" id="checkUpload-${idDokumen}" value="false">
                            </td>    
                            <td id="${idStatus}">
                                <span id="text-${idStatus}" class="tooltip-span readonly">${status}</span>
                                <input autocomplete="off" type="hidden" id="value-${idStatus}" name="sts_dokumen[]" class="form-control input-value hidden" value="${row.sts_dokumen}" >
                            </td>
                            <td>`
                            if(row.dokumen != '-') {
                            html += `<a class="download-item" href="{{ config('api.url').'sdm/storage'}}/${row.dokumen}" 
                                title="Lihat Foto" style="font-size:12px;cursor:pointer;" target="_blank">
                                    <i class="simple-icon-cloud-download"></i>
                                </a>`
                            }
                        html += `</td>
                        </tr>`;
                    }
                    $('#input-dokumen tbody').append(html)

                    $('.tooltip-span').tooltip({
                        title: function(){
                            return $(this).text();
                        }
                    });
                } else {
                    setRowDefault()
                }
                $('#saku-datatable').hide();
                $('#modal-preview').modal('hide');
                $('#saku-form').show();
                setHeightForm();
                setWidthFooterCardBody();
            } 
        }
    })
}
// END EDIT DATA
</script>
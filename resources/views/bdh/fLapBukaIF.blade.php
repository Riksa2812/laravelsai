<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Pembukaan IF" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                    <x-inp-filter kode="no_bukti" nama="No Bukti" selected="1" :option="array('1','2','3','i')"/>
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging :option="array()" default="10" />
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Laporan Pembukaan IF" padding="px-0 py-4"/>
@include('modal_search')
@include('modal_email')
    
 @php
    date_default_timezone_set("Asia/Bangkok");
@endphp
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
    }
});

var $no_bukti = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}
var $periode = {
    type : "=",
    from : "{{ date('Ym') }}",
    fromname : namaPeriode("{{ date('Ym') }}"),
    to : "",
    toname : "",
}

var $aktif = "";

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#periode-from').val(namaPeriode("{{ date('Ym') }}"));

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

$('.selectize').selectize();

$('#inputFilter').reportFilter({
    kode : ['periode','no_bukti'],
    nama : ['Periode','No Bukti'],
    header : [
        ['Periode'],
        ['No Bukti','Keterangan']
    ],
    headerpilih : [
        ['Periode','Action'],
        ['No Bukti','Keterangan','Action']
    ],
    columns: [
        [
            { data: 'periode' },
        ],
        [
            { data: 'no_kas' },
            { data: 'keterangan' }
        ]
    ],
    url :[
        "{{ url('bdh-report/filter-periodebayar') }}",
        "{{ url('bdh-report/filter-nobayar') }}"
    ],
    parameter:[
        {},
        {
            'periode[0]': $periode.type,
            'periode[1]': $periode.from,
            'periode[2]': $periode.to,
        }
    ],
    orderby:[
        [[0,"desc"]],
        [[0,"desc"]]
    ],
    width:[
        ['30%','70%'],
        ['30%','70%']
    ],
    display:[
        'kode',
        'kode'
    ],
    pageLength:[
        10,
        10
    ]
})

$('#inputFilter').on('change','input',function(e){
    setTimeout(() => {
    $('#inputFilter').reportFilter({
        kode : ['periode','no_bukti'],
        nama : ['Periode','No Bukti'],
        header : [
            ['Periode'],
            ['No Bukti','Keterangan']
        ],
        headerpilih : [
            ['Periode','Action'],
            ['No Bukti','Keterangan','Action']
        ],
        columns: [
            [
                { data: 'periode' },
            ],
            [
                { data: 'no_kas' },
                { data: 'keterangan' }
            ]
        ],
        url :[
            "{{ url('bdh-report/filter-periodebayar') }}",
            "{{ url('bdh-report/filter-nobayar') }}"
        ],
        parameter:[
            {},
            {
                'periode[0]': $periode.type,
                'periode[1]': $periode.from,
                'periode[2]': $periode.to,
            }
        ],
        orderby:[
            [[0,"desc"]],
            [[0,"desc"]]
        ],
        width:[
            ['30%','70%'],
            ['30%','70%']
        ],
        display:[
            'kode',
            'kode'
        ],
        pageLength:[
            10,
            10
        ]
    })
    }, 500)
});

var $formData = "";
$('#form-filter').submit(function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("periode[]",$periode.type);
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]",$periode.to);
    $formData.append("no_bukti[]",$no_bukti.type);
    $formData.append("no_bukti[]",$no_bukti.from);
    $formData.append("no_bukti[]",$no_bukti.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('bdh-auth/form/rptBukaIF') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#show').change(function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("periode[]",$periode.type);
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]",$periode.to);
    $formData.append("no_bukti[]",$no_bukti.type);
    $formData.append("no_bukti[]",$no_bukti.from);
    $formData.append("no_bukti[]",$no_bukti.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('bdh-auth/form/rptBukaIF') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#sai-rpt-print').click(function(){
    $('#saku-report #canvasPreview').printThis({
        removeInline: true
    });
});

$('#sai-rpt-print-prev').click(function(){
    var newWindow = window.open();
    var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
    newWindow.document.write(html);
});

$("#sai-rpt-excel").click(function(e) {
    e.preventDefault();
    $("#saku-report #canvasPreview").table2excel({
        // exclude: ".excludeThisClass",
        name: "Lap_Ver_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
        filename: "Lap_Ver_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
        preserveColors: false // set to true if you want background colors and font colors preserved
    });
});

$("#sai-rpt-email").click(function(e) {
    e.preventDefault();
    alert('Incoming')
    // $('#formEmail')[0].reset();
    // $('#modalEmail').modal('show');
});

$("#sai-rpt-pdf").click(function(e) {
    e.preventDefault();
    alert('Incoming')
    // var link = "{{ url('esaku-report/lap-jurnal-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&modul[]="+$modul.type+"&modul[]="+$modul.from+"&modul[]="+$modul.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to+"&sum_ju[]="+$sum_ju.type+"&sum_ju[]="+$sum_ju.from+"&sum_ju[]="+$sum_ju.to;
    // window.open(link, '_blank'); 
});
</script>
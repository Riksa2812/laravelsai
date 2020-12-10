<style>
    body {
        overflow: auto; /* Hide scrollbars */
    }
    .card{
        border-radius: 10px !important;
        box-shadow: none;
        border: 1px solid #f0f0f0;
    }
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }

    /* NAV TABS */
    .nav-tabs {
        border:none;
    }

    .nav-tabs .nav-link{
        border: 1px solid #ad1d3e;
        border-radius: 20px;
        padding: 2px 25px;
        color:#ad1d3e;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: white;
        background-color: #ad1d3e;
        border-color: #ad1d3e;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
        padding: 0px 10px 0px 0px;
    }
    .select-dash {
        border-radius: 10px;
    }
    .box-container {
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .subbox-container{
        margin-top: -10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .box{
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .keterangan {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 10px 0;
        padding-bottom: 10px;
        width: 100%;
        z-index: 1;
    }
    .footer-dashboard {
        width: 100%;
        margin-left: 15px;
        margin-bottom: 100px;
        height: 50px;
    }
    .dropdown-menu {
        max-height: 130px;
        overflow: scroll;
        overflow-x: hidden;
        margin-top: 0px;
        padding-left: 5px;
    }
    .dropdown-menu > li {
        cursor: pointer;
    }
    .dropdown-menu > li:hover {
        background-color: #F5F5F5;
    }
</style>
    <div id="filter-header">
        <div class="row">
            <div class="col-12">
                <h6>Biaya Kunjungan</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <select id="jenis" class="form-control select-dash">
                    <option value="CC" selected>Pensiunan dan Keluarga</option>
                    <option value="BP">Pegawai dan Keluarga</option>
                </select>
            </div>
            <div class="col-2">
                <div class="dropdown">
                    <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 160px;text-align:left;" type="button" data-toggle="dropdown">
                        {{Session::get('periode')}}
                        <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        
                    </ul>
                </div>
                {{-- <select id="periode" class="form-control select-dash">

                </select> --}}
            </div>
        </div>
    </div>

    <div class="row" style="position: relative;margin-top:30px;">
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;" id="claim-ket"></h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="claim" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;" id="ach-claim"></span>
                </div>
                <div style="padding-right: 30px;" id="yoy-claim">

                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi</h6>
            <div id="komposisi" class="mt-3"></div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">CC per Claimant</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="pkk-cc" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 81.56%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">7.94%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-12">
        <div class="card">    
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;" id="ket-layanan"></h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div class="row">
                <div class="col-3">
                    <div id="rjtp" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-rjtp"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-rjtp">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="rjtl" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-rjtl"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-rjtl">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="ri" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-ri"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-ri">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="restitusi" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-restitusi"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-restitusi">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;margin-bottom:5px !important;">
    <div class="col-6">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div id="pkk-kunjungan" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 86.80%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-up-circle" style="font-size: 18px;color:#228B22;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">0.17%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi Kunjungan</h6>
            <div id="pkk-komposisi-kunj" class="mt-3"></div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 20px;">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div class="row">
                <div class="col-3">
                    <div id="pkk-rjtp-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;font-size:12px;">Ach. 90.1%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-up-circle" style="font-size: 12px;color: #228B22;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">6.1%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-rjtl-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 81.2%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">10.8%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-ri-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 63.3%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">27.7%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-restitusi-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 79.6%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">6.6%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-dashboard">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-light" style="position: absolute;left: 0;">Dashboard Selanjutnya</button>
        </div>
    </div>
</div>

<script type="text/javascript">
var periode = "{{Session::get('periode')}}";
var pembagi = 1000000000;
var jenis = $('#jenis').val();
var header = document.getElementById('filter-header');
var sticky = header.offsetTop;
window.onscroll = function() {
    if(window.pageYOffset > sticky) {
        header.classList.add('fixed-filter')
    } else {
        header.classList.remove('fixed-filter')
    }
}

if(jenis == 'CC') {
    $('#claim-ket').text('Claim Cost (CC)')
    $('#ket-layanan').text('CC per Jenis Layanan')
} else {
    $('#claim-ket').text('Biaya Pengobatan (BP)')
    $('#ket-layanan').text('BP per Jenis Layanan')
}

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-periode') }}/",
        dataType: 'JSON',
        success: function(result) {
            $.each(result.daftar, function(key, value){
                $('.dropdown-menu').append("<li>"+value.periode+"</li>")
            })
        }
    });

    $('.dropdown-menu').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown').find('.select-dash').html(htmlText);
        periode = text;
        $('#yoy-claim').empty();
        $('#yoy-rjtp').empty();
        $('#yoy-rjtl').empty();
        $('#yoy-ri').empty();
        $('#yoy-restitusi').empty();
        getDataKunjungan();
        getDataLayanan();
    });

$('#jenis').change(function(){
    $('#yoy-claim').empty();
    $('#yoy-rjtp').empty();
    $('#yoy-rjtl').empty();
    $('#yoy-ri').empty();
    $('#yoy-restitusi').empty();
    var val = $(this).val();
    jenis = val;
    if(val == 'CC') {
        $('#claim-ket').text('Claim Cost (CC)')
        $('#ket-layanan').text('CC per Jenis Layanan')
    } else {
        $('#claim-ket').text('Biaya Pengobatan (BP)')
            $('#ket-layanan').text('BP per Jenis Layanan')
    }
    getDataKunjungan();
    getDataLayanan();
})

// $('#periode').change(function(){
//     $('#yoy-claim').empty();
//     $('#yoy-rjtp').empty();
//     $('#yoy-rjtl').empty();
//     $('#yoy-ri').empty();
//     $('#yoy-restitusi').empty();
//     var val = $(this).val();
//     periode = val;
//     getDataKunjungan();
//     getDataLayanan();
// })

function getDataKunjungan() {
    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-kunj-bpcc') }}/"+periode+"/"+jenis,
        dataType: 'JSON',
        success: function(result) {
            var data = result.daftar;
            var chart = [];
            var rka_now = parseFloat((parseFloat(data[0].rka_now)/pembagi).toFixed(3));
            var rea_bef = parseFloat((parseFloat(data[0].rea_bef)/pembagi).toFixed(3));
            var rea_now = parseFloat((parseFloat(data[0].rea_now)/pembagi).toFixed(3));
            var ach = 0;
            var yoy = 0;
            if(rka_now == 0) {
                ach = 0;
            } else {
                ach = ((rea_now/rka_now)*100).toFixed(2);
            }

            if(rea_bef == 0) {
                yoy = 0;
            } else {
                yoy = (((rea_now/rea_bef)-1)*100).toFixed(2);
            }

            $('#ach-claim').text("Ach. "+ach+"%")
            var ketYoy = "";
            if(yoy < 0 ) {
                ketYoy += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoy += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoy+"%</span>";
            } else {
                ketYoy += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoy += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoy+"%</span>";
            }
            $('#yoy-claim').append(ketYoy);
            chart.push({ name:"YTD Q3 '19", y:rea_bef, color:'#add8e6' })
            chart.push({ name:"RKA Q3 '20", y:rka_now, color:'#457b9d' })
            chart.push({ name:"YTD Q3 '20", y:rea_now, color:'#1d3557' })
            Highcharts.chart('claim', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "Claim Cost",
                        data: chart
                    }
                ]
            });
        }
    });
}

function getDataLayanan() {
    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-layanan-bpcc') }}/"+periode+"/"+jenis,
        dataType: 'JSON',
        success: function(result) {
            var data = result.daftar;
            var chart = [];
            var columnRjtp = [];
            var columnRjtl = [];
            var columnRi = [];
            var columnRestitusi = [];
            var totalRea = 0;
            var reaRjtpNow = parseFloat((parseFloat(data[0].rea_now)/pembagi).toFixed(3))
            var reaRjtpBef = parseFloat((parseFloat(data[0].rea_bef)/pembagi).toFixed(3))
            var rkaRjtpNow = parseFloat((parseFloat(data[0].rka_now)/pembagi).toFixed(3))
            var rjtpAch = 0;
            var rjtpYoy = 0;
            var reaRjtlNow = parseFloat((parseFloat(data[1].rea_now)/pembagi).toFixed(3))
            var reaRjtlBef = parseFloat((parseFloat(data[1].rea_bef)/pembagi).toFixed(3))
            var rkaRjtlNow = parseFloat((parseFloat(data[1].rka_now)/pembagi).toFixed(3))
            var rjtlAch = 0;
            var rjtlYoy = 0;
            var reaRiNow = parseFloat((parseFloat(data[2].rea_now)/pembagi).toFixed(3))
            var reaRiBef = parseFloat((parseFloat(data[2].rea_bef)/pembagi).toFixed(3))
            var rkaRiNow = parseFloat((parseFloat(data[2].rka_now)/pembagi).toFixed(3))
            var riAch = 0;
            var riYoy = 0;
            var reaRestitusiNow = parseFloat((parseFloat(data[3].rea_now)/pembagi).toFixed(3))
            var reaRestitusiBef = parseFloat((parseFloat(data[3].rea_bef)/pembagi).toFixed(3))
            var rkaRestitusiNow = parseFloat((parseFloat(data[3].rka_now)/pembagi).toFixed(3))
            var restitusiAch = 0;
            var restitusiYoy = 0;

            if(rkaRjtpNow == 0) {
                rjtpAch = 0;
            } else {
                rjtpAch = ((reaRjtpNow/rkaRjtpNow)*100).toFixed(2);
            }

            if(reaRjtpBef == 0) {
                rjtpYoy = 0;
            } else {
                rjtpYoy = (((reaRjtpNow/reaRjtpBef)-1)*100).toFixed(2);
            }
            
            if(rkaRjtlNow == 0) {
                rjtlAch = 0;
            } else {
                rjtlAch = ((reaRjtlNow/rkaRjtlNow)*100).toFixed(2);
            }

            if(reaRjtlBef == 0) {
                rjtlYoy = 0;
            } else {
                rjtlYoy = (((reaRjtlNow/reaRjtlBef)-1)*100).toFixed(2);
            }

            if(rkaRiNow == 0) {
                riAch = 0;
            } else {
                riAch = ((reaRiNow/rkaRiNow)*100).toFixed(2);
            }

            if(reaRiBef == 0) {
                riYoy = 0;
            } else {
                riYoy = (((reaRiNow/reaRiBef)-1)*100).toFixed(2);
            }

            if(rkaRestitusiNow == 0) {
                restitusiAch = 0;
            } else {
                restitusiAch = ((reaRestitusiNow/rkaRestitusiNow)*100).toFixed(2);
            }

            if(reaRestitusiBef == 0) {
                restitusiYoy = 0;
            } else {
                restitusiYoy = (((reaRestitusiNow/reaRestitusiBef)-1)*100).toFixed(2);
            }
            
            $('#ach-rjtp').text("Ach. "+rjtpAch+"%")
            $('#ach-rjtl').text("Ach. "+rjtlAch+"%")
            $('#ach-ri').text("Ach. "+riAch+"%")
            $('#ach-restitusi').text("Ach. "+restitusiAch+"%")

            var ketYoyRjtp = "";
            if(rjtpYoy < 0 ) {
                ketYoyRjtp += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRjtp += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtpYoy+"%</span>";
            } else {
                ketYoyRjtp += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRjtp += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtpYoy+"%</span>";
            }
            $('#yoy-rjtp').append(ketYoyRjtp);

            var ketYoyRjtl = "";
            if(rjtlYoy < 0 ) {
                ketYoyRjtl += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRjtl += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtlYoy+"%</span>";
            } else {
                ketYoyRjtl += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRjtl += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtlYoy+"%</span>";
            }
            $('#yoy-rjtl').append(ketYoyRjtl);

            var ketYoyRi = "";
            if(riYoy < 0 ) {
                ketYoyRi += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+riYoy+"%</span>";
            } else {
                ketYoyRi += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+riYoy+"%</span>";
            }
            $('#yoy-ri').append(ketYoyRi);

            var ketYoyRestitusi = "";
            if(restitusiYoy < 0 ) {
                ketYoyRestitusi += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRestitusi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+restitusiYoy+"%</span>";
            } else {
                ketYoyRestitusi += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRestitusi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+restitusiYoy+"%</span>";
            }
            $('#yoy-restitusi').append(ketYoyRestitusi);
            
            columnRjtp.push({name:"YTD Q3 '19",y:reaRjtpBef,color: '#add8e6'})
            columnRjtp.push({name:"RKA Q3 '20",y:rkaRjtpNow,color: '#457b9d'})
            columnRjtp.push({name:"YTD Q3 '20",y:reaRjtpNow,color: '#1d3557'})

            columnRjtl.push({name:"YTD Q3 '19",y:reaRjtlBef,color: '#add8e6'})
            columnRjtl.push({name:"RKA Q3 '20",y:rkaRjtlNow,color: '#457b9d'})
            columnRjtl.push({name:"YTD Q3 '20",y:reaRjtlNow,color: '#1d3557'})

            columnRi.push({name:"YTD Q3 '19",y:reaRiBef,color: '#add8e6'})
            columnRi.push({name:"RKA Q3 '20",y:rkaRiNow,color: '#457b9d'})
            columnRi.push({name:"YTD Q3 '20",y:reaRiNow,color: '#1d3557'})

            columnRestitusi.push({name:"YTD Q3 '19",y:reaRestitusiBef,color: '#add8e6'})
            columnRestitusi.push({name:"RKA Q3 '20",y:rkaRestitusiNow,color: '#457b9d'})
            columnRestitusi.push({name:"YTD Q3 '20",y:reaRestitusiNow,color: '#1d3557'})
            
            for(var i=0;i<data.length;i++) {
                totalRea = totalRea + parseFloat(data[i].rea_now)
            }
            var reaRJTP = parseFloat(((parseFloat(data[0].rea_now)/totalRea)*100).toFixed(2))
            var reaRJTL = parseFloat(((parseFloat(data[1].rea_now)/totalRea)*100).toFixed(2))
            var reaRI = parseFloat(((parseFloat(data[2].rea_now)/totalRea)*100).toFixed(2))
            var reaRestitusi = parseFloat(((parseFloat(data[3].rea_now)/totalRea)*100).toFixed(2))
            
            chart.push({name:'RJTP', y:reaRJTP})
            chart.push({name:'RJTL', y:reaRJTL})
            chart.push({name:'RI', y:reaRI})
            chart.push({name:'Restistusi', y:reaRestitusi})

            Highcharts.chart('komposisi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: 250
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        size: 200,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            padding: 0,
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        },
                    }
                },
                series: [{
                    name: 'Komposisi',
                    colorByPoint: true,
                    data: chart
                }]
            });

            Highcharts.chart('rjtp', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRjtp,
                    }
                ]
            });

             Highcharts.chart('rjtl', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRjtl,
                    }
                ]
            });

             Highcharts.chart('ri', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRi,
                    }
                ]
            });

             Highcharts.chart('restitusi', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRestitusi,
                    }
                ]
            });
        }
    });
}
getDataKunjungan();
getDataLayanan();
Highcharts.chart('pkk-cc', {
    chart: {
        type: 'column',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 5.17,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 5.84,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 4.76,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-kunjungan', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "KUNJUNGAN",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 389.4,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 449.3,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 390.0,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-komposisi-kunj', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 70,
        }, {
            name: 'RI',
            y: 1
        }, {
            name: 'RJTL',
            y: 26
        }, {
            name: 'Restitusi',
            y: 3
        }]
    }]
});

Highcharts.chart('pkk-rjtp-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTP",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 255.6,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 301.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 271.1,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-rjtl-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RJTL",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 113.9,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 125.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 101.6,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-ri-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 6.1,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 7.0,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 4.4,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('pkk-restitusi-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "RESTITUSI",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 13.7,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 16.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 12.1,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});
</script>
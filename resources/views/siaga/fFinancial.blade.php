<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<style>
    .table td{
        padding: 4px !important;
    }
</style>
<div id='dash_page_financial' class="mt-120">
    <div class="row header-dash mb-2">
        <div class="col-md-8 px-0">
            <h6 class='font-weight-light' style='color: #000000; font-size:22px !important;'>Dashboard Operating Expense</h6>
        </div>
        <div class="col-md-4 text-right px-0">
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
        </div>
    </div>
    <div class="body-dash" style="position: relative;">
        <div class='row mb-2'>
            <div class='col-md-6'>
                <div class="row px-2">
                    <div class="col-md-6">
                        <p><i class="fa fa-bar-chart"></i> Neraca</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-tabs col-12 justify-content-end" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab" aria-selected="true"><span class="hidden-xs-down">Chart</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_2" role="tab" aria-selected="false"><span class="hidden-xs-down">Data</span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="tab-content tabcontent-border col-12">
                        <div class="tab-pane active" id="tab_1">
                            <div id='financial_port_chart1'></div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div id='financial_port_table1'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="row px-2">
                    <div class="col-md-6">
                        <p><i class="fa fa-bar-chart"></i> Cashflow</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-tabs col-12 justify-content-end" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_3" role="tab" aria-selected="true"><span class="hidden-xs-down">Chart</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_4" role="tab" aria-selected="false"><span class="hidden-xs-down">Data</span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="tab-content tabcontent-border col-12">
                        <div class="tab-pane active" id="tab_3">
                            <div id='financial_port_chart2'></div>
                        </div>
                        <div class="tab-pane" id="tab_4">
                            <div id='financial_port_table2'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:0 !important">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right:30px !important;margin-top:0px !important">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" data-width="100%" name="dept" id="dept">
                                <option value='#'>Pilih Lokasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periode</label>
                            <select class="form-control" data-width="100%" name="periode" id="periode">
                                <option value='#'>Pilih Periode</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
var periode = "";
    function sepNum2(x){
        var num = parseFloat(x).toFixed(2);
        var parts = num.toString().split(".");
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
        return parts.join(",");
    }

    function drawChart(type, selector, series_array, categories, exporting, click_callback){
        if (typeof categories === 'undefined') { categories = null; }
        if (typeof exporting === 'undefined') { exporting = false; }
        if (typeof click_callback === 'undefined') { click_callback = null; }
        var options = {
            chart: {
                renderTo: selector,
                type: type
            },
            title:{
                text:''
            },
            exporting: { 
                enabled: exporting
            },
            series: [],
            xAxis: {
                title: {
                    text: null
                },
                categories: []
            },
            yAxis:{
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return singkatNilai(this.value);
                    }
                }
            },
            credits: {
                enabled: false
            },
        };
        
        options.series = series_array;
        options.xAxis.categories = categories;

        if(click_callback !== null){
            options.plotOptions = click_callback;
        }

        new Highcharts.Chart(options);
    }

    function drawTable(parent_container, header_html, data_array, data_index_array, created_table_selector, col_format_obj){
        if (typeof created_table_selector === 'undefined') { created_table_selector = null; }
        if (typeof col_format_obj === 'undefined') { col_format_obj = null; }
        var table = "<table "+created_table_selector+">";
        var col = "";
        table += header_html;
        for(x=0; x<data_array.length; x++){
            col += "<tr>";

            for(i=0; i<data_index_array.length; i++){
                var str = data_array[x][data_index_array[i]];

                if(str != null){
                    if(col_format_obj != null){
                        if(col_format_obj[data_index_array[i]] != undefined || col_format_obj[data_index_array[i]] != null){
                            col += "<td>"+generateFormat(col_format_obj[data_index_array[i]], str)+"</td>";
                        }else{
                            col += "<td>"+str+"</td>";
                        }
                    }else{
                    }
                }else{
                    col += "<td> </td>";
                }

            }

            col += "</tr>";
        }
        table += col+"</table>";

        // console.log(table);
        $(parent_container).html(table);
    }

    function getPeriode(){
        $.ajax({
            type:"GET",
            url:"{{ url('siaga-dash/periode') }}",
            dataType: "JSON",
            success: function(result){
                var select = $('#periode').selectize();
                select = select[0];
                var control = select.selectize;

                if(result.status){
                    var latest = "";
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].periode, value:result.data[i].periode}]);
                            latest = result.data[i].periode;
                        }
                    }
                    periode = (latest != "" ? latest : "{{ Session::get('periode') }}");
                    control.setValue(periode);
                    loadService('Financial-NRC','GET',"{{ url('siaga-dash/data-other') }}",{periode : "201708",dept: "All",klp:"NRC"});
                    loadService('Financial-CF','GET',"{{ url('siaga-dash/data-other') }}",{periode : "201708",dept: "All",klp:"CF"});
                    
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('siaga-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getDept(){
        $.ajax({
            type:"GET",
            url:"{{ url('siaga-dash/dept') }}",
            dataType: "JSON",
            success: function(result){
                var select = $('#dept').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].dept, value:result.data[i].dept}]);
                        }
                        control.addOption([{text:"All", value:"All"}]);
                    }
                    control.setValue("All");
                    
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('siaga-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }
    
    getPeriode();
    getDept();

    function loadService(index,method,url,param){
        $.ajax({
            type: method,
            url: url,
            dataType: 'json',
            data: param,
            success:function(data){    
                if(data.status){
                    switch(index){
                        case 'Financial-NRC':
                            var thead = "<tr>"+
                                            "<th>Tipe</th>"+
                                            "<th>Nilai</th>"+
                                        "</tr>";
                            drawChart('column', 'financial_port_chart1', data.series, data.categories);
                            drawTable('#financial_port_table1', thead, data.summary, ["tipe","n1"], "class='table table-striped table-bordered'", {"n1":"sepNum2Kanan"});
                        break;
                        case 'Financial-CF':
                            var thead = "<tr>"+
                                            "<th>Tipe</th>"+
                                            "<th>Nilai</th>"+
                                        "</tr>";
                            drawChart('column', 'financial_port_chart2', data.series, data.categories);
                            drawTable('#financial_port_table2', thead, data.summary, ["tipe","n1"], "class='table table-striped table-bordered'", {"n1":"sepNum2Kanan"});
                        break;
                        
                    }
                }
            }
        });
    }

    $('#form-filter').submit(function(e){
        e.preventDefault();
        var periode = $('#periode')[0].selectize.getValue();
        var dept = $('#dept')[0].selectize.getValue();
        loadService('Financial-NRC','GET',"{{ url('siaga-dash/data-other') }}",{periode : "201708",dept: "All",klp:"NRC"});
        loadService('Financial-CF','GET',"{{ url('siaga-dash/data-other') }}",{periode : "201708",dept: "All",klp:"CF"});
        
        $('#modalFilter').modal('hide');
        // $('.app-menu').hide();
        if ($(".app-menu").hasClass("shown")) {
            $(".app-menu").removeClass("shown");
        } else {
            $(".app-menu").addClass("shown");
        }
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#periode')[0].selectize.setValue('');
        
    });
    
    $('#btn-filter').click(function(){
        $('#modalFilter').modal('show');
    });

    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        
        $('#modalFilter').modal('hide');
    });
</script>
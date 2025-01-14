// ------------------------------ GLOBAL FUNCTION ---------------------------------------

// Capitalize First Letter
function CFL(str){
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Convert Date
function reverseDate(date_str, separator){
    if(typeof separator === 'undefined'){separator = '-'}
    date_str = date_str.split(' ');
    var str = date_str[0].split(separator);

    return str[2]+separator+str[1]+separator+str[0];
}

//format Romawi
function toRoman(num) {  
    var result = '';
    var decimal = [1000, 500, 100, 50, 10, 5, 1];
    var roman = ["M", "D", "C", "L", "X", "V", "I"];
    for (var i = 0;i<=decimal.length;i++) {
    // looping over every element of our arrays
      while (num%decimal[i] < num) {   
      // keep trying the same number until we need to move to a smaller one     
        result += roman[i];
        // add the matching roman number to our result string
        num -= decimal[i];
        // subtract the decimal value of the roman number from our number
      }
    }
    return result;
}

// separasi angka
function DelDecimal(x){
    return Math.round(x);
}

function sepNum(x){
    if (typeof x === 'undefined' || !x) { 
        return 0;
    }else{
        if(x < 0){
            var x = parseFloat(x).toFixed(0);
        }
        
        var parts = x.toString().split(",");
        parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,"$1.");
        return parts.join(".");
    }
}

function sepNum2(x){
    var num = parseFloat(x).toFixed(2);
    var parts = num.toString().split(".");
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
    return parts.join(",");
}

function sepNum3(x){
    var num = parseFloat(x).toFixed(0);
    var parts = num.toString().split(".");
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
    return parts.join(",");
}

function toSatuan(num, satuan, pembagi, dec_places){
    // num diisi angka yang akan dikonversi
    // satuan diisi string seperti M, Jt, dll.
    // pembagi diisi angka pembagi, misalnya ke satuan milyar, diisi 1000000000
    // dec_places = jumlah decimal dibelakang koma
    return parseFloat(num/pembagi).toFixed(dec_places) + ' ' +satuan;
}

function singkatNilai(num){
    if(num < 0){
        num = num * -1;
    }

    if(num >= 1000 && num < 1000000){
        var str = 'Rb';
        var pembagi = 1000;
    }else if(num >= 1000000 && num < 1000000000){
        var str = 'Jt';
        var pembagi = 1000000;
    }else if(num >= 1000000000 && num < 1000000000000){
        var str = 'M';
        var pembagi = 1000000000;
    }else if(num >= 1000000000000){
        var str = 'T';
        var pembagi = 1000000000000;
    }

    if(num < 0){
        return (parseFloat(num/pembagi).toFixed(2) * -1) + ' ' +str;
    }else if (num > 0 && num >= 1000){
        return parseFloat(num/pembagi).toFixed(2) + ' ' +str;
    }else if(num > 0 && num < 1000){
        return num;
    }else{
        return num;
    }
}

function toRp(num){
    if(num < 0){
        return "(Rp"+sepNum(num * -1)+")";
    }else{
        return "Rp"+sepNum(num);
    }
}

function toNilai(str_num){
    var parts = str_num.split('.');
    number = parts.join('');
    number = number.replace('Rp', '');
    // number = number.replace(',', '.');
    return +number;
}


function LTrim ( value ) {
	if (typeof(value) != "string") return value;
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
};
// Removes ending whitespaces
function RTrim ( value ) {	
	if (typeof(value) != "string") return value;
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");	
};

function trim ( value ) {	
	return LTrim(RTrim(value));	
};

function terbilang(bilangan) {
    var bilangan = parseInt(bilangan);
    var angka = ['0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'];
    var kata = ['','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan'];
    var tingkat = ['','Ribu','Juta','Milyar','Triliun'];
    var kalimat = "";  
    var panjang_bilangan = bilangan.length;
    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
      kalimat = "Diluar Batas";
      return kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan,
       dimasukkan ke dalam array */
    for (var i = 1; i <= panjang_bilangan; i++) {
      angka[i] = bilangan.substr(-i,1);
    } 
    var i = 1;
    var j = 0;
    var subkalimat,kata1,kata2,kata3;
    kalimat = "";
    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {
      subkalimat = "";
      kata1 = "";
      kata2 = "";
      kata3 = "";
      /* untuk ratusan */
      if (angka[i+2] != "0") {
        if (angka[i+2] == "1") {
          kata1 = " Seratus";
        } else {
          kata1 = kata[angka[i+2]] + " Ratus";
        }
      }

      /* untuk puluhan atau belasan */
      if (angka[i+1] != "0") {
        if (angka[i+1] == "1") {
          if (angka[i] == "0") {
            kata2 = "Sepuluh";
          } else if (angka[i] == "1") {
            kata2 = "Sebelas";
          } else {
            kata2 = kata[angka[i]] + " Belas";
          }
        } else {
          kata2 = kata[angka[i+1]] + " Puluh";
        }
      }

      /* untuk satuan */
      if (angka[i] != "0") {
        if (angka[i+1] != "1") {
          kata3 = kata[angka[i]];
        }
      }

      /* pengujian angka apakah tidak nol semua,
         lalu ditambahkan tingkat */
      if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
         subkalimat = kata1 + " "+kata2 + " "+kata3 +"  "+tingkat[j];
      }
      /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
         ke variabel kalimat */
      kalimat = subkalimat + kalimat;
      i = i + 3;
      j = j + 1;

    }

    /* mengganti satu ribu jadi seribu jika diperlukan */
    if ((angka[5] == "0") && (angka[6] == "0")) {
         kalimat = kalimat.replace("Satu  Ribu","Seribu");
    }
    kalimat=kalimat + " Rupiah";
    return trim(kalimat);
};

// function terbilang(int){
//     angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
//     int = Math.floor(int);
//     if (int < 12)
//         return " " + angka[int];
//     else if (int < 20)
//         return terbilang(int - 10) + " belas";
//     else if (int < 100)
//         return terbilang(int / 10) + " puluh" + terbilang(int % 10);
//     else if (int < 200)
//         return "seratus" + terbilang(int - 100);
//     else if (int < 1000)
//         return terbilang(int / 100) + " ratus" + terbilang(int % 100);
//     else if (int < 2000)
//         return "seribu" + terbilang(int - 1000);
//     else if (int < 1000000)
//         return terbilang(int / 1000) + " ribu" + terbilang(int % 1000);
//     else if (int < 1000000000)
//         return terbilang(int / 1000000) + " juta" + terbilang(int % 1000000);
//     else if (int < 1000000000000)
//         return terbilang(int / 1000000) + " milyar" + terbilang(int % 1000000000);
//     else if (int >= 1000000000000)
//         return terbilang(int / 1000000) + " trilyun" + terbilang(int % 1000000000000);
// }

// https://stackoverflow.com/a/32589289
// capitalize first letter
function CFL(str) {
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   return splitStr.join(' '); 
}

function generateFormat(format, str){
    switch (format){
        case 'sepNum': var formated_str = sepNum(str); break;
        case 'sepNum2': var formated_str = sepNum2(str); break;
        case 'sepNumKanan': var formated_str = "<p align='right'>"+sepNum(str)+"</p>"; break;
        case 'sepNum2Kanan': var formated_str = "<p align='right'>"+sepNum2(str)+"</p>"; break;
        case 'toRp': var formated_str = toRp(str); break;
        case 'toNilai': var formated_str = toNilai(str); break;
    }

    return formated_str;
}

function errorModal(){
    
}

function clearInput(){
    $("input:not([type='radio'],[type='checkbox'],[type='submit'])").val('');
    $('textarea').val('');
    $("select:not('.selectize')").val('');
    $('#validation-box').text('');
}

function incKode(str, sep){
    var parts = str.split(sep);
    var num = (+parts[parts.length - 1]) + 1;
    var zero = '';
    for(i = 0; i<parts[parts.length - 1].length; i++){
        zero += '0';
    }
    return parts[0]+"."+((zero + num).slice(-4));
    // return zero;
    // return num;
}

function ajaxPost(insert_url, cancel_url, formData, clear){
    if (typeof clear === 'undefined') { clear = true; }
    var domain = window.location.hostname;
    var post_url = "http://"+domain+insert_url;
    var status = true;
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            // console.log(data);
            alert(data.alert);

            if(data.status == 1){
                // clear input dan validation box jika berhasil
                if(clear){
                    clearInput();
                }

                if(data.edit){
                    if(cancel_url == null){
                        location.reload();
                    }else{
                        window.location = "http://"+domain+cancel_url;
                    }
                    // for(i = 0; i < $('.selectize').length; i++){
                    //     $('.selectize')[i].selectize.setValue('');
                    //     alert($('.selectize')[i].selectize.getValue());
                    //     if selectize.length == null ?
                    // }
                }
            }else if(data.status == 2){
                status = false;
            }else if (data.status == 3){
                // https://stackoverflow.com/a/26166303
                var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });

                // append input element error
                var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                for(i = 0; i<error_array.length; i++){
                    error_list += '<li>'+error_array[i]+'</li>';
                }
                error_list += "</ul></div>";
                status = false;
                $('#validation-box').html(error_list);
            }
        }
    });

    return status;
}

function saiPost(post_url, cancel_url, formData, table_refresh_target_id, success_callback, failed_callback, clear){
    if (typeof clear === 'undefined') { clear = true; }
    if (typeof table_refresh_target_id === 'undefined') { table_refresh_target_id = null; }
    if (typeof success_callback === 'undefined') { success_callback = null; }
    if (typeof failed_callback === 'undefined') { failed_callback = null; }
    var status = true;
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            if(data.auth_status == 1){
                if(typeof data.alert !== 'undefined'){
                    alert("Auth success : "+data.alert);
                }
                
                if(success_callback != null){
                    success_callback(data);
                }else{
                    if(data.status == 1){
                        // clear input dan validation box jika berhasil
                        if(table_refresh_target_id != null){
                            $(table_refresh_target_id).DataTable().ajax.reload();
                        }
                        
                        if(clear){
                            // if(confirm('Bersihkan input?')){
                            clearInput();
                            // }
                        }
    
                        if(data.edit){
                            if(cancel_url == null){
                                location.reload();
                            }else{
                                window.location = cancel_url;
                            }
                            // for(i = 0; i < $('.selectize').length; i++){
                            //     $('.selectize')[i].selectize.setValue('');
                            //     alert($('.selectize')[i].selectize.getValue());
                            //     if selectize.length == null ?
                            // }
                        }else{
                            $('.nav-tabs a[href="#sai-container-daftar"]').tab('show');
                        }
                    }
                }

                if(failed_callback != null){
                    failed_callback(data);
                }else{
                    if (data.status == 3){
                        // https://stackoverflow.com/a/26166303
                        var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });
    
                        // append input element error
                        var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                        for(i = 0; i<error_array.length; i++){
                            error_list += '<li>'+error_array[i]+'</li>';
                        }
                        error_list += "</ul></div>";
                        $('#validation-box').html(error_list);
                    }
                }
            }else{
                alert("Auth Failed : "+data.error);
            }
        }
    });
}

function saiReq(post_url, formData, options){
    if (typeof options === 'undefined') { 
        options = {
            'onSuccess' : function(par){}
        } 
    }
    
    var status = true;
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            options.onSuccess(data);
            if(data.auth_status == 1){
                alert("Auth success : "+data.alert);
                if(success_callback != null){
                    success_callback(data);
                }else{
                    if(data.status == 1){
                        // clear input dan validation box jika berhasil
                        if(table_refresh_target_id != null){
                            $(table_refresh_target_id).DataTable().ajax.reload();
                        }
                        
                        if(clear){
                            // if(confirm('Bersihkan input?')){
                            clearInput();
                            // }
                        }
    
                        if(data.edit){
                            if(cancel_url == null){
                                location.reload();
                            }else{
                                window.location = cancel_url;
                            }
                            // for(i = 0; i < $('.selectize').length; i++){
                            //     $('.selectize')[i].selectize.setValue('');
                            //     alert($('.selectize')[i].selectize.getValue());
                            //     if selectize.length == null ?
                            // }
                        }else{
                            $('.nav-tabs a[href="#sai-container-daftar"]').tab('show');
                        }
                    }
                }

                if(failed_callback != null){
                    failed_callback(data);
                }else{
                    if (data.status == 3){
                        // https://stackoverflow.com/a/26166303
                        var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });
    
                        // append input element error
                        var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                        for(i = 0; i<error_array.length; i++){
                            error_list += '<li>'+error_array[i]+'</li>';
                        }
                        error_list += "</ul></div>";
                        $('#validation-box').html(error_list);
                    }
                }
            }else{
                alert("Auth Failed : "+data.error);
            }
        },
        error: function (err){
            console.log(err);
        }
    });
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

function drawTableV(parent_container, header_html, row_name_array, data_array, data_index_array, created_table_selector, col_format_obj){
    if (typeof created_table_selector === 'undefined') { created_table_selector = null; }
    if (typeof col_format_obj === 'undefined') { col_format_obj = null; }
    var table = "<table "+created_table_selector+">";
    var col = "";
    table += header_html;
    // vertical loop
    for(x=0; x<row_name_array.length; x++){
        col += "<tr>";
        col += "<td>"+row_name_array[x]+"</td>";

        // horizontal loop
        // for(y=0; y<data_index_array.length; y++){
            col += "<td>"+data_array[data_index_array[x]]+"</td>";
        // }

        col += "</tr>";
    }
    table += col+"</table>";

    // console.log(table);
    $(parent_container).html(table);
}

function drawMenu(selector, array){
    $(selector).html('');
    var pre_prt = 0;
    var html_str = '<li class="header">Menu</li>';
    
    for(i=0; i<array.length; i++){
        form = array[i].view_html;
        this_lv = array[i].level_menu;
        this_link = form;

        if(i == 0){
            prev_lv = 0;
        }else{
            prev_lv = array[i-1].level_menu;
        }

        if(i == array.length-1){
            next_lv = array[i].level_menu;
        }else{
            next_lv = array[i+1].level_menu;
        }
 
        if(this_lv == 0 && next_lv == 0){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
        }else if(this_lv == 0 && next_lv > 0){
            html_str += "<li class='treeview'>"+
                            "<a href='#'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                                "<span class='pull-right-container'>"+
                                    "<i class='fa fa-angle-left pull-right'></i>"+
                                "</span>"+
                            "</a>"+
                            "<ul class='treeview-menu'>";
        }else if((this_lv > prev_lv || this_lv == prev_lv || this_lv < prev_lv) && this_lv < next_lv){
            html_str += "<li class='treeview'>"+
                            "<a href='#'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                                "<span class='pull-right-container'>"+
                                    "<i class='fa fa-angle-left pull-right'></i>"+
                                "</span>"+
                            "</a>"+
                            "<ul class='treeview-menu'>";
        }else if((this_lv > prev_lv || this_lv == prev_lv || this_lv < prev_lv) && this_lv == next_lv){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
        }else if(this_lv > prev_lv && this_lv > next_lv){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
            for(i=0; i<(this_lv - next_lv); i++){
                html_str += "</ul></li>";
            }
        }else if((this_lv == prev_lv || this_lv < prev_lv) && this_lv > next_lv){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
            html_str += "</ul></li>";
        }
    }

    $(selector).html(html_str);
}

function exportable(table_id, filename, file_type_array, custom_button_array){
    // table_id diisi string seperti : 'id_table_export' (tanpa #)
    // custom_button_array diisi associative array / object seperti : {'xlsx' : '#id-tombol-xlsx'}

    if (typeof filename === 'undefined') { filename = 'documents'; }
    if (typeof file_type_array === 'undefined') { file_type_array = ['xlsx']; }
    if (typeof custom_button_array === 'undefined'){
        // setting default button
        custom_button_array = {};
        var btn_html = '';
        for(i=0; i<file_type_array.length; i++){
            custom_button_array[file_type_array[i]] = '#sai-default-export-'+file_type_array[i];
            // var icon = (file_type_array[i] == 'xlsx') ? ('fa-file-excel-o') : (file_type_array[i] == 'csv') ? ('fa-newspaper-o') : (file_type_array[i] == 'txt') ? ('fa-file-text');
            var icon = (file_type_array[i] == 'xlsx') ? ('fa-file-excel-o') : ((file_type_array[i] == 'csv') ? ('fa-newspaper-o') : ('fa-file-text'));
            // var icon = 'fa-file-excel-o';

            btn_html += "<a href='#' class='btn btn-default pull-right' title='Export to "+(file_type_array[i].toUpperCase())+"' style='margin-left:5px;' id='sai-default-export-"+file_type_array[i]+"'><i class='fa "+icon+"'></i></a>";
        }

        // insert button ke header report
        $('#report-export').html(btn_html);
    }
    // console.log('#'+table_id);
    $('#'+table_id).tableExport({
        headers: true,
        footers: true,
        formats: file_type_array,
        filename: filename,
        bootstrap: true,
        exportButtons: false,
        position: 'top',
        ignoreRows: null,
        ignoreCols: null,
        trimWhitespace: true
    });

    var ExportButtons = document.getElementById(table_id);
    var instance = new TableExport(ExportButtons, {
        formats: file_type_array,
        exportButtons: false
    });

    for(i=0; i<file_type_array.length; i++){
        // Fixed options (temporary)
        if(file_type_array[i] == 'xlsx'){
            var exportXlsx = instance.getExportData()[table_id]['xlsx'];

            $('#ajax-content-section').on('click', custom_button_array['xlsx'], function(){
                instance.export2file(exportXlsx.data, exportXlsx.mimeType, filename, exportXlsx.fileExtension);
            });
        }else if(file_type_array[i] == 'csv'){
            var exportCsv = instance.getExportData()[table_id]['csv'];

            $('#ajax-content-section').on('click', custom_button_array['csv'], function(){
                instance.export2file(exportCsv.data, exportCsv.mimeType, filename, exportCsv.fileExtension);
            });
        }else if(file_type_array[i] == 'txt'){
            var exportTxt = instance.getExportData()[table_id]['txt'];

            $('#ajax-content-section').on('click', custom_button_array['txt'], function(){
                instance.export2file(exportTxt.data, exportTxt.mimeType, filename, exportTxt.fileExtension);
            });
        }
        
        // --------------------------------> ERROR (tombol automatis) <---------------------------------------
        // var exportData = instance.getExportData()[table_id][file_type_array[i]];

        // $('#ajax-content-section').on('click', custom_button_array[file_type_array[i]], function(){
        //     instance.export2file(exportData.data, exportData.mimeType, filename, exportData.fileExtension);
        // });
    }
}

function jsonTable(selector, source_url, return_index, header_array, additional_data, crud_parameter_array, action_type, update_url, del_url, view_url, custom_table_html, additional_format){
    if (typeof additional_data === 'undefined') { additional_data = {} }
    if (typeof crud_parameter_array === 'undefined') { crud_parameter_array = null; }
    if (typeof action_type === 'undefined') { action_type = 'url'; }
    if (typeof update_url === 'undefined') { update_url = null; }
    if (typeof del_url === 'undefined') { del_url = null; }
    if (typeof view_url === 'undefined') { view_url = null; }
    if (typeof custom_table_html === 'undefined') { custom_table_html = null; }
    if (typeof additional_format === 'undefined') { additional_format = null; }

    var table_html = "<table class='table table-bordered table-striped' id='"+selector+"-jsonTable'><thead><tr>";

    var action_html = '';
    var columnDefs = [];
    if(crud_parameter_array != null){
        header_array.push("Action");

        if(update_url != null){
            action_html += "<a href='"+update_url+"' class='btn btn-warning btn-sm editTableRow'><i class='fa fa-pencil'></i> Edit</a> &nbsp";
        }
        if(del_url != null){
            action_html += "<a href='"+del_url+"' class='btn btn-danger btn-sm delTableRow'><i class='fa fa-trash'></i> Hapus</a> &nbsp";
        }
        if(view_url != null){
            action_html += "<a href='"+view_url+"' class='btn btn-primary btn-sm viewTableRow'><i class='fa fa-eye'></i> Detail</a>";
        }  
        if(custom_table_html != null){
            action_html += custom_table_html;
        }    
        columnDefs =  [
            {"targets": -1, "data": null, "defaultContent": action_html, "orderable": false}
        ]
    }


    if(additional_format !== null){
        if(additional_format.length>0){
            for(i=0; i<additional_format.length; i++){
                columnDefs.push(additional_format[i]);
            }
        }else{
            columnDefs.push(additional_format);
        }
    }
    // console.log(columnDefs);
    
    for(i=0; i<header_array.length; i++){
        table_html += "<th>"+header_array[i]+"</th>";
    }
    
    table_html += "</tr></thead><tbody></tbody></table>";
    $('#'+selector).html(table_html);

    var table = $('#'+selector+"-jsonTable").DataTable({
                    // fixedHeader: true,
                    "scrollY": "300px",
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": source_url,
                        "data": additional_data,
                        "type": "POST",
                        "dataSrc" : function(json) {
                            return json[return_index].data;
                        }
                    },
                    "columnDefs": columnDefs,
                    "iDisplayLength": 25,
                    "lengthChange": false
                });

    $("#"+selector+"-jsonTable").on( 'click', "a[class*='editTableRow'],a[class*='delTableRow'],a[class*='viewTableRow']", function (e) {
        e.preventDefault();

        var data =  table.row(table.row($(this).closest('tr')).index()).data();
        
        if(action_type == 'url'){
            var par_string = '/';
            var del_par = [];
            for(i=0; i<crud_parameter_array.length; i++){
                par_string += data[crud_parameter_array[i]]+'/';
                del_par.push(data[crud_parameter_array[i]]);
            }

            var url = $(this).attr('href');
            
            if($(this).hasClass('delTableRow')){
                var sts = confirm("Apakah anda yakin ingin menghapus data ini?");
                if(!sts){
                    return false;
                }else{
                    post_data = $.extend( true, {}, additional_data);
                    post_data.parameter = del_par;
                    $.ajax({
                        url: url,
                        data: post_data,
                        type: "post",
                        dataType: "json",
                        success: function (response) {
                            if(response.status == 1){
                                alert('Data berhasil dihapus');
                                table.ajax.reload();
                            }else{
                                alert('Data tidak ditemukan');
                            }
                        }
                    });
                }
            }else{
                window.location = url+par_string;
            }
        }else if(action_type == 'store'){
            var store_array = [];
            for(i=0; i<crud_parameter_array.length; i++){
                store_array.push(data[crud_parameter_array[i]]);
            }
            sessionStorage.setItem('crud_parameter', store_array.join(';'));
            
            // Modal / Setting Form sesuai data
            // if($(this).hasClass('delTableRow')){
            //     alert('is delete');
            // }else{
            //     alert($(this).attr('class'));
            // }
        }
        
    });
}

function dropdownMultiRow(data_options, select_id, name, select_class, div_class, placeholder){
    var select_html = '';
    
    select_html += "<select id='"+select_id+"' name='"+name+"' class='"+select_class+"' placeholder='"+placeholder+"'></select>";

    $('#'+div_class).html(select_html);    

    var $select = $('#'+select_id).selectize({
        disableDelete: true,
		disableCaret: true,
		hidePlaceholder: true,
        valueField: 'id',
        labelField: 'name',
        searchField: ['name', 'additional_info'],
        sortField: [
            {field: 'name', direction: 'asc'}
        ],
        options: data_options,
        render: {
            item: function(item, escape) {
                var name = $.trim(item.name);
                return '<div>' +
                    (name ? '<span class="name" style="color:#1c1b1b;">' + escape(name) + '</span>' : '') +
                '</div>';
            },
            option: function(item, escape) {
                var name = $.trim(item.name);
                var label = name || item.additional_info;
                var caption = name ? item.additional_info : null;
                return '<div>' +
                    '<span class="label" style="color:#1c1b1b;font-size:15px;">' + escape(label) + '</span>' +
                    (caption ? '<span class="caption" style="font-size:14px;display:block;color:#3498db;">' + escape(caption) + '</span>' : '') +
                '</div>';
            }
        }
    });
}


// -------------------------------- REPORTING COMPONENT FUNCTION --------------------------------------

function resetRptPage(){
    var active_page = $('#sai-rpt-active-page-number').text();
    var number_of_page = $('#sai-rpt-number-of-page').text();

    for(i=number_of_page; i>1; i--){
        $('#sai-rpt-filter-box-result-page-' + i).hide();
    }

    $('#sai-rpt-active-page-number').text(0);
}

function drawRptPage(html, table_id){
    if(typeof table_id == 'undefined'){table_id = null}
    // console.log(table_id);

    var active_page = $('#sai-rpt-active-page-number').text();
    var number_of_page = $('#sai-rpt-number-of-page').text();

    // console.log('active : ' + active_page);
    if(+active_page == 0){
        // $('#sai-rpt-filter-box-result-page-2').hide();
        $('#sai-rpt-filter-box-result-page-1').html(html);
        $('#sai-rpt-filter-box-result-page-1').show();
        $('#sai-rpt-active-page-number').text(1);
        // console.log('target : 0');
    }else if((+active_page + 1) <= +number_of_page){
        $('#sai-rpt-filter-box-result-page-' + active_page).hide();
        $('#sai-rpt-filter-box-result-page-' + (+active_page + 1)).html(html);
        $('#sai-rpt-filter-box-result-page-' + (+active_page + 1)).show();
        $('#sai-rpt-active-page-number').text((+active_page + 1));
        // console.log('target : ' + (+active_page + 1));
    }else{
        // $('#sai-rpt-filter-box-result-page-2').hide();
        $('#sai-rpt-filter-box-result-page-1').html(html);
        $('#sai-rpt-filter-box-result-page-1').show();
        $('#sai-rpt-active-page-number').text(1);
        // console.log('target : 1');
    }
    
    if(table_id != null){
        exportable(table_id, 'documents', ['xlsx'], {'xlsx':'#sai-rpt-export-excel'});
        $('#sai-rpt-print').click(function(){
            $('#'+table_id).printThis();
        });
    }
}


// --------------------------------------- GLOBAL Handler ----------------------------------------
$(document).ready(function(){
    // $(".change-validation").change(function(){
    //     alert('testvalid');
        // location.reload(true);
    // });

    // menu expand / trace
    if(localStorage.active_menu !== null && window.location.href == localStorage.active_url){
        // console.log('#'+localStorage.active_menu);
        $('#'+localStorage.active_menu).closest('.treeview').addClass('menu-open');
        $('#'+localStorage.active_menu).css("display", "block");
        $('a[href="'+localStorage.active_url+'"]').closest('li').addClass('active');
    }else if(localStorage.active_menu === null && window.location.href == $('.sidebar-menu li:first-child>a').attr('href')){
        // console.log($('.sidebar-menu li:first-child>a').attr('href'));
        // console.log(window.location.href);
        // test con
        // first time login, dashboard dianggap menu pertama tanpa child
        $(".sidebar-menu li:first-child").addClass('active');
    }

    if($('.sai-adminlte-menu-container').length){
        $('.treeview-menu>li:not(.treeview)>a, .sidebar-menu>li:not(.treeview)>a').click(function(){
            // alert($(this).text());
            var parent_id = $(this).closest('.treeview-menu').attr('id');
            var url = $(this).attr('href');
            // alert(parent_id);

            // save parent id to localstorage
            localStorage.setItem('active_menu', parent_id);
            localStorage.setItem('active_url', url);
        });
    }
    
    $('body').on('click', ".tbl-delete", function(){
        var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
        if(!sts){
            return false;
        }
    });

    $('.jenis_menu').change(function(){
        var jenis = $('.jenis_menu').val();
        if(jenis == "Fix"){
            $('.kode_form_area').show();
            $('.id_konten_area').hide();
            
            $(".kode_form").prop('disabled', false);
            $(".kode_form").prop('required', true);
            $(".id_konten").prop('disabled', true);
            $(".id_konten").prop('required', false);
        }else if(jenis == "Dinamis"){
            $('.id_konten_area').show();
            $('.kode_form_area').hide();
            
            $(".kode_form").prop('disabled', true);
            $(".kode_form").prop('required', false);
            $(".id_konten").prop('disabled', false);
            $(".id_konten").prop('required', true);
        }else{
            $('.kode_form_area').hide();
            $('.id_konten_area').hide();
            
            $(".kode_form").prop('disabled', true);
            $(".kode_form").prop('required', false);
            $(".id_konten").prop('disabled', true);
            $(".id_konten").prop('required', false);
        }
    });

    $('.open_new_window').click(function(){
        var href = $(this).attr('href');
        window.open(href, 'Print dokumen', "height=600,width=900");
        return false;
    });

    $('.open_new_tab').click(function(){
        var href = $(this).attr('href');
        window.open(href, '_blank');
        return false;
    });

    $('.download-link').click(function(){
        var link = document.createElement('a');
        link.href = $(this).attr('href'); 
        // link.download = 'image.jpeg';
        document.body.appendChild(link);
        link.click();   
    });
    
    $('.selectize').selectize({
        selectOnTab: true
    });

    $('.sai-rpt-filter-selectize').selectize({
        create: true
    })

    $('.DataTable').DataTable({
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 25
    });

    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd"
    });
    
    $('.datepicker-dmy').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $('.datepicker-yyyy').datepicker({
        autoclose: true,
        viewMode: "years", 
        minViewMode: "years",
        format: "yyyy"
    });

    $('.datepicker, .daterangepicker').on('keydown keyup keypress', function(e){
        e.preventDefault();
        return false;
    });

    $('.daterangepicker').daterangepicker();

    $(':input[type="number"], .currency').on('keydown', function (e){
        var value = String.fromCharCode(e.which) || e.key;

        if (    !/[0-9\.]/.test(value) //angka dan titik
                && e.which != 190 // .
                && e.which != 116 // F5
                && e.which != 8   // backspace
                && e.which != 9   // tab
                && e.which != 13   // enter
                && e.which != 46  // delete
                && (e.which < 37 || e.which > 40) // arah 
                && (e.keyCode < 96 || e.keyCode > 105) // dan angka dari numpad
            ){
                e.preventDefault();
                return false;
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    // ------------------------------------ REPORTING COMPONENT HANDLER ----------------------------------
    
    $('#sai-rpt-prev-page').click(function(){
        var active_page = $('#sai-rpt-active-page-number').text();

        if(+active_page > 1){
            // show hide
            $('#sai-rpt-filter-box-result-page-'+ active_page).hide();
            $('#sai-rpt-filter-box-result-page-'+ (+active_page  - 1) ).show();
            $('#sai-rpt-active-page-number').text((+active_page - 1));
        }else{
            return false;
        }
    })

    // $('#sai-rpt-print').click(function(){
    //     $('#sai-rpt-table-export').printThis();
    // });
    
    $('#sai-rpt-filter-box').boxWidget({
        animationSpeed: 500,
        collapseIcon: 'fa-minus',
        expandIcon: 'fa-plus'
    });
    
    $('#ajax-content-section').on('click', '.sai-rpt-data-list-modal-body-jsonTable-action', function(){
        var val = $(this).closest('tr').find('td:nth-child(1)').text();
        $('#'+target).val(val);
        $('#sai-rpt-data-list-modal').modal('hide');
    });

    $('#ajax-content-section').on('change', '.sai-rpt-filter-type', function(){
        var val = $(this).val();
        if(val == 'all'){
            $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').hide();
            $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').hide();
        }else if(val == 'exact'){
            $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').show();
            $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').hide();
        }else{
            $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').show();
            $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').show();
        }
        // alert(val);
    });

});


// modifikasi jsonTable untuk kolom aktif
// function traceTable(
//     selector, 
//     source_url, 
//     return_index, 
//     header_array, 
//     additional_data, 
//     crud_parameter_array, 
//     action_type, 
//     update_url, 
//     del_url, 
//     view_url, 
//     custom_table_html, 
//     additional_format
// ){
    
//     if (typeof additional_data === 'undefined') { additional_data = {} }
//     if (typeof crud_parameter_array === 'undefined') { crud_parameter_array = null; }
//     if (typeof action_type === 'undefined') { action_type = 'url'; }
//     if (typeof update_url === 'undefined') { update_url = null; }
//     if (typeof del_url === 'undefined') { del_url = null; }
//     if (typeof view_url === 'undefined') { view_url = null; }
//     if (typeof custom_table_html === 'undefined') { custom_table_html = null; }
//     if (typeof additional_format === 'undefined') { additional_format = null; }

//     var table_html = "<table class='table table-bordered table-striped' id='"+selector+"-jsonTable'><thead><tr>";

//     var action_html = '';
//     var columnDefs = [];
//     if(crud_parameter_array != null){
//         header_array.push("Action");

//         if(update_url != null){
//             action_html += "<a href='"+update_url+"' class='btn btn-warning btn-sm editTableRow'><i class='fa fa-pencil'></i> Edit</a> &nbsp";
//         }
//         if(del_url != null){
//             action_html += "<a href='"+del_url+"' class='btn btn-danger btn-sm delTableRow'><i class='fa fa-trash'></i> Hapus</a> &nbsp";
//         }
//         if(view_url != null){
//             action_html += "<a href='"+view_url+"' class='btn btn-primary btn-sm viewTableRow'><i class='fa fa-eye'></i> Detail</a>";
//         }  
//         if(custom_table_html != null){
//             action_html += custom_table_html;
//         }    
//         columnDefs =  [
//             {"targets": -1, "data": null, "defaultContent": action_html, "orderable": false}
//         ]
//     }


//     if(additional_format !== null){
//         columnDefs.push(additional_format);
//     }
//     // console.log(columnDefs);
    
//     for(i=0; i<header_array.length; i++){
//         table_html += "<th>"+header_array[i]+"</th>";
//     }
    
//     table_html += "</tr></thead><tbody></tbody></table>";
//     $('#'+selector).html(table_html);

//     var table = $('#'+selector+"-jsonTable").DataTable({
//                     "processing": true,
//                     "serverSide": true,
//                     "ajax": {
//                         "url": source_url,
//                         "data": additional_data,
//                         "type": "POST",
//                         "dataSrc" : function(json) {
//                             return json[return_index].data;
//                         }
//                     },
//                     "columnDefs": columnDefs,
//                     "iDisplayLength": 25,
//                     "lengthChange": false
//                 });

//     $("#"+selector+"-jsonTable").on( 'click', "a[class*='editTableRow'],a[class*='delTableRow'],a[class*='viewTableRow']", function (e) {
//         e.preventDefault();

//         var data =  table.row(table.row($(this).closest('tr')).index()).data();
        
//         if(action_type == 'url'){
//             var par_string = '/';
//             var del_par = [];
//             for(i=0; i<crud_parameter_array.length; i++){
//                 par_string += data[crud_parameter_array[i]]+'/';
//                 del_par.push(data[crud_parameter_array[i]]);
//             }

//             var url = $(this).attr('href');
            
//             if($(this).hasClass('delTableRow')){
//                 var sts = confirm("Apakah anda yakin ingin menghapus data ini?");
//                 if(!sts){
//                     return false;
//                 }else{
//                     post_data = $.extend( true, {}, additional_data);
//                     post_data.parameter = del_par;
//                     $.ajax({
//                         url: url,
//                         data: post_data,
//                         type: "post",
//                         dataType: "json",
//                         success: function (response) {
//                             if(response.status == 1){
//                                 alert('Data berhasil dihapus');
//                                 table.ajax.reload();
//                             }else{
//                                 alert('Data tidak ditemukan');
//                             }
//                         }
//                     });
//                 }
//             }else{
//                 window.location = url+par_string;
//             }
//         }else if(action_type == 'store'){
//             var store_array = [];
//             for(i=0; i<crud_parameter_array.length; i++){
//                 store_array.push(data[crud_parameter_array[i]]);
//             }
//             sessionStorage.setItem('crud_parameter', store_array.join(';'));
            
//             // Modal / Setting Form sesuai data
//             // if($(this).hasClass('delTableRow')){
//             //     alert('is delete');
//             // }else{
//             //     alert($(this).attr('class'));
//             // }
//         }
        
//     });
// }

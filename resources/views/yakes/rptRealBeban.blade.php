<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('yakes-report/lap-premi-bpjs') }}", null, formData, null, function(res){
        //    if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
        //    }else{
        //         $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
        //    }
       });
   }

   function spasi(menu,jum)
	{
		var dat="";;
		for (var s = 0; s < jum; s++) 
		{
	  		dat+="&nbsp;&nbsp;&nbsp;&nbsp;";
	  	}
        if (menu==".")
        { 
            menu="";
        }
		return dat+menu;
	}

    function fnSpasi(level)
    {
        var tmp="";
        for (var f=1; f<=level; f++)
        {
            tmp+="&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        return tmp;
    }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        // if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            periode = $periode;
            var beban = ['Beban Administrasi dan Umum','Beban Pelayanan Kesehatan','Beban Investasi','Beban SDM','Beban Administrasi dan Umum','Beban Pelayanan Kesehatan','Beban Investasi','Beban SDM'];
            var html = `
            <style>

            .report-table th{
                color: black !important;
                background-color: #70AD478A !important;
                border: 1px solid black !important;
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
            .report-table .no-border{
                border: 0px !important;
                border-bottom:1px solid black !important;
            }
            .bold{
                font-weight:bold !important;
            }
            </style>`;
            for(var i=0; i< beban.length; i++){

                html+=`
                <table class='table table-bordered report-table' width='100%'>
                <tr>
                    <td colspan='5' class='no-border bold'>`+beban[i]+`</td>
                </tr>
                <tr>
                    <th width='10%'>KD AKUN</th>
                    <th width='45%'>NAMA AKUN</th>
                    <th width='15%'>YTD 0819</th>
                    <th width='15%'>YTD 0820</th>
                    <th width='15%'>SELISIH</th>
                </tr>
                </table>`;
            }
        // }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   
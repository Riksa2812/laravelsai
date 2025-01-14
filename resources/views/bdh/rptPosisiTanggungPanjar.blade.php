<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-posisitanggungpanjar', null, formData, null, function(res){
        if(res.result.length > 0){
            $('#pagination').html('');
            var show = $('#show').val();
            generatePaginationDore('pagination',show,res);        
        }else{
            $('#saku-report #canvasPreview').load("{{ url('bdh-auth/form/blank') }}");
        }
    });
}

drawLap($formData);

function drawRptPage(data,res,from,to) {
    var html = "";
    if(data.length > 0) {
        var resData = res.res
        if(resData.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
        
        var split = data[0].tgl.split('/');
        var no = 1;
        var total = 0;

        html += `<div class="sai-rpt-table-export"">
            <h6 class="text-center">Posisi Pertanggungan Panjar</h6>  
            <h6 class="text-center">Periode ${getNamaBulan(split[1])} ${split[2]}</h6>
            <div style="margin-right: 8px;margin-left: 8px;overflow-x: scroll;">
                <table class="table table-bordered" style="width: 1600px;">
                    <thead>
                        <th style="text-align: center; width: 30px;">No</th>
                        <th style="text-align: center; width: 100px;">No Bukti</th>
                        <th style="text-align: center; width: 60px;">Tanggal</th>
                        <th style="text-align: center; width: 60px;">Kode PP</th>
                        <th style="text-align: center; width: 120px;">Nama PP</th>
                        <th style="text-align: center; width: 250px;">Keterangan</th>
                        <th style="text-align: center; width: 90px;">Nilai</th>
                        <th style="text-align: center; width: 60px;">Status</th>
                        <th style="text-align: center; width: 100px;">No Terima Dok</th>
                        <th style="text-align: center; width: 60px;">Tgl Terima Dok</th>
                        <th style="text-align: center; width: 100px;">No Ver Dok</th>
                        <th style="text-align: center; width: 60px;">Tgl Ver Dok</th>
                        <th style="text-align: center; width: 100px;">No Ver Pajak</th>
                        <th style="text-align: center; width: 60px;">Tgl Ver Pajak</th>
                        <th style="text-align: center; width: 100px;">No Ver Akun</th>
                        <th style="text-align: center; width: 60px;">Tgl Ver Akun</th>
                        <th style="text-align: center; width: 100px;">No Final</th>
                        <th style="text-align: center; width: 60px;">Tgl Final</th>
                    </thead>
                    <tbody>`
                    for(var i=0;i<data.length;i++) {
                        var row = data[i];
                        total +=+ parseFloat(row.nilai)

                        html += `<tr>
                            <td style="text-align: center;">${no}</td>
                            <td class="report-link linkpb" data-no_bukti="${row.no_pb}" style="text-align: left;">${row.no_pb}</td>
                            <td style="text-align: center;">${row.tgl}</td>
                            <td style="text-align: center;">${row.kode_pp}</td>
                            <td style="text-align: left;">${row.nama_pp}</td>
                            <td style="text-align: left;">${row.keterangan}</td>
                            <td style="text-align: right;">${sepNum(row.nilai)}</td>
                            <td style="text-align: left;">${row.progress}</td>
                            <td class="report-link linkver" data-no_bukti="${row.no_fisik}" style="text-align: left;">${row.no_fisik}</td>
                            <td style="text-align: center;">${row.tgl_fisik}</td>
                            <td class="report-link linkver" data-no_bukti="${row.no_verdok}" style="text-align: left;">${row.no_verdok}</td>
                            <td style="text-align: center;">${row.tgl_verdok}</td>
                            <td class="report-link linkver" data-no_bukti="${row.no_pajak}" style="text-align: left;">${row.no_pajak}</td>
                            <td style="text-align: center;">${row.tgl_pajak}</td>
                            <td class="report-link linkver" data-no_bukti="${row.no_ver}" style="text-align: left;">${row.no_ver}</td>
                            <td style="text-align: center;">${row.tgl_ver}</td>
                            <td class="report-link linkbyr" data-no_bukti="${row.no_kas}" style="text-align: left;">${row.no_kas}</td>
                            <td style="text-align: center;">${row.tgl_kas ? row.tgl_kas : '-'}</td>
                        </tr>`
                        no++;
                    }
            html += `<tr>
                        <td colspan="6" style="text-align: right;">Total</td>
                        <td style="text-align: right;">${sepNum(total)}</td>
                        <td colspan="11" style="text-align: right;">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>  
        </div>`;
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>
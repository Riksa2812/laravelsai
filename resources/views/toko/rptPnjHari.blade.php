<div id='canvasPreview'></div>
<script src="{{ asset('asset_elite/sai.js') }}"></script>
<script type="text/javascript">
function drawLap(formData){
    saiPost('toko-report/lap-penjualan-harian', null, formData, null, function(res){
        if(res.result.length > 0){
            $('#pagination').html('');
            var show = $('#show')[0].selectize.getValue();
            generatePagination('pagination',show,res);
           }
    });
}

drawLap($formData);

    function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data.length);
        if(data.length > 0){
               
               var mon_html = "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
                   var arr_tl = [0,0,0,0,0,0,0,0,0];
                   var x=1;
                   for (var i=0;i<data.length;i++)
                   { 
                       var line = data[i];
                       mon_html+=`
                       <div class="card card-body">
                            <h3><b>Tanggal</b> <span class="pull-right">#`+line.tanggal+`</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            
                                            <p class="text-muted m-l-5">
                                                Gudang: &nbsp;`+line.kode_gudang+` -&nbsp; `+line.nama_gudang+`
                                                <br>Kasir: `+line.nik_kasir+`</p>
                                        </address>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan</th>
                                                    <th class="text-right">Harga</th>
                                                    <th class="text-right">Diskon</th>
                                                    <th class="text-right">Jumlah</th>
                                                    <th class="text-right">Bonus</th>
                                                    <th class="text-right">Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>`;
                                            var harga=0; 
                                            var diskon=0; 
                                            var jumlah=0; 
                                            var bonus=0; 
                                            var total=0;  
                                            var subTot=0; 
                                            var det = '';
                                            var no=1;
                                            for (var x=0;x<res.res.data_detail.length;x++)
                                            {
                                                var line2 = res.res.data_detail[x];
                                                if(line.tanggal == line2.tanggal){
                                                    harga+=+line2.harga;
                                                    diskon+=+line2.diskon;
                                                    jumlah+=+line2.jumlah;
                                                    bonus+=+line2.bonus;
                                                    total+=+line2.total;
                                                    subTot+= +parseFloat(line2.total)+parseFloat(line2.diskon);
                                                    det+=`<tr>
                                                    <td align='center' class='isi_laporan'>`+no+`</td>
                                                    <td  class='isi_laporan'>`+line2.kode_barang+`</td>
                                                    <td class='isi_laporan'>`+line2.nama_brg+`</td>
                                                    <td class='isi_laporan'>`+line2.satuan+`</td>
                                                    <td align='right' class='isi_laporan'>`+sepNum(line2.harga)+`</td>
                                                    <td align='right' class='isi_laporan'>`+sepNum(line2.diskon)+`</td>
                                                    <td align='right' class='isi_laporan'>`+sepNum(line2.jumlah)+`</td>
                                                    <td align='right' class='isi_laporan'>`+sepNum(line2.bonus)+`</td>
                                                    <td align='right' class='isi_laporan'>`+sepNum(line2.total)+`</td>
                                                    </tr>`;	
                                                    no++;
                                                }
                                                
                                            }       

                                            mon_html+=det+`
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total amount: `+sepNum(subTot)+`</p>
                                        <p>Discount :`+sepNum(diskon)+` </p>
                                        <hr>
                                        <h3><b>Total :</b> `+sepNum(total)+`</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                       
                       <div style="page-break-after:always"></div>`;
                   }               
                  mon_html+=`</div>`;
            
        }
        $('#canvasPreview').html(mon_html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
        $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
<?php
 
namespace App\Http\Controllers\Ts;
 
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Log;
 
class BayarMandiriController extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    // public function __construct(Request $request)
    // {
    //     if(!Session::get('login')){
    //         return redirect('ts-auth/login')->with('alert','Session telah habis !');
    //     }
    // }

    public function index()
    {
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/list-mandiri-bill',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"]["data"];
                for($i=0;$i<count($data);$i++){
                    if ($data[$i]['status'] == 'WAITING'){

                        $data[$i]['action'] = '<button class="btn btn-success btn-sm complete-pay">Complete Payment</button>';
                        $data[$i]['action2'] = '<button class="btn btn-success btn-sm cancel-pay">Cancel Payment</button>';
                    }else{
                        $data[$i]['action'] = '';
                        $data[$i]['action2'] = '';
                    }
                }
            }
            return response()->json(['daftar' => $data, 'status'=>true,'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function cekAdaBill($bill_cust_id)
    {
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'ts/cek-mandiri-bill',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'bill_cust_id' => $bill_cust_id
                ]
            ]);
    
            $data['status'] = false;
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return $data;
            
        } catch (BadResponseException $ex) {
            return $ex;
        } 
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'nilai' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'nama_jurusan' => 'required',
            'kode_pp' => 'required',
            'no_bill' => 'required',
            'periode_bill' => 'required',
            'kode_param' => 'required',
            'id_bank' => 'required'
        ]);
            
        try{

            $cek = $this->cekAdaBill($request->id_bank);
            if($cek['status']){

                $client = new Client();
                
                $response = $client->request('POST',  'https://mandirigw.ypt.or.id/bill',[
                    'headers' => [
                        'app_code' => config('api.ypt_app_code'),
                        'app_key'  => config('api.ypt_app_key'),
                    ],
                    'form_params' => [
                        'bill_cust_id' => $request->id_bank,
                        'bill_cust_info' => '{"NIS": '.$request->nis.', "nama": '.$request->nama.', "jurusan": '.$request->nama_jurusan.',"kode_pp":'.$request->kode_pp.'}',
                        'bill_name' => $request->kode_param.'\\'.$request->nilai.'\\'.$request->periode_bill.'\\'.$request->no_bill,
                        'bill_short_name' => $cek['no_bukti'],
                        'bill_amount' => $request->nilai,
                        'bill_currency' => 'IDR',
                        'bill_open_date' => '2021-05-22 15:00:00',
                        'bill_close_date' => '2021-09-24 15:00:00'
                    ]
                ]);
                
                $data = [];
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                }
                Log::info('MANDIRI BILL:'.print_r($data,true));
                $res = [];
                $log = print_r($data, true); 
                if($data['success']){

                    $request->request->add(['log' => $log]);
                    $request->request->add(['status' => $data['bill']['bill_status']]);
                    $request->request->add(['bill_short_name' => $data['bill']['bill_short_name']]);
                    $request->request->add(['bill_cust_id' => $data['bill']['bill_cust_id']]);
                    $response = $client->request('POST',  config('api.url').'ts/create-mandiri-bill',[
                        'headers' => [
                            'Authorization' => 'Bearer '.Session::get('token'),
                            'Accept'     => 'application/json',
                        ],
                        'form_params' => $request->all()
                    ]);
                   
                    if ($response->getStatusCode() == 200) { // 200 OK
                        $response_data = $response->getBody()->getContents();
                        $res = json_decode($response_data,true);
                    }
                    Log::info('MANDIRI BILL STORE DB RESPONSE:'.print_r($res,true));
                }else{
                    $response = $client->request('DELETE',  config('api.url').'ts/delete-mandiri-bill',[
                        'headers' => [
                            'Authorization' => 'Bearer '.Session::get('token'),
                            'Accept'     => 'application/json',
                        ],
                        'form_params' => [
                            'bill_cust_id' => $request->id_bank,
                            'bill_short_name' => $cek['no_bukti']
                        ]
                    ]);
                   
                    if ($response->getStatusCode() == 200) { // 200 OK
                        $response_data = $response->getBody()->getContents();
                        $res = json_decode($response_data,true);
                    }
                    Log::info('MANDIRI BILL STORE DB RESPONSE:'.print_r($res,true));
                }
            }else{
                $data['message'] = "Create Bill Mandiri gagal. Masih ada bill mandiri yang belum dibayarkan. Cancel bill pada riwayat pembayaran untuk membatalkan bill sebelumnya";
            }
            
            return response()->json($data, 200);
        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }

    public function show(Request $request)
    {
        $request->validate([
            'bill_short_name' => 'required',
            'va' => 'required'
        ]);
            
        try{
            $client = new Client();
            
            $response = $client->request('GET', 'https://mandirigw.ypt.or.id/bills/va/'.$request->va.'?bill_short_name='.$request->bill_short_name,[
                'headers' => [
                    'app_code' => config('api.ypt_app_code'),
                    'app_key'  => config('api.ypt_app_key'),
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200);
        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'bill_short_name' => 'required',
            'bill_cust_id' => 'required',
        ]);
            
        try{
            $client = new Client();
            
            $response = $client->request('PUT',  'https://mandirigw.ypt.or.id/bill/cancel',[
                'headers' => [
                    'app_code' => config('api.ypt_app_code'),
                    'app_key'  => config('api.ypt_app_key'),
                ],
                'form_params' => [
                    'bill_cust_id' => $request->bill_cust_id,
                    'bill_short_name' => $request->bill_short_name,
                ]
            ]);
            
            $data = [];
            $data['status'] = false;
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }

            if(isset($data['success'])){

                $response = $client->request('PUT',  config('api.url').'ts/cancel-mandiri-bill',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'bill_cust_id' => $request->bill_cust_id,
                        'bill_short_name' => $request->bill_short_name,
                    ]
                ]);
               
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $res = json_decode($response_data,true);
                }
                Log::info('MANDIRI BILL CANCEL UPDATE DB RESPONSE:'.print_r($res,true));
               
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $res = json_decode($response_data,true);
                }
            }
            return response()->json($data, 200);
        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }

    public function updateStatus(Request $request)
    {       
        try{
            Log::info('CALLBACK MANDIRI TS :');
            Log::info($request->all());
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'ts/update-mandiri-bill',[
                'headers' => [
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'bill_cust_id' => $request->bill_cust_id,
                    'bill_short_name' => $request->bill_short_name,
                    'bill_status' => $request->bill_status,
                    ]
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $res = json_decode($response_data,true);
                }
                return response()->json($res, 200);
        } catch (BadResponseException $ex) {

            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }

    
}
 

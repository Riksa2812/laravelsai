<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SanksiAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-adm-sanksis',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'kode_nik' => 'required',
            'nama' => 'required|array',
            'tanggal' => 'required|array',
            'jenis' => 'required|array',
        ]);

        try {   
            $array_nomor = array();
            $array_nama = array();
            $array_tanggal = array();
            $array_jenis = array();
            $fields = array();

            if(count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    $data_nomor = $request->nomor[$i];
                    $data_nama = $request->nama[$i];
                    $data_tanggal = $request->tanggal[$i];
                    $data_jenis = $request->jenis[$i];

                    array_push($array_nomor, $data_nomor);
                    array_push($array_nama, $data_nama);
                    array_push($array_tanggal, $data_tanggal);
                    array_push($array_jenis, $data_jenis);
                }

                $fields = array(
                    "nik" => $request->input('kode_nik'),
                    "nomor" => $array_nomor,
                    "nama" => $array_nama,
                    "tanggal" => $array_tanggal,
                    "jenis" => $array_jenis
                );
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-adm-sanksi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-adm-sanksi',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ], 
                'query' => [
                    'nik' => $request->query('kode')
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request) {
        $this->validate($request, [
            'kode_nik' => 'required',
            'nama' => 'required|array',
            'tanggal' => 'required|array',
            'jenis' => 'required|array',
        ]);

        try {   
            $array_nomor = array();
            $array_nama = array();
            $array_tanggal = array();
            $array_jenis = array();
            $fields = array();

            if(count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    $data_nomor = $request->nomor[$i];
                    $data_nama = $request->nama[$i];
                    $data_tanggal = $request->tanggal[$i];
                    $data_jenis = $request->jenis[$i];

                    array_push($array_nomor, $data_nomor);
                    array_push($array_nama, $data_nama);
                    array_push($array_tanggal, $data_tanggal);
                    array_push($array_jenis, $data_jenis);
                }

                $fields = array(
                    "nik" => $request->input('kode_nik'),
                    "nomor" => $array_nomor,
                    "nama" => $array_nama,
                    "tanggal" => $array_tanggal,
                    "jenis" => $array_jenis
                );
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-adm-sanksi-update',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                    
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/sdm-adm-sanksi',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik' => $request->input('kode')
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }
   
}

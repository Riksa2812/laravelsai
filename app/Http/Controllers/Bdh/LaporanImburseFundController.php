<?php

namespace App\Http\Controllers\Bdh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LaporanImburseFundController extends Controller {
    public function __contruct() {
        if (!Session::get('login')) {
            return redirect('bdh-auth/login');
        }
    }

    public function dataKartuIf(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-kartuif',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'no_bukti' => $r->input('no_bukti'),
                    'nik' => $r->input('nik')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataPosisiImburseIf(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-posisiimburseif',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataImburseIf(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-imburseif',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function dataBukaIf(Request $r) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'bdh-report/lap-bukaif',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $r->input('periode'),
                    'no_bukti' => $r->input('no_bukti')
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            if(isset($r->back)){
                $res['back']=true;
            }
                
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$r->sumju,'res'=>$res], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}
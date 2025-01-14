<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KeluargaAdmController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-adm-keluargas',[
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
            'status' => 'required|array',
            'jk' => 'required|array',
            'tempat' => 'required|array',
            'tgl_lahir' => 'required|array',
            'tanggungan' => 'required|array',
        ]);

        try {   
            $array_nomor = array();
            $array_nama = array();
            $array_status = array();
            $array_kelamin = array();
            $array_tanggungan = array();
            $array_tempat_lahir = array();
            $array_tanggal = array();
            $array_fileName = array();

            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('kode_nik')
                )
            );

            if(count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    $data_nomor = array(
                        "name" => "nomor[]",
                        "contents" => $request->nomor[$i]
                    );
                    $data_nama = array(
                        "name" => "nama[]",
                        "contents" => $request->nama[$i]
                    );
                    $data_status = array(
                        "name" => "jenis[]",
                        "contents" => $request->status[$i]
                    );
                    $data_kelamin = array(
                        "name" => "jk[]",
                        "contents" => $request->jk[$i]
                    );
                    $data_tanggungan = array(
                        "name" => "status_kes[]",
                        "contents" => $request->tanggungan[$i]
                    );
                    $data_tempat_lahir = array(
                        "name" => "tempat[]",
                        "contents" => $request->tempat[$i]
                    );
                    $data_tgl_lahir = array(
                        "name" => "tgl_lahir[]",
                        "contents" => $request->tgl_lahir[$i]
                    );
                    $data_fileName = array(
                        "name" => "fileName[]",
                        "contents" => $request->fileName[$i]
                    );

                    array_push($array_nomor, $data_nomor);
                    array_push($array_nama, $data_nama);
                    array_push($array_status, $data_status);
                    array_push($array_kelamin, $data_kelamin);
                    array_push($array_tanggungan, $data_tanggungan);
                    array_push($array_tempat_lahir, $data_tempat_lahir);
                    array_push($array_tanggal, $data_tgl_lahir);
                    array_push($array_fileName, $data_fileName);
                }

                $fields = array_merge(
                    $fields,
                    $array_nomor, 
                    $array_nama, 
                    $array_status, 
                    $array_kelamin, 
                    $array_tanggungan, 
                    $array_tempat_lahir, 
                    $array_tanggal, 
                    $array_fileName
                );
            }

            if(!empty($request->file('file'))) { 
                if(count($request->file('file')) > 0) {
                    $array_file = array();
                    for($i=0; $i<count($request->file('file')); $i++) {
                        if(isset($request->file('file')[$i])) { 
                            $image_path = $request->file('file')[$i]->getPathname();
                            $image_mime = $request->file('file')[$i]->getmimeType();
                            $image_org  = $request->file('file')[$i]->getClientOriginalName();

                            $data_file = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' )
                            );

                            array_push($array_file, $data_file);
                        }
                    }

                    $fields = array_merge($fields, $array_file);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-adm-keluarga',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/sdm-adm-keluarga',
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
            'status' => 'required|array',
            'jk' => 'required|array',
            'tempat' => 'required|array',
            'tgl_lahir' => 'required|array',
            'tanggungan' => 'required|array',
        ]);

        try {   
            $array_nomor = array();
            $array_nama = array();
            $array_status = array();
            $array_kelamin = array();
            $array_tanggungan = array();
            $array_tempat_lahir = array();
            $array_tanggal = array();
            $array_fileName = array();
            $array_filePrevName = array();
            $array_isUpload = array();

            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('kode_nik')
                )
            );

            if(count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    $data_nomor = array(
                        "name" => "nomor[]",
                        "contents" => $request->nomor[$i]
                    );
                    $data_nama = array(
                        "name" => "nama[]",
                        "contents" => $request->nama[$i]
                    );
                    $data_status = array(
                        "name" => "jenis[]",
                        "contents" => $request->status[$i]
                    );
                    $data_kelamin = array(
                        "name" => "jk[]",
                        "contents" => $request->jk[$i]
                    );
                    $data_tanggungan = array(
                        "name" => "status_kes[]",
                        "contents" => $request->tanggungan[$i]
                    );
                    $data_tempat_lahir = array(
                        "name" => "tempat[]",
                        "contents" => $request->tempat[$i]
                    );
                    $data_tgl_lahir = array(
                        "name" => "tgl_lahir[]",
                        "contents" => $request->tgl_lahir[$i]
                    );
                    $data_fileName = array(
                        "name" => "fileName[]",
                        "contents" => $request->fileName[$i]
                    );
                    $data_filePrevName = array(
                        "name" => "filePrevName[]",
                        "contents" => $request->filePrevName[$i]
                    );
                    $data_isUpload = array(
                        "name" => "isUpload[]",
                        "contents" => $request->isUpload[$i]
                    );

                    array_push($array_nomor, $data_nomor);
                    array_push($array_nama, $data_nama);
                    array_push($array_status, $data_status);
                    array_push($array_kelamin, $data_kelamin);
                    array_push($array_tanggungan, $data_tanggungan);
                    array_push($array_tempat_lahir, $data_tempat_lahir);
                    array_push($array_tanggal, $data_tgl_lahir);
                    array_push($array_fileName, $data_fileName);
                    array_push($array_filePrevName, $data_filePrevName);
                    array_push($array_isUpload, $data_isUpload);
                }

                $fields = array_merge(
                    $fields,
                    $array_nomor, 
                    $array_nama, 
                    $array_status, 
                    $array_kelamin, 
                    $array_tanggungan, 
                    $array_tempat_lahir, 
                    $array_tanggal, 
                    $array_fileName,
                    $array_filePrevName,
                    $array_isUpload
                );
            }

            if(!empty($request->file('file'))) {
                if(count($request->file('file')) > 0) {
                    $array_file = array();
                    for($i=0; $i<count($request->file('file')); $i++) {
                        if(isset($request->file('file')[$i])) { 
                            $image_path = $request->file('file')[$i]->getPathname();
                            $image_mime = $request->file('file')[$i]->getmimeType();
                            $image_org  = $request->file('file')[$i]->getClientOriginalName();

                            $data_file = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen( $image_path, 'r' )
                            );

                            array_push($array_file, $data_file);
                        }
                    }

                    $fields = array_merge($fields, $array_file);
                }
            }

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sdm-adm-keluarga-update',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
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
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/sdm-adm-keluarga',
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

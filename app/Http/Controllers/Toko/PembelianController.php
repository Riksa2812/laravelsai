<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('toko-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/pembelian',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getBarang(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/pembelian-barang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        try {
        $this->validate($request, [
            'kode_vendor' => 'required',
            'no_faktur' => 'required',
            'total_trans' => 'required',
            'total_disk' => 'required',
            'total_ppn' => 'required',
            'kode_akun' => 'required|array',
            'kode_barang' => 'required|array',
            'qty_barang' => 'required|array',
            'harga_barang' => 'required|array',
            'disc_barang' => 'required|array',
            'satuan_barang' => 'required|array',
            'sub_barang' => 'required|array'
        ]);
        $data_harga = array();
        for($i=0;$i<count($request->harga_barang);$i++){
            $data_harga[] = intval(str_replace('.','', $request->harga_barang[$i]));
        }
        $data_diskon = array();
        for($i=0;$i<count($request->disc_barang);$i++){
            $data_diskon[] = intval(str_replace('.','', $request->disc_barang[$i]));
        }
        $data_sub = array();
        for($i=0;$i<count($request->sub_barang);$i++){
            $data_sub[] = intval(str_replace('.','', $request->sub_barang[$i]));
        }

        $fields = array (
            'kode_pp' => Session::get('kodePP'),
            'kode_vendor' => $request->kode_vendor,
            'no_faktur' => $request->no_faktur,
            'total_trans' => intval(str_replace('.','', $request->total_trans)),
            'total_diskon' => intval(str_replace('.','', $request->total_disk)),
            'total_ppn' => intval(str_replace('.','', $request->total_ppn)),
            'kode_barang' => $request->kode_barang,
            'kode_akun' => $request->kode_akun,
            'qty_barang' => $request->qty_barang,
            'satuan_barang' => $request->satuan_barang,
            'harga_barang' => $data_harga,
            'disc_barang' => $data_diskon,
            'sub_barang'=> $data_sub
        );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/pembelian',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function show($id1,$id2,$id3) {
        try{
            $id = $id1."/".$id2."/".$id3;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/pembelian-detail?no_bukti='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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

    public function update(Request $request, $id1,$id2,$id3) {
        try {
        $this->validate($request, [
            'kode_vendor' => 'required',
            'no_faktur' => 'required',
            'total_trans' => 'required',
            'total_disk' => 'required',
            'total_ppn' => 'required',
            'kode_akun' => 'required|array',
            'kode_barang' => 'required|array',
            'qty_barang' => 'required|array',
            'harga_barang' => 'required|array',
            'disc_barang' => 'required|array',
            'satuan_barang' => 'required|array',
            'sub_barang' => 'required|array'
        ]);
        $data_harga = array();
        for($i=0;$i<count($request->harga_barang);$i++){
            $data_harga[] = intval(str_replace('.','', $request->harga_barang[$i]));
        }
        $data_diskon = array();
        for($i=0;$i<count($request->disc_barang);$i++){
            $data_diskon[] = intval(str_replace('.','', $request->disc_barang[$i]));
        }
        $data_sub = array();
        for($i=0;$i<count($request->sub_barang);$i++){
            $data_sub[] = intval(str_replace('.','', $request->sub_barang[$i]));
        }

        $fields = array (
            'kode_pp' => Session::get('kodePP'),
            'kode_vendor' => $request->kode_vendor,
            'no_faktur' => $request->no_faktur,
            'total_trans' => intval(str_replace('.','', $request->total_trans)),
            'total_diskon' => intval(str_replace('.','', $request->total_disk)),
            'total_ppn' => intval(str_replace('.','', $request->total_ppn)),
            'kode_barang' => $request->kode_barang,
            'kode_akun' => $request->kode_akun,
            'qty_barang' => $request->qty_barang,
            'satuan_barang' => $request->satuan_barang,
            'harga_barang' => $data_harga,
            'disc_barang' => $data_diskon,
            'sub_barang'=> $data_sub
        );
            $client = new Client();
            $no_bukti = $id1."/".$id2."/".$id3;
            $response = $client->request('PUT',  config('api.url').'toko-trans/pembelian?no_bukti='.$no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function delete($id1,$id2,$id3) {
        try{
            $id = $id1."/".$id2."/".$id3;
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'toko-trans/pembelian?no_bukti='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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

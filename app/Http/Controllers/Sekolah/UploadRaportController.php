<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class UploadRaportController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login');
            }
        }

        public function joinNum($num){
            // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
            $num = str_replace(".", "", $num);
            $num = str_replace(",", ".", $num);
            return $num;
        }  

        public function index(Request $request)
        {
            try{
                
                $kode_pp = $request->kode_pp;
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/raport-dok-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function loadSiswa(Request $request)
        {
            try{
                
                $kode_pp = $request->kode_pp;
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/raport-dok-siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_ta' => $request->kode_ta,
                        'kode_sem' => $request->kode_sem
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
                }
                return response()->json($data, 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function listUpload(Request $request)
        {
            try{
                if(isset($request->kode_pp) && $request->kode_pp != ""){
                    $kode_pp = $request->kode_pp;
                }else{
                    $kode_pp = Session::get('kodePP');
                }
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-dok-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function show(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti,
                        'kode_pp' => $request->kode_pp
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
                }
                return response()->json(['data' => $data], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
        }

        public function store(Request $request) {

            $this->validate($request, [
                'kode_ta' => 'required',  
                'kode_pp' => 'required',
                'kode_sem' => 'required',
                'kode_kelas' => 'required',
                'kode_matpel' => 'required',
                'kode_jenis'=>'required',
                'flag_kelas'=>'required',
                'kode_kd' => 'required',
                'nama_kd' => 'required',
                'pelaksanaan' => 'required',
                'nis'=>'required|array',
                'nilai'=>'required|array'
            ]);

            try {
                $det_nilai = array();
                if(isset($request->nilai)){
                    $nilai = $request->nilai;
                    for($i=0;$i<count($nilai);$i++){
                        array_push($det_nilai,$this->joinNum($nilai[$i]));
                    }
                }

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/penilaian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_ta' => $request->kode_ta,  
                        'kode_pp' => $request->kode_pp,
                        'kode_sem' => $request->kode_sem,
                        'kode_kelas' => $request->kode_kelas,
                        'flag_kelas' => $request->flag_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_jenis'=>$request->kode_jenis,
                        'kode_kd'=>$request->kode_kd,
                        'nama_kd'=>$request->nama_kd,
                        'pelaksanaan' => $request->pelaksanaan,
                        'nis'=>$request->nis,
                        'nilai'=>$det_nilai
                    ]
                ]);
                // var_dump('Sukses');
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }

        }

        public function update(Request $request) {
            $this->validate($request, [
                'no_bukti' => 'required', 
                'kode_ta' => 'required',  
                'kode_pp' => 'required',
                'kode_sem' => 'required',
                'kode_kelas' => 'required',
                'flag_kelas' => 'required',
                'kode_matpel' => 'required',
                'kode_jenis'=>'required',
                'kode_kd'=>'required',
                'nama_kd'=>'required',
                'pelaksanaan' => 'required',
                'nis'=>'required|array',
                'nilai'=>'required|array'
            ]);

            try {

                $det_nilai = array();
                if(isset($request->nilai)){
                    $nilai = $request->nilai;
                    for($i=0;$i<count($nilai);$i++){
                        array_push($det_nilai,$this->joinNum($nilai[$i]));
                    }
                }
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/penilaian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_bukti' => $request->no_bukti, 
                        'kode_ta' => $request->kode_ta,  
                        'kode_pp' => $request->kode_pp,
                        'kode_sem' => $request->kode_sem,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_jenis'=>$request->kode_jenis,
                        'kode_kd' => $request->kode_kd,
                        'nama_kd' => $request->nama_kd,
                        'pelaksanaan' => $request->pelaksanaan,
                        'flag_kelas' => $request->flag_kelas,
                        'nis'=>$request->nis,
                        'nilai'=>$det_nilai
                    ]
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
        }

        public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/raport-dok-siswa',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti,  
                        'kode_pp' => $request->kode_pp
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
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

        public function getPenilaianKe(Request $request)
        {
            try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-ke',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp,
                        'kode_ta' => $request->kode_ta,
                        'kode_sem' => $request->kode_sem,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_jenis' => $request->kode_jenis
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
                }
                return response()->json(['data' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function importExcel(Request $request)
        {
            $this->validate($request, [
                'file' => 'required',
                'kode_pp' => 'required',
                'kode_kelas' => 'required'
            ]);
    
            try{
                
                $image_path = $request->file('file')->getPathname();
                $image_mime = $request->file('file')->getmimeType();
                $image_org  = $request->file('file')->getClientOriginalName();
                $fields[0] = array(
                    'name'     => 'file',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen($image_path, 'r' ),
                );
                $fields[1] = array(
                    'name'     => 'nik_user',
                    'contents' => Session::get('nikUser')
                );
                $fields[2] = array(
                    'name'     => 'kode_pp',
                    'contents' => $request->kode_pp
                );
                $fields[3] = array(
                    'name'     => 'kode_kelas',
                    'contents' => $request->kode_kelas
                );
    
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/import-excel',[
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
                $result['message'] = $res;
                $result['status']=false;
                return response()->json(["data" => $result], 200);
            } 
            
        }

        
        public function getKD(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-kd',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $request->kode_pp,
                        'kode_matpel' => $request->kode_matpel,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_kd' => $request->kode_kd,
                        'kode_sem' => $request->kode_sem
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }

        }

    
        public function getNilaiTmp(Request $request)
        {
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/nilai-tmp',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik_user' => Session::get('nikUser'),
                        'kode_pp' => $request->kode_pp
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
                }
                return response()->json(['data' => $data], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $result['message'] = $res["message"];
                $result['status']=false;
                return response()->json(["data" => $result], 200);
            } 
        }

        public function showDokUpload(Request $request)
        {
            $this->validate($request,[
                'no_bukti' => 'required',
                'kode_pp' => 'required'
            ]);
            try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/raport-dok-siswa-edit',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti,
                        'kode_pp' => $request->kode_pp
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data;
                }
                return response()->json(['data' => $data], 200); 
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $result['message'] = $res["message"];
                $result['status']=false;
                return response()->json(["data" => $result], 200);
            } 
        }

        public function storeDokumen(Request $request) {

            $this->validate($request, [
                'kode_ta' => 'required',
                'kode_kelas' => 'required',
                'kode_sem' => 'required',
                'kode_pp' => 'required'
            ]);

            try {
                
                $fields = [
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ], 
                    [
                        'name' => 'kode_ta',
                        'contents' => $request->kode_ta,
                    ], [
                        'name' => 'kode_sem',
                        'contents' => $request->kode_sem,
                    ],
                    [
                        'name' => 'kode_kelas',
                        'contents' => $request->kode_kelas,
                    ]
                ];
    
                $fields_foto = array();
                $fields_nama_file_seb = array();
                $fields_nama_nis = array();
                $cek = $request->file_dok;
                $send_data = array();
                $send_data = array_merge($send_data,$fields);
                for($i=0;$i<count($request->nis);$i++){
                    if(!empty($cek)){
                        if(count($request->file_dok) > 0){
                            if(isset($request->file('file_dok')[$i])){
                                $image_path = $request->file('file_dok')[$i]->getPathname();
                                $image_mime = $request->file('file_dok')[$i]->getmimeType();
                                $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                                $fields_foto[$i] = array(
                                    'name'     => 'file['.$i.']',
                                    'filename' => $image_org,
                                    'Mime-Type'=> $image_mime,
                                    'contents' => fopen( $image_path, 'r' ),
                                );
                                
                            }
                        }
                    }
                    
                    $fields_nama_nis[$i] = array(
                        'name'     => 'nis[]',
                        'contents' => $request->nis[$i],
                    );
                    
                    $fields_nama_file_seb[$i] = array(
                        'name'     => 'nama_file_seb[]',
                        'contents' => $request->nama_file[$i],
                    );
                } 

                $send_data = array_merge($send_data,$fields_nama_nis);
                $send_data = array_merge($send_data,$fields_nama_file_seb);
                $send_data = array_merge($send_data,$fields_foto);

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/raport-dok-siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }

        }

        public function updateDokumen(Request $request) {

            $this->validate($request, [
                'no_bukti' => 'required',
                'kode_ta' => 'required',
                'kode_kelas' => 'required',
                'kode_sem' => 'required',
                'kode_pp' => 'required'
            ]);

            try {
                
                $fields = [
                    [
                        'name' => 'kode_pp',
                        'contents' => $request->kode_pp,
                    ], 
                    [
                        'name' => 'kode_ta',
                        'contents' => $request->kode_ta,
                    ], [
                        'name' => 'kode_sem',
                        'contents' => $request->kode_sem,
                    ],
                    [
                        'name' => 'kode_kelas',
                        'contents' => $request->kode_kelas,
                    ],
                    [
                        'name' => 'no_bukti',
                        'contents' => $request->no_bukti,
                    ]
                ];
    
                $fields_foto = array();
                $fields_nama_file_seb = array();
                $fields_nama_nis = array();
                $cek = $request->file_dok;
                $send_data = array();
                $send_data = array_merge($send_data,$fields);
                for($i=0;$i<count($request->nis);$i++){
                    if(!empty($cek)){
                        if(count($request->file_dok) > 0){
                            if(isset($request->file('file_dok')[$i])){
                                $image_path = $request->file('file_dok')[$i]->getPathname();
                                $image_mime = $request->file('file_dok')[$i]->getmimeType();
                                $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                                $fields_foto[$i] = array(
                                    'name'     => 'file['.$i.']',
                                    'filename' => $image_org,
                                    'Mime-Type'=> $image_mime,
                                    'contents' => fopen( $image_path, 'r' ),
                                );
                                
                            }
                        }
                    }
                    
                    $fields_nama_nis[$i] = array(
                        'name'     => 'nis[]',
                        'contents' => $request->nis[$i],
                    );
                    
                    $fields_nama_file_seb[$i] = array(
                        'name'     => 'nama_file_seb[]',
                        'contents' => $request->nama_file[$i],
                    );
                } 
                
                $send_data = array_merge($send_data,$fields_nama_nis);
                $send_data = array_merge($send_data,$fields_nama_file_seb);
                $send_data = array_merge($send_data,$fields_foto);

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/raport-dok-siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }

        }

        public function deleteDokumen(Request $request) {
            
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'sekolah/raport-dok-siswa-nis',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'no_bukti' => $request->no_bukti,  
                        'kode_pp' => $request->kode_pp,  
                        'nis' => $request->nis
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
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

        public function getKelas(Request $request)
        {
            try{
                
                $kode_pp = $request->kode_pp;
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-kelas',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function getMatpel(Request $request)
        {
            try{
                
                $kode_pp = $request->kode_pp;
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-matpel',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_kelas' => $request->kode_kelas,
                        'kode_matpel' => $request->kode_matpel,
                        'flag_kelas' => $request->flag_kelas
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $res = json_decode($response_data,true);
                    $data = $res["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true, 'res'=>$res], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function getSiswa(Request $request)
        {
            try{
                
                $kode_pp = $request->kode_pp;
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/penilaian-siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'nis' => $request->nis,
                        'kode_matpel' => $request->kode_matpel,
                        'flag_kelas' => $request->flag_kelas,
                        'flag_aktif' => 1,
                        'kode_kelas' => $request->kode_kelas
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $res = json_decode($response_data,true);
                    $data = $res["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

    }


?>
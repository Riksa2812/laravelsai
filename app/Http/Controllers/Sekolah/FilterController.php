<?php
    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class FilterController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login');
            }
        }

        public function getFilterKelasDash(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-kelas-dash',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'nik_guru' => $request->nik_guru,
                    'kode_ta' => $request->kode_ta,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterMatpelDash(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-matpel-dash',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'kode_kelas' => $request->kode_kelas,
                    'nik_guru' => $request->nik_guru,
                    'kode_ta' => $request->kode_ta,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterTahunAjaran(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-tahunajar',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterPP(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-pp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterTA(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-ta',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'flag_aktif' => $request->flag_aktif,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterKelas(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-kelas',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'nik_guru' => $request->nik_guru,
                    'flag_aktif' => $request->flag_aktif,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterMatpel(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-matpel',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'kode_kelas' => $request->kode_kelas,
                    'nik_guru' => $request->nik_guru,
                    'flag_aktif' => $request->flag_aktif,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterGuru(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'sekolah/filter-guru',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterSemester() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sekolah/filter-semester',[
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
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }


    }
?>
<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KepegawaianV3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct()
    {
        if (!Session::get('login')) {
            return redirect('esaku-auth/login');
        }
    }

    public function getTahun($date)
    {
        $explode = explode("/", $date);
        return $explode[2];
    }

    public function convertDate($date, $from = '/', $to = '-')
    {
        $explode = explode($from, $date);
        return "$explode[2]" . "$to" . "$explode[1]" . "$to" . "$explode[0]";
    }

    public function joinNum($num)
    {
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/v3/sdm-karyawans', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }

    public function get_kontrak()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/v3/sdm-kontraks', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'no_ktp' => 'required',
            'jk' => 'required',
            'kode_agama' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required',
            't_badan' => 'required',
            'b_badan' => 'required',
            'gol_darah' => 'required',
            'no_kk' => 'required',
            'status_nikah' => 'required',
            'tgl_nikah' => 'required',
            'kode_bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('nik')
                ),
                array(
                    "name" => "nama",
                    "contents" => $request->input('nama')
                ),
                array(
                    "name" => "nomor_ktp",
                    "contents" => $request->input('no_ktp')
                ),
                array(
                    "name" => "jenis_kelamin",
                    "contents" => $request->input('jk')
                ),
                array(
                    "name" => "kode_agama",
                    "contents" => $request->input('kode_agama')
                ),
                array(
                    "name" => "no_telp",
                    "contents" => $request->input('no_telp')
                ),
                array(
                    "name" => "no_hp",
                    "contents" => $request->input('no_hp')
                ),
                array(
                    "name" => "tempat_lahir",
                    "contents" => $request->input('tempat')
                ),
                array(
                    "name" => "tgl_lahir",
                    "contents" => $this->convertDate($request->input('tgl_lahir'))
                ),
                array(
                    "name" => "alamat",
                    "contents" => $request->input('alamat')
                ),
                array(
                    "name" => "provinsi",
                    "contents" => $request->input('provinsi')
                ),
                array(
                    "name" => "kota",
                    "contents" => $request->input('kota')
                ), array(
                    "name" => "kecamatan",
                    "contents" => $request->input('kecamatan')
                ),
                array(
                    "name" => "kelurahan",
                    "contents" => $request->input('kelurahan')
                ),
                array(
                    "name" => "kode_pos",
                    "contents" => $request->input('kode_pos')
                ),
                array(
                    "name" => "tinggi_badan",
                    "contents" => $this->joinNum($request->input('t_badan'))
                ),
                array(
                    "name" => "berat_badan",
                    "contents" => $this->joinNum($request->input('b_badan'))
                ),
                array(
                    "name" => "golongan_darah",
                    "contents" => $request->input('gol_darah')
                ),
                array(
                    "name" => "nomor_kk",
                    "contents" => $request->input('no_kk')
                ),
                array(
                    "name" => "status_nikah",
                    "contents" => $request->input('status_nikah')
                ),
                array(
                    "name" => "tgl_nikah",
                    "contents" => $this->convertDate($request->input('tgl_nikah'))
                ),
                array(
                    "name" => "kode_bank",
                    "contents" => $request->input('kode_bank')
                ),
                array(
                    "name" => "cabang",
                    "contents" => $request->input('cabang')
                ),
                array(
                    "name" => "no_rek",
                    "contents" => $request->input('no_rek')
                ),
                array(
                    "name" => "nama_rek",
                    "contents" => $request->input('nama_rek')
                ),
            );

            $array_nomor = array();
            $array_jenis = array();
            $array_status = array();
            $array_fileName = array();
            $array_filePrevName = array();
            $array_isUpload = array();

            if (count($request->input('nu')) > 0) {
                for ($i = 0; $i < count($request->input('nu')); $i++) {
                    $data_nomor = array(
                        "name" => "nu[]",
                        "contents" => $request->nu[$i]
                    );
                    $data_jenis = array(
                        "name" => "jenis[]",
                        "contents" => $request->jenis[$i]
                    );
                    $data_status = array(
                        "name" => "sts_dokumen[]",
                        "contents" => $request->sts_dokumen[$i]
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
                    array_push($array_jenis, $data_jenis);
                    array_push($array_status, $data_status);
                    array_push($array_fileName, $data_fileName);
                    array_push($array_filePrevName, $data_filePrevName);
                    array_push($array_isUpload, $data_isUpload);
                }

                $fields = array_merge(
                    $fields,
                    $array_nomor,
                    $array_jenis,
                    $array_status,
                    $array_fileName,
                    $array_filePrevName,
                    $array_isUpload
                );
            }

            if (!empty($request->file('file'))) {
                if (count($request->file('file')) > 0) {
                    $array_file = array();
                    for ($i = 0; $i < count($request->file('file')); $i++) {
                        if (isset($request->file('file')[$i])) {
                            $image_path = $request->file('file')[$i]->getPathname();
                            $image_mime = $request->file('file')[$i]->getmimeType();
                            $image_org  = $request->file('file')[$i]->getClientOriginalName();

                            $data_file = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type' => $image_mime,
                                'contents' => fopen($image_path, 'r')
                            );

                            array_push($array_file, $data_file);
                        }
                    }

                    $fields = array_merge($fields, $array_file);
                }
            }


            // dd($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/v3/sdm-karyawan', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function store_kontrak(Request $request)
    {
        $this->validate($request, [
            'kode_status' => 'required',
            'kode_sdm' => 'required',
            'kode_loker' => 'required',
            'tgl_masuk' => 'required',
            'npwp' => 'required',
            'no_bpjs' => 'required',
            'no_bpjs_kerja' => 'required',
            'kode_profesi' => 'required',
            'client' => 'required',

            'skill' => 'required',
            'no_kontrak' => 'required',
            'tgl_kontrak' => 'required',
            'tgl_kontrak_akhir' => 'required',
            'atasan_langsung' => 'required',
            'atasan_t_langsung' => 'required',
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('nik')
                ),
                array(
                    "name" => "kode_sdm",
                    "contents" => $request->input('kode_sdm')
                ),
                array(
                    "name" => "kode_status",
                    "contents" => $request->input('kode_status')
                ),
                array(
                    "name" => "kode_loker",
                    "contents" => $request->input('kode_loker')
                ),
                array(
                    "name" => "tgl_masuk",
                    "contents" => $this->convertDate($request->input('tgl_masuk'))
                ),
                array(
                    "name" => "no_npwp",
                    "contents" => $request->input('npwp')
                ),
                array(
                    "name" => "no_bpjs",
                    "contents" => $request->input('no_bpjs')
                ),
                array(
                    "name" => "no_bpjs_naker",
                    "contents" => $request->input('no_bpjs_kerja')
                ),

                array(
                    "name" => "kode_bank",
                    "contents" => $request->input('kode_bank')
                ),
                array(
                    "name" => "cabang",
                    "contents" => $request->input('cabang')
                ),
                array(
                    "name" => "no_rek",
                    "contents" => $request->input('no_rek')
                ),
                array(
                    "name" => "nama_rek",
                    "contents" => $request->input('nama_rek')
                ),
                array(
                    "name" => "nama_client",
                    "contents" => $request->input('client')
                ),
                array(
                    "name" => "skill",
                    "contents" => $request->input('skill')
                ),
                array(
                    "name" => "no_kontrak",
                    "contents" => $request->input('no_kontrak')
                ),
                array(
                    "name" => "tgl_kontrak_awal",
                    "contents" => $this->convertDate($request->input('tgl_kontrak'))
                ),
                array(
                    "name" => "tgl_kontrak_akhir",
                    "contents" => $this->convertDate($request->input('tgl_kontrak_akhir'))
                ),
                array(
                    "name" => "kode_area",
                    "contents" => $request->input('kode_area')
                ),

                array(
                    "name" => "kode_fm",
                    "contents" => $request->input('kode_fm')
                ),
                array(
                    "name" => "kode_bm",
                    "contents" => $request->input('kode_bm')
                ),
                array(
                    "name" => "kode_loker",
                    "contents" => $request->input('kode_loker')
                ),
                array(
                    "name" => "kode_profesi",
                    "contents" => $request->input('kode_profesi')
                ),
                array(
                    "name" => "atasan_langsung",
                    "contents" => $request->input('atasan_langsung')
                ),
                array(
                    "name" => "atasan_tidak_langsung",
                    "contents" => $request->input('atasan_t_langsung')
                )
            );

            // dd($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/v3/sdm-kontrak', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function store_gaji(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'kode_akun' => 'required'
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('nik')
                ),
            );

            $x = 1;
            $array_nu_param = array();
            $array_kode_param = array();
            $array_nama_param = array();
            $array_nilai_param = array();
            if (count($request->kode_akun) > 0) {
                for ($y = 0; $y < count($request->kode_akun); $y++) {
                    $data_nu_param = array(
                        'name' => 'nu_param[]',
                        'contents' => $x
                    );
                    $data_kode_param = array(
                        'name' => 'kode_param[]',
                        'contents' => $request->kode_akun[$y]
                    );
                    $data_nama_param = array(
                        'name' => 'nama_param[]',
                        'contents' => $request->nama_akun[$y]
                    );
                    $data_nilai_param = array(
                        'name' => 'nilai[]',
                        'contents' => $this->joinNum($request->nilai[$y])
                    );
                    $x++;

                    array_push($array_nu_param, $data_nu_param);
                    array_push($array_kode_param, $data_kode_param);
                    array_push($array_nama_param, $data_nama_param);
                    array_push($array_nilai_param, $data_nilai_param);
                }

                $fields = array_merge(
                    $fields,
                    $array_nu_param,
                    $array_kode_param,
                    $array_nama_param,
                    $array_nilai_param
                );
            }

            // dd($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/v3/sdm-gaji-param', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'GET',
                config('api.url') . 'esaku-trans/v3/sdm-karyawan',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik' => $request->query('kode')
                    ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function show_kontrak(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'GET',
                config('api.url') . 'esaku-trans/v3/sdm-kontrak',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik' => $request->query('kode')
                    ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }


    public function show_gaji(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'GET',
                config('api.url') . 'esaku-trans/v3/sdm-gaji-param',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik' => $request->query('kode')
                    ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }



    public function update(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'no_ktp' => 'required',
            'jk' => 'required',
            'kode_agama' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos' => 'required',
            't_badan' => 'required',
            'b_badan' => 'required',
            'gol_darah' => 'required',
            'no_kk' => 'required',
            'status_nikah' => 'required',
            'tgl_nikah' => 'required',
            'kode_bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('nik')
                ),
                array(
                    "name" => "nama",
                    "contents" => $request->input('nama')
                ),
                array(
                    "name" => "nomor_ktp",
                    "contents" => $request->input('no_ktp')
                ),
                array(
                    "name" => "jenis_kelamin",
                    "contents" => $request->input('jk')
                ),
                array(
                    "name" => "kode_agama",
                    "contents" => $request->input('kode_agama')
                ),
                array(
                    "name" => "no_telp",
                    "contents" => $request->input('no_telp')
                ),
                array(
                    "name" => "no_hp",
                    "contents" => $request->input('no_hp')
                ),
                array(
                    "name" => "tempat_lahir",
                    "contents" => $request->input('tempat')
                ),
                array(
                    "name" => "tgl_lahir",
                    "contents" => $this->convertDate($request->input('tgl_lahir'))
                ),
                array(
                    "name" => "alamat",
                    "contents" => $request->input('alamat')
                ),
                array(
                    "name" => "provinsi",
                    "contents" => $request->input('provinsi')
                ),
                array(
                    "name" => "kota",
                    "contents" => $request->input('kota')
                ), array(
                    "name" => "kecamatan",
                    "contents" => $request->input('kecamatan')
                ),
                array(
                    "name" => "kelurahan",
                    "contents" => $request->input('kelurahan')
                ),
                array(
                    "name" => "kode_pos",
                    "contents" => $request->input('kode_pos')
                ),
                array(
                    "name" => "tinggi_badan",
                    "contents" => $this->joinNum($request->input('t_badan'))
                ),
                array(
                    "name" => "berat_badan",
                    "contents" => $this->joinNum($request->input('b_badan'))
                ),
                array(
                    "name" => "golongan_darah",
                    "contents" => $request->input('gol_darah')
                ),
                array(
                    "name" => "nomor_kk",
                    "contents" => $request->input('no_kk')
                ),
                array(
                    "name" => "status_nikah",
                    "contents" => $request->input('status_nikah')
                ),
                array(
                    "name" => "tgl_nikah",
                    "contents" => $this->convertDate($request->input('tgl_nikah'))
                ),
                array(
                    "name" => "kode_bank",
                    "contents" => $request->input('kode_bank')
                ),
                array(
                    "name" => "cabang",
                    "contents" => $request->input('cabang')
                ),
                array(
                    "name" => "no_rek",
                    "contents" => $request->input('no_rek')
                ),
                array(
                    "name" => "nama_rek",
                    "contents" => $request->input('nama_rek')
                ),
            );
            $array_nomor = array();
            $array_jenis = array();
            $array_status = array();
            $array_fileName = array();
            $array_filePrevName = array();
            $array_isUpload = array();

            if (count($request->input('nu')) > 0) {
                for ($i = 0; $i < count($request->input('nu')); $i++) {
                    $data_nomor = array(
                        "name" => "nu[]",
                        "contents" => $request->nu[$i]
                    );
                    $data_jenis = array(
                        "name" => "jenis[]",
                        "contents" => $request->jenis[$i]
                    );
                    $data_status = array(
                        "name" => "sts_dokumen[]",
                        "contents" => $request->sts_dokumen[$i]
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
                    array_push($array_jenis, $data_jenis);
                    array_push($array_status, $data_status);
                    array_push($array_fileName, $data_fileName);
                    array_push($array_filePrevName, $data_filePrevName);
                    array_push($array_isUpload, $data_isUpload);
                }

                $fields = array_merge(
                    $fields,
                    $array_nomor,
                    $array_jenis,
                    $array_status,
                    $array_fileName,
                    $array_filePrevName,
                    $array_isUpload
                );
            }

            if (!empty($request->file('file'))) {
                if (count($request->file('file')) > 0) {
                    $array_file = array();
                    for ($i = 0; $i < count($request->file('file')); $i++) {
                        if (isset($request->file('file')[$i])) {
                            $image_path = $request->file('file')[$i]->getPathname();
                            $image_mime = $request->file('file')[$i]->getmimeType();
                            $image_org  = $request->file('file')[$i]->getClientOriginalName();

                            $data_file = array(
                                'name'     => 'file[]',
                                'filename' => $image_org,
                                'Mime-Type' => $image_mime,
                                'contents' => fopen($image_path, 'r')
                            );

                            array_push($array_file, $data_file);
                        }
                    }

                    $fields = array_merge($fields, $array_file);
                }
            }


            // dd($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/v3/sdm-karyawan-update', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function update_kontrak(Request $request)
    {
        $this->validate($request, [
            'kode_status' => 'required',
            'kode_sdm' => 'required',
            'kode_loker' => 'required',
            'tgl_masuk' => 'required',
            'npwp' => 'required',
            'no_bpjs' => 'required',
            'no_bpjs_kerja' => 'required',
            'kode_profesi' => 'required',
            'client' => 'required',
            'skill' => 'required',
            'no_kontrak' => 'required',
            'tgl_kontrak' => 'required',
            'tgl_kontrak_akhir' => 'required',
            'atasan_langsung' => 'required',
            'atasan_t_langsung' => 'required',
        ]);

        try {
            $fields = array(
                array(
                    "name" => "nik",
                    "contents" => $request->input('nik')
                ),
                array(
                    "name" => "kode_sdm",
                    "contents" => $request->input('kode_sdm')
                ),
                array(
                    "name" => "kode_status",
                    "contents" => $request->input('kode_status')
                ),
                array(
                    "name" => "kode_loker",
                    "contents" => $request->input('kode_loker')
                ),
                array(
                    "name" => "tgl_masuk",
                    "contents" => $this->convertDate($request->input('tgl_masuk'))
                ),
                array(
                    "name" => "no_npwp",
                    "contents" => $request->input('npwp')
                ),
                array(
                    "name" => "no_bpjs",
                    "contents" => $request->input('no_bpjs')
                ),
                array(
                    "name" => "no_bpjs_naker",
                    "contents" => $request->input('no_bpjs_kerja')
                ),

                array(
                    "name" => "kode_bank",
                    "contents" => $request->input('kode_bank')
                ),
                array(
                    "name" => "cabang",
                    "contents" => $request->input('cabang')
                ),
                array(
                    "name" => "no_rek",
                    "contents" => $request->input('no_rek')
                ),
                array(
                    "name" => "nama_rek",
                    "contents" => $request->input('nama_rek')
                ),
                array(
                    "name" => "nama_client",
                    "contents" => $request->input('client')
                ),
                array(
                    "name" => "skill",
                    "contents" => $request->input('skill')
                ),
                array(
                    "name" => "no_kontrak",
                    "contents" => $request->input('no_kontrak')
                ),
                array(
                    "name" => "tgl_kontrak_awal",
                    "contents" => $this->convertDate($request->input('tgl_kontrak'))
                ),
                array(
                    "name" => "tgl_kontrak_akhir",
                    "contents" => $this->convertDate($request->input('tgl_kontrak_akhir'))
                ),
                array(
                    "name" => "kode_area",
                    "contents" => $request->input('kode_area')
                ),

                array(
                    "name" => "kode_fm",
                    "contents" => $request->input('kode_fm')
                ),
                array(
                    "name" => "kode_bm",
                    "contents" => $request->input('kode_bm')
                ),
                array(
                    "name" => "kode_loker",
                    "contents" => $request->input('kode_loker')
                ),
                array(
                    "name" => "kode_profesi",
                    "contents" => $request->input('kode_profesi')
                ),
                array(
                    "name" => "atasan_langsung",
                    "contents" => $request->input('atasan_langsung')
                ),
                array(
                    "name" => "atasan_tidak_langsung",
                    "contents" => $request->input('atasan_t_langsung')
                )
            );

            // dd($fields);
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-trans/v3/sdm-kontrak-update', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'DELETE',
                config('api.url') . 'esaku-trans/v3/sdm-karyawan',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik' => $request->input('kode')
                    ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }


    public function get_status()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'esaku-trans/v3/sdm-status', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false], 200);
        }
    }
}

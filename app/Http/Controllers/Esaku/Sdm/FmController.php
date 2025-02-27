<?php

namespace App\Http\Controllers\Esaku\Sdm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class FmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct()
    {
        if (!Session::get('login')) {
            return redirect('sdm2-auth/login');
        }
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
            $response = $client->request('GET',  config('api.url') . 'esaku-master/sdm-fm', [
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
            'kode' => 'required',
            'nama' => 'required',
            'kode_area' => 'required'
        ]);

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'esaku-master/sdm-fm', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_fm' => $request->input('kode'),
                    'nama' => $request->input('nama'),
                    'kode_area' => $request->input('kode_area'),
                ]
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

    public function getFmByArea(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'GET',
                config('api.url') . 'esaku-master/sdm-fm-filter-area?kode_area=' . $request->query('kode_area'),
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    // 'query' => [
                    //     'kode_area' => $request->query('kode_area')
                    // ]
                ]
            );

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function show(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request(
                'GET',
                config('api.url') . 'esaku-master/show-fm',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_fm' => $request->query('kode')
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
            'kode' => 'required',
            'nama' => 'required',
            'kode_area' => 'required'
        ]);

        try {
            $client = new Client();
            $response = $client->request('PUT',  config('api.url') . 'esaku-master/sdm-fm', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_fm' => $request->input('kode'),
                    'nama' => $request->input('nama'),
                    'kode_area' => $request->input('kode_area'),
                ]
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
                config('api.url') . 'esaku-master/sdm-fm',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_fm' => $request->input('kode')
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
}

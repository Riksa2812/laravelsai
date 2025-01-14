<?php

namespace App\Http\Controllers\Sai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class AuthController extends Controller
{

    public function index()
    {
        // return view('login');
        if(!Session::get('login')){
            return redirect('sai-auth/login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('sai.main');
        }
        
    }

    public function cek_session()
    {
        if(!Session::get('login')){
            return response()->json(['status'=>false], 200);
        }
        else{
            return response()->json(['status'=>true], 200);
        }
        
    }

    public function cek_auth(Request $request){

        try {
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'sai-auth/login',[
                'form_params' => [
                    'nik' => $request->input('nik'),
                    'password' => $request->input('password')
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
                if($data["message"] == "success"){
                    Session::put('token',$data["token"]);
                    Session::put('login',TRUE);
                    $response2 = $client->request('GET',  config('api.url').'sai-auth/profile',[
                        'headers' => [
                            'Authorization' => 'Bearer '.$data["token"],
                            'Accept'     => 'application/json',
                        ]
                    ]);
            
                    if ($response2->getStatusCode() == 200) { // 200 OK
                        $response_data2 = $response2->getBody()->getContents();
                        
                        $data2 = json_decode($response_data2,true);
                        $res = $data2['user'];
                        if(count($res) > 0){
                            Session::put('isLoggedIn',true);
                            Session::put('kodeMenu',$res[0]["kode_klp_menu"]);
                            Session::put('userLog',$res[0]["nik"]);
                            Session::put('namaUser',$res[0]["nama"]);
                            Session::put('statusAdmin',$res[0]["status_admin"]);
                            Session::put('klpAkses',$res[0]["klp_akses"]);
                            Session::put('lokasi',$res[0]["kode_lokasi"]);
                            Session::put('namaLokasi',$res[0]["nmlok"]);
                            Session::put('kodePP',$res[0]["kode_pp"]);
                            Session::put('namaPP',$res[0]["nama_pp"]);
                            // Session::put('kode_lokkonsol',$res[0]["kode_lokkonsol"]);
                            $tmp = explode("_",$res[0]["path_view"]);
                            if(isset($tmp[2])){
                                $dash = $tmp[2];
                            }else{
                                $dash = "-";
                            }
                            
                            Session::put('dash',$dash);
                            Session::put('foto',$res[0]["foto"]);
                            Session::put('logo',$res[0]["logo"]);
                            Session::put('periode',$data2["periode"][0]["periode"]);
                            Session::put('kode_fs',(isset($data2["kode_fs"][0]["kode_fs"]) ? $data2["kode_fs"][0]["kode_fs"] : ""));
                        }
                    }
                    
                    return redirect('sai-auth/');
                }else{
                    return redirect('sai-auth/login')->with('alert','Password atau NIK, Salah !');
                }
            
            }else if($response->getStatusCode() == 401){
                return redirect('sai-auth/login')->with('alert','Password atau NIK, Salah !');
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return redirect('sai-auth/login')->with('alert',$res["message"]);
        }
        
    }

    public function login(){
        return view('sai.login');
    }

    public function logout(){
        Session::flush();
        return redirect('sai-auth/login')->with('alert','Kamu sudah logout');
    }

    public function getMenu(){
        $client = new Client();
        $kodemenu = Session::get('kodeMenu');
        $response = $client->request('GET',  config('api.url').'sai-auth/menu/'.$kodemenu,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
                ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $daftar_menu = $data['success']['data'];
            if(count($daftar_menu) > 0){
                
                $pre_prt = 0;
                $parent_array = array();
                for($i=0; $i<count($daftar_menu); $i++){
                    $forms = str_replace("_","/", $daftar_menu[$i]['form']);
                    $this_lv = $daftar_menu[$i]['level_menu']; 
                    $forms = explode("/",$forms);
                    if(ISSET($forms[2])){

                        $this_link = $forms[2];
                    }else{
                        $this_link = "";
                    }
            
                    if(!ISSET($daftar_menu[$i-1]['level_menu'])){
                        $prev_lv = 0; // t1 pv=0
                    }else{
                        $prev_lv = $daftar_menu[$i-1]['level_menu'];
                    }
            
                    if(!ISSET($daftar_menu[$i+1]['level_menu'])){
                        $next_lv = $daftar_menu[$i]['level_menu'];
                    }else{
                        $next_lv = $daftar_menu[$i+1]['level_menu']; //t1 nv=1
                    }
                    
                    if($daftar_menu[$i]['level_menu']=="0"){
                        if($daftar_menu[$i]['icon'] != "" && $daftar_menu[$i]['icon'] != null){
                            $icon="<i class='menu-icon ".$daftar_menu[$i]['icon']."'></i>";
                        }else{
                            $icon="<i class='menu-icon fa fa-home'></i> ";
                        }
                        
                    }else{
                        if($daftar_menu[$i]['icon'] != "" && $daftar_menu[$i]['icon'] != null){
                            $icon="<i class='menu-icon ".$daftar_menu[$i]['icon']."'></i>";
                        }else{
                            $icon="";
                        }
                    }
                    
                    // Sintaks Menu Level 0 dan Tanpa Anak
                    if($this_lv == 0 AND $next_lv == 0){
                        $hasil.="
                        <li>
                        <a href='#' class='a_link' data-href='$this_link'>
                        $icon
                        <span class='hide-menu'>".$daftar_menu[$i]['nama']."</span></a>
                        </li>
                        ";
                        
                    }
                    // Sintaks Menu Level 0 dan beranak
                    else if($this_lv == 0 AND $next_lv > 0){
                        $hasil.="
                        <li class='treeview'>
                        <a href='#' data-href='$this_link' class='has-arrow waves-effect waves-dark a_link' aria-expanded='false'>
                        <i class='icon-notebook'></i> <span class='hide-menu'>".$daftar_menu[$i]['nama']."</span>
                        </a>
                        <ul class='collapse' id='sai_adminlte_menu_".$daftar_menu[$i]['kode_menu']."' aria-expanded='false'>
                        ";
                    }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv < $next_lv){
                        $hasil.= " 
                        <li class='treeview'>
                        <a href='#javascript:void($i)' data-href='$this_link' class='waves-effect waves-dark a_link'>
                        $icon
                        <span>".$daftar_menu[$i]['nama']."a</span>
                        <span class='pull-right-container'>
                        <i class='fa fa-angle-right pull-right'></i>
                        </span>
                        </a>
                        <ul class='collapse list-unstyled' id='javascript:void($i)'>";
                    }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv == $next_lv){
                        $hasil.= " 
                        <li class=''>
                        <a href='#' data-href='$this_link' class='a_link'>
                        $icon
                        <span>".$daftar_menu[$i]['nama'] ."</span>
                        </a>
                        </li>";
                    }else if($this_lv > $prev_lv AND $this_lv > $next_lv){
                        $hasil.= " 
                        <li >
                        <a href='#' data-href='$this_link' class='a_link'>
                        $icon
                        <span>".$daftar_menu[$i]['nama']."</span>
                        </a>
                        </li>";
                    }else if(($this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv > $next_lv){
                        $hasil.= " 
                        <li >
                        <a href='#' data-href='$this_link' class='a_link'>
                        $icon
                        <span>".$daftar_menu[$i]['nama']."</span>
                        </a>
                        </li>
                        </ul>";
                    }
                }
            }
                
            $success['status'] = true;
            $success['hasil'] = $hasil;
    
        }else{
            $success['status'] = true;
            $success['hasil'] = "" ;
        }
                
        return response()->json([$success], 200);     
    }
    
}

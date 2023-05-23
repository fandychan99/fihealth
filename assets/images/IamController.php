<?php

namespace App\Http\Controllers;

use App\Http\Controllers\constant\StaticConstantController;
use App\Models\User;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class IamController extends Controller
{
    public function getPLNRedirect()
    {

        $client_id = env('PLN_ID');
        $redirect_uri = env('PLN_REDIRECT');
        $url = 'https://iam.pln.co.id/svc-core/oauth2/auth?response_type=code&client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&scope=openid email profile empinfo phone address';

        // dd($url);
        // Alert::success(' Success ', 'ini muncul karena gagal');
        return redirect($url);

    }

    public function getPLNHandle(Request $request)
    {
       
        if ($request->code == null) {
            // dd($request->code);
            Alert::success(' Success ', 'ini muncul karena gagal');
            return redirect()->to('login');
        }

        
        // get access token
        $client_id = env('PLN_ID');
        $client_secret = env('PLN_SECRET');
        $redirect_uri = env('PLN_REDIRECT');
        
        // $url = 'http://identity.pln.co.id/oauth/access_token';
        $url = 'https://iam.pln.co.id/svc-core/oauth2/token';

        $http = new Client([
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret)],
            'verify' => false
        ]);
        // dd($http);
        $response = $http->post($url, [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri,
                'code' => $request->code,
            ],
        ]);
        
	    // dd($response->getBody());

        // return json_decode((string) $response->getBody(), true);
        // retrieve access token
        $data = (array)json_decode((string)$response->getBody(), true);
        // dd($data);
        $token = $data['access_token'];
        $id_token = $data['id_token'];
        // dd($token);

        // get user info
        //$url_get_user = 'http://identity.pln.co.id/api?access_token='.$token;
        $http = new Client(['headers' =>
            ['Authorization' => 'Bearer ' . $token],
            'verify' => false]);
        $url_get_user = 'https://iam.pln.co.id/svc-core/oauth2/me';
        $response = $http->get($url_get_user);
        //$data = (array) json_decode((string) $response->getBody(), true);
        // dd($response);

        $data = json_decode((string)$response->getBody(), true);
        // dd($data);

        $user_sso = collect($data);
        // dd($user);
        // dd($user_sso);

        // ==================================================================================================

        $user = new User();

        // $domain = 'pusat';
        $username_ad = $user_sso->get('sub');

        // Cek Tabel User, jika tidak ada -> register, jika ada -> update data.
        if (User::where('username', '=', strtolower($username_ad))->count() > 0) {
            // User lama
            $user = User::where('username', '=', strtolower($username_ad))->first();
            $isNew = false;
        } else {
            // User baru
            $user = new User();
            $isNew = true;
        }

        $user->username = strtolower($username_ad);
        try{
            $company = $user_sso->get('https://iam.pln.co.id/svc-core/account/hrinfo')['personnelArea']['name'];
            $department = $user_sso->get('https://iam.pln.co.id/svc-core/account/hrinfo')['organisasi']['name'];
            $title = $user_sso->get('https://iam.pln.co.id/svc-core/account/hrinfo')['posisi']['name'];
            $nip = $user_sso->get('https://iam.pln.co.id/svc-core/account/hrinfo')['nip'];
        }catch (\Exception $e){
            $company = 'LUAR PLN';
            $department = 'Bidang';
            $title = 'Jabatan';
            $nip = 'NIP';
        }

        $user->name =$user_sso->get('https://iam.pln.co.id/svc-core/account/hrinfo')['registeredName'];
        $user->email = $user_sso->get('email');
        $user->password = Hash::make('123');
        $user->unit = $company;
        $user->posisi = $department;
        $user->jabatan = $title;
        $user->nipeg = $nip;
        $user->tipe_user = 'INTERNAL';
        $user->verified_at = new DateTime();
        $user->save();

        //  ===================================================================================================
        session(['login_from' => 'SSO','id_token'=>$id_token]);
        // $value = $request->session()->get('login_from');
        $socialUser = $user;
        auth()->login($socialUser, true);
        if($isNew == false){
            StaticConstantController::log_access('iam_login', 'auth_iam');
        }
        // dd('ini muncul karena dianggap berhasil');
        return redirect('/home');

    }

    public function logoutSSO()
    {
        StaticConstantController::log_access('iam_logout', 'auth_iam');
        $login_from = session('login_from');
        $urlLogout = url('logout');
        $ur_logout_sso = 'https://iam.pln.co.id/svc-core/oauth2/session/end?post_logout_redirect_uri=' . $urlLogout . '&id_token_hint=' . session('id_token');
        // dd($ur_logout_sso);

        if ($login_from == 'SSO') {
            return redirect($ur_logout_sso);
        }
    }
}

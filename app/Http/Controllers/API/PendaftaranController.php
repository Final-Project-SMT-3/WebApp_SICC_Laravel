<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerif;
use App\Models\Kelompok;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use stdClass;

class PendaftaranController extends Controller
{
    public function register(Request $request){
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_OK;

        DB::beginTransaction();
        try{
            $userId = DB::table('users')
                ->insertGetId([
                    'name' => $request->get('nama_ketua'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),    
                    'role' => 'Mahasiswa',
                    'created_at' => now()
                ]);

            $kelompokId = DB::table('kelompoks')
                ->insertGetId([
                    'nama_ketua' => $request->get('nama_ketua'),
                    'created_at' => now()
                ]);

            DB::commit();
            $status = 1;
            $message = 'Success';
            $data =[
                "user_data" => $userId,
                "kelompok_data" => $kelompokId
            ];
        } catch(Exception $e){
            DB::rollBack();
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch(QueryException $e){
            DB::rollBack();
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            $response = [
                'status' => $status,
                'status_code' => $responseCode,
                'message' => $message,
                'response' => $data
            ];

            return response()->json($response, $responseCode);
        }
    }

    public function login(Request $request){
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_UNAUTHORIZED;

        try {
            $responseCode = Response::HTTP_OK;
            $user = User::where('email', $request->get('email'))->first();

            if($user != null){
                if(Hash::check($request->get('password'), $user->password)){
                    $dataReturn = new stdClass;
                    $dataKelompok = Kelompok::where('id', $user->id)->with('anggota')->first();
                    $dataReturn->user = $user;
                    $dataReturn->kelompok = $dataKelompok ?? null;

                    $data = $dataReturn;
                    $message = 'Success';
                    $status = 1;
                } else {
                    $message = 'Password yang anda masukkan salah.';
                }
            } else {
                $message = 'Email tidak dapat ditemukan';
            }
        } catch(Exception $e) {
            $message = 'Terjadi kesalahan.' .  $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch(QueryException $e) {
            $message = 'Terjadi kesalahan.' .  $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            $response = [
                'status' => $status,
                'status_code' => $responseCode,
                'message' => $message,
                'response'  => $data
            ];

            return response()->json($response, $responseCode);
        }
    }

    public function emailVerification(Request $request) {
        $status = 0;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        DB::beginTransaction();
        try {
            $status = 1;
            $responseCode = Response::HTTP_OK;
            
            $user = User::where('email', $request->get('email'))->first();

            if($user != null) {
                $message = 'Success';
                
                $email = $request->get('email');
                $otp = random_int(1000, 9999);
                DB::table('otp')
                    ->insert([
                        'email' => $email,
                        'otp' => $otp
                    ]);
                DB::commit();
    
                $data = [
                    'otp' => $otp
                ];
    
                Mail::to($email)->send(new EmailVerif($data));
            } else {
                $message = 'Email tidak terdaftar.';
            }
        } catch (Exception $e) {
            DB::rollBack();
            $status = 0;
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (QueryException $e) {
            DB::rollBack();
            $status = 0;
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            $response = [
                'status' => $status,
                'status_code' => $responseCode,
                'message' => $message
            ];

            return response()->json($response, $responseCode);
        }
    }

    public function checkVerification(Request $request) {
        $status = 0;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        try {
            $status = 1;
            $responseCode = Response::HTTP_OK;
            $email = $request->get('email');
            $otp = $request->get('otp');

            $check = DB::table('otp')
                ->where('otp', $otp)
                ->where('email', $email)
                ->where('status', 1)
                ->count();
                
            if ($check > 0) {
                $message = 'Success';

                DB::table('otp')
                    ->where('otp', $otp)
                    ->where('email', $email)
                    ->where('status', 1)
                    ->update([
                        'status' => 0
                    ]);
            }
            else 
                $message = 'Email atau OTP yang dimasukkan salah.';
        } catch (Exception $e) {
            $status = 0;
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (QueryException $e) {
            $status = 0;
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            $response = [
                'status' => $status,
                'status_code' => $responseCode,
                'message' => $message
            ];

            return response()->json($response, $responseCode);
        }
    }

    public function forgetPassword(Request $request) {
        $status = 0;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;

        DB::beginTransaction();
        try {
            $status = 1;
            $responseCode = Response::HTTP_OK;
            $email = $request->get('email');
            $otp = $request->get('otp');
            $password = $request->get('password');

            $check = DB::table('otp')
                ->where('otp', $otp)
                ->where('email', $email)
                ->where('status', 0)
                ->count();
                
            if ($check > 0) {
                $message = 'Success';

                DB::table('users')
                    ->where('email', $email)
                    ->update([
                        'password' => Hash::make($password)
                    ]);
                DB::commit();
            }
            else 
                $message = 'Email atau OTP yang dimasukkan salah.';
        } catch (Exception $e) {
            DB::rollBack();
            $status = 0;
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (QueryException $e) {
            DB::rollBack();
            $status = 0;
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            $response = [
                'status' => $status,
                'status_code' => $responseCode,
                'message' => $message
            ];

            return response()->json($response, $responseCode);
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    public function getDataKelompok(Request $request) {
        $status = 0;
        $message = '';
        $data = null;
        
        try {
            $responseCode = Response::HTTP_OK;
            $user = User::where('id', $request->get('id'))->first();

            if ($user != null) {
                $data = Kelompok::where('id', $user->id)->with('anggota')->first();
            } else {
                $message = 'Data kelompok tidak dapat ditemukan';
            }

            $status = 1;
            $message = 'Success';
        } catch (Exception $e){
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (QueryException $e){
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

    public function insertKelompok(Request $request){
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_OK;

        DB::beginTransaction();
        try{
            $data = DB::table('kelompoks')
                ->insertGetId([
                    'nama_kelompok' => $request->get('nama_kelompok'),
                    'nama_ketua' => $request->get('nama_ketua'),
                    'nim_ketua' => $request->get('nim_ketua'),
                    'no_hp_ketua' => $request->get('no_hp_ketua'),
                    'prodi_ketua' => $request->get('prodi_ketua'),
                    'created_at' => now()
                ]);
            DB::commit();
            $status = 1;
            $message = 'Success';
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

    public function getEditKelompok(Request $request){
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_OK;
        
        try {
            $data = Kelompok::find($request->get('id'));

            $status = 1;
            $message = 'Success';
        } catch (Exception $e){
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (QueryException $e){
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

    public function edit(Request $request){
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_OK;

        DB::beginTransaction();
        try{
            $data = DB::table('kelompoks')
                ->where('id', $request->get('id'))
                ->update([
                    'nama_kelompok' => $request->get('nama_kelompok'),
                    'nama_ketua' => $request->get('nama_ketua'),
                    'nim_ketua' => $request->get('nim_ketua'),
                    'anggota' => $request->get('anggota'),
                ]);
            DB::commit();
            $status = 1;
            $message = 'Success';
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
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function register(Request $request){
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_OK;

        DB::beginTransaction();
        try{
            $data = DB::table('users')
                ->insertGetId([
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                    'role' => 'Mahasiswa'
                ]);
            DB::commit();
            $status = 1;
            $message = 'Berhasil membuat akun baru';
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
                'message' => $message,
                'data' => $data
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
            $data = DB::table('kelompok')
                ->insertGetId([
                    'nama_kelompok' => $request->get('nama_kelompok'),
                    'nama_ketua' => $request->get('nama_ketua'),
                    'nim_ketua' => $request->get('nim_ketua'),
                    'anggota' => $request->get('anggota'),
                ]);
            DB::commit();
            $status = 1;
            $message = 'Berhasil menambahkan data kelompok.';
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
                'message' => $message,
                'data' => $data
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
            $data = DB::table('kelompok')
                ->where('id', $request->get('id'))
                ->first();

            $status = 1;
            $message = 'Berhasil menampilkan data.';
        } catch (Exception $e){
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } catch (QueryException $e){
            $message = 'Terjadi kesalahan. ' . $e->getMessage();
            $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } finally {
            $response = [
                'status' => $status,
                'message' => $message,
                'data' => $data
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
            $data = DB::table('kelompok')
                ->where('id', $request->get('id'))
                ->update([
                    'nama_kelompok' => $request->get('nama_kelompok'),
                    'nama_ketua' => $request->get('nama_ketua'),
                    'nim_ketua' => $request->get('nim_ketua'),
                    'anggota' => $request->get('anggota'),
                ]);
            DB::commit();
            $status = 1;
            $message = 'Berhasil mengubah data kelompok.';
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
                'message' => $message,
                'data' => $data
            ];

            return response()->json($response, $responseCode);
        }        
    }
}

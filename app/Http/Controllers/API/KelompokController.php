<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class KelompokController extends Controller
{
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

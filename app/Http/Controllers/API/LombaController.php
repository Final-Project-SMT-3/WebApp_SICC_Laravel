<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LombaController extends Controller
{
    public function getDataLomba() {
        $status = 0;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;
        $data = null;
        
        try {
            $status = 1;
            $message = 'Success';
            $responseCode = Response::HTTP_OK;
            $lomba = Lomba::get();

            if($lomba) {
                foreach($lomba as $key => $value) {
                    $value->detail_lomba = DB::table('master_detail_lomba')
                        ->where('id_mst_lomba', $value->id)
                        ->get();
    
                    $value->pelaksanaan_lomba = DB::table('pelaksanaan_lomba')
                        ->where('id_mst_lomba', $value->id)
                        ->get();
                }
                $data = $lomba;
            } else {
                $message = 'Data Lomba masih belum tersedia.';
            }
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
                'message' => $message,
                'response' => $data
            ];

            return response()->json($response, $responseCode);
        }
    }

    public function getDataLombaById(Request $request) {
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_BAD_REQUEST;
        
        try {
            $status = 1;
            $message = 'Success';
            $responseCode = Response::HTTP_OK;
            $lomba = Lomba::find($request->get('id'));

            if($lomba) {
                $lomba->detail_lomba = DB::table('master_detail_lomba')
                    ->where('id_mst_lomba', $lomba->id)
                    ->get();

                $lomba->pelaksanaan_lomba = DB::table('pelaksanaan_lomba')
                    ->where('id_mst_lomba', $lomba->id)
                    ->get();
                $data = $lomba;
            } else {
                $message = 'Data Lomba masih belum tersedia.';
            }
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
                'message' => $message,
                'response' => $data
            ];

            return response()->json($response, $responseCode);
        }
    }
}

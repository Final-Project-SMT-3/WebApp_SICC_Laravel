<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master_Dospem;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DosenController extends Controller
{
    public function getDosen() {
        $status = 0;
        $message = '';
        $responseCode = Response::HTTP_BAD_REQUEST;
        $data = null;
        
        try {
            $status = 1;
            $message = 'Success';
            $responseCode = Response::HTTP_OK;
            $dospem = Master_Dospem::get();

            if ($dospem) {
                $data = $dospem;
            } else {
                $message = 'Data Dosen masih belum tersedia.';
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

    public function getDosenById(Request $request) {
        $status = 0;
        $message = '';
        $data = null;
        $responseCode = Response::HTTP_BAD_REQUEST;

        try {
            $status = 1;
            $message = 'Success';
            $responseCode = Response::HTTP_OK;
            $dospem = Master_Dospem::find($request->get('id'));

            if ($dospem) {
                $data = $dospem;
            } else {
                $message = 'Data Dosen masih belum tersedia.';
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

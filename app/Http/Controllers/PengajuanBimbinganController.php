<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PengajuanBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::table('pemilihan_dospem')
            ->select('pemilihan_dospem.id', 'nama_kelompok', 'nama_anggota', 'nim_anggota')
            ->join('users', 'users.id', '=', 'pemilihan_dospem.id_dosen')
            ->join('kelompok', 'pemilihan_dospem.id_mhs', '=', 'kelompok.id_mhs')
            ->where('pemilihan_dospem.status', '=', 'Waiting Approval')
            ->where('users.id', '=', $id)
            ->get();
        return view('admin_page.pages.pengajuan_bimbingan.pengajuanBimbingan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateAccept($id)
    {
        DB::beginTransaction();
        try {
            DB::table('pemilihan_dospem')
                ->where('id', $id)
                ->update([
                    'status' => 'Accept',
                    'updated_at' => now()
                ]);

            DB::commit();

            return Redirect::back()->with('success', 'Kelompok berhasil diterima.');
        } catch (\Exception $e) {
            DB::rollBack();

            return Redirect::back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateDecline($id)
    {
        DB::beginTransaction();
        try {
            DB::table('pemilihan_dospem')
                ->where('id', $id)
                ->update([
                    'status' => 'Decline',
                    'updated_at' => now()
                ]);

            DB::commit();
            return Redirect::back()->with('success', 'Kelompok berhasil ditolak.');
        } catch (\Exception $e) {
            DB::rollBack();

            return Redirect::back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

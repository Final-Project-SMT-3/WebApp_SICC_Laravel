<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PengajuanJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::table('submit_judul')
            ->select('submit_judul.id', 'nama_kelompok', 'nama_anggota', 'nim_anggota', 'judul')
            ->join('pemilihan_dospem', 'pemilihan_dospem.id', '=', 'submit_judul.id_dospem')
            ->join('kelompok', 'kelompok.id_mhs', '=', 'pemilihan_dospem.id_mhs')
            ->join('users', 'users.id', '=', 'pemilihan_dospem.id_dosen')
            ->where('submit_judul.status', '=', 'Waiting Approval')
            ->where('users.id', '=', $id)
            ->get();

        return view('admin_page.pages.pengajuan_judul.pengajuanJudul', compact('data'));
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
        DB::beginTransaction();
        try {
            DB::table('submit_judul')
                ->where('id', $id)
                ->update([
                    'status' => $request->radio,
                    'review' => $request->tanggapanJudul,
                    'updated_at' => now()
                ]);

            DB::commit();
            return Redirect::back()->with('success', 'Judul telah ditinjau');
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

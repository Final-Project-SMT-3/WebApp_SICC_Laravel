<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PengajuanProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::table('submit_proposal')
            ->select('submit_proposal.id', 'nama_kelompok', 'judul')
            ->join('pemilihan_dospem', 'submit_proposal.id_dospem', '=', 'pemilihan_dospem.id')
            ->join('submit_judul', 'pemilihan_dospem.id', '=', 'submit_judul.id_dospem')
            ->join('users', 'pemilihan_dospem.id_mhs', '=', 'users.id')
            ->join('kelompok', 'users.id', '=', 'kelompok.id_mhs')
            ->where('submit_proposal.status', '=', 'Waiting Approval')
            ->get();

        return view('admin_page.pages.pengajuan_proposal.pengajuanProposal', compact('data'));
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
            DB::table('submit_proposal')
                ->where('id', $id)
                ->update([
                    'status' => $request->radio,
                    'review' => $request->tanggapanProposal,
                    'updated_at' => now()
                ]);

            DB::commit();
            return Redirect::back()->with('success', 'Proposal telah ditinjau');
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

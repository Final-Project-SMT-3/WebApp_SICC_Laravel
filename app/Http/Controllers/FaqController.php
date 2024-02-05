<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    private $param;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param['data'] = FAQ::orderBy('id', 'asc')->get();
        return view('admin_page.pages.faq.faq', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_page.pages.faq.faq_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $validate = $request->validate([
                'pertanyaan' => 'required',
                'jawaban' => 'required',
                'radioTipe' => 'required'
            ], [
                'required' => ':attribute harus diisi!'
            ], [
                'pertanyaan' => 'Pertanyaan',
                'jawaban' => 'Jawaban',
                'radioTipe' => 'Tipe',
            ]);

            FAQ::insert([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'tipe' => $request->radioTipe,
                'created_at' => now()
            ]);
            DB::commit();

            Alert::success('Berhasil', 'Berhasil menambahkan data FAQ');
            return redirect()->route('admin.faq.index');
        } catch (Exception $e) {
            DB::rollBack();
            Alert::success('Terjadi kesalahan', $e->getMessage());
            return redirect()->back();
        } catch (QueryException $e) {
            DB::rollBack();
            Alert::success('Terjadi kesalahan', $e->getMessage());
            return redirect()->back();
        }
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
        try {
            $data = FAQ::find($id);
            if ($data != null) {
                $param['data'] = $data;
                return view('admin_page.pages.faq.faq_edit', $param);
            }
            Alert::error('Terjadi kesalahan', 'Data tidak ditemukan');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            Alert::error('Terjadi kesalahan', $e->getMessage());
            return redirect()->back();
        }
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
        dd($request->radioTipe);
        DB::beginTransaction();
        try {
            $validate = $request->validate([
                'pertanyaan' => 'required',
                'jawaban' => 'required',
                'radioTipe' => 'required'
            ], [
                'required' => ':attribute harus diisi!'
            ], [
                'pertanyaan' => 'Pertanyaan',
                'jawaban' => 'Jawaban',
                'radioTipe' => 'Tipe',
            ]);

            FAQ::where('id', $id)->update([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'tipe' => $request->radioTipe,
                'created_at' => now()
            ]);
            DB::commit();

            Alert::success('Berhasil', 'Berhasil menambahkan data FAQ');
            return redirect()->route('admin.faq.index');
        } catch (Exception $e) {
            DB::rollBack();
            Alert::success('Terjadi kesalahan', $e->getMessage());
            return redirect()->back();
        } catch (QueryException $e) {
            DB::rollBack();
            Alert::success('Terjadi kesalahan', $e->getMessage());
            return redirect()->back();
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
        try {
            $data = FAQ::find($id);
            $data->delete();

            Alert::success('Berhasil', 'Berhasil menghapus data');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::success('Terjadi kesalahan', $e->getMessage());
            return redirect()->back();
        }
    }
}

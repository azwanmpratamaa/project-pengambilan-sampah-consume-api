<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

class SampahsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // mengambil data dari input search
        $search = $request->search;
        // memanggil libraries BaseApi method nya index dengan mengirim parameter1 berupa path data dari API nya, parameter2 data untuk mengisi search_nama API nya
        $data = (new BaseApi)->index('/api/sampahs', ['search_kepala_keluarga' => $search]);
        // ambil respon json nya
        $sampahs = $data->json();
        // dd($students);
        // kirim hasil pengambilan data ke blade index
        return view('index')->with(['sampahs' => $sampahs['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'kepala_keluarga' => $request->kepala_keluarga,
            'no_rumah' => $request->no_rumah,
            'rt_rw' => $request->rt_rw,
            'total_karung_sampah' => $request->total_karung_sampah,
            'tanggal_pengangkutan' => $request->tanggal_pengangkutan,
        ];

        $proses = (new BaseApi)->store('/api/sampahs/tambah-data', $data);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil menambahkan data baru ke students API');
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // proses ambil data api ke route REST API /students/{id}
        $data = (new BaseApi)->edit('/api/sampahs/'.$id);
        if ($data->failed()) {
            // kalau gagal proses $data diatas, ambil deskripsi error dari json prooerty data
            $errors = $data->json('data');
            // balikin ke halaman awal, sama errors nya
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            // kalau berhasil, ambil data dari jsonnya
            $sampahs = $data->json(['data']);
            // alihin ke blade edit dengan mengirim data $student diatas agar bisa digunakan pada blade
            return view('edit')->with(['sampahs' => $sampahs]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // data yang akan dikirim ($request ke REST API nya)
        $payload = [
            'kepala_keluarga' => $request->kepala_keluarga,
            'no_rumah' => $request->no_rumah,
            'rt_rw' => $request->rt_rw,
            'total_karung_sampah' => $request->total_karung_sampah,
            'tanggal_pengangkutan' => $request->tanggal_pengangkutan,
        ];

        // panggil method update dari BaseApi, kirim endpoint (route update dari REST API nya) dan data ($payload diatas)
        $proses = (new BaseApi)->update('/api/sampahs/update/'.$id, $payload);
        if ($proses->failed()) {
            // kalau gagal, balikin lagi nama pesan errors dari json nya
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            // berhasil, balikin ke halaman paling awal dengan pesan
            return redirect('/')->with('success', 'Berhasil mengubah data siswa dari API');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proses = (new BaseApi)->delete('/api/sampahs/delete/'.$id);

        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil hapus data sementara dari API');
        }
    }

    public function trash()
    {
        $proses = (new BaseApi)->trash('/api/sampahs/show/trash');
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            $sampahsTrash = $proses->json('data');
            return view('trash')->with(['sampahsTrash' => $sampahsTrash]);
        }
    }

    public function permanent($id)
    {
        $proses = (new BaseApi)->permanent('/api/sampahs/trash/delete/permanent/'.$id);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect()->back()->with('success', 'Berhasil menghapus data secara permanen!');
        }
    }

    public function restore($id)
    {
        $proses = (new BaseApi)->restore('/api/sampahs/trash/restore/'.$id);
        if ($proses->failed()) {
            // dd($proses);
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'Berhasil mengembalikan data dari sampah!');
        }
    }
}

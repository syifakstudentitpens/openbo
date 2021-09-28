<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Villa;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Villa::get();
        return view('villa.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('villa.create');
    }

    public function format()
    {
        $data = [['nama_villa' => null, 'kode_villa' => null, 'alamat' => null, 'fasilitas' => null, 'harga' => null, 'jumlah_kamar' => null, 'deskripsi' => null, 'type' => 'rak1/rak2/rak3']];
            $fileName = 'format-villa';
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('villa', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'importVilla' => 'required'
        ]);

        if ($request->hasFile('importVilla')) {
            $path = $request->file('importVilla')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $a = collect($data);

            if (!empty($a) && $a->count()) {
                foreach ($a as $key => $value) {
                    $insert[] = [
                            'nama_villa' => $value->nama_villa, 
                            'kode_villa' => $value->kode_villa, 
                            'alamat' => $value->alamat, 
                            'fasilitas' => $value->fasilitas,
                            'harga' => $value->harga, 
                            'jumlah_kamar' => $value->jumlah_kamar, 
                            'deskripsi' => $value->deskripsi, 
                            'type' => $value->type,
                            'cover' => NULL];

                    Villa::create($insert[$key]);
                        
                    }
                  
            };
        }
        alert()->success('Berhasil.','Data telah diimport!');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_villa' => 'required|string|max:255',
            'kode_villa' => 'required|string'
        ]);

        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/villa", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

        Villa::create([
                'nama_villa' => $request->get('nama_villa'),
                'kode_villa' => $request->get('kode_villa'),
                'alamat' => $request->get('alamat'),
                'fasilitas' => $request->get('fasilitas'),
                'harga' => $request->get('harga'),
                'jumlah_kamar' => $request->get('jumlah_kamar'),
                'deskripsi' => $request->get('deskripsi'),
                'type' => $request->get('type'),
                'cover' => $cover
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('villa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Villa::findOrFail($id);

        return view('villa.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Villa::findOrFail($id);
        return view('villa.edit', compact('data'));
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
        if($request->file('cover')) {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/villa", $fileName);
            $cover = $fileName;
        } else {
            $cover = NULL;
        }

        Villa::find($id)->update([
             'nama_villa' => $request->get('nama_villa'),
                'kode_villa' => $request->get('kode_villa'),
                'alamat' => $request->get('alamat'),
                'fasilitas' => $request->get('fasilitas'),
                'harga' => $request->get('harga'),
                'jumlah_kamar' => $request->get('jumlah_kamar'),
                'deskripsi' => $request->get('deskripsi'),
                'type' => $request->get('type'),
                'cover' => $cover
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('villa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Villa::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('villa.index');
    }
}

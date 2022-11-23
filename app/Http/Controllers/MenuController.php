<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function list_menu() {
        $title = "Daftar Menu";
        $dataMenu = Menu::all();
        return view("fitur.list_menu", compact("dataMenu","title"));
    }
    
    public function tambah_ruangan(Request $req)
    {
        // dd($req);
        $this->validate(
            $req,
            ['nama_ruangan' => 'required|unique:ruangans,nama_ruangan'],
            ['nama_ruangan.unique' => 'Nama ruangan telah tersedia!']
        );

        $hasil = [
            'nama_ruangan' => $req['nama_ruangan'],
        ];

        Menu::create($hasil);
        return redirect('/list_ruangan')->with('success', 'Data Ruangan Ditambah');
    }


    public function edit_ruangan(Request $req)
    {
        // dd($req);
        $this->validate(
            $req,
            ['nama_ruangan' => 'required|unique:ruangans,nama_ruangan'],
            ['nama_ruangan.unique' => 'Nama ruangan telah tersedia!']
        );

        Menu::all()->where('id_ruangan', $req['id'])->first()->update([
            'nama_ruangan' => $req['nama_ruangan']
        ]);

        return redirect('/list_ruangan')->with('success', 'Data Ruangan Diubah');
    }

    public function hapus_ruangan(Request $req)
    {
        $data = Menu::findOrFail($req['id']);
        $data->delete();

        return redirect('/list_ruangan')->with('success', 'Data Berhasil Dihapus');
    }
}

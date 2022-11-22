<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $dataMenu = Menu::all();
        $dataSubmenu = SubMenu::all();
        $data = DB::select('SELECT menus.* FROM menus LEFT JOIN sub_menus ON menus.id_menu = sub_menus.id_menu');
        
        return view('home',[
            'title' => 'Home page',
            'data' => $data,
            'dataMenu' => $dataMenu,
            'dataSubmenu' => $dataSubmenu
        ]);
    }
}

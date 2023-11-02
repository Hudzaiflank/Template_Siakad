<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // Mengambil semua data pengguna dari tabel User lalu di berikan pada variabel alldata
        $data['allData'] = User::all();

        // Mengembalikan tampilan 'backend.user.view_user' dengan data pengguna
        return view('backend.user.view_user', $data);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use PharIo\Manifest\Email;

class UserController extends Controller
{
    public function UserView()
    {
        // Mengambil semua data pengguna dari tabel User lalu di berikan pada variabel alldata
        $data['allData'] = User::all();

        // Mengembalikan tampilan 'backend.user.view_user' dengan data pengguna
        return view('backend.user.view_user', $data);
    }

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validatedDpata = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        // $code = rand(0000,9999);
        $data->Usertype = $request->Usertype;
        // $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        // $data->code = $code;
        $data->save();

        $notification = array(
            'message' => 'User Inserted Succesfully',
            'alert type' => 'Succesfuly'
        );

        return redirect()->route('user.view')->with($notification);
    }
}

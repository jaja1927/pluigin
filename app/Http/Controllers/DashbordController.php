<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan menggunakan model yang tepat

class DashbordController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna

        $data = [
            'title' => 'Dashbord',
            'content' => 'Dashbord',
            'users' => $users // Menambahkan data pengguna ke array data
        ];
        return view('layouts.template', $data);
    }
}

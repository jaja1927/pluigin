<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $page = "User";
    public function index() 
    {
        $data = [
            "title" => $this->page,
            "page_title" => $this->page,
            "dtMember" => Member::all(),
            "edit" => false
        ];
        return view('layouts.users.data_user',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => $this->page,
            "page_title" => "Data ".$this->page,
            "dtMember" =>Member::all(),
            "edit" => false
        ];

        return view('layouts.users.form_user',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6',
            'role' => 'required',
            'status' => 'required',
        ]);
            try {
                Member::create([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->input('password')),
                "role" => $request->input('role'),
                "status" => $request->input('status'),
                //dd($request)
            ]);

            $notif = [
                'type' => "success",
                "message" => "Data Berasil Disimpan !"
            ];
        } catch(Exception $err){
            $notif = [
                'type' => "danger",
                "message" => "Datal Gagal Disimpan !"
            ];
        }

        return redirect()->route('user.index')->with('notif',$notif);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        $data = [
            "title" => $this->page,
            "page_title" => $this->page,
            "rsMember" => Member::where("id",$member->id)->first(),
            "edit" => true
        ];
        return view('layouts.users.form_user',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6',
            'role' => 'required',
            'status' => 'required',
        ]);
        try {
            // if($request->file("file_foto")){
            //     $fileName = Str::random(6).time().'.'.$request->file("file_foto")->extension();
            //     $result = $request->file("file_foto")->move(public_path("uploads/menu"), $fileName);
            // } else{
            //     $fileName = $request->input('old_foto');
            // }

            Member::find($member->id)->update([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "password" => $request->input('password') ? Hash::make($request->input('password')) : $request->input('old_password'),
                "role" => $request->input('role'),
                "status" => $request->input('status'),
            ]);

            $notif = [
                'type' => "success",
                "message" => "Data Berasil DiUpdate !"
            ];
        } catch(Exception $err){
            $notif = [
                'type' => "danger",
                "message" => "Data Gagal DiUpdate !"
            ];
        }

        return redirect(route('user.index'))->with('notif',$notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        try {
            Member::find($member->id)->delete();
            $notif = [
                'type' => "success",
                "text" => "Data Berasil Dihapus !"
            ];
        } catch(Exception $err){
            $notif = [
                'type' => "danger",
                "text" => "Datal Gagal Dihapus !"
            ];
        }

        return redirect()->back()->with('notif',$notif);
    }
}
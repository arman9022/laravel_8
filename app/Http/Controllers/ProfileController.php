<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{

    public function index()
    {
        $profile = DB::table('profile')->get();
 
        return view('profile.index', compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'detail' => 'required|min:5',
            'gender' => 'required',
        ]);

        $data = array(
            'name' => $request -> name, 
            'detail' => $request -> detail, 
            'gender' => $request -> gender, 
        );
        DB::table('profile')->insert($data);
        return redirect()->back()->with('status', 'Created');
    }

    public function show($id)
    {
        $profile = DB::table('profile')->where('id',$id)->first();
        return view('profile.show',compact('profile'));
    }

    public function edit($id)
    {
        $profile = DB::table('profile')->where('id',$id)->first();
        return view('profile.edit',compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request -> name, 
            'detail' => $request -> detail, 
            'gender' => $request -> gender, 
        );
        DB::table('profile')->where('id',$id)->update($data);
        return redirect()->route('profile.index')->with('status', 'Updated');
    }

    public function destroy($id)
    {
        DB::table('profile')->where('id',$id)->delete();
        return redirect()->back()->with('status', 'Deleted');
    }
}

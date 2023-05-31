<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\StoredataRequest;
use App\Http\Requests\UpdatedataRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DataController extends Controller
{

    public function storecomment(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'data_id' => 'required',
        ]);

        $commentData = $request->all();
        $commentData['user_id'] = auth()->user()->id; // Mendapatkan ID pengguna yang terautentikasi


        Comment::create($commentData);

        return redirect()->back()->with('success', 'Comment created successfully.');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = User::all();
        $data = Data::with('user')->get();

        
        return view('main', [
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id); // Mencari data pegawai berdasarkan ID

        return view('edit', compact('data')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $data = Data::findOrFail($id); 
        $data->update($request->all()); 
    
        return redirect('/')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Data::findOrFail($id); // Mencari data pegawai berdasarkan ID
        $data->delete(); // Menghapus data pegawai

    return redirect('/')
        ->with('success', 'Data pegawai berhasil dihapus.');
    }

    public function create()
    {
        $user = User::all();
        return view('create')->with('user', $user);
    }

    public function store()
    {
        $data = new data();
        $data->user_id = auth()->user()->id;
        $data->title = request('title');
        $data->description = request('description');
        $data->save();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredataRequest  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
}

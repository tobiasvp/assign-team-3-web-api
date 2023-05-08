<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::latest()->paginate();
        return view('user.index_user', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user/create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(

            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'jk' => 'required|integer',
                'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]



        );



        // dd($request->file('foto_ktp'));
        // die();
        $imagePath = $request->file('foto_ktp')->store('public/images');


        $user = new  User([
            'name' => $request->get('name'),
            'tempat_tl' => $request->get('tempat_tl'),
            'alamat' => $request->get('alamat'),
            'foto_ktp' => $imagePath,
            'email' => $request->get('email'),
            'type' => $request->get('type'),
            'password' =>        Hash::make($request->get('password')),

            // 'image' => $imagePath,
        ]);

        // dd($user);
        // die();

        $user->save();


        return redirect()->route('users.index')
            ->with('success', 'Product created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}

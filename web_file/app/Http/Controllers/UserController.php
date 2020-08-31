<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = User::orderBy('id', 'asc')
        // ->where('lang','EN')
        ->get();
                                

         return view ('user.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $niceNames = [
            'name' => 'Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',

        ]; 

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            
        ],[],$niceNames);
        
            $request->request->add(['roles' => 'USER']);                    
            $request->request->add(['password' => Hash::make($request->password)]);

        User::create($request->all());
        return redirect()->route('user.index')
                             ->with('success', 'User created successfully');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $edits = User::findOrFail($id);

        //dd($edits);
        return view ('user.edit',compact('edits'));
         // return $edits;
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
        $user = User::findOrFail($id);

        $niceNames = [
            'name' => 'Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',

        ]; 

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|unique:users,username,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => ['sometimes', 'string', 'min:3', 'confirmed'],
            
        ],[],$niceNames);

        //$request->request->add(['updated_by' => Auth::user()->name]);

        $request->request->add(['password' => Hash::make($request->password)]);
        $user->update($request->all());

        return redirect()->route('user.index')
                             ->with('success', 'User created successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')
                             ->with('success', 'User deleted successfully');
    }
}

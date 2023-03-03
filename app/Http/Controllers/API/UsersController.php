<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use DB;

class UsersController extends Controller
{
    public function index()
    {
        // $users = users::all();
        $users = DB::table('users')
        ->where('active', '1') 
        ->orderBy('updated_at','DESC')
        ->get();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newusers = new users([
			//'slug' => $request->get('slug'),
            'Name'=> $request->get('Name'),
            'email'=> $request->get('email'),
            'password'=> $request->get('password'),
            'password_confirmation'=> $request->get('password_confirmation'),
            'mobile_no'=> $request->get('mobile_no'),
            'role'=> $request->get('role'),
            
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->validate([
			//'slug' => 'required',
            'Name'=>'',
            'email'=> 'required|email',
            'password'=> '',
            'password_confirmation'=> '',
            'mobile_no'=> 'required|regex:/(01)[0-9]{9}/',
            'role'=> '',
            'active' => ''
		]);

		$newusers = new users([
			//'slug' => $request->get('slug'),
            'Name'=> $request->get('Name'),
            'email'=> $request->get('email'),
            'password'=> $request->get('password'),
            'password_confirmation'=> $request->get('password_confirmation'),
            'mobile_no'=> $request->get('mobile_no'),
            'role'=> $request->get('role'),
            'active' => '1'
		]);
        
        $newusers->touch();// to store data and time in database
		$newusers->save();

		return response()->json($newusers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        
        if(is_numeric($data)){
            $users = users::findOrFail($data);
            return response()->json($users);
        }else{
            $users = DB::table('users')->where('email','=',$data)->get();
		   return response()->json($users);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team_id)
    {
        // $users = users::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $users->slug = $request->get('slug');
		// $users->teamname = $request->get('teamname');

		// $users->save();

		// return response()->json($users);

        $users = users::findOrFail($team_id);
		
		$users = users::find($team_id);
        $users->update($request->all());
        return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id)
    {
        $users = users::findOrFail($team_id);
		// $users->delete();
        if($users)
        {
            $users->active = 0;
            $users->save();
        }

		return response()->json($users::all());
    }
}

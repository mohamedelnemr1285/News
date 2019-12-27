<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Resources\userresource as userresource;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return userresource::collection($users);
    }

    public function admin()
    {
        $users = User::all();
        $stop_article = DB::table('settings')->where('name','stop_article')->value('value');
        return view('layouts.role',compact('users','stop_article'));
    }

    public function setting(Request $request)
    {
        if($request->stop_article)
        {
            DB::table('settings')
                ->where('name','stop_article')
                ->update(['value'=> 1]);
        }else
        {
            DB::table('settings')
                ->where('name','stop_article')
                ->update(['value'=> 0]);
        }
        return redirect()->back();
    }

    public function addRole(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        $user->roles()->detach();

        if ($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','User')->first());
        }
        if ($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name','Editor')->first());
        }
        if ($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



  public function login(Request $request)
 {

    if(auth()->attempt(['email' => $request->input('email'),
        'password' => $request->input('password')])) {

        $user = auth()->user();
        $user->api_token = Str::random(60);
        $user->save();
        return $user;
    }

    return "Your Email Or Password Is wrong You Need To Register";


}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->isMethod('put') ? User::findOrfail
        ($request->user_id) : new User;

        $user->id = $request->input('user_id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')) ;
        $user->api_token=Str::random(60);

        $user->save();




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        return new userresource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if ($user->delete()) {
            return new userresource($user);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

        // USING DB SILMPLE //

        // #Iinsert
        // DB::insert('insert into users (name, email, password)
        // value (?,?,?)', [
        //     'made', 'madewelly17@gmail.com', 'password',
        // ]);

        // #Update
        // DB::update('update users set name = ? where id = 1', ['Made Welly']);

        // #Delete
        // DB::delete('delete from users where id=1');

        // END 

        // BUILD DB USING Elquent

        // // 1# Insert
        // $users = new User();
        // $users->name = 'Made Welly';
        // $users->email = 'madewelly17@gmail.com';
        // $users->password = bcrypt('password');
        // $users->save();

        // 2# Insert
        // $data = [
        //     'name' => 'Shank',
        //     'email' => 'shank@gmail.com',
        //     'password' => bcrypt('password')
        // ];
        // User::create($data);

        // #Update
        // User::where('id', 5)->update(['name' => 'Made']);
        // dd($users);
        // // var_dump($users);

        //Delete
        // User::where('id', 11)->delete();

        // END 

        // ACCESSOR AND MUTATORS 

        // $data = [
        //     'name' => 'Shank',
        //     'email' => 'shank@gmail.com',
        //     'password' => ('password')
        // ];
        // User::create($data);

        $query = User::all();
        return $query;
    }

    public function uploadAvatar(Request $request)
    {
        $request->image->store('images', 'public');
        User::find(1)->update(['avatar' => 'abcba']);
        return 'Uploaded is Done!';
    }
}

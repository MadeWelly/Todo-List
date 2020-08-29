<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    // UPLOAD FILE 
    public function uploadAvatar(Request $request)
    {

        //Insert hashfile
        // $request->image->store('images', 'public');
        //get file orginal name
        // $originname = $request->image->getClientOriginalName();

        //Update
        // User::find(1)->update(['avatar' => 'abcbc']);

        // if ($request->hasFile('image')) {
        //     // get file original name 
        //     $originname = $request->image->getClientOriginalName();
        //     $this->deleteOldImage();
        //     //remove old file
        //     // if (auth()->user()->avatar) {
        //     //     Storage::delete('/public/images/' . auth()->user()->avatar);
        //     // }
        //     // save to folder 
        //     $request->image->storeAs('images', $originname, 'public');
        //     //update to db
        //     User::find(1)->update(['avatar' => $originname]);
        // }
        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            // $request->session()->flash('image', 'Image Uploaded'); //success message
            return redirect()->back()->with('image', 'Image Uploaded!');
        }
        $request->session()->flash('error', 'Image Not Uploaded'); //success message
        return redirect()->back(); //error message
    }

    // protected function deleteOldImage()
    // {
    //     if (auth()->user()->avatar) {
    //         Storage::delete('/public/images/' . auth()->user()->avatar);
    //     }
    // }
}

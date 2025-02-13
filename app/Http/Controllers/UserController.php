<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use function Laravel\Prompts\password;

class UserController extends Controller
{

  /*  public function __construct()
    {
      Gate::authorize("admin-control");
    }
  */
    public function index()
    {
        $users =User::orderBy('id','DESC')-> paginate();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'name'=>['required','string','min:2','max:100'],
                'email'=>['required','email','unique:users,email'],
                'password'=>['required','string','min:6','max:100'],
                'confirm_password'=>['required','string','min:2','max:100','same:password'],
                'type'=>['required','in:Admin,Writer']

            ]
        );
        User::create($data);
        return back()->with('success','Data Added Successfully');

    }


    public function posts(string $id)
    {

        $user =User::findOrFail($id);
        return view('users.posts',compact('user'));
    }


    public function edit(string $id)
    {

        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));

    }


    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);
        $data = $request->validate(
            [
                'name'=>['required','string','min:2','max:100'],
                'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
                'password'=>['nullable','string','min:6','max:100'],
                'confirm_password'=>['nullable','string','min:2','max:100','same:password'],
                'type'=>['required','in:Admin,Writer']
            ]
        );
        $data['password'] = $request->has('password') ? bcrypt($request->password) : $user->password ;
        unset($data['confirm_password']);
        User::where('id',$id)->update($data);
        return redirect()->route('users.index')->with('success','Data Updated Successfully');

    }


    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success','Data Deleted Successfully');

    }
}

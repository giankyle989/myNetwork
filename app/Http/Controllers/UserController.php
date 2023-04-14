<?php

namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    //

    public function index(){
        if(View::exists('index')){
            return view('index');
        }else{
            return abort(404);
        }
    }

    public function register(){
        return view('register');
    }

    
    public function profile($id){

        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException) {
            // User not found, return error page
            return view('error.profileError');
        }
        
        if (Auth::id() === $user->id) {
            // Authenticated user is viewing their own profile
            $posts = Post::where('user_id', $user->id)->get();
            return view('user.profile', ['user' => $user, 'posts' => $posts]);
        } else {
            // Authenticated user is viewing another user's profile
            return view('user.otherUser', ['user' => $user]);
        }
    }

    public function store(Request $request){
        // Get and validate input
        $validated = $request->validate([
            "firstname"=> ['required', 'min:2'],
            "lastname"=> ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password"=> ['required', 'min:6']
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['country_id'] = null;
        
        $user = User::create($validated); // Set the country ID to a valid value
        $user->save();

        auth()->login($user);

        return redirect('/');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function process(Request $request){

        //Get and validate inputs
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required', 'min:6']
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();
        }

        return back()->withErrors(['email' => 'Incorrect information'])->onlyInput('email');
    }

    public function feed(){
        $user = Auth::user();
        // Get posts from database
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('user.feed', compact('user','posts'));
    }

    public function show($id){
        $userId = User::findOrFail($id);
        $user = auth()->user();
        $countries = Country::all();
        return view('user.edit', compact('user', 'countries','userId'));
    }

    public function update(Request $request){

        $user = Auth::user();
        $userId = $user->id;
        // Update the user's name
        $user->firstname =$request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->country_id = $request->input('country');
        // Handle user's photo update
        if($request->hasFile('image')){
            $image_file = $request->file('image');
            $image_name = $image_file->getClientOriginalName();
            $image_path = $image_file->storeAs('public/images', $image_name);
            $user->image = $image_path;
        }
        $user->save();

        return redirect("/profile/$userId");
    }

    public function searchUsers(Request $request)
{
    $userT = User::all();
    $query = $request->input('query');
    $users = User::where(function($queryBuilder) use ($query) {
        $queryBuilder->where('firstname', 'LIKE', '%'.$query.'%')
                     ->orWhere('lastname', 'LIKE', '%'.$query.'%');
    })->get();
    return view('user.search_result', compact('users', 'query',));
}

    public function otherUser($id){
        $user = User::all($id);
        return view('user.otherUser', compact('user'));
    }

}

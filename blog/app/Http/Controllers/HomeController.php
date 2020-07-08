<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('home')->with('posts', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'post'=>'required'
        ]);
        if (isset($request->post_button)) {
            Post::create([
                'user_id'=> Auth::user()->id,
                'title' => $request->title,
                'body' => $request->post
            ]);
        }
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        if ($post->user_id==Auth::user()->id) {
            return view('edit')->with('post', $post);
        }
        return redirect('errors/404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'post'=>'required'
        ]);

        if (isset($request->save_btn)) {
            Post::where('id',$request->post_id)->update([
                'title'=>$request->title,
                'body'=>$request->post
            ]);
        }
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        Post::destroy($post_id);
        return redirect('home');

    }
}

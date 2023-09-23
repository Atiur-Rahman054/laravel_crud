<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class PostController extends Controller
{

    public function index(){
        // $all_posts = DB::table('posts')->orderBy('id', 'desc')->paginate(10);//db query

        $all_posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('post.index', compact('all_posts'));
    }
    //
    public function create(){
        return view('post.create');
    }

    public function store(Request $request){

        $file = $request->file('image');
        
        $fileupload = Null;

        $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:1600',
            'image' => 'nullable|image|mimes:jpg, png, svg, jpeg'
        ]);

        if($file){
            $filename = Str::ulid() . "." . $file->getClientOriginalExtension();
            $fileupload = Storage::putFileAs('post', $file, $filename);
            
        }
        

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //      'image'     => $fileupload,
        // ]);

        $data = new Post(); 
        $data -> title = $request->title;
        $data -> description = $request-> description;
        $data -> image = $fileupload;
        $data -> save();

        return redirect()->route('post.index')->with('success', 'post insert successfull!');
    }

    public function show($id){
        $post = Post::find($id);
        return view('post.show', compact('post'));
       
        
    }

    public function edit($id){
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post_image = $post->image;

        $file = $request->file('image');

        $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:1600',
            'image' => 'nullable|image|mimes:jpg, png, svg, jpeg'
        ]);

        if($file){
           if($post_image){
                $path = public_path('storage/' . $post_image);
                unlink($path);

                $filename = Str::ulid() . "." . $file->getClientOriginalExtension();
                $fileupload = Storage::putFileAs('post', $file, $filename);


           }
        }else{
            $fileupload = $post_image;
        }




        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image'       => $fileupload,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('post.index')->with('success', 'post update successfull!');
    }

    public function destroy($id){
        $post = Post::find($id);
        $file = $post->image;

        if($file){
            $path = public_path('storage/' . $file);
            unlink($path);
            
        }
         $post->delete();
        
        return back()->with('success', 'post deleted');
    }

    public function statusupdate(Post $post){
        
        if($post->status == 1){
            $post->status = 2;
        }else{
            $post->status = 1;
        }
        $post->save();

        return back()->with('success', 'status updated!');
    }







}

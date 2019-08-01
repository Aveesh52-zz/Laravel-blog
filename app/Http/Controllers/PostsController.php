<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $categories = Category::all();
        return view('admin.post.index')->with('posts',Post::all())
                                       ->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Category::all();
        if($categories->count() == 0){
            Session::flash('info','You must have some categories in order to create posts');
            return view('admin.post.create')->with('categories',$categories)
                                            ->with('tags',Tag::all());     
        }else{
            return view('admin.post.create')->with('categories',$categories)
                                            ->with('tags',Tag::all());    
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $this->validate($request,[
            'title' => 'required|max:255', 
            'content' => 'required',
            'price' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required'
        ]);
        
        $featured = $request->featured;
        $featured_new_image = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts' , $featured_new_image);

        $post = Post::create([
            'title' => $request->title,
            
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'featured' => 'uploads/posts/'.$featured_new_image
         ]);

         $post->tags()->attach($request->tags);
         return redirect()->route('posts');     
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
    {   $posts = Post::find($id);
        return view('admin.post.edit')->with('posts',$posts)->with('categories',Category::all())
        ->with('tags',Tag::all());
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
        $this->validate($request,[
            'title' => 'required|max:255',
           
            'content' => 'required',
            'price' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required'
        ]);
        
        
             $posts = Post::find($id);
              $posts->title = $request->title;
              $posts->content = $request->content;
              $posts->price = $request->price;
              $posts->featured = $request->featured;
              $posts->save();
              $posts->tags()->sync($tags);
              return redirect()->route('posts'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
   **/
  public function destroy($id){
    $posts = Post::find($id);
    $posts->delete();
    return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts',$posts);
        }

    public function restore($id){
            $posts = Post::withTrashed()->where('id',$id)->first();
            $posts->restore();
            return redirect()->route('posts');
        }

        public function kill($id){
            $posts = Post::withTrashed()->where('id',$id)->first();
            $posts->forcedelete();
        }

}

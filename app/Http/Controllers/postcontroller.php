<?php

namespace App\Http\Controllers;

use App\posts;
use App\wilaya;
use App\sources;
use App\professions;
use App\malades;
use App\tags;

use Illuminate\Http\Request;
use Illuminate\support\str;
class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $post =posts::paginate(4);
        return view('admin.post.index',compact('post'));
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     $wilaya = wilaya::all();
        $source = sources::all();
        $profession = professions::all();
        $malade = malades::all();
        $tags = tags::all();
         return view('admin.post.create',compact('wilaya','source','profession','malade','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, ['titre'=>'required',
            'content'=>'required', 
                            'wilaya_id'=>'required',
                            'source_id'=>'required',
                             'profession_id'=>'required',
                           'malade_id'=>'required',
                        'image'=>'required']);

          $image= $request->image;
          $new_image = time().$image->getClientOriginalName();

          $post = posts::create(['titre'=>$request->titre,
                                'content'=>$request->content,
                                'wilaya_id'=>$request->wilaya_id,
                                'source_id'=>$request->source_id,
                                'profession_id'=>$request->profession_id,
                                'malade_id'=>$request->malade_id,
                                'image'=> 'public/uploads/posts/'.$new_image
                                 
                                                ]);

          $post->tags()->attach($request->tags);
                                                $image->move('public/uploads/posts/', $new_image);

 return redirect()->back()->with('success','post yes');}
    

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
         $wilaya = wilaya::all();
        $source = sources::all();
        $profession = professions::all();
        $malade = malades::all();
     $tags=tags::all();
        $post = posts::findorfail($id);
        return view('admin.post.edit',compact('post' ,'tags','wilaya' ,'source','profession','malade'));
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
     



     $this->validate($request, ['titre'=>'required',
            'content'=>'required', 
                            'wilaya_id'=>'required',
                            'source_id'=>'required',
                             'profession_id'=>'required',
                           'malade_id'=>'required'
                        ]);











          $post =posts::findorfail($id);
          if ($request->has('image')){

$image= $request->image;
          $new_image = time().$image->getClientOriginalName();
          $image->move('public/uploads/posts/', $new_image);




          $post_data = ['titre'=>$request->titre,
                                'content'=>$request->content,
                                'wilaya_id'=>$request->wilaya_id,
                                'source_id'=>$request->source_id,
                                'profession_id'=>$request->profession_id,
                                'malade_id'=>$request->malade_id,
                                'image'=> 'public/uploads/posts/'.$new_image
                                 
                                                ];

          }
          else{
            $post_data = ['titre'=>$request->titre,
                                'content'=>$request->content,
                                'wilaya_id'=>$request->wilaya_id,
                                'source_id'=>$request->source_id,
                                'profession_id'=>$request->profession_id,
                                'malade_id'=>$request->malade_id
                                
                                 
                                                ];


          }

          

          $post->tags()->attach($request->tags);
          $post->update($post_data );
                                                

 return redirect()->back()->with('success','post yes');
    
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

         $post= posts::findorfail($id);
        $post->delete();
        return redirect()->back()->with('success',' post est supprimi');
    }
}

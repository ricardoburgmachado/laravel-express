<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\PostRequest;

use App\Post;

use App\Tag;

class PostAdminController extends Controller{


    private $post;

     public function __construct(Post $post){
         $this->post = $post;
     }

    public function index(){

        //$posts = $this->post->all();

        $posts = $this->post->paginate(5);

        return view('admin.posts.index', compact('posts'));
     }


    public function create(){
        return view('admin.posts.create');
    }

    public function auth(){
        
    }

    public function store(Requests\PostRequest $request){

        //o parametro trim tira o espaço na frente das palavras
        //o array filter irá limpar o array e retirar os campos vazios

        $tags = array_filter(array_map('trim', explode(',',$request->tags)));

        $tagsIDs = [];

        foreach ($tags as $tagName){
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }

        $post = $this->post->create($request->all());

        //aqui é sincronizado, retirado IDS que não estão sendo informados, e inseridos ou mantidos IDs informados
        $post->tags()->sync($tagsIDs);

        //Para visualizar os dados na tela
        //dd($request->all());
       //dd($this->post->create($request->all()));

        //$this->post->create($request->all());

       return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }


    public function update($id, PostRequest $request){

        $this->post->find($id)->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id){

        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

}

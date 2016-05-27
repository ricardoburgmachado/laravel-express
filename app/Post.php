<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    //campos que podem ser criados em massa na criação de um objeto
    //Exemplo:
    //App\Post::create(['title'=>'Terceiro Post', 'content'=>'Conteudo do terceiro post']);
    protected  $fillable = [
        'title',
        'content'
    ];


    //Relecionamento OneToMany
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //Relacionamento ManyToMany
    public function tags(){
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }

    //aqui é um exemplo de atributo dinâmico
    // o get no inicio e o Atribute no final são obrigatórios
    public function getTagsListAttribute(){
        //o all server para trazer em array
        $tags = $this->tags()->lists('name')->all();
        return implode(', ', $tags);
    }


}

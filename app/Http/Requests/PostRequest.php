<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //aqui seria para definir logica para verificar se o usuário está habilitado para fazer uma requisição
        //nesse caso vamos definir que todos usuários estão habilitados retornando true
        return true;
        //return false; default
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:8',
            'content'=>'required'
        ];
    }
}

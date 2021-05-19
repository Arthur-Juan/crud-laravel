<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ImovelController extends Controller
{   

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

        $cidade = $request['cidade'];
        $tipo = $request['tipo'];

        if($cidade){
            $imoveis = DB::table('imoveis')->where('cidadeEndereco','=', $cidade)->paginate(5);
        }elseif($tipo){
            $imoveis = DB::table('imoveis')->where('tipo', '=', $tipo)->paginate(5); 
        }

        else{
            $imoveis = Imovel::paginate(5);
        }

        return view('imoveis.index', [
            'imoveis' => $imoveis,
            'cidade' => $cidade
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     
        return view('imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validate = $request->validate([
            "descricao" => "required",
            "logradouroEndereco"=> "required",
            "bairroEndereco" => "required",
            "numeroEndereco" => "required | numeric",
            "cepEndereco" => "required",
            "cidadeEndereco" => "required",
            "preco" => "required | numeric",
            "qtdQuartos" => "required | numeric ",
            "tipo" => "required",
            "finalidade" => "required"
        ]);

       
       $data = $request->all();
        $data['user_id'] = Auth::user()->id;
       Imovel::create($data);

       return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imovel::find($id);
        if($imovel === null){
            $imovel = Imovel::latest()->first();
                        
        }

        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $imovel = Imovel::find($id);
        if($imovel->user->id !== Auth::user()->id){
            return redirect('/')->withErrors(['msg'=>'Você só pode alterar os seus próprios imóveis']);
        }

        return view('imoveis.edit', compact('imovel'));
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
        $validate = $request->validate([
            "descricao" => "required",
            "logradouroEndereco"=> "required",
            "bairroEndereco" => "required",
            "numeroEndereco" => "required | numeric",
            "cepEndereco" => "required",
            "cidadeEndereco" => "required",
            "preco" => "required | numeric",
            "qtdQuartos" => "required | numeric ",
            "tipo" => "required",
            "finalidade" => "required"
        ]);

        $imovel = Imovel::find($id);
        $data = $request->all();

        $imovel->update($data);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imovel::find($id)->delete();
        return redirect('/');
    }


    public function remover($id){
        $imovel = Imovel::find($id);

        return view('imoveis.remove', compact('imovel'));
    }
}

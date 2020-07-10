<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FIlme;
use App\Genero;
use App\Ator;
use App\FilmeAtor;

class FilmeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $filme = new Filme;
        $filme->titulo = $request->titulo;
        $filme->resumo = $request->resumo;

        if (!empty($request->genero_id)){
            $filme->genero_id = $request->genero_id;
        } else {
            if($genero = Genero::where('nome', 'like', $request->genero_nome)->first()){
                $filme->genero_id = $genero->id;
            } else {
                $genero = new Genero;
                $genero->nome = $request->genero_nome;
                $genero->save();
                $filme->genero_id = $genero->id;    
            }      
        }

        $filme->save();

        if (!empty($request->ator)){
            foreach($request->ator as $value){
                if($value != ''){
                    $ator = new Ator;
                    $ator->nome = $value;
                    $ator->save();

                    $filmeAtor = new FilmeAtor;
                    $filmeAtor->filme_id = $filme->id;
                    $filmeAtor->ator_id = $ator->id;
                    $filmeAtor->save();    
                }
            }
        }
        
        return back()->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request)
    {
        $filme = Filme::find($request->id);

        return response()->json([
            'filme'  => $filme,
            'atores' => $filme->atores,
            'status' => 'ok'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function alterar(Request $request)
    {
        $filme = Filme::find($request->filme_id);
        $filme->titulo = $request->titulo;
        $filme->resumo = $request->resumo;

        if (!empty($request->genero_id)){
            $filme->genero_id = $request->genero_id;
        } else {
            if($genero = Genero::where('nome', 'like', $request->genero_nome)->first()){
                $filme->genero_id = $genero->id;
            } else {
                $genero = new Genero;
                $genero->nome = $request->genero_nome;
                $genero->save();
                $filme->genero_id = $genero->id;    
            }      
        }

        $filme->save();

        $filmesAtores = FilmeAtor::where('filme_id', $filme->id)->get();
        foreach($filmesAtores as $value){
            $value->delete();
        }

        if (!empty($request->ator)){
            foreach($request->ator as $value){
                if($value != ''){
                    $ator = new Ator;
                    $ator->nome = $value;
                    $ator->save();

                    $filmeAtor = new FilmeAtor;
                    $filmeAtor->filme_id = $filme->id;
                    $filmeAtor->ator_id = $ator->id;
                    $filmeAtor->save();    
                }
            }
        }
        
        return back()->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        $filme = Filme::find($id);

        $filmesAtores = FilmeAtor::where('filme_id', $filme->id)->get();
        foreach($filmesAtores as $value){
            $value->delete();
        }

        $filme->delete();

        return back()->with('status', 'success');
    }
}

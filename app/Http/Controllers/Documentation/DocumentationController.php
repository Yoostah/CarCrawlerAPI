<?php

namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index(){
        return view('documentation.index');
    }

    public function documentation(){
        return view('documentation.documentation');
    }

    public function search(){
        return view('documentation.endpoints.search');
    }

    public function details(){
        return view('documentation.endpoints.details');
    }

    /*public function add(){
        $lista = Atividade::all();

        return view('atividade.add', ['tarefas' => $lista]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string']
        ]);

        $nova_atividade = new Atividade;
        $nova_atividade->name = $request->input('name');
        $nova_atividade->save();

        return redirect()->route('atividades.list');

    }

    public function edit($id){
        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            return view('atividade.add', ['todo' => $atividade_editada]);
        }else{
            return redirect()->route('atividades.list');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string']
        ]);

        //Necessário liberar o mass assignment no Model
        //Atividade::find($id)->update(['name' => $request->input('name')]);

        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            $atividade_editada->name = $request->input('name');
            $atividade_editada->save();
        }

        return redirect()->route('atividades.list');
    }

    public function delete($id){
        Atividade::find($id)->delete();

        return redirect()->route('atividades.list');
    }

    public function check($id){
        $atividade_editada = Atividade::find($id);

        if($atividade_editada){
            $atividade_editada->finalizado = !$atividade_editada->finalizado;
            $atividade_editada->save();
        }

        return redirect()->route('atividades.list');
    }*/
}

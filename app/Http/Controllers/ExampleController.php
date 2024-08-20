<?php

namespace App\Http\Controllers;

use App\Models\exemplo_tabela;
use Illuminate\Http\Request;
use Validator;
use DB;

class ExampleController extends Controller
{
    public function MostrarDados(){
        return view('list_users');
    }

    public function RecebeDados(Request $request){
        $validator = Validator::make($request->all(),
        [
        'nome' => 'required|max:255',
        'cpf' => 'required|numeric',
        'dinheiro'=> 'required|numeric'
        ]
        );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $data = array(
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'dinheiro'=>$request->dinheiro
        );
        $model = new exemplo_tabela();
        $model->nome = $data['nome'];
        $model->cpf = $data['cpf'];
        $model->dinheiro=$data['dinheiro'];
        $model->save();
        return redirect('/list_users')->with('success','Registro de dados realizado com sucesso');

    }

    public function listUsers() {
        $model = new exemplo_tabela();
        $dados['dados'] = $model->all();
        // $users = DB::table('exemplo_tabela')->get();
        return view('list_users', $dados);
    }

    public function deleteUser(Request $request){
        $id= $request->id;
        $model= new exemplo_tabela();
        $model->find($id)->delete();
        return redirect('/list_users')->with('success','Registro removido com sucesso');
    }
    
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
        
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(exemplo_tabela $exemplo_tabela)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(exemplo_tabela $exemplo_tabela)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, exemplo_tabela $exemplo_tabela)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(exemplo_tabela $exemplo_tabela)
    // {
    //     //
    // }
}

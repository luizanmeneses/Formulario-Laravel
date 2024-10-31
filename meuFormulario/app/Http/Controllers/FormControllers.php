<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

//Criar Formulário:
class FormControllers extends Controller//ou seja, as funções do Controller se estendem para a classe que criamos
{
    public function create() { //basicamente chamamos a função que está na views.
        return view('users.create');
        
    }
    //Validar e Armazenar os dados do Formulário:

    public function store(Request $request) {
            request() -> validate([
                'name' => ['required','min:4'],
                'email' => ['required','unique:users'],
                'password' => ['required','min:3']
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();
            
        //3. Redirecionar para a página de lista de usuários:
        return redirect()->route('users.index')->with('success', 'Cadastro Realizado :)');
}

    //Listar os Usuários cadastrados:
    public function index() {
        $users = User:: all();//Busca todos os registros da tabela Users e armazena nessa var users.
            return view('users.index', compact('users'))->with('users',$users);//carrega a view index e passa os valores de $users pra ela
    }
    //Ver o usuário selecionado:
    public function show($id) {
        $user = User:: find($id);//Busca todos os registros da tabela Users e armazena nessa var users.
        return view('users.show')->with('user', $user);//carrega a view index e passa os valores de $users pra ela
}
    //Editar:
    public function edit($id){//busca pelo id
        $user = User:: findOrFail($id);//se não achar lança erro 404
        if (!$user) {
            return redirect()->route('users.index')->with('success', 'Dados atualizados.');
        }
    
        return view('users.edit', compact('user'));
    }

    //Update - para atualizar os usuários no BD:
    public function update(Request $request, $id){
        request() -> validate([
            'name' => ['required','min:4'],
            'email' => ['required','unique:users,email'.$id],//email deve ser único na tabela, mas ignorando o registro desse
                                                            //id, assim se consegue atualizar sem conflito. 
        ]);

        $user = User:: findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

    if ($request->filled('password')){
        $user->password = Hash::make($request->password);//Facade - Hash forma mais recomendada e segura de criptografar a senha
                                                         //antes de colocar na BD.
    }
    $user->save();
        return redirect()->route('users.index')->with('success', 'Cadastro Atualizado :)');

    }

    //Atualizar senha:
    public function editpass($id){
        $user = User:: findOrFail($id);
        if(!$user) {
            return redirect()->route('users.index')->with('success', 'Senha atualizada.');
        }
        return view('users.editpass', compact('user'));
    }

    //Update senha:
    public function updatepass(Request $request, $id){
        request() -> validate([
            'current_pass' => 'required',
            'new_pass' => 'required|min:3|confirmed',
        ]);
    $user = User::findOrFail($id);

    if (!Hash::check($request->current_pass, $user->password)){
        return back()->withErrors(['current_pass' => 'Senha atual incorreta']);
    }
    $user->password = Hash::make($request->new_pass);
    $user->save();

    return redirect()->route('users.index')->with('success', 'Senha atualizada');
    }

    //Delete:
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()-> route('users.index');
    }

}

/*
SOBRE ATUALIZAR A SENHA:
No método update, estamos usando nullable na senha para que ela não seja obrigatória 
(ou seja, só será atualizada se o usuário preencher o campo).

public function index() {
        $users = User:: all();//Busca todos os registros da tabela Users e armazena nessa var users.
            return view('users.index')->with('users',$users);//carrega a view index e passa os valores de $users pra ela
    }

Outra forma de criptografar a senha, mas é menos recomendada:
    if ($request->filled('password')){
        $user->password = bcrypt($request->password);//Facade - Hash *Yuri*
    }
    $user->save();
        return redirect()->route('users.index')->with('success', 'Cadastro Atualizado :)');

    }
*/
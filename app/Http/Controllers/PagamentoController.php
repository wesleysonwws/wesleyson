<?php

namespace App\Http\Controllers;

class PagamentoController extends Controller
{
    public function index() // index – Lista os dados da tabela
    {
    // ARRAY:Os arrays são estruturas que servem para guardar dados, e organizá-los.
    // Seu objetivo é ser um espaço fixo na memória do computador que armazena elementos e fazendo a separação correta.
    $pagamento = Pagamento::orderBy('pagamento')->get(); // pegamos os pagamento utilizando o get e pegando de forma crescente 
    return view('pagamento.index') // Retornar a View pagamento.index
    ->with(compact('pagamentos')); // A função compact() é uma função embutida no PHP e é usada para criar um array usando variáveis.
    }

    public function create()  // Retorna a View para criar um item da tabela
    {
        //Tratamento para usar o mesmo formulário
        $pagamento = null; // Recebe nullo
        $tipos = Tipo::orderBy('categoria')->get();// pegamos os tipo utilizando o get e pegando de forma crescente
        return view('pagamento.form')//Retornar a View centro.form
                ->with(compact('pagamento','categoria'));// Organizando os centro de custo e tipos separados
    }

    public function store(Request $request)// Salva o novo item na tabela (Chamando Request, que contém tudo) 
    {
    $pagamento = new Pagamento(); // Adicionando o novo centro custo criado
    $pagamento->fill($request->all());// Estamos chamando o request por já possuir tudo, por isso o all                        
    $pagamento->save();// Salvando mudanças                                                                
    return redirect()->route('pagamento.index')->with('success','Cadastrado com sucesso'); 
    // return redirect também conhecido como encaminhamento de URL, é uma técnica que à uma página,
    // formulário ou uma aplicação web inteira, mais de um endereço de URL, aqui está redireceonando para rota de centro.index
    // O fill apenas preenche os atributos no model, o create cria os dados.
    // Basicamente, o create usa o fill internamente e, em seguida, chama save.
    // Se você usar o fill sem save, os registros no banco de dados não são afetados.
    }

    public function show(int $id) // Mostra um item específico, aonde selecionamos no id
    {
        $pagamento= Pagamento::find($id); // encontrar centro de custo atraves do id
        return view('pagamento.show') //return view em centro.show
                ->with(compact('pagamento')); // Organizando os centro de custo 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagamento $pagamento
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) // Retorna a View para edição do dado
    {
        $pagamento = Cent::find($id); // encontrar centro de custo atraves do id
        $categoria = Tipo::orderBy('categoria')->get(); // Pegando os Tipo
        return view('pagamento.form') // return view em centro.form
                ->with(compact('pagamento','categoria')); // Organizando os centro de custo e tipos separados
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentroCusto $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id) // Salva a atualização do dado
    {
        $centro = Pagamento::find($id); // encontrar pagamento atraves do id
        $centro->fill($request->all()); // Estamos chamando o request por já possuir tudo, por isso o all      
        $centro->save(); // Salvando mudanças

        return redirect()->route('pagamento.index')->with('success','Atualizado com sucesso');
        // return redirect também conhecido como encaminhamento de URL, é uma técnica que à uma página,
        // formulário ou uma aplicação web inteira, mais de um endereço de URL, aqui está redireceonando para rota de pagamento.index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentroCusto $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) //  Remove o dado
    {
        $centro = Pagamento::find($id); // Busca pelo Id
        $centro->delete(); // Delatar o dado

        return redirect()->route('pagamento.index')->with('danger','Excluído com sucesso'); //  aqui está redireceonando para rota de pagamento.index
    }
}

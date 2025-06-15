<?php

namespace App\Http\Controllers;

use App\Models\Senha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SenhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $senhas = Senha::paginate(10);

        $search = $request->all();
        $senhas = Senha::where(function ($query) use ($request) {
            if ($request->has('search_nome') && $request->search_nome != '') {
                $query->where('nome', 'LIKE', "%{$request->search_nome}%");
            }
        })->paginate(10);
        return view('pages.senhas.index', compact('senhas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.senhas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'servico' => 'required|array',
        'servico.*' => 'required|string|max:255',
        'senha' => 'required|array',
        'senha.*' => 'required|string|max:255',
    ]);

    foreach ($data['servico'] as $i => $servico) {
        Senha::create([
            'nome' => $servico,
            'senha' => Crypt::encryptString($data['senha'][$i]),
        ]);
    }

    return redirect()->route('senhas.index')->with('success', 'Senhas criadas com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(Senha $senha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Senha $senha)
    {
        return view('pages.senhas.edit', compact('senha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Senha $senha)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'senha' => 'required|string|max:255',
        ]);

        $senha->update([
            'nome' => $data['nome'],
            'senha' => Crypt::encryptString($data['senha']),
        ]);

        return redirect()->route('senhas.index')->with('success', 'Senha atualizada com sucesso!');
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Senha $senha)
    {
        $senha->delete();
        return redirect()->route('senhas.index')->with('error', 'Senha deletada com sucesso!');
    }
}

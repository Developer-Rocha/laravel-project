<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Clients;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insertClient(Request $request){
        
        $cliente_nome = $request->post('cliente_nome');
        $cliente_endereco = $request->post('cliente_endereco');

        $this->validate($request, [
            'cliente_nome'        => 'required|max:25',
            'cliente_endereco' => 'required',
        ]);

        $sql = new Clients([
            'nome' => $cliente_nome,
            'endereco' => $cliente_endereco
        ]);
    
        $sql->save();

        return redirect('clients');

        //dd($cliente_endereco);
    }

    public function deleteClient($id){
        
        DB::delete('DELETE FROM clientes where id = ?',[$id]);

        return redirect('clients');
    }

    public function index(){
        
        $results = Clients::all();
        return view('clients', compact('results'));
        
        //$results = DB::select('SELECT * FROM clientes');
        //return view('clients')->with('results', $results);
    }

    
}

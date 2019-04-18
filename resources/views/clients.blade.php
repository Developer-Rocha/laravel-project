@extends('layouts.app')
            @section('content')
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <!-- Formulário de submissão de dados (clientes) -->
                            <form action="{{route('insert-clients')}}" method="post">
                                @csrf
                                <label>Nome:</label>
                                <input class="form-control" type="text" name="cliente_nome">
                                <label>Endereço:</label>
                                <input class="form-control" type="text" name="cliente_endereco">

                                <input class="btn btn-primary mt-3" type="submit" value="Enviar">
                            </form>
                        </div>

                        <div class="col-md-6">
                            <!-- Tabela com o resultado da query ao BD -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Lista de Clientes</th>
                                    </tr>
                                    <tr>
                                        <th>NOME</th>
                                        <th>ENDEREÇO</th>
                                        <th>REMOVER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $result)
                                        <tr>
                                            <td>{{$result->nome}}</td>
                                            <td>{{$result->endereco}}</td>
                                            <td>
                                                <a type="button" class="btn btn-danger" href="{{ route('delete-client', $result->id) }}">Deletar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>  

                    </div>
                </div>
            @endsection


            

           
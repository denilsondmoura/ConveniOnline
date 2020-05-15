@extends('templates.moldura_professor')
@section('content')

<link rel="stylesheet" href="css/professor/minhas_indicacoes.css">

<div class="feed">

    <div class="form-visualizar">
        <div class="visualizar">

            <div class="form-title-visualizar">Minhas indicações de estágio</div>

                <div class="form-fields-visualizar"></div>

                    <table align="center">

                        <tr>
                            <th>Aluno</th>
                            <!-- <th>Matricula</th> -->
                            <th>Empresa</th>
                            <th>Área</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Plano</th>
                            <th>Frequencia</th>
                        </tr>
                        
                        @foreach ($meusEstagios as $estagio)
                            <tr align="center">
                            <td>{{ $estagio['nomeAluno'] }}</td>
                            <!-- <td>{{ $estagio['matriculaAluno'] }}</td> -->
                            <td>{{ $estagio['empresa'] }}</td>
                            <td>{{ $estagio['area'] }}</td>
                            <td>{{ $estagio['data'] }}</td>
                            @if ( $estagio['status'] === 'ae')
                                <td>Aguardando analise da empresa</td>
                            @endif
                            @if ( $estagio['status'] === 'ap')
                                <td>Aguardando analise da PREG</td>
                            @endif
                            @if ( $estagio['status'] === 'a')
                                <td>Aprovado</td>
                            @endif
                            @if ( $estagio['status'] === 'rp')
                                <td>Rejeitado pela PREG</td>
                            @endif
                            @if ( $estagio['status'] === 're')
                                <td>Rejeitado pela empresa</td>
                            @endif

                            @if ( $estagio['status'] === 'a')
                                <td>
                                    <form method="POST" action="plano_estagio">
                                        {{csrf_field() }}
                                        <button class="button-frequencia">Modificar</button>
                                        <input type="hidden" name="id" value="{{ $estagio['_id'] }}">
                                    </form>
                                </td>

                                
                                <td>
                                    <form method="POST" action="frequencia_estagio">
                                        {{csrf_field() }}
                                        <button class="button-frequencia">Gerenciar</button>
                                        <input type="hidden" name="id" value="{{ $estagio['_id'] }}">
                                    </form>
                                </td>
                            @else 
                                <td>-</td>
                                <td>-</td>
                            @endif
                               
                        @endforeach  
                    </table>
                
                <div class="end-visualizar"></div>
                
            </div>

        </div>
</div>

@endsection
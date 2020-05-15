@extends('templates.moldura_preg')
@section('content')

<link rel='stylesheet' text='text/css' media='screen' href='./css/preg/preg_estagio.css'>

<div class="form-visualizar">
    <div class="visualizar">

        <div class="form-title-visualizar">Estagios pendentes</div>

            <div class="form-fields-visualizar"></div>

            <table align="center">

                <tr>
                    <th>Aluno</th>
                    <th>Matricula</th>
                    <th>Empresa</th>
                    <th>Área</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>

                @foreach ($estagios as $estagio)
                    @if ($estagio['status'] === 'ap')

                        <tr align="center">
                        <td>{{ $estagio['nomeAluno'] }}</td>
                        <td>{{ $estagio['matriculaAluno'] }}</td>
                        <td>{{ $estagio['empresa'] }}</td>
                        <td>{{ $estagio['area'] }}</td>
                        <td>{{ $estagio['data'] }}</td>
                        <td>
                            <button class="button-deferir-indeferir" onclick="mostrar_pop_up()">Ver termo</button>
                        </tr>
                        
                        <form action="validar_estagio" method="post">
                            {{csrf_field() }}

                            <div class="modal" id="modal">

                                <div class="modal-title">Termo de Estágio</div>
                                <div class="modal-content">
                                {{ $estagio['termo'] }}
                                </div>

                                <div class="modal-radio">

                                    <input class="justificativa-radio" id="Aceitar" type="radio" name="radio" checked value="Aceitar" required>
                                    <label for="Aceitar">Aceitar</label>

                                    <input class="justificativa-radio" id="Rejeitar" type="radio" name="radio" value="Rejeitar" required>
                                    <label for="Rejeitar">Rejeitar</label>
                    
                                </div>

                                <input  type="hidden" name="id" value="{{ $estagio['_id'] }}">

                                <div class="modal-buttom">

                                    <input class="justificativa-submit" type="submit" value="Confirmar">
                                    <input class="justificativa-fechar" value="Fechar" onclick="ocultar_pop_up()">
                    
                                </div>
                            </div>
                        </form>
                    @endif
                @endforeach  
                </table>
    </div>
</div>

<script type="text/javascript" src="js/visualizar_solicitacao_preg.js"></script>

@endsection

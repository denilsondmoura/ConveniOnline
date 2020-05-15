@extends('templates.moldura_preg')
@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='./css/preg/visualizar_solicitacao_preg.css'>

<div class="form-visualizar">
<div class="visualizar">

    <div class="form-title-visualizar">Solicitações de Convênio</div>

        <div class="form-fields-visualizar"></div>

            <table align="center">

                <tr>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Endereço</th>
                    <th>CEP</th>
                    <th>Ação</th>
                </tr>
                
                @foreach ($dados as $dado)
                    @if ($dado['status'] === 'a')
                        <tr align="center">
                        <td>{{ $dado['rsocial'] }}</td>
                        <td>{{ $dado['cnpj'] }}</td>
                        <td>{{ $dado['endereco'] }}</td>
                        <td>{{ $dado['cep'] }}</td>
                        <td>
                            <a href="deferir/{{ $dado['_id'] }}"><button class="button-deferir-indeferir">Deferir</button></a>
                            <button class="button-deferir-indeferir" onclick="mostrar_pop_up()">Indeferir</button>
                        </tr>
                    <form action="indeferir" method="post">
                        {{csrf_field() }}

                        <div class="modal" id="modal">

                            <div class="modal-title">Justificativa</div>

                            <textarea class="modal-input" scroll='no'  name="modal_input" id="" cols="30" rows="10"></textarea>
                            <input  type="hidden" name="id" value="{{ $dado['_id'] }}">

                            <div class="modal-buttom">
                                <input class="justificativa-submit" type="submit" value="Salvar">
                                <input class="justificativa-fechar" value="Fechar" onclick="ocultar_pop_up()">
                            </div>
                        </div>
                    </form>
                    @endif
                
                @endforeach  

            </table>
        
        <div class="end-visualizar"></div>
        
    </div>

</div>

<script type="text/javascript" src="js/visualizar_solicitacao_preg.js"></script>
        
@endsection

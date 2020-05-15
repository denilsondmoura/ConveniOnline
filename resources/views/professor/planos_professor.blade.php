@extends('templates.moldura_professor')
@section('content')

<link rel="stylesheet" href="css/professor/minhas_indicacoes.css">

<div class="form-visualizar">
    <div class="visualizar">

        <div class="form-title-visualizar">
        <span style="float: left; display: inline-block;">Plano de Estágio ({{ $nomeEstagiario }}) - Nota: {{ $planoAtual['notas'] }}</span>

            <form method="POST" action="att_plano_nota">
                {{csrf_field() }}
                <input class="form-submit" type="submit" value="Aprovar" style="float: right;">
            </form>
            <form method="POST" action="att_plano_nota">
                {{csrf_field() }}
                <input class="form-submit" type="submit" value="Reprovar" style="float: right; background-color: gray; border: 1px solid gray">
            </form>
        </div>

        <div class="form-fields-visualizar"></div>

        <table align="center">
            <tr>
                <th>Descrição</th>
                <th>Data</th>
            </tr>
            @if (sizeof($minhasAtividades) != 0)            
                @foreach ($minhasAtividades as $atividade)
                    <tr>
                        <td align="left">
                            {{ $atividade['desc_atividade'] }}
                        </td>
                        <td align="center">
                            {{ $atividade['data'] }}
                        </td>
                    </tr>                    
                @endforeach     
                             
            @endif
            
        </table>

        <div class="end-visualizar"></div>
        
    </div>

</div>
@endsection
@extends('templates.moldura_supervisor')
@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='./css/supervisor/frequencia.css'>

<div class="form-visualizar">
    <div class="visualizar">

        <div class="form-title-visualizar">
            Frequência ({{$estagiario['nomeAluno']}})
        </div>

        <div class="form-fields-visualizar"></div>

            <form method="POST" action="salvar_frequencia">
                {{csrf_field() }}

                <input type="hidden" name="nome_estagiario" value="{{ $estagiario['nomeAluno'] }}">
                <input type="hidden" name="inicio_semana" value="{{$datas['segunda']}}">
                <table align="center">

                    <tr>
                        <th>Data</th>
                        <th>Dia da semana</th>
                        <th>Presença</th>
                        <th>Falta</th>
                    </tr>
                    
                    <tr align="center">
                        
                        <td>{{$datas['segunda']}}</td>

                        <td>Segunda-feira</td>
                        <input type="hidden" name="data_segunda" value="{{$datas['segunda']}}">
                        <td><input class="radio-frequencia" type="radio" name="segunda" checked></td>
                        <td><input class="radio-frequencia" type="radio" name="segunda" value='of'></td>

                    </tr>

                    <tr align="center">
                        <td>{{$datas['terca']}}</td>
                        <td>Terça-feira</td>
                        <input type="hidden" name="data_terca" value="{{$datas['terca']}}">
                        <td><input class="radio-frequencia" type="radio" name="terca" checked></td>
                        <td><input class="radio-frequencia" type="radio" name="terca" value='of'></td>
                    </tr>

                    <tr align="center">
                        <td>{{$datas['quarta']}}</td>
                        <td>Quarta-feira</td>
                        <input type="hidden" name="data_quarta" value="{{$datas['quarta']}}">
                        <td><input class="radio-frequencia" type="radio" name="quarta" checked></td>
                        <td><input class="radio-frequencia" type="radio" name="quarta" value='of'></td>
                    </tr>

                    <tr align="center">
                        <td>{{$datas['quinta']}}</td>
                        <td>Quinta-feira</td>
                        <input type="hidden" name="data_quinta" value="{{$datas['quinta']}}">
                        <td><input class="radio-frequencia" type="radio" name="quinta" checked></td>
                        <td><input class="radio-frequencia" type="radio" name="quinta" value='of'></td>
                    </tr>

                    <tr align="center">
                        <td>{{$datas['sexta']}}</td>
                        <td>Sexta-feira</td>
                        <input type="hidden" name="data_sexta" value="{{$datas['sexta']}}">
                        <td><input class="radio-frequencia" type="radio" name="sexta" checked></td>
                        <td><input class="radio-frequencia" type="radio" name="sexta" value='of'></td>
                    </tr>
                
                </table>
                <a href="supervisionar">
                    <input class="form-submit" type="submit" value="Salvar">
                </a>
            </form>
            

        <div class="end-visualizar"></div>
        
    </div>

</div>
        
@endsection

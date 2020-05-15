@extends('templates.moldura_preg')

@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='./css/preg/usuarios.css'>

<div class="form-visualizar">
<div class="visualizar">

<div class="novo-usuario">
    <a href="cadastro_usuario"><button class="button-novo-usuario">Novo Usuário</button></a>
</div>

    <div class="form-title-visualizar">
        Usuários
    </div>

        <div class="form-fields-visualizar"></div>

            <table align="center">

                <tr>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                </tr>
                
                @foreach ($dados as $dado)
                        @if ($dado['tipo'] === 'preg' || $dado['tipo'] === 'empr' || $dado['tipo'] === 'prof')
                    
                        <tr align="center">
                        <td>{{ $dado['nome'] }}</td>
                        <td>{{ $dado['usuario'] }}</td>
                        <td>{{ $dado['email'] }}</td>

                            @if ($dado['tipo'] === 'preg')
                                <td>PREG</td>
                            @endif

                            @if ($dado['tipo'] === 'empr')
                                <td>EMPRESA</td>
                            @endif

                            @if ($dado['tipo'] === 'prof')
                                <td>PROFESSOR</td>
                            @endif

                        @endif
                
                @endforeach

            </table>
        
        <div class="end-visualizar"></div>
        
    </div>

</div>
        
@endsection

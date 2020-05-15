@extends('templates.moldura_empresa')
@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='./css/empresa/supervisor.css'>

<div class="form-visualizar">
<div class="visualizar">

<div class="novo-usuario">
    <a href="cadastro_supervisor">
        <button class="button-novo-usuario">Novo Supervisor</button>
    </a>
</div>

    <div class="form-title-visualizar">
        Supervisores
    </div>
    
        <div class="form-fields-visualizar"></div>

            <table align="center">

                <tr>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Área</th>
                </tr>
                
                @foreach ($supervisores as $supervisor)
                        
                        <tr align="center">
                        <td>{{ $supervisor['nome'] }}</td>
                        <td>{{ $supervisor['usuario'] }}</td>
                        <td>{{ $supervisor['email'] }}</td>
                        <td>{{ $supervisor['area'] }}</td>
                
                @endforeach

            </table>
        
        <div class="end-visualizar"></div>
        
    </div>

</div>
        
@endsection

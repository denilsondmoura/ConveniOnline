@extends('templates.moldura_professor')
@section('content')

<link rel="stylesheet" href="css/professor/nova_indicacao_areas.css">

<div class="painel" >
    <div class="aba_header">
        <div class="aba" id="aba_active" >Setor</div>
        <div class="aba" >Empresa</div>
        <div class="aba" >Aluno</div>
        <div class="aba">Termo de estágio</div>
    </div>
    <div class="aba_content" id="active">
        <div class="aba_title">
            Escolha uma área para o estágio 
        </div>

        <div class="aba_options" id="active">
            <form action="nova_indicacao_empresas" method="post">
            {{csrf_field() }}

                <ul>
                
                @foreach ($areas as $area)
                    <li align="left">
                        <input id="{{ $area }}" type="radio" name="radio" value="{{ $area }}" required required-message="Selecione uma área">
                        <label for="{{ $area }}">{{ $area }}</label>
                    </li>

                @endforeach
                </ul>
            
        </div>
        <div class="aba_button">
            <input type="hidden" name="aba" value="">
            <input class="form-submit" type="submit" value="Próximo">
        </div>
        </form>

    </div>
    
</div>
<script src="js/nova_indicacao.js"></script>

@endsection

@extends('templates.moldura_professor')
@section('content')

<link rel="stylesheet" href="css/professor/nova_indicacao_empresas.css">

<div class="painel" >
    <div class="aba_header">
        <div class="aba" >Setor</div>
        <div class="aba" id="aba_active">Empresa</div>
        <div class="aba" >Aluno</div>
        <div class="aba">Termo de estágio</div>
    </div>
    <div class="aba_content" id="active">
        <div class="aba_title">
            Selecione a empresa desejada 

        </div>

        <div class="aba_options" id="active">
            <form action="nova_indicacao_alunos" method="post">
            {{csrf_field() }}

                <ul>
                    @foreach ($empresas as $empresa)
                        <li align="left">
                            <input id="{{ $empresa }}" type="radio" name="radio" value="{{ $empresa }} " required  required-message="Selecione uma área">
                            <label for="{{ $empresa }}">{{ $empresa }}</label>
                        </li>
                    @endforeach
                </ul>
            
        </div>
        <div class="aba_button">
            <input type="hidden" name="aba" value="">
            <input class="form-submit" type="submit" value="Próximo">
            </form>
            <a href="nova_indicacao_areas"><button class="form-submit" >Voltar</button> </a>
        </div>
    </div>
    
</div>
<script src="js/nova_indicacao.js"></script>

@endsection

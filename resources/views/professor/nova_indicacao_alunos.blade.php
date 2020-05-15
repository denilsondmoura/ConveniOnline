@extends('templates.moldura_professor')
@section('content')

<link rel="stylesheet" href="css/professor/nova_indicacao_alunos.css">

<div class="painel" >
    <div class="aba_header">
        <div class="aba" >Setor</div>
        <div class="aba" >Empresa</div>
        <div class="aba" id="aba_active">Aluno</div>
        <div class="aba">Termo de estágio</div>
    </div>
    <div class="aba_content" id="active">
        <div class="aba_title">
            Insira as informações do aluno 
        </div>

        <div class="aba_form" id="active">
            <form action="nova_indicacao_termo" method="post">
            {{csrf_field() }}

           
            <div class="form_field-12">
                <div class="form_field_label">
                    Nome:
                </div>
                <div class="form_field_input">
                    <input type="text" name="nome" autofocus minlength="20" required>
                </div>
            </div>

            <div class="form_field-6">
                <div class="form_field_label">
                Matricula:
                </div>
                <div class="form_field_input">
                    <input type="text" name="matricula" minlength="7" maxlength="7" required>
                </div>
            </div>

            <div class="form_field-6">
                <div class="form_field_label">
                Email:
                </div>
                <div class="form_field_input">
                    <input type="email" name="email" required>
                </div>
            </div>
            
        </div>
        <div class="aba_button">
            <input class="form-submit" type="submit" value="Próximo">
            </form>
            <a href="nova_indicacao_empresas2"><button class="form-submit">Voltar</button> </a>
        </div>
            
    </div>
    
</div>
<script src="js/nova_indicacao.js"></script>

@endsection

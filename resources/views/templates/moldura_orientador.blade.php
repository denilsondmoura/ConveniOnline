<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ConvêniOnline - UESPI</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/template/moldura_orientador.css'>

</head>
<body>
   <div class="container">
       <header class="h-eader">
            <div class="logo">
                <a href="https://www.uespi.br/site/" target="_blank"> <img src="image/logo-uespi.png" width="208" height="80"></a>
            </div>
            <a href="inicio_orientador">
                <div class="title">
                    ConvêniOnline
                </div>
            </a>
       </header>
       
           
       <div class="all-white">
           <div class="menu-bar">
                <div class="inner-menu-bar">
                    <ul>
                        <a href="inicio_orientador"><li>Início</li></a>
                        <a href="login"><li class="exit">Sair</li></a>
                    </ul>       
                </div>
            </div>

            <div class="all-white-menu">
                @yield('content')
            </div>

            <footer>
                <div class="footer" >
                    <h6 align="center">NPD - Núcleo de Processamento de dados. <br/> 
                    Em caso de problemas entre em contato pelo E-mail fullstackof@gmail.com<br/> 
                    lembrando sempre de informar seu usuário.<br />
                    © 2019 Universidade Estadual do Piauí - UESPI. Todos os direitos reservados.
                    </h6>		  
                    <p></p>  
                </div>
            </footer>

       </div>

    </div>
</body>
</html>

<?php
include_once './base_dir.php';
include_once DIR_UTIL . 'Define.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet">

        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <title>Entrevista</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
            <a class="navbar-brand" href="#">Entrevista - Desenvolvimento Canoastec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="visao/GuiCadastroUsuario.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="visao/GuiUsuarios.php">Lista de Usuáris</a>
                </li>
                </ul>
            </div>
    </nav>
        

        <div class="conteudo">

            <div class="conteudo-instrucao">
                <h2>Instruções</h2>
                <p><strong>Configurações antes de codificar</strong></p>
                <p><input type="checkbox" checked=true onclick="return false;">1 - No arquivo 'DeefineCredenciais.php' definir as variaveis de acordo com as configurações do seu banco de dados local.</p>
                <p><input type="checkbox" checked=true onclick="return false;">2 - Criar um banco de dados chamado entrevista.</p>
                <p><input type="checkbox" checked=true onclick="return false;">3 - Importar os dados do arquivo 'entrevista.sql'.</p>
                <p><strong>Modificar Tela de Listagem de Usuários</strong></p>
                <p><input type="checkbox" checked=true onclick="return false;">1 - Exibir a data de cadastro no formato DD/MM/AAAA</p>
                <p><input type="checkbox" checked=true onclick="return false;">2 - Ter uma coluna de ações, com botões para editar e deletar</p>
                <p><input type="checkbox" checked=true onclick="return false;">3 - Em caso de não trazer registro, ter uma mensagem "nenhum registro encontrado" e não exibir a mensagem</p>
                <p>4 - Criar uma area de filtro, que possa buscar por nome e cpf</p>
                <p><input type="checkbox" checked=true onclick="return false;">5 - Exibir CPF no padrão ###.###.###-##</p>
                <br>
                <p><strong>Modificar Tela de Cadastro de Usuários</strong></p>
                <p>1 - Criar validação para não permitir salvar sem preencher todos os campos</p>
                <p><input type="checkbox" checked=true onclick="return false;">2 - Após salvar redirecionar para tela de listagem, e mostrar mensagem de sucesso.</p>
                <br>
                <p><strong>Novas Funcionalidades</strong></p>
                <p><input type="checkbox" checked=true onclick="return false;">1 - Possibilitar deletar registro</p>
                <p><input type="checkbox" checked=true onclick="return false;">2 - Possibilitar edição dos dados.</p>
                <p><input type="checkbox" checked=true onclick="return false;">3 - Criar menu com acesso as telas de cadastro e listagem.</p>
                <br>
                <p><strong>Melhorias não obrigatórias - Ponto Extra</strong>
                <p><input type="checkbox" checked=true onclick="return false;">1 - Exibir na listagem o perfil do usuário</p>
                <p><input type="checkbox" checked=true onclick="return false;">2 - Incluir e usar a biblioteca Bootstrap ou Materialize</p>
                <p>3 - Incluir e usar a biblioteca Jquery</p>
                <p>4 - Criar CRUD de perfil e fazer o relacionamento com usuário</p>
                <p><input type="checkbox" checked=true onclick="return false;"> 5 - Nesta tela de instruções, criar checkbox para marcar que a tarefa foi concluida e salvar este estado sem usar a session do PHP e nem o banco de dados.</p>
            </div>

        </div>
    </body>
</html>

<style>
       
    .conteudo {    
        margin: 2em auto;
        width: 60%;
    }

    .conteudo-instrucao{
        border: 1px solid #ddd;
        border-top-left-radius: 1em;
        border-top-right-radius: 1em;
    }

    .conteudo-instrucao h2 {   
        margin-top: 0;
        border-top: 1em solid  #f8f8f8;
        border-bottom: 1em solid  #f8f8f8;
        border-top-left-radius: 0.7em;
        border-top-right-radius: 0.7em;
        background-color: #f8f8f8;
    }
    
    .conteudo-instrucao p {    
        padding: 0 1em;
    }

</style>

<script language="javascript">
    $(document).ready(function()
    {
        $('input[type=checkbox]').attr("readonly", true);
    });

</script>
<?php
include_once '../base_dir.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new UsuarioDAO();
            return $dao->listar();

        case 'salvar':
            $usuario = new UsuarioVO();
            $usuario->setNmUsuario($_POST['nm_usuario']);
            $usuario->setNrCpf($_POST['nr_cpf']);
            $usuario->setDsEmail($_POST['ds_email']);
            $usuario->setDsLogin($_POST['ds_login']);
            $usuario->setPwSenha($_POST['pw_senha']);
            $usuario->setIdPerfil($_POST['id_perfil']);
            $usuario->setAoStatus($_POST['ao_status']);
            $usuario->setIdUsuarioinclusao(1);
            $usuario->setIdUsuarioalteracao(1);
            $usuario->setDtCadastro(date('Y-m-d H:i'));
            $usuario->setDtAlteracao(date('Y-m-d H:i'));

            $dao = new UsuarioDAO();
            $dao->cadastrar($usuario);

            header('location: ../visao/GuiUsuarios.php');
            break;

        case 'editar':

            $u = new UsuarioVO();

            $u->setNmUsuario($_POST['us_nome']);
            $u->setIdUsuario($_POST['id_usuario']);
            $u->setNrCpf($_POST['us_cpf']);
            $u->setDsEmail($_POST['us_email']);
            $u->setIdPerfil($_POST['ao_status']);
            $u->setIdPerfil($_POST['us_perfil']);
            
            $dao = new UsuarioDao();
            $dao->editar($u);

            header('location: ../visao/GuiUsuarios.php');
    
            break;
        
        case 'excluir':

            $id = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);

            $dao = new UsuarioDAO();

            $dao->deletar($id);

            header('location: ../visao/GuiUsuarios.php');
            break;

        case 'pesquisar':
            $u = new UsuarioVO();

            $u->setNmUsuario($_POST['user_nome']);
            $u->setNrCpf($_POST['user_cpf']);


            $dao = new UsuarioDAO();
            $dao->pesquisarNomeCpf($u);
            break;

    }
} catch (Exception $exception) {
    die('Erro');
}


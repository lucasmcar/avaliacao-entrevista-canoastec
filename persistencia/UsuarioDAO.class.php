<?php

include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';


class UsuarioDAO {
    
    private $conexao = null;
    
    function __construct() {
    }
    
    function listar($filtros = '') {
        try{
            $query = ("SELECT * FROM usuario u WHERE 1=1 $filtros ORDER BY u.nm_usuario ASC");
            $this->conexao = Conexao::connect()->query($query);
            
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);
            
            $usuarios = array();

            foreach ($array as $obj) {

                $usuario = new UsuarioVO();
                $usuario->setIdUsuario($obj['id_usuario']);
                $usuario->setNmUsuario($obj['nm_usuario']);
                $usuario->setNrCpf($obj['nr_cpf']);
                $usuario->setDsEmail($obj['ds_email']);
                $usuario->setDsLogin($obj['ds_login']);
                $usuario->setPwSenha($obj['pw_senha']);
                $usuario->setIdPerfil($obj['id_perfil']);
                $usuario->setAoStatus($obj['ao_status']);
                $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
                $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
                $usuario->setDtCadastro($obj['dt_cadastro']);
                $usuario->setDtAlteracao($obj['dt_alteracao']);
                $usuarios[] = $usuario;

            }
            $this->conexao = null;
            return $usuarios;
        }catch(Exception $e){
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }

    //Pesquisa

    function pesquisar() {

        $nome = filter_input(INPUT_GET, 'u_nome');
        $cpf = filter_input(INPUT_GET, 'u_cpf');

        try{
            $query = ("SELECT * FROM usuario u WHERE u.nm_usuario = :nome AND u.nr_cpf = :cpf");
            $this->conexao = Conexao::connect()->query($query);
            $this->conexao->bindParam(':nome', $nome);
            $this->conexao->bindParam(':cpf', $cpf);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);
            
            $usuarios = array();

            foreach ($array as $obj) {

                $usuario = new UsuarioVO();
                $usuario->setIdUsuario($obj['id_usuario']);
                $usuario->setNmUsuario($obj['nm_usuario']);
                $usuario->setNrCpf($obj['nr_cpf']);
                $usuario->setDsEmail($obj['ds_email']);
                $usuario->setDsLogin($obj['ds_login']);
                $usuario->setPwSenha($obj['pw_senha']);
                $usuario->setIdPerfil($obj['id_perfil']);
                $usuario->setAoStatus($obj['ao_status']);
                $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
                $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
                $usuario->setDtCadastro($obj['dt_cadastro']);
                $usuario->setDtAlteracao($obj['dt_alteracao']);
                $usuarios[] = $usuario;

            }
            $this->conexao = null;
            return $usuarios;
        }catch(Exception $e){
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }

    function cadastrar(UsuarioVO $usuario){
        try{

            $sql = "
                INSERT INTO usuario(
                    nm_usuario,
                    ds_email,
                    nr_cpf,
                    ds_login,
                    pw_senha,
                    id_perfil,
                    ao_status,
                    id_usuarioinclusao,
                    id_usuarioalteracao,
                    dt_cadastro,
                    dt_alteracao
                )VALUES(
                    '{$usuario->getNmUsuario()}',
                    '{$usuario->getDsEmail()}',
                    '{$usuario->getNrCpf()}',
                    '{$usuario->getDsLogin()}',
                    '{$usuario->getPwSenha()}',
                    '{$usuario->getIdPerfil()}',
                    '{$usuario->getAoStatus()}',
                    '{$usuario->getIdUsuarioInclusao()}',
                    '{$usuario->getIdUsuarioAlteracao()}',
                    now(),
                    now()
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();

            $count = $this->conexao->rowCount();
            if($count > 0) 
            {
                
               header('location: ../visao/GuiUsuarios.php');
               
            }
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar o Usuario";
            return false;
        }
    }

    function deletar($id)
    {
        $sql = "
            DELETE 
            FROM
                usuario
            WHERE
            id_usuario = 
                :id
            ";
        try
        {
            
            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->bindParam(':id', $id, PDO::PARAM_INT);
            $this->conexao->execute();
            
            header('location: ../visao/GuiUsuarios.php');
            
            $this->conexao = null;
        }
        catch(Exception $e)
        {
            echo 'Não foi possível excluir usuário';
        }
    }

    function editar($id)
    {
        $sql = "
            UPDATE
                entrevista
            SET
            WHERE id_usuario =
            :id
        ";
        $this->conexao = Conexao::connect()->prepare($sql);
        $this->conexao->bindParam(':id', $id, PDO::PARAM_INT);

    }


}

<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once '../modelo/UsuarioVO.class.php';

$dao = new UsuarioDAO();
?>

<div class="container">


        <form>
            <div class="form-group">
                <label>Pesquisar: </label>
                <input type="text" class="form-control" placeholder="Pesquisar por CPF ou Nome">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary">Pesquisar</button>
            </div>
        </form>
    

    
        <?php if($dao->listar() == null) {?>
            <div role="alert" class="alert alert-primary">Nenhum registro encontrado</div>
        <?php } else {?>
        <div style="margin: 0.5em auto;width:100%;">
        <table class="table table-striped ">
            <thead class="bg-nav">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Status</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                

                <?php foreach ($dao->listar() as $usuario) { ?>
                <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=$usuario->getNrCpf();?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td>
                        <?php if($usuario->getIdPerfil() == 1) { ?> 
                            Adminsitrador
                        <?php } else if($usuario->getIdPerfil() == 2) { ?>
                            Atendente
                        <?php } else if($usuario->getIdPerfil() == 3){ ?>
                            Desenvolvedor
                        <?php }  ?>
                    
                    </td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=date("d/m/Y", strtotime($usuario->getDtCadastro()));?></td>
                    <td><a href="" class="btn btn-success">Editar</a> | <a href="../controle/ControleUsuario.php?op=excluir" class="btn btn-danger">Deletar</a></td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }
</style>    
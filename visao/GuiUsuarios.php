<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once '../modelo/UsuarioVO.class.php';

$dao = new UsuarioDAO();
?>

<div class="container">

    <input type="text">

    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
        <table class="table">
            <thead>
                <tr>
                    <th width="35%">Nome</th>
                    <th width="10%">CPF</th>
                    <th width="35%">Email</th>
                    <th width="8%">Status</th>
                    <th width="40%">Data de Cadastro</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                if(count($dao->listar()) <= 0 ) {?>
                        <div role="alert" class="alert alert-primary">Nenhum registro encontrado</div>
                <?php } ?>

                <?php foreach ($dao->listar() as $usuario) { ?>
                <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=$usuario->getNrCpf(), '###.###.###-##';?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=date("d/m/Y", strtotime($usuario->getDtCadastro()));?></td>
                    <td></td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }
</style>    
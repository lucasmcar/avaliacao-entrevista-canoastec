<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once '../modelo/UsuarioVO.class.php';

$dao = new UsuarioDAO();
?>

<div class="container">


    <form id="searchForm" method="GET" action="#">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" name='u_nome' id="inputNome">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCpf">CPF</label>
                    <input type="text" name="u_cpf" class="form-control" id="inputCpf">

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
           
    <form>





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
                    <td><a href="" class="btn btn-success">Editar</a> | <a href="../controle/ControleUsuario.php?op=excluir&id_usuario=<?php echo $usuario->getIdUsuario(); ?>" class="btn btn-danger">Deletar</a></td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>

    
        

    </div>


<!--modal-->
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'GET') 
    { 
        
        foreach ($dao->pesquisar() as $usuario) { 
?>

        <div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=$usuario->getNmUsuario()?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
<?php } } ?>

<?php include_once 'Footer.php'; ?>
<script type="text/javascript" src="../js/jquery.js"></script>
<script language="javascript">

</script>
<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }

    #mostraRsultado
    {
        display: none;
    }
</style>    
<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once '../modelo/UsuarioVO.class.php';

$dao = new UsuarioDAO();
$id = $_GET['id_usuario']; 
?>
<!DOCTYPE html>
<html>
<body>

<div class="container box-radius">

    <h2>Editar Dados</h2>
    <hr class="hr">
        
        <form action="../controle/ControleUsuario.php?op=editar&id_usuario=<?= $_GET['id_usuario']?>" method="POST">
        <?php if(isset($_GET['id_usuario'])) { ?>
            <div class="form-row">
                <?php foreach($dao->listar() as $usuario ) { ; ?>
                    
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" name='us_nome' id="inputNome" value="<?= $usuario->getNmUsuario(); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="iptCpf">CPF</label>
                        <input type="text" name="us_cpf" class="form-control" id="inputCpf" value="<?= $usuario->getNrCpf();?>" >

                    </div>
                    <div class="form-group col-md-6">
                        <label for="iptEmai">Email</label>
                        <input type="text" name="us_email" class="form-control" id="iptEmail" value="<?= $usuario->getDsEmail(); ?>">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="iptPerfil">Perfil</label>
                        <select name="us_perfil" class="form-control">
                        <?php 
                            if($usuario->getIdPerfil() == 1) {
                                print_r($usuario->getIdPerfil()) ;
                        ?>
                            <option value="2">Atendente</option>
                            <option value="3">Desenvolvedor</option>
                        <?php } else if($usuario->getIdPerfil() == 2 ) { ?>
                            <option value="1">Administrador</option>
                            <option value="3">Desenvolvedor</option>
                        <?php }  else {?>
                            <option value="1">Administrador</option>
                            <option value="2">Atendente</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    <input type="hidden" name="id_usuario" value="<?= $usuario->getIdUsuario() ?>">
                    <button class="btn btn-primary" type="submit" name="editar">Atualizar</button>
                    </div>
                    
                    <?php } ?>

            </div>
            
            <?php } ?>
        </form>W
</div>  
</body>
</html>
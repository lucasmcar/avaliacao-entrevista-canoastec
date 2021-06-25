<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once '../modelo/UsuarioVO.class.php';

$dao = new UsuarioDAO();
?>

<div class="container box-radius mb-5">
<h2>Pesquisar</h2>
<hr>
  <form id="searchForm" method="POST" action="../controle/ControleUsuario.php?op=pesquisar">
      <div class="form-row">
        <div class="form-group col-md-6">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" name='user_nome' id="inputNome">
            </div>
            <div class="form-group col-md-6">
                <label for="iptCpf">CPF</label>
                <input type="text" name="user_cpf" class="form-control" id="inputCpf"  >
            </div>
            <div class="form-group col-md-6">
                 <button type="submit" name="btn_pesquisar" class="btn btn-outline-primary">Pesquisar</button>
            </div>
      </div>
  <form>

  <?php if($dao->pesquisarNomeCpf() > 0) { ?>
  <div class="container">
        <table class="table table-striped table-responsive">
            <thead class="bg-nav">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Status</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>

            <tbody>
                
                <?php foreach ($dao->listar() as $usuario) { ?>
                <tr>
                    <td>
                          <?=$usuario->getNmUsuario();?>
                    </td>
                    <td><?=$usuario->getNrCpf();?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td>
                        <?php if($usuario->getIdPerfil() == 1) { ?> 
                            Administrador
                        <?php } else if($usuario->getIdPerfil() == 2) { ?>
                            Atendente
                        <?php } else if($usuario->getIdPerfil() == 3){ ?>
                            Desenvolvedor
                        <?php }  ?>
                    
                    </td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=date("d/m/Y", strtotime($usuario->getDtCadastro()));?></td>
                    
  <?php } } ?>

  
</div>


<div class="container">
        <table class="table table-striped table-responsive">
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
                    <td>
                          <?=$usuario->getNmUsuario();?>
                    </td>
                    <td><?=$usuario->getNrCpf();?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td>
                        <?php if($usuario->getIdPerfil() == 1) { ?> 
                            Administrador
                        <?php } else if($usuario->getIdPerfil() == 2) { ?>
                            Atendente
                        <?php } else if($usuario->getIdPerfil() == 3){ ?>
                            Desenvolvedor
                        <?php }  ?>
                    
                    </td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=date("d/m/Y", strtotime($usuario->getDtCadastro()));?></td>
                    <td><a href="../visao/GuiAtualizaUsuario.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>" class="btn btn-success">Editar</a> | <a href="../controle/ControleUsuario.php?op=excluir&id_usuario=<?php echo $usuario->getIdUsuario(); ?>" class="btn btn-danger">Deletar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

</div>

<?php include_once 'Footer.php'; ?>
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
<?php
include_once './Header.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';

?>


<main class="container" id="app">
    
    <form method="POST"  action="../controle/ControleUsuario.php?op=salvar">

        <div class="form-group">
            <label>Nome</label>
            <input type="text"  class="form-control " name="nm_usuario" id="nm_usuario" value="">
        </div>
        <div class="form-group">
            <label>CPF</label>
            <input type="text"  class="form-control" name="nr_cpf" id="nr_cpf" value="">
        </div>
    
        <div class="form-group">
            <label>Login</label>
            <input type="text"  class="form-control " name="ds_login" id="ds_login" value="">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password"  class="form-control" name="pw_senha" id="pw_senha" value="">
        </div>
    
        <div class="form-group">
            <label>Email</label>
            <input type="text"  class="form-control" name="ds_email" id="ds_email" value="">
        </div>
        <div class="form-group">
        <label>Perfil</label>
            <select class="form-control" name="id_perfil" id="id_perfil">
                <option value="1">Administrador</option>
                <option value="2">Atendente</option>
                <option value="3">Desenvolvedor</option>
            </select>
        </div>
    
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ao_status" id="ao_status" value="1">
                Ativo ?
            </label>
        </div>
    
        <div class="form-group">
            <button type="submit" id="btnCadastrar" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-danger">Voltar</button>
        </div>
        
    </form>
    
</main>

<?php
include_once 'Footer.php';
?>


<style>
    .formulario-campos{
        margin: 1em 30%;
    }

    .botoes{
        float: right;
        margin: 3em 47%;
    }
</style>
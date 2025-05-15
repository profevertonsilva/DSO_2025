<a href="/dashboard/usuarios/cadastro">Adicionar Usuário</a>
<table>
    <tr>
        <td>#</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Status</td>
        <td>Ações</td>
    </tr>
    <?php
        foreach($this->getView()->usuarios as $usuario){
    ?>
    <tr>
        <td><?=$usuario->__get('id');?></td>
        <td><?=$usuario->__get('nome');?></td>
        <td><?=$usuario->__get('email');?></td>
        <td><?=$usuario->__get('status');?></td>
        <td><a href="/dashboard/usuarios/editar/<?=$usuario->__get('id');?>">Editar</td>
        <td><a href="/dashboard/usuarios/excluir/<?=$usuario->__get('id');?>" onclick="confirm('Tem certeza que quer exclir o usuário?')">Excluir</td>
    </tr>
    <?php } ?>
</table>
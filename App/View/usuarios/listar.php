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
        <td><a href="/editar/<?=$usuario->__get('id');?>">Editar</td>
    </tr>
    <?php } ?>
</table>
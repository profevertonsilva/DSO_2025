<form action="/dashboard/usuarios/alterar" method="POST">
<label>Nome</label>
<input type="text" id="nome" name="nome" value="<?= $this->getView()->usuarios->__get('nome');?>" required>
<label>Email</label>
<input type="text" id="email" name="email" value="<?= $this->getView()->usuarios->__get('email');?>" required>
<label>Senha</label>
<input type="password" id="senha" name="senha" value="<?= $this->getView()->usuarios->__get('senha');?>" required>
<label>Status</label>
<select name="status" id="status" >
    <option value="" selected>Selecione o Status</option>
    <option value="A"<?= ($this->getView()->usuarios->__get('status') == "A") ? "selected" : ""; ?>>Ativo</option>
    <option value="I"<?php if($this->getView()->usuarios->__get('status') == "I") echo "selected";?>>Inativo</option>
</select>
<input type="hidden" id="id" name="id" value="<?= $this->getView()->usuarios->__get('id');?>">
<input type="submit" value="Alterar">
</form>
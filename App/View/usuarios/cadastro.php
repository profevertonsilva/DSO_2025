<form action="/cadastrar" method="POST">
<label>Nome</label>
<input type="text" id="nome" name="nome" required>
<label>Email</label>
<input type="text" id="email" name="email" required>
<label>Senha</label>
<input type="password" id="senha" name="senha" required>
<label>Status</label>
<select name="status" id="status" >
    <option value="" selected>Selecione o Status</option>
    <option value="A">Ativo</option>
    <option value="I">Inativo</option>
</select>
<input type="submit" value="Cadastrar">
</form>
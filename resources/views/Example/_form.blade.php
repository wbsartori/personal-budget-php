<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?= $dados['id'] ?? '' ?>" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Nome completo:</label>
            <input type="text" class="form-control" maxlength="100" id="name" name="name"
                   value="<?= $dados['name'] ?? '' ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="birthDate">Data de nascimento:</label>
            <input type="date" class="form-control" maxlength="100" id="birthDate" name="birthDate"
                   value="<?= $dados['birthDate'] ?? '' ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group">
        <label for="gender">Genêro:</label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender">
            <option value="<?= $dados['gender'] ?>" selected><?= $dados['gender'] ?? '' ?></option>
            <option>--------</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <!--            --><?php //foreach ($estado as $item){?>
            <!--                <option value="--><?php //echo $item['codigo_ibge']?><!--">-->
            <?php //echo $item['descricao']?><!--</option>-->
            <!--            --><?php //} ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" maxlength="100" id="email" name="email"
                   value="<?= $dados['email'] ?? '' ?>">
        </div>
    </div>
</div>
<div class="row mt-3">
    <label for="email">Status:</label>
    <div class="col-md-1">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" checked>
            <label class="form-check-label" for="status">
                Ativo
            </label>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status">
            <label class="form-check-label" for="status">
                Inativo
            </label>
        </div>
    </div>
</div>
<hr>
<hr class="bg-dark">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?= $persons['id'] ?? '' ?>" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Nome completo:</label>
            <input type="text" class="form-control" maxlength="100" id="name" name="name"
                   value="<?= $persons['name'] ?? '' ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="birthDate">Data de nascimento:</label>
            <input type="date" class="form-control" maxlength="100" id="birthDate" name="birthDate"
                   value="<?= $persons['birthDate'] ?? '' ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group">
        <label for="gender">Genêro:</label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender">
            <option value="<?= $persons['gender'] ?>" selected><?= $persons['gender'] ?? '' ?></option>
            <option>--------</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" maxlength="100" id="email" name="email"
                   value="<?= $persons['email'] ?? '' ?>">
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
<hr class="bg-dark">
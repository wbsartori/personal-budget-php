<input type="hidden" class="form-control" id="_id" name="_id" value="<?= $incomes['id'] ?? '' ?>">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?= $incomes['id'] ?? '' ?>" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 form-group">
        <label for="idPerson">Pessoas:</label>
        <select class="form-select" aria-label="Default select example" id="idPerson" name="idPerson" required>
            <option value="<?= $incomes['personId'] ?? ''?>" selected><?= $incomes['personName'] ?? '' ?></option>

            <?php if($incomes['personId']) { ?>
                <option>--------</option>
            <?php } ?>

            <?php foreach ($persons as $person) { ?>
                <option value="<?= $person['id'] ?>"><?= $person['name'] ?></option>
            <?php } ?>

        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" maxlength="100" id="description" name="description"
                   value="<?= $incomes['description'] ?? '' ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="incomeDate">Data de referência:</label>
            <input type="date" class="form-control" maxlength="100" id="incomeDate" name="incomeDate"
                   value="<?= $incomes['incomeDate'] ?? '' ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="value">Valor:</label>
            <input type="text" class="form-control" maxlength="100" id="value" name="value"
                   value="R$ <?=  $incomes['value'] ?? '' ?>" required>
        </div>
    </div>
</div>

<hr class="bg-dark">
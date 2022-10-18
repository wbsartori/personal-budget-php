<?php $this->layout('includes/layout'); ?>

<?php

if (!empty($_SESSION['message']) && $_SESSION['success'] === true) {
    echo '<div class="alert alert-success" id="success-alert" role="alert">';
    echo $_SESSION['message'];
    echo '</div>';

} else if (!empty($_SESSION['message']) && $_SESSION['error'] === true) {
    echo '<div class="alert alert-danger" id="danger-alert" role="alert">';
    echo $_SESSION['message'];
    echo '</div>';
}

$_SESSION['message'] = '';
?>
<div class="container">
    <h4 class="mt-5"><?php echo $title ?></h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <p>Tem certeza que desja remover este registro ?</p>
            <form method="post" action="<?php echo ROUTER ?>person/del">
                <input type="hidden" class="form-control" id="_id" name="_id" value="<?= $persons['id'] ?? '' ?>">
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
                                   value="<?= $persons['name'] ?? '' ?>" disabled>
                        </div>
                    </div>
                </div>
                <hr class="bg-dark">
                <button class="btn btn-success" type="submit">Confirmar</button>
                <a href="<?php echo ROUTER ?>person" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
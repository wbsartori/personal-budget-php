<?php

require_once('../../../vendor/autoload.php');

include_once('../includes/_header.php');
include_once ('action/select.php');

?>

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
        <h4 class="mt-5">Cadastro/Rendas</h4>
        <hr class="bg-dark">
        <div class="row mt-5">
            <div class="col-md-12">
                <form method="post" action="action/save.php">
                    <?php include('_form.php'); ?>
                    <button class="btn btn-success" type="submit">Salvar</button>
                    <a href="<?php echo ROUTER ?>Income" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../includes/_footer.php'); ?>
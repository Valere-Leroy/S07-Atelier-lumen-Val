<?php require_once __DIR__ . "/layout/header.php";?>
<form action="<?= route('signin_post')?>" method="post">

    <label for="email"></label>
    <input type="email" name="email" placeholder="Votre mail">

    <label for="password"></label>
    <input type="password" name="password" placeholder="Votre mot de passe">
    <button type="submit">Confirmer</button>
</form>

<?php require_once __DIR__ . "/layout/footer.php";?>
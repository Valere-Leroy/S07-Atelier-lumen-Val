<?php require_once __DIR__ . "/layout/header.php";?>
<form action="" method="post">

    <label for="email"></label>
    <input type="email" name="email" placeholder="Votre mail">

    <label for="firstname"></label>
    <input type="firstname" name="firstname" placeholder="Votre prénom">

    <label for="lastname"></label>
    <input type="lastname" name="lastname" placeholder="Votre nom">

    <label for="password"></label>
    <input type="password" name="password" placeholder="Votre mot de passe">
    <button type="submit">Confirmer</button>
</form>

<?php require_once __DIR__ . "/layout/footer.php";?>
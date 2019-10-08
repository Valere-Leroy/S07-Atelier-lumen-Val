<?php require_once __DIR__ . "/layout/header.php";?>

<?php if(isset($alert)) :?>
<div >
    <?= $alert?>
</div>
<?php endif; ?>

<form action="" method="post">

    <label for="email"></label>
    <input type="email" name="email" placeholder="<?= $user_connected->email ?>"> <br/>

    <label for="firstname"></label>
    <input type="firstname" name="firstname" placeholder="<?= $user_connected->firstname ?>"><br/>

    <label for="lastname"></label>
    <input type="lastname" name="lastname" placeholder="<?= $user_connected->lastname ?>"><br/>
    
    <label for="new_password"></label>
    <input type="new_password" name="new_password" placeholder="Votre nouveau mot de passe"><br/>


    <label for="password"></label>
    <input type="password" name="password" placeholder="Votre mot de passe"><br/>
    
    <button type="submit">Confirmer</button>
</form>

<?php require_once __DIR__ . "/layout/footer.php";?>
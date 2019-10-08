<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Reset CSS -->
    <link href="<?= url("/assets/css/reset.css") ?>" rel="stylesheet">
    <!-- Really beautiful CSS -->
    <link href="<?= url("/assets/css/style.css") ?>" rel="stylesheet">

    <title>O'Quiz</title>
</head>

<body>
    <main class="container">

        <nav>

            <ul>
                <li>
                    <a href="<?= route('home') ?>">
                        <h1>O'Quiz</h1>
                    </a>
                </li>
            </ul>

            <ul>
                <li>
                    <a href="<?= route('home') ?>">
                        <i></i>
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="<?= route('tags') ?>">
                        <i></i>
                        Les sujets
                    </a>
                </li>
                <?php if (isset($user_connected)) : ?>
                <li>
                    <a href="<?= route('profil') ?>">
                        <i></i>
                        Mon compte
                    </a>
                </li>
                <li>
                    <a href="<?= route('signout') ?>">
                        <i></i>
                        Déconnexion
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="<?= route('signin') ?>">
                        <i></i>
                        Se connecter
                    </a>
                </li>

                <li>
                    <a href="<?= route('signup') ?>">
                        <i></i>
                        S'enregistrer
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
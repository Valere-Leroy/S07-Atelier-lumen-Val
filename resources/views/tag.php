<?php require_once __DIR__ . "/layout/header.php";?>
            <div>
                <h2> Tout les sujets de nos Quiz ! </h2>
                <p>

                bob
                </p>
            </div>
            <div class="row">
                <?php foreach ($tags as $tag): ?>
                <div class="col">
                    <a href="<?= route('quiz_tag', ['id' => $tag->id]) ?>">
                        <h3><?= $tag->name ?></h3>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php require_once __DIR__ . "/layout/footer.php";?>
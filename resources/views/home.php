<?php require_once __DIR__ . "/layout/header.php";?>
            <div>
                <h2> Bienvenue sur O'Quiz </h2>
                <p>

                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                
                </p>
            </div>
            <div class="row">
                <?php foreach ($quizzes as $quiz): ?>
                <div class="col">
                    <a href="<?= route('quiz', ['id' => $quiz->id]) ?>">
                        <h3><?= $quiz->title ?></h3>
                    </a>
                    <h5><?= $quiz->description ?></h5>
                    <p><?= $quiz->appUsers->firstname.' '.$quiz->appUsers->lastname ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php require_once __DIR__ . "/layout/footer.php";?>
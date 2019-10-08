<?php require_once __DIR__ . "/layout/header.php";?>
<div>
    <h2> Résultat de <?= $quiz->title ?>
        <span><?= $note . "/" . $quiz->question->count() ?></span>
    </h2>
</div>

<div>
    <h4> Sujet abordés :
        <?php foreach ($quiz->tag as $tag)
        {
            echo ' '.$tag->name.' ';
        }
        ?>
    </h4>
</div>

<div>
    <p><?= $quiz->appUsers->firstname.' '.$quiz->appUsers->lastname ?></p>
</div>

<form action="" method="post">

    <div class="row">
        <?php foreach($quiz->question as $question): ?>
        <div class="col question">

            <span class="level level--<?= $question->level->getCssName() ?>"><?= $question->level->name ?></span>

            <div class="question__question">
                <?= $question->question ?>
            </div>
            <div class="question__choices">
            <?php if ($result_checked[$question->id]['result']) : ?>
                <?= $question->answer->find($result_checked[$question->id]['answer_id'])->description; ?> est la bonne réponse.
                <?php else :?>
                <?= $question->answer->find($result_checked[$question->id]['answer_id'])->description; ?> est la mauvaise réponse.
            <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div>
        <input class="btn" type="submit" value="OK" />
    </div>
</form>
<?php require_once __DIR__ . "/layout/footer.php";?>
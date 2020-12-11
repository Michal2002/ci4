<h2><?= esc($title); ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/update" method="post">
    <?= csrf_field() ?>

    <input type="hidden" name="id" value="<?=esc($news['id']) ?>" />
    <label for="title">Tytuł</label>
    <input type="input" name="title"  value="<?=esc($news['title']) ?>"/><br />

    <label for="body">Treść</label>
    <textarea name="body"><?= esc($news['body']);?></textarea><br />

    <input type="submit" name="submit" value="Aktualizuj" />
    <br>
    <p><a href="<?= route_to('aktualnosci_1') ?>">Lista aktualności</a></p>
</form>
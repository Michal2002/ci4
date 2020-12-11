<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/delete" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= esc($news['id'])?>" />
    <p><?=esc($news['body'])?></p>
    <input type="submit" name="submit" value="Usuń" />

</form>

<p><a href="<?= route_to('aktualnosci_1') ?>">Lista wiadomości</a></p>

<?= $this->extend('news\szablon') ?>

<?= $this->section('content')?>
<h2><?= esc($news['title']); ?></h2>
<?= esc($news['body']); ?>
        <ul>
        <li><a href="<?= route_to('aktualnosci_1') ?>">Lista wiadomości</a></li>
        <li><a href="<?= route_to('updatenews', esc($news['slug'], 'url')) ?>">Edytuj wiadomość</a></li>
        <li><a href="<?= route_to('delnews', esc($news['slug'], 'url')) ?>">Usuń wiadomość</a></li>
        </ul>
<?= $this->endSection() ?>
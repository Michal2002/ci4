<?= $this->extend('news\szablon') ?>

<?= $this->section('content')?>

<h2><?= esc($title); ?></h2>

<?php if (! empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']); ?></h3>

        <div class="main">
            <?= esc($news_item['body']); ?>
        </div>
        <ul>
        <li><a href="/news/<?= esc($news_item['slug'], 'url'); ?>">Pokaż treść</a></li>
        <li><a href="<?= route_to('updatenews', esc($news_item['slug'], 'url')) ?>">Edytuj wiadomość</a></li>
        <li><a href="<?= route_to('delnews', esc($news_item['slug'], 'url')) ?>">Usuń wiadomość</a></li>
        </ul>

    <?php endforeach; ?>
    <p><a href="/news/create"><b>Dodaj wiadomość</b></a></p>
<?php else : ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>

<?= $this->endSection() ?>
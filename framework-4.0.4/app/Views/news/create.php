<h2><?= esc($title); ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Tytuł</label>
    <input type="input" name="title" /><br />

    <label for="body">Treść</label>
    <textarea name="body"></textarea><br />

    <input type="submit" name="submit" value="Dodaj wiadomość" />
    <br>
    <p><a href="/news/">Powrót</a></p>
</form>
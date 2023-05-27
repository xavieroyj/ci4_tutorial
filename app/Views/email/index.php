<!DOCTYPE html>
<html>
    <title>Landing page</title>

    <body>
        <?php if (! empty($emails) && is_array($emails)): ?>
            <?php foreach ($emails as $email_item): ?>
                <h3><?= esc($email_item['title']) ?></h3>
                <div class="main">
                    <?= esc($email_item['body']) ?>
                </div>
                <p><a href="/news/<?= esc($email_item['email_id'], 'url') ?>">View Email</a></p>
            <?php endforeach ?>
        <?php else: ?>
            <h3>No News</h3>
            <p>Unable to find any news for you.</p>
        <?php endif ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <title>Landing page</title>

    <body>
        <a href="<?php echo base_url('/email/create') ?>"><button>Create a new email</button></a>
        <?php if (! empty($emails) && is_array($emails)): ?>
            <?php foreach ($emails as $email_item): ?>
                <h3><?= esc($email_item['title']) ?></h3>
                <div class="main">
                    <?= esc($email_item['body']) ?>
                </div>
                <p><a href="<?php echo base_url('/email/') . $email_item['email_id']; ?>">View Email</a></p>
            <?php endforeach ?>
        <?php else: ?>
            <h3>No Emails</h3>
            <p>Luckily, there are no emails!</p>
        <?php endif ?>
    </body>
</html>
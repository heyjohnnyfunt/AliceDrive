<div class="content">
<?php
if ($articles) {
    foreach ($articles as $topic) { ?>
        <div class="article newsArticle">
            <a href="/news/topic/<?php echo $topic['id']; ?>">
                <article>
                    <header>
                        <h3><?php echo $topic['title']; ?></h3>

                        <p>Новость от
                            <time><?php echo $topic['date']; ?></time>
                        </p>
                    </header>
                    <p><?php echo $topic['intro']; ?></p>

                    <hr>
                </article>
            </a>

        </div>
    <?php
    }
} else { ?>

    <h3>Welcome!</h3>
    <p>We currently do not have any articles.</p>

<?php } ?>
</div>

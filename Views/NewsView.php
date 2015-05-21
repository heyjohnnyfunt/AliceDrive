<div class="content">
    <?php
    if ($articles > 0) {
        foreach ($articles as $topic) { ?>
            <div class="article newsArticle">
                <article>
                    <a href="/news/topic/<?php echo $topic['id']; ?>">
                        <header>
                            <h3><?php echo $topic['title']; ?></h3>

                            <p>Новость от
                                <time><?php echo $topic['date']; ?></time>
                            </p>
                        </header>
                        <p><?php echo $topic['intro']; ?></p>

                        <hr>
                    </a>
                </article>

            </div>
        <?php
        }
    } else { ?>

        <h3>Welcome!</h3>
        <p>We currently do not have any articles.</p>

    <?php } ?>
</div>

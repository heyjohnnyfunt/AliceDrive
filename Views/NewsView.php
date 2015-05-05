<h1>News</h1>
<?php
if ($articles) {
    foreach ($articles as $topic) { ?>
        <a class="article" href="/news/topic/<?php echo $topic['slug']; ?>">
            <article>
                <header>
                    <h3><?php echo $topic['title']; ?></h3>

                    <p>Published on:
                        <time><?php echo $topic['date']; ?></time>
                    </p>
                </header>
                <p><?php echo $topic['intro']; ?></p>

                <hr>
            </article>
        </a>
    <?php
    }
} else { ?>

    <h3>Welcome!</h3>
    <p>We currently do not have any articles.</p>

<?php } ?>
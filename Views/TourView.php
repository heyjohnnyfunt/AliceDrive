<div class="left-col">
    <?php
    if ($articles > 0) {
        foreach ($articles as $topic) { ?>
            <a class="tourArticle">
                <article>
                    <header>
                        <h3>Где: <?php echo $topic['place']; ?></h3>

                        <p>Когда:
                            <time><?php echo $topic['date']; ?></time>
                        </p>
                    </header>
                    <?php echo $topic['body'];  ?>

                </article>
            </a>
        <?php
        }
    } else { ?>

        <h3>Welcome!</h3>
        <p>We currently do not have any tours :(</p>

    <?php } ?>
</div>

<div class="right-col">
    <?php
    if ($lastConcert) { ?>
        <h1>Ближайший</h1>
        <h3><?php echo $lastConcert['place']; ?></h3>

        <p>Когда:
            <time pubdate="pubdate"><?php echo $lastConcert['date']; ?></time>
        </p>
        <?php echo $lastConcert['body']; ?>
    <?php
    } else { ?>

        <p>No last concerts :(</p>

    <?php } ?>
</div>
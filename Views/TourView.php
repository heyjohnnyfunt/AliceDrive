<div class="left-col">
    <?php
    if ($articles > 0) {
        foreach ($articles as $topic) { ?>
            <a class="tourArticle" href="/tours/concert/<?php echo $topic['id']; ?>">
                <article>
                    <header>
                        <h3><?php echo $topic['place']; ?></h3>

                        <p>Когда:
                            <time><?php echo $topic['date']; ?></time>
                        </p>
                    </header>
                    <!--<p><?php /*echo $a['intro']; */ ?></p>-->

                    <p>More...</p>
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
        <h3><?php echo $lastConcert['place']; ?></h3>

        <p>Когда:
            <time pubdate="pubdate"><?php echo $lastConcert['date']; ?></time>
        </p>
        <p><?php echo $lastConcert['body']; ?></p>
    <?php
    } else { ?>

        <p>No last concerts :(</p>

    <?php } ?>
</div>
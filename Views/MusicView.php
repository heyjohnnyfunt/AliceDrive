<div class="content">
    <?php
    if ($articles > 0) {
        foreach ($articles as $topic) { ?>
            <a class="tourArticle">
                <article>
                    <header>
                        <h3><?php echo $topic['name']; ?></h3>
                        <div>
                            <iframe width="100%" height="140" scrolling="no" frameborder="no"
                                    src="<?php echo $topic['source']; ?>">

                            </iframe>
                        </div>
                    </header>

                </article>
            </a>
        <?php
        }
    } else { ?>

        <h3>Welcome!</h3>
        <p>We currently do not have any tours :(</p>

    <?php } ?>
</div>

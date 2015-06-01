<div class="content">
    <?php
    if ($articles > 0) {
        foreach ($articles as $topic) { ?>
            <a class="tourArticle">
                <article>
                    <header>
                        <h3><?php echo $topic['name']; ?></h3>
                        <div>
                          <!--  <iframe width="100%" height="140" scrolling="no" frameborder="no"
                                    src="<?php echo $topic['source']; ?>">

                            </iframe>-->
                            <audio controls>
                                <source src="<?php echo $topic['source']; ?>" type="audio/mpeg">

                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </header>

                </article>
            </a>
        <?php
        }
    } else { ?>

        <h3>Welcome!</h3>
        <p>Sadly, we have no audio and video materials :(</p>

    <?php } ?>
</div>

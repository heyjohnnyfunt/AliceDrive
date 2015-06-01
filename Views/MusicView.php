<!-- JavaScript Piece of code to stop music and reset to zero -->
<script>window.addEventListener("play", function(evt)
    {
        if(window.$_currentlyPlaying)
        {
            window.$_currentlyPlaying.pause();
            window.$_currentlyPlaying.currentTime=0;
        }
        window.$_currentlyPlaying = evt.target;
    }, true);
</script>


<div class="content">
    <?php
    if ($articles > 0) {
        foreach ($articles as $topic) { ?>
            <a class="tourArticle">
                <article>
                    <header>
                        <h3><?php echo $topic['name']; ?></h3>
                        <div>
                            <!-- New Sexy HTML5 Feature -->
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
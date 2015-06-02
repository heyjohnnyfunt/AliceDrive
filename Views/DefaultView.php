<div class="cd-fixed-bg dp-bg-1">
    <div class="cd-scrolling-bg">
        <div class="content">
            <?php
            if ($articles > 0) {
                ?>
                <h2>Последние новости</h2>
                <?php
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

                <p>We currently do not have any articles.</p>

            <?php } ?>
        </div>
        <div class="content">
            <?php
            if ($concerts > 0) {
                ?>
                <h2>Последние концерты</h2>
                <?php
                foreach ($concerts as $topic) { ?>
                    <div class="article newsArticle">
                        <article>
                            <header>
                                <h3>Где: <?php echo $topic['place']; ?></h3>

                                <p>Когда:
                                    <time><?php echo $topic['date']; ?></time>
                                </p>
                            </header>
                            <?php echo $topic['body']; ?>

                        </article>
                    </div>
                <?php
                }
            } else { ?>

                <p>We currently do not have any articles.</p>

            <?php } ?>
        </div>
    </div>
</div>

<div class="cd-fixed-bg dp-bg-2">
    <div class="cd-scrolling-bg">
        <div class="content">
            <div class="ChatBox">
                <?php
                if ($messages > 0) {
                    ?>
                    <h2>Последние сообщения</h2>
                    <?php
                    foreach ($messages as $message) { ?>
                        <div class="ChatBlock">
                            <article>
                                <header>
                                    <p><span><?php echo $message['username']; ?></span> |
                                        <time><?php echo $message['date']; ?></time>
                                    </p>
                                </header>
                                <p><?php echo $message['message']; ?></p>
                            </article>
                        </div>
                    <?php
                    }
                } else { ?>

                    <p>We currently do not have any Messages. Be the first!</p>

                <?php } ?>
            </div>
        </div>

    </div>
</div>

<div class="cd-fixed-bg dp-bg-3">
    <div class="cd-scrolling-bg">

        <div class="content">
            <?php
            if ($songs > 0) {
                ?>
                <h2>Последняя музыка</h2>
                <?php
                foreach ($songs as $topic) { ?>
                    <div class="tourArticle">
                        <article>
                            <header>
                                <h3><?php echo $topic['name']; ?></h3>
                                <div>
                                    <audio controls>
                                        <source src="<?php echo $topic['source']; ?>" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </header>

                        </article>
                    </div>
                <?php
                }
            } else { ?>

                <p>Sadly, we have no audio and video materials :(</p>

            <?php } ?>
        </div>

        <div class="content">
            <?php
            if ($videos > 0) {
                ?>
                <h2>Последние клипы</h2>
                <?php
                foreach ($videos as $topic) { ?>
                    <div class="article tourArticle">
                        <article>
                            <header>
                                <h3><?php echo $topic['name']; ?></h3>
                                <div>
                                    <video height="200" width="400" controls>
                                        <source src="<?php echo $topic['source']; ?>" type="audio/mpeg">
                                        Your browser does not support the video element.
                                    </video>
                                </div>
                            </header>

                        </article>
                    </div>
                <?php
                }
            } else { ?>

                <h3>Welcome!</h3>
                <p>Sadly, we have no  video materials :(</p>

            <?php } ?>
        </div>
    </div>
</div>
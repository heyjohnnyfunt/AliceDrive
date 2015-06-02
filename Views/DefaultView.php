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
        </div> <div class="content">
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
                            <?php echo $topic['body'];  ?>

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
        </div> <div class="content">
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
                            <?php echo $topic['body'];  ?>

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

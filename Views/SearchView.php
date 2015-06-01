<div id="searchWide" class="content">
    <form method="POST" id="searchForm" name="searchForm">
        <input type="text" id="searchInput" name="searchInput" class="searchInputWide">
        <input type="submit" name="SearchResultButtonClick" class="search-icon" value="">
    </form>
</div>
<div class="">

<div class="bigDescription ">
    <?php
    if (count($articles) > 0 && $articles > 0) {
        ?>
        <h3 class="error">Что нашлось в новостях:</h3>
        <?php
        foreach ($articles as $topic) { ?>
            <div class="article tourArticle">
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
        <h3 class="error">По новостям ничего не найдено</h3>
    <?php } ?>

    <?php
    if (count($concerts) > 0 && $concerts > 0) {
        ?>
        <h3 class="error">Что нашлось по концертам:</h3>
        <?php
        foreach ($concerts as $topic) { ?>
            <div class="article tourArticle">
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
        <h3 class="error">По концертам ничего не найдено</h3>
    <?php } ?>

    <?php
    if (count($songs) > 0 && $songs > 0) {
        ?>
        <h3 class="error">Что нашлось по музыке:</h3>
        <?php
        foreach ($songs as $topic) { ?>
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
        <h3 class="error">По музыке ничего не найдено</h3>
    <?php } ?>

</div>
</div>
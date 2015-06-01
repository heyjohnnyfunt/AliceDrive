<div id="searchWide" class="content">
    <form method="POST" id="searchForm" name="searchForm">
        <input type="text" id="searchInput" name="searchInput" class="searchInputWide">
        <input type="submit" name="SearchResultButtonClick" class="search-icon" value="">
    </form>
</div>

<div class="left-col ">
    <?php
    if ($articles > 0) {
        ?>
        <h3 class="error bigDescription">Что нашлось в новостях:</h3>
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

        <div class="bigDescription">
            <p>Ничего не найдено</p>
        </div>

    <?php } ?>

    <?php
    if ($concerts > 0) {
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

        <div class="bigDescription">
            <p>Ничего не найдено</p>
        </div>

    <?php } ?>


</div>
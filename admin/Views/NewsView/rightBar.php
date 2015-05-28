<?php defined('ACCESS_ALLOWED') or die('Restricted Access'); ?>
<div class="right-bar">

    <?php if (isset($message)) echo $message; ?>

    <form action="index.php?page=news<?php if (isset($_GET['id'])) echo '&id=' . $newsItem['id']; ?>"
          method="post" role="form" id="main-form">

        <div>
            <label for="title">Title:
                <input class="input" type="text" name="title" id="title"
                       placeholder="Page title" required
                       value="<?php if (isset($_GET['id'])) echo $newsItem['title']; ?>">
            </label>
        </div>

        <div>
            <label for="user">User:
                <select class="input" name="user" id="user">
                    <?php
                    echo $pageController->CreateUsersOptionValues($newsItem['user_id'], $currentUser['id']);
                    ?>
                </select>
            </label>
        </div>

        <div>
            <label for="slug">Slug:
                <input class="input" type="text" name="slug" id="slug"
                       placeholder="Page slug" required
                       value="<?php if (isset($_GET['id'])) echo $newsItem['slug']; ?>">
            </label>
        </div>

        <div>
            <label for="body">Body:
                 <textarea class="editor" name="body" id="body" rows="8"
                           placeholder="Page body"><?php if (isset($_GET['id'])) echo $newsItem['body']; ?>
                 </textarea>
            </label>
        </div>

        <input type="submit" class="button" value="Save" name="SaveButtonClick">

    </form>
</div>
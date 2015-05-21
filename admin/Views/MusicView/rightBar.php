<div class="right-bar">

    <?php if (isset($message)) echo $message; ?>

    <form action="index.php?page=music<?php if (isset($_GET['id'])) echo '&id=' . $songItem['id']; ?>"
          method="post" role="form" id="main-form">

        <div>
            <label for="songName">Song title:
                <input class="input" type="text" name="songName" id="songName" placeholder="For example: My Own"
                       value="<?php if (isset($_GET['id'])) echo $songItem['name']; ?>" required>
            </label>
        </div>

        <div>
            <label for="sourcePath">SoundCloud source link:
                <input class="input" type="text" name="sourcePath" id="sourcePath"
                       placeholder="Path to song in SoundCloud"
                       value="<?php if (isset($_GET['id'])) echo $songItem['source']; ?>" required>
            </label>
        </div>

        <input type="submit" class="button" value="Save" name="SaveButtonClick">
    </form>
</div>
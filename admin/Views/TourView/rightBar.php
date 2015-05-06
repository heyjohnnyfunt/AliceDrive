<div class="right-bar">

    <?php if (isset($message)) echo $message; ?>

    <form action="index.php?page=tour<?php if (isset($_GET['id'])) echo '&id=' . $tourItem['id']; ?>"
          method="post" role="form" id="main-form">

        <div>
            <label for="place">Place:
                <input class="input" type="text" name="place"
                       placeholder="Tour place" required
                       value="<?php if (isset($_GET['id'])) echo $tourItem['place']; ?>">
            </label>
        </div>

        <div>
            <label for="date_time">Time & date:
                <input class="input" type="text" name="date_time"
                       placeholder="Format: hh:mm DD.MM.YYYY" required
                       value="<?php if (isset($_GET['id'])) echo $tourItem['date_time']; ?>">
            </label>
        </div>

        <div>
            <label for="body">Body:
                 <textarea class="editor" name="body" rows="8"
                           placeholder="Page body"><?php if (isset($_GET['id'])) echo $tourItem['body']; ?>
                 </textarea>
            </label>
        </div>

        <input type="submit" class="button" value="Save" name="SaveButtonClick">

    </form>
</div>
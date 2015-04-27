<div class="right-bar">

    <?php if (isset($message)) echo $message; ?>

    <form action="index.php?page=news<?php if(isset($_GET['id'])) echo '?id='.$pageBody['id']; ?>" method="post" role="form"
        id="main-form">

        <div>
            <label for="title">Title:
                <input class="input" type="text" name="title" id="title"
                       placeholder="Page title"
                       value="<?php if(isset($_GET['id'])) echo $pageBody['title']; ?>">
            </label>
        </div>

        <div>
            <label for="user">User:
                <select class="input" name="user" id="title">
                    <option value="0">No user</option>
                    <?php
                    $users = $pageController->GetAllAdminUsers();
                    echo $pageController->CreateUsersOptionValues($users, $pageBody['user_id'], $currentUser['id']);
                    ?>
                </select>
            </label>
        </div>

        <div>
            <label for="slug">Slug:
                <input class="input" type="text" name="slug" id="slug"
                       placeholder="Page slug"
                       value="<?php if(isset($_GET['id'])) echo $pageBody['slug']; ?>">
            </label>
        </div>

        <div>
            <label for="label">Label:
                <input class="input" type="text" name="label" id="label"
                       placeholder="Page label"
                       value="<?php if(isset($_GET['id'])) echo $pageBody['label']; ?>">
            </label>
        </div>

        <div>
            <label for="body">Body:
                 <textarea class="editor" name="body" id="body" rows="8"
                 placeholder="Page body"><?php if(isset($_GET['id'])) echo $pageBody['body']; ?>
                 </textarea>
            </label>
        </div>

        <input type="submit" class="button" value="Save" name="SaveButtonClick">
        <!--<input type="hidden" name="id" value="<?php /*if(isset($_GET['id'])) echo $pageData['id']; */?>">-->

    </form>
</div>
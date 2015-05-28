<?php defined('ACCESS_ALLOWED') or die('Restricted Access'); ?>
<script language="Javascript">

    function IsEmpty(){

        if(document.form.question.value == "")
        {
            alert("Some fields are empty");
        }
        return;
    }

</script>
<div class="right-bar">

    <?php if (isset($message)) echo $message; ?>

    <form action="index.php?page=about<?php if (isset($_GET['id'])) echo '&id=' . $member['id']; ?>"
          method="post" role="form" id="main-form">

        <div>
            <label for="memberName">Member name:
                <input class="input" type="text" name="memberName" id="memberName" placeholder="If he/she has a name"
                       value="<?php if (isset($_GET['id'])) echo $member['name']; ?>" required>
            </label>
        </div>

        <div>
            <label for="instrument">Instrument:
                <input class="input" type="text" name="instrument" id="instrument"
                       placeholder="What he/she plays"
                       value="<?php if (isset($_GET['id'])) echo $member['instrument']; ?>" required>
            </label>
        </div>

        <div>
            <label for="image">Image:
                <select class="input" name="image" id="image">
                    <?php echo $imageList?>
                </select>
            </label>
        </div>

        <div>
            <label for="body">Body:
                 <textarea class="editor" name="body" id="body" rows="8"
                           placeholder="Page body"><?php if (isset($_GET['id'])) echo $member['body']; ?>
                 </textarea>
            </label>
        </div>

        <input type="submit" class="button" value="Save" name="SaveButtonClick">
    </form>
</div>
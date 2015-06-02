<script>
    var main = function () {
        var count = 500;
        $('.textarea').keyup(function () {
            var postLength = $(this).val().length;
            var charactersLeft = count - postLength;
            $('.counter').text(charactersLeft);

            if (charactersLeft < 0)
                $('#postButton').attr('disabled', true);
            else if (charactersLeft === count)
                $('#postButton').attr('disabled', true);
            else
                $('#postButton').attr('disabled', false);
        });
        $('#postButton').attr('disabled', true);
    }

    $(document).ready(main);
</script>

<div class="content bigDescription">
    <?php if (isset($message)) echo $message; ?>
    <form method="POST">
        <textarea name="messageTextArea" class="textarea" rows="2" placeholder="Уотс он йор майнд? :)"></textarea>

        <div> <!--class="pull-right"-->
            <p class="counter">500</p>
            <input type="submit" name="SendMessageButtonClick" id="postButton" class="button" Value="Отправить">
        </div>
    </form>
    </div>
<div class="content">
    <div class="ChatBox">
        <?php
        if ($articles > 0) {
            foreach ($articles as $topic) { ?>
                <div class="ChatBlock">
                    <article>
                        <header>
                            <p><span><?php echo $topic['username']; ?></span> |
                                <time><?php echo $topic['date']; ?></time>
                            </p>
                        </header>
                        <p><?php echo $topic['message']; ?></p>
                    </article>
                </div>
            <?php
            }
        } else { ?>

            <h3>Welcome!</h3>
            <p>We currently do not have any Messages. Be the first!</p>

        <?php } ?>
        <ul class="posts">
        </ul>
    </div>
</div>

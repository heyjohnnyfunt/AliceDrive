<link rel="stylesheet" href="../Styles/Community.css" type="text/css">
<script>
    var main = function () {
        /*$('.button').click(function () {
         var post = $('.textarea').val();
         $('<li>').text(post).prependTo('.posts');
         $('.textarea').val('');
         $('.counter').text(140);
         $('.button').attr('disabled', true);
         });*/

        var count = 500;
        $('.textarea').keyup(function () {
            var postLength = $(this).val().length;
            var charactersLeft = count - postLength;
            $('.counter').text(charactersLeft);

            if (charactersLeft < 0)
                $('.button').attr('disabled', true);
            else if (charactersLeft === count)
                $('.button').attr('disabled', true);
            else
                $('.button').attr('disabled', false);
        });
        $('.button').attr('disabled', true);
    }

    $(document).ready(main);
</script>

<div class="content bigDescription">
    <?php if (isset($message)) echo $message; ?>
    <form method="POST">
        <textarea name="messageTextArea" class="textarea" rows="2" placeholder="Уотс он йор майнд? :)"></textarea>

        <div class="pull-right">
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

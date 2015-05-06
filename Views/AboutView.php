<?php
if($mainDesc){?>
    <p class="bigDescription"><?php echo $mainDesc['body']; ?></p>
<?}
if($memberList){
    foreach($memberList as $member)
    {?>
        <a class="article">
            <article>
                <header>
                    <h3><?php echo $member['name']; ?></h3>
                    <p><b><?php echo $member['instrument']; ?></b></p>
                </header>
                <p><?php echo $member['body']; ?></p>

            </article>
        </a>
    <?}
}
else echo "<h3>We are just empty band:(</h3>";
?>
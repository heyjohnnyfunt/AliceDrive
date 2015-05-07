<?php
if ($mainDesc) {
    ?>
    <div class="cd-fixed-bg cd-bg-1">
        <!--<img width="100px" height="100px" src="<?php /*echo '../Images/Band' . DS . $member['image']*/
        ?>">-->
        <div class="cd-scrolling-bg">

            <div class="bigDescription">
                <p><?php echo $mainDesc['body']; ?></p>
                <!--<img width="200" height="150" src="<?php /*echo "../Images/Band" . DS . $mainDesc['image'] */
                ?>" >-->
            </div>
        </div>
    </div>
<?
}
if ($memberList) {
    foreach ($memberList as $member) {
        ?>
        <div class="cd-fixed-bg" style="background: url(../Images/Band/<?php echo $member['image'] ?>)">
            <div class="cd-intro">
                <h2 class="bigTitle"><?php echo $member['name']; ?></h2>
            </div>
            <!--<img width="100px" height="100px" src="<?php /*echo '../Images/Band' . DS . $member['image']*/
            ?>">-->
            <div class="cd-scrolling-bg">
                <div class="bigDescription">

                    <p><b><?php echo $member['instrument']; ?></b></p>

                    <p><?php echo $member['body']; ?></p>

                </div>
            </div>
        </div>


    <?
    }
} else echo "<h3>We are just empty band:(</h3>";
?>
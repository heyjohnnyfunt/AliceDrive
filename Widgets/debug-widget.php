<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 23.03.2015
 * Time: 20:52
 */

// Debug panel
$debug = $pageController->GetDebugValue();

if ($debug == 1) { ?>
    <button id="debug-button">Debug</button>
<?php }?>

<div id="debug-console">
    <!--<h1>Path Array</h1>
    <pre>
        <?php /*print_r($path); */?>
    </pre>-->

    <h1>Debug console</h1>
    <pre>
        <?php print_r(get_defined_vars()); ?>
    </pre>

    <!--<h1>Page Data</h1>
    <pre>
        <?php
/*        print_r($pageBody) */?>
    </pre>-->
</div>
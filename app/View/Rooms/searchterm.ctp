<?php
if (!empty($termSugg)) {
    foreach ($termSugg as $sugg) {
        ?>
        <li class="" onclick="submitFilter('<?php echo $sugg['Searchterm']['term']; ?>');">
            <?php echo $sugg['Searchterm']['term']; ?>
        </li>
        <?php
    }
}
?>
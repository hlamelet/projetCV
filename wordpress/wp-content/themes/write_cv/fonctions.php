<?php
function debug($tableau)
{
    echo '<pre style="height:200px;overflow: scroll; font-size: .8em;padding: 10px;font-family: Consolas, Monospace; background-color: #000;color:#fff;">';
    print_r($tableau);
    echo '</pre>';
}

?>
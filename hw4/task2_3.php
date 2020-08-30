<?php
    $images = scandir("img_small");
    for ($i = 2; $i < count($images); $i++):?>
        <a href="#">
            <img class="image" alt="photo" src="img_small/<?= $images[$i] ?>"></a>
    
    <?php
    endfor;
?>
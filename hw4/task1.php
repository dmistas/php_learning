<?php
$images = scandir("img");
for ($i = 2; $i < count($images); $i++):?>
    <a href="img/<?= $images[$i] ?>" target="_blank">
        <img alt="photo" style="max-width: 300px" src="img/<?= $images[$i] ?>"></a>

<?php
endfor;
?>
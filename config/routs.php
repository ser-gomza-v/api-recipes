<?php
return $routs = array(
    "User" => array(
        "#^" . SUBSERVER . "user/(login)/$#",
        "#^" . SUBSERVER . "user/(create)/$#",
        "#^" . SUBSERVER . "user/(logout)/([0-9]+)$#",
    ),
    "Recipes" => array(
        "#^" . SUBSERVER . "recipe/$#",
        "#^" . SUBSERVER . "recipe/(update)/([0-9]+)$#",
        "#^" . SUBSERVER . "recipe/(all)/$#",
        "#^" . SUBSERVER . "recipe/(single)/([0-9]+)$#",
        "#^" . SUBSERVER . "recipe/(delete)/([0-9]+)$#",
    ),
    "Images" => array(
        "#^" . SUBSERVER . "image/(form)/$#",
        "#^" . SUBSERVER . "image/(create)/([0-9]+)$#",
    ),
);

?>
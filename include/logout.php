<?php

    session_destroy();
    session_unset();

    header("Location: index.php?include=login&notif=logoutberhasil");

?>
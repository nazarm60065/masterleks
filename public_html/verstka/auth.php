<?php

if (!getenv('NotAuthorizeVerstka') && !isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Verstka"');
    header('HTTP/1.0 401 Unauthorized');
    header('Refresh:0');
    exit;
} else {
}

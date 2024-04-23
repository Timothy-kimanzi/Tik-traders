<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
};
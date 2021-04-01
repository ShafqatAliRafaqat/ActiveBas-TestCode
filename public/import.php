<?php
    use \controller\ImportController;

    include ('../controller/ImportController.php');

    $ImportController = new ImportController;
    $ImportController->import();
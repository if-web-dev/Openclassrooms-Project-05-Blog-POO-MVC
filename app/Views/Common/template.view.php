<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?></title>
    <!-- Core css -->
    <link href="css/styles.min.css" rel="stylesheet" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Main css -->
    <link href="css/main.css" rel="stylesheet" />
    <!-- page CSS personnalisé -->
    <?php if (!empty($page_css)) : ?>
        <link href="css/<?= $page_css ?>" rel="stylesheet" />
        <?php if($page_css == "admin.css") :?>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
        <?php endif; ?>
    <?php endif; ?>
</head>

<body>

    <!--header-->
    <?php require_once("header.view.php"); ?>
    <!--page-view-->

    <?= $page_content; ?>

    <!--footer-->
    <?php require_once("footer.view.php"); ?>
    <!-- J-query cdn-->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="../../vendor/components/jquery/jquery.js"></script>-->

    <!-- javascript personalised -->
    <?php if (!empty($page_js)) : ?>
        <?php foreach ($page_js as $file_js) : ?>
            <script src="js/<?= $file_js ?>"></script>
    <!-- Datatables library if admin page charged-->
            <?php if($file_js == "admin.js"):?>
                <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <!--Js cdn bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Core theme JS -->

    <script src="js/scripts.js"></script>

</body>

</html>
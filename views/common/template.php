<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?></title>
    <link href="<?= URL ?>public/CSS/main.css" rel="stylesheet" />
    <?php if(!empty($page_css)) : ?>
        <?php foreach($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php require_once("views/common/header.php"); ?>

    <h1><?= $page_title; ?></h1>

    <div class="container">
        <?= $page_content; ?>
    </div>

    <?php require_once("views/common/footer.php"); ?>


    <?php if(!empty($page_javascript)) : ?>
        <?php foreach($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL?>public/JavaScript/<?= $fichier_javascript ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
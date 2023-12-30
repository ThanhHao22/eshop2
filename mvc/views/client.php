<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?php if ($data['page'] === 'product_detail') echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>' ?>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
    <?php if (isset($data['css'])) {
        foreach ($data['css'] as $value) {
    ?>
            <link rel="stylesheet" href="<?php echo _PUBLIC_PATH . '/client/assets/css/' . $value . '.css' ?>" />
    <?php
        }
    } ?>
    <title><?= 'Eshop | ' . htmlspecialchars($data['title']) ?></title>
</head>

<body>
    <div class="wrapper">
        <?php require_once VIEW_PATH . "block/client/header.php" ?>
        
        <?php require_once VIEW_PAGE_PATH . 'client/' . $data['page'] . '.php' ?>

        <?php require_once VIEW_PATH . "block/client/footer.php" ?>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.refresh();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($data['page'] === 'product_detail') echo '<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>' ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <?php if (isset($data['js'])) {
        foreach ($data['js'] as $value) {
    ?>
            <script src="<?php echo _PUBLIC_PATH . '/client/assets/js/' . $value . '.js' ?>"></script>
    <?php
        }
    } ?>

</body>

</html>
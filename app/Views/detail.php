<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($item['title']) ?> — Галактический Вестник</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <header class="header header--bordered">
        <div class="container header__wrapper">
            <a href="/" class="logo">
                <img src="/images/logo.svg" alt="Галактический Вестник" class="logo__image">
                <div class="logo__text">
                    Галактический<br>вестник
                </div>
            </a>
        </div>
    </header>


    <main class="main">
        <div class="container">

            <nav class="breadcrumbs">
                <a href="/" class="breadcrumbs__link">Главная</a>
                <span class="breadcrumbs__separator">/</span>
                <span class="breadcrumbs__current"><?= htmlspecialchars($item['title']) ?></span>
            </nav>


            <h1 class="news-detail__title">
                <?= htmlspecialchars($item['title']) ?>
            </h1>

            <div class="news-detail__grid">

                <div class="news-detail__text-col">

                    <div class="news-detail__date">
                        <?= date('d.m.Y', strtotime($item['date'])) ?>
                    </div>


                    <?php if (!empty($item['announce'])): ?>
                        <div class="news-detail__announce">
                            <?= $item['announce'] ?>
                        </div>
                    <?php endif; ?>

                    <div class="news-detail__content">
                        <?= $item['content'] ?>
                    </div>

                    <a href="/" class="news-detail__back">

                        <svg width="26" height="15" viewBox="0 0 26 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.293015 8.07106C-0.0975094 7.68054 -0.0975094 7.04737 0.293014 6.65685L6.65698 0.292887C7.0475 -0.0976379 7.68067 -0.097638 8.07119 0.292886C8.46171 0.683411 8.46171 1.31658 8.07119 1.7071L2.41434 7.36395L8.07119 13.0208C8.46171 13.4113 8.46171 14.0445 8.07119 14.435C7.68067 14.8255 7.0475 14.8255 6.65698 14.435L0.293015 8.07106ZM26 8.36395L1.00012 8.36395L1.00012 6.36395L26 6.36395L26 8.36395Z" fill="currentColor" />
                        </svg>

                        Назад к новостям
                    </a>

                </div>
                <div class="news-detail__image-col">
                    <img src="/uploads/images/<?= $item['image'] ?>" alt="" class="news-detail__image">
                </div>

            </div>

        </div>
    </main>

    <footer class="footer container">

        <p class="footer__text">© 2023 — 2412 «Галактический вестник»</p>

    </footer>

</body>

</html>
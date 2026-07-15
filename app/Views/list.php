<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container header__inner">
            <a href="#" class="logo">
                <img class="logo__image" src="/images/logo.svg" alt="">
                <span class="logo__text">
                    Галактический<br>вестник
                </span>
            </a>
        </div>

    </header>

    <?php if ($latest): ?>
        <a href="/?id=<?= $latest['id'] ?>" class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('/uploads/images/<?= $latest['image'] ?>');">
            <div class="container hero__container">
                <div class="hero__content">
                    <div class="hero__title">
                        <?= $latest['title'] ?>
                    </div>
                    <div class="hero__desc">
                        <?= $latest['announce'] ?>
                    </div>
                </div>
            </div>
        </a>
    <?php endif; ?>

    <section class="news-section">
        <div class="container">
            <h2 class="news-section__title">Новости</h2>
            <div class="news-grid">
                <?php foreach ($news as $item): ?>
                    <article class="news-card">
                        <div class="news-card__date">
                            <?= date('d.m.Y', strtotime($item['date'])) ?>
                        </div>
                        <h3 class="news-card__title">
                            <?= htmlspecialchars($item['title']) ?>
                        </h3>
                        <div class="news-card__announce">
                            <?= $item['announce'] ?>
                        </div>
                        <a href="/?id=<?= $item['id'] ?>" class="news-card__link">
                            Подробнее
                            <svg width="25" height="15" viewBox="0 0 26 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.707 8.07106C26.0975 7.68054 26.0975 7.04737 25.707 6.65685L19.343 0.292887C18.9525 -0.0976379 18.3193 -0.097638 17.9288 0.292886C17.5383 0.683411 17.5383 1.31658 17.9288 1.7071L23.5857 7.36395L17.9288 13.0208C17.5383 13.4113 17.5383 14.0445 17.9288 14.435C18.3193 14.8255 18.9525 14.8255 19.343 14.435L25.707 8.07106ZM-8.74228e-08 8.36395L24.9999 8.36395L24.9999 6.36395L8.74228e-08 6.36395L-8.74228e-08 8.36395Z" fill="currentColor" />
                            </svg>

                        </a>

                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <nav class="pagination container">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i === $page): ?>
                <span class="pagination__item pagination__item--active"><?= $i ?></span>
            <?php else: ?>
                <a href="/?page=<?= $i ?>" class="pagination__item"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="/?page=<?= $page + 1 ?>" class="pagination__arrow">
                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z" fill="currentColor" />
                </svg>
            </a>
        <?php endif; ?>
    </nav>

    </div>
    </section>

    </main>

    <footer class="footer container">
        <p class="footer__text">© 2023 — 2412 «Галактический вестник»</p>
    </footer>

</body>


</html>
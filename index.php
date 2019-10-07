<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    
    $template['menu'] = [];

    $sql = "SELECT * FROM menu ORDER BY priority";
    $result = mysqli_query($db, $sql);
    
    while ( $row = mysqli_fetch_assoc($result)) {
        if ($row['active']) {
            $template['menu'][] = $row;
        }   
    }

    $template['features'] = [];

    $sql = "SELECT * FROM features ORDER BY priority";
    $result = mysqli_query($db, $sql);

    while ( $row = mysqli_fetch_assoc($result)) {
        $template['features'][] = $row;  
    }

    $template['customers'] = [];

    $sql = "SELECT * FROM customers ORDER BY priority";
    $result = mysqli_query($db, $sql);

    while ( $row = mysqli_fetch_assoc($result)) {
        if($row['active']) {
            $template['customers'][] = $row;  
        }   
    }

    $template['reviews'] = [];
    $count = 0;

    $sql = "SELECT * FROM reviews ORDER BY priority";
    $result = mysqli_query($db, $sql);

    while ( $row = mysqli_fetch_assoc($result)) {
        if($row['active']) {
            $template['reviews'][] = $row;
            $count++;
        }   
    }

    $template['price'] = [];

    $sql = "SELECT * FROM price ORDER BY priority";
    $result = mysqli_query($db, $sql);

    while ( $row = mysqli_fetch_assoc($result)) {
        if($row['active']) {
            $template['price'][] = $row;  
        }   
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FastStart - разработка интернет-проектов любой сложности</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="preloaderArea">
        <div class="preloader"></div>
    </div>

    <header>
        <div class="header-filter"></div>
        <div class="header-content wrapper">
            <div class="header-content-column1">
                <div class="logo"></div>
                <h1>Разработка сайтов любой сложности</h1>
                <p>
                    FastStart - команда опытных профессионалов по реализации задач любой сложности в области web-разработки и программирования. В кратчайшие сроки мы реализуем все ваши идеи и мысли и дадим мощный толчок вашему бизнесу!
                </p>
                <div class="btns">
                    <button class="btn-about-us" href='#about-us'>О нас</button>
                    <button class="btn-cost" href='#price'>Стоимость</button>
                </div>
            </div>
            <div class="header-content-column2">
                <div class="header-content-column2-envelope">
                    <h2>СВЯЖИТЕСЬ СО МНОЙ</h2>
                    <form action="/handler.php" method="post">
                        <input type="text" name = "username" placeholder ="Мое имя">
                        <input type="text" name = "usermail"placeholder ="Мой e-mail">
                        <button type="submit" href="#">Отправить запрос</button>
                    </form>
                    <p>Нажимая кнопку "ОТПРАВИТЬ ЗАПРОС" Вы даете согласие на обработку личных данных в соотстветствии правилами политики конфиденциальности.</p>
                </div>
            </div>
        </div>
    </header>

    <nav id="menu">
        <div class="nav-box wrapper">
            <div class="nav-box-logo"></div>
            <div class="nav-box-burger">
                <div class="nav-box-burger-content">
                    <div class="nav-box-burger-content-line"></div>
                </div>
            </div>
            <div class="nav-box-menu"> 
                <?php foreach($template['menu'] as $menuItem): ?>
                    <a href = "<?=$menuItem['href']?>"> <?=$menuItem['name']?> </a>
                <?php endforeach; ?>  
            </div>
        </div> 
    </nav>

    <div class="about-us wrapper" id='about-us'>
        <div class="about-us-pic"></div>
        <div class="about-us-text">
            <h2>Наша главная задача - сделать ваш бизнес в интернете уникальным.</h2>
            <p>
                Для нас нет сложных задач. Мы разрабатываем не просто интернет-ресурсы для бизнеса, а создаем уникальные сайты и порталы, которые максимально удовлетворяют потребности любого, даже самого требовательного, пользователя.
            </p>
            <button href='#features'>Подробнее</button>
        </div>
    </div> 

    <div class="features" id='features'>
        <div class="features-content wrapper">
            <h2>Превращаем самые невероятные идеи в реальность</h2>
            <p>Если вы еще не знаете чего хотите, то мы придумаем все за вас!</p>
            <div class="features-content-row">
                <div class="features-content-row-pic"></div>
                <div class="features-content-row-blocks">
                    <?php foreach($template['features'] as $featuresItem): ?>
                        <div class="features-content-row-blocks-block">
                            <?=$featuresItem['src']?>
                            <div class="column">
                                <h4><?=$featuresItem['title']?></h4>
                                <p><?=$featuresItem['text']?></p>
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
    </div>

    <div class="info-block">
        <div class="info-block-content wrapper">
            <div class="info-block-content-text">
                <h2>Качественный сайт в разумные сроки</h2>
                <p>За счёт оптимизации внутренних процессов, многие работы по разработке сайта выполняются параллельно. Это позволяет нам сократить время выкладки сайта, не увеличивая при этом итоговую цену.</p>
                <p>Стоимость разработки сайта считается исходя из необходимого функционала и трудозатрат. При ограниченном бюджете есть возможность упростить некоторые этапы или изменить перечень функционала. Стоимость создания проекта начинается от 15 000 руб.</p>
                <button href='#price'>Узнать стоимость</button>
            </div>
            <div class="info-block-content-pic"></div>
        </div>
    </div>

    <div class="contact-us" id="contact-us">
        <div class="contact-us-content wrapper">
            <h2>Хотите узнать, как развить свой бизнес?</h2>
            <div class="contact-us-content-block">
                <p>Свяжитесь с нами и мы расскажем о том, что подойдет именно для вашего бизнеса и какие инструменты мы будем использовать.</p>
                <button href='#footer'>Связаться с нами</button>
            </div>
        </div>
    </div>

    <div class="price" id="price">
        <div class="price-content wrapper">
            <h2>СТОИМОСТЬ</h2>
            <div class="underline"></div>
            <div class="price-content-blocks">
                <?php foreach($template['price'] as $priceItem): ?>
                    <ul class="price-content-blocks-block">
                        <li><div class="price-content-blocks-block-pic" style = "background-image: url('<?=$priceItem['src']?>')"></div></li>
                        <li><h3><?=$priceItem['name']?></h3></li>
                        <li>от</li>
                        <li><span><?=$priceItem['cost']?></span> тыс. руб.</li>
                        <li><?=$priceItem['line1']?></li>
                        <li><?=$priceItem['line2']?></li>
                        <li><?=$priceItem['line3']?></li>
                        <li><?=$priceItem['line4']?></li>
                        <li><?=$priceItem['line5']?></li>
                        <li><button href='#footer'>ЗАКАЗАТЬ</button></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="our-clients">
        <div class="our-clients-content">
            <h2>НАШИ КЛИЕНТЫ</h2>
            <div class="underline"></div>
            <div class="our-clients-content-logos wrapper">
                <?php foreach($template['customers'] as $custimersItem): ?>
                    <div class="our-clients-content-logos-logo" style = "background-image: url('<?=$custimersItem['src']?>')"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="reviews" id="reviews">
        <div class="reviews-content">
            <h2>ОТЗЫВЫ</h2>
            <div class="underline"></div>
            <div class="reviews-content-slider">
                <?php foreach($template['reviews'] as $reviewsItem): ?>
                    <div class="reviews-content-slider-box-<?=$reviewsItem['id']?>">
                        <div class="reviews-content-slider-box-item">
                            <div class="reviews-content-slider-box-item-pic" style = "background-image: url('<?=$reviewsItem['src']?>')"></div>
                            <p class="review-text"><?=$reviewsItem['review']?></p>
                            <p class="review-name"><?=$reviewsItem['name']?>, <i><?=$reviewsItem['company']?></i></p>
                        </div>
                    </div>
                <?php endforeach; ?>     
            </div>
        </div>
        <div class="reviews-content-paginate">
            <?php foreach($template['reviews'] as $reviewsItem): ?>
                <div data-num="<?=$reviewsItem['id']?>" class="reviews-content-paginate-dot-<?=$reviewsItem['id']?>"></div>
            <?php endforeach; ?>
        </div> 
    </div>                           

    <footer id="footer">
        <div class="footer-content wrapper">
            <div class="footer-content-contacts">
                <h3><span>Свяжитесь</span> с нами</h3>
                <p class="adress"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Большая Спасская ул. 12</span><br><span>Москва, Россия</span></p>
                <p class="phone"><i class="fa fa-mobile" aria-hidden="true"></i><span>8(495)626-46-00</span></p>
                <p class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:moscow@faststart.ru">moscow@faststart.ru</a></p>
                <p class="website"><i class="fa fa-eye" aria-hidden="true"></i><a href="#">www.faststart.ru</a></p>
            </div>
            <form action="/handler.php" method="post">
                <input type="text" name = "username" placeholder ="Ваше имя">
                <input type="text" name = "usermail" placeholder ="Ваш Email">
                <textarea name="message" placeholder = "Я хочу..."></textarea>
                <button type="submit" href="#">Отправить запрос</button>
            </form>
        </div>    
    </footer>

    <div class="social">
        <div class="social-btns">
            <a href="https://twitter.com/">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>  
            <a href="https://www.facebook.com/">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="https://plus.google.com/">
                <i class="fa fa-google-plus"></i>
            </a>
            <a href="https://instagram.com/">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>

    <div class="arrow-up">
        <i class="fa fa-arrow-circle-o-up fa-2x" aria-hidden="true"></i>
    </div>
    <script src="/jquery-3.3.1.min.js"></script>
    <script src="/main.js"></script>
</body>
</html>

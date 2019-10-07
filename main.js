$(document).ready(function(){

    //Прелоадер
    // window.addEventListener('load', function(){
    //     $('.preloaderArea').fadeOut(1000);
    // });
    window.addEventListener('load', function(){ 
        let preloadArea =  document.querySelector('.preloaderArea');
        preloadArea.classList.add('fadeOut');  
        setTimeout( function (){
            preloadArea.style.display = 'none';
        }, 1000 );
    }); 

    //Подсветка текущего пункта меню при скроле     
    let menu = document.querySelector('nav');  
    
    let anchor;
    let section;

    menu.querySelector('.nav-box-menu').querySelectorAll('a').forEach(function(element) {
    
        anchor = element.getAttribute('href').substring(1);
        section = document.getElementById(anchor);
        element.top = section.getBoundingClientRect().top + window.scrollY; //координата от текущей границы видимой области браузера
        element.bottom = section.getBoundingClientRect().bottom + window.scrollY;
    });
    
    let header = document.querySelector('header');
    let arrowUp = document.querySelector('.arrow-up');

    let onScrollAndLoad = function(){
        console.log(- document.body.getBoundingClientRect().top);
        let distFromTop = - document.body.getBoundingClientRect().top + screen.height/3;

        menu.querySelector('.nav-box-menu').querySelectorAll('a').forEach(function(element) {
            if (distFromTop > element.top && distFromTop < element.bottom) {
                element.style.color = "#3eb0f7";
            } else {
                element.style.color = "#777777"
            }
        });
    
        // Фиксация меню на позиции top окна браузера 
        // + скрытие/появление значка 'arrow-up'
        let menuToTop = menu.getBoundingClientRect().top;
        let headerToBottom = header.getBoundingClientRect().bottom; 

        if(menuToTop < 0) {
            menu.classList.add('stick');
            arrowUp.style.display = 'block';
        } 

        if(headerToBottom > 0) {
            menu.classList.remove('stick');
            arrowUp.style.display = 'none';
        } 

        //Анимация на скролл
        startAnimation('.header-content-column1 .logo', 'verticalShow', false); 
        startAnimation('.header-content-column1 h1', 'horizontalShow', false); 
        startAnimation('.header-content-column1 P', 'verticalShow', false); 
        startAnimation('.header-content-column1 .btns', 'horizontalShow', false); 
        startAnimation('.header-content-column2', 'verticalShow', false); 

        startAnimation('.about-us-pic', 'horizontalShow', false); 
        startAnimation('.about-us-text', 'horizontalShow', false); 

        startAnimation('.features-content-row-pic', 'horizontalShow', false); 
        startAnimation('.features-content-row-blocks-block i', 'verticalShow', true); 
        
        startAnimation('.info-block-content-text', 'horizontalShow', false); 
        startAnimation('.info-block-content-pic', 'horizontalShow', false); 

        startAnimation('.contact-us-content h2', 'horizontalShow', false);  
        startAnimation('.contact-us-content-block', 'horizontalShow', false);   
        
        startAnimation('.price-content h2', 'horizontalShow', false);
        startAnimation('.price-content .underline', 'horizontalShow', false);
        startAnimation('.price-content-blocks-block', 'verticalShow', true); 
        
        startAnimation('.our-clients-content h2', 'horizontalShow', false);
        startAnimation('.our-clients-content .underline', 'horizontalShow', false);
        startAnimation('.our-clients-content-logos-logo', 'verticalShow', true); 

        startAnimation('.reviews-content h2', 'horizontalShow', false);
        startAnimation('.reviews-content .underline', 'horizontalShow', false);
        startAnimation('.reviews-content-paginate', 'verticalShow', false);

        startAnimation('.footer-content-contacts', 'verticalShow', false); 
        startAnimation('.footer-content form input', 'verticalShow', true); 
        startAnimation('.footer-content form textarea', 'verticalShow', false); 
        startAnimation('.footer-content form button', 'verticalShow', false); 

        startAnimation('.social-btns a', 'verticalShow', true); 
    };

    window.addEventListener('scroll', onScrollAndLoad);
    window.addEventListener('load', onScrollAndLoad);
    
    function startAnimation(el, addClass, few) {

        let animEl = document.querySelector(el);
        let animElFromTop = animEl.getBoundingClientRect().top;
        let middleWindow = window.innerHeight;

        if (animElFromTop <= middleWindow) {
            if (few == true) {

                let animEls = document.querySelectorAll(el);
                animEls.forEach(function(item, index){
                    item.classList.add(addClass);
                    item.style.animationDelay = index/3+'s';
                });

            } else {
                animEl.classList.add(addClass);
            }
            return;
        }
    }

    // Плавная прокрутка вверх
    $('.arrow-up').click(function(){
        $('html, body').animate({
            scrollTop : 0
        }, 1000);
    });

    // Плавная прокрутка к элементу по клику на пункт меню
    $("#menu").find("a").click(function (e) {
        e.preventDefault();
        //забираем идентификатор блока с атрибута href
        let id  = $(this).attr('href');

        //узнаем высоту от начала страницы до блока на который ссылается якорь
        let top = $(id).offset().top - $(menu).outerHeight() + 1;
            
        //анимируем переход на расстояние - top
        $('body,html').animate({scrollTop: top}, 1500);

    });

    // Плавная прокрутка к  разным блокам по клику на многочисленные кнопки лендинга


    $("body").find("button").click(function (e) {
        if($(this).attr('href') !== '#') {
            e.preventDefault();
            let id  = $(this).attr('href');
            let top = $(id).offset().top - $(menu).outerHeight() + 1;
            $('body,html').animate({scrollTop: top}, 1500); 
        }

    });

    // Кнопка меню для адаптивной версии
    let menuBtn = menu.querySelector('.nav-box-burger');

    menuBtn.addEventListener('click', function() {
        document.querySelector('.nav-box').classList.toggle('open');
    }); 


    // $('[data-type="background"]').each(function(){
    //     var $bgobj = $(this); // создаем объект
    //     $(window).scroll(function() {
    //         var yPos = -($(window).scrollTop() / $bgobj.data('speed')); // вычисляем коэффициент 
    //         // Присваиваем значение background-position
    //         var coords = 'center '+ yPos + 'px';
    //         // Создаем эффект Parallax Scrolling
    //         $bgobj.css({ backgroundPosition: coords });
    //     });
    // });
      

    //Карусель для отзывов
    let dots = document.querySelectorAll('[class^="reviews-content-paginate-dot-"]');
    let firstDot = document.querySelector('[class^="reviews-content-paginate-dot-"]');
    firstDot.classList.add('active');
    let reviewsBox = document.querySelector(".reviews-content-slider"); 
    reviewsBox.style.width = `${100*dots.length}%`; 
    
    
    let lastClick = "";
    dots.forEach(function(dotsItem){
        dotsItem.addEventListener('click', function() {
            if (lastClick){
                lastClick.classList.remove("active");
            } else {
                firstDot.classList.remove('active');
            }
           
           let reviewId = this.getAttribute('data-num') - 1;
        //   let reviewEL = reviewsBox.querySelector(".reviews-content-slider-box-" + reviewId);
           reviewsBox.style.transform =`translateX(-${reviewId * 100/dots.length}%)`; 
           dotsItem.classList.add("active");
           lastClick =  dotsItem;   
        });
    });

    // Отправка заявки с двух форм и ответ
    // + Проверка форм на пустоту
    let form = document.querySelector('.header-content-column2 form');

    form.addEventListener('submit', function(e){
        e.preventDefault();
        let userName = this.querySelector('[name = username]');
        let userMail = this.querySelector('[name = usermail]');

        if ( userName.value == '' || userMail.value == '') {
            if (userName.value == ''  ) {
                userName.classList.add('error'); 
            } else {
                userName.classList.remove('error');   
            }
            if (userMail.value == ''  ) {
                userMail.classList.add('error');   
            } else {
                userMail.classList.remove('error');   
            }
        } else {
            userName.classList.remove('error');
            userMail.classList.remove('error');  
       
            
            let xhr = new XMLHttpRequest();
            xhr.open('POST', this.action);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(`username=${userName.value}&usermail=${userMail.value}`);
            
            let that = this;
            xhr.addEventListener('load', function(){
                let resultEl = that.querySelector('button');
                resultEl.innerHTML = xhr.responseText;
                resultEl.classList.add('disabled');
            });
        }
    });

    let formComment = document.querySelector('.footer-content form');

    formComment.addEventListener('submit', function(e){
        e.preventDefault();
        let userName = this.querySelector('[name = username]');
        let userMail = this.querySelector('[name = usermail]');
        let messageArea = this.querySelector('[name = message]');

        if ( userName.value == '' || userMail.value == '') {
            if (userName.value == ''  ) {
                userName.classList.add('error'); 
            } else {
                userName.classList.remove('error');   
            }
            if (userMail.value == ''  ) {
                userMail.classList.add('error');   
            } else {
                userMail.classList.remove('error');   
            }
        } else {
            userName.classList.remove('error');
            userMail.classList.remove('error');  

            let xhr = new XMLHttpRequest();
            xhr.open('POST', this.action);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(`username=${userName.value}&usermail=${userMail.value}&message=${messageArea.value}`);

            let that = this;
            xhr.addEventListener('load', function(){
                let resultEl = that.querySelector('button');
                resultEl.innerHTML = xhr.responseText;
                resultEl.classList.add('disabled');
            });
        }
    });
});

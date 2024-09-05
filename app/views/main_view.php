<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>My office</title>    
    <link rel="stylesheet" href="css/cblocks/profile.css">
    <link rel="stylesheet" href="css/cblocks/sidebar.css">
    <link rel="stylesheet" href="css/blocks/popup.css">
    <link rel="stylesheet" href="css/pages/my-office-page.css"
</head>
<body style="background-color: #F9F9FA;">
    <div class="office-page">
        <h1>Мой кабинет</h1>
        
        <div class="office-page-body">

            <div class="sidebar">
        
                <div class="sidebar__header">
                        <p>Алихан Галачиев</p>
                        <p>Покупатель</p>
                </div>  
                <div class="sidebar__item sidebar__item--active">Мой профиль</div>
                <div class="sidebar__item">Status Club</div>
                <div class="sidebar__item">Заказы</div><div class="sidebar__item">Избранные товары</div>  
                <div class="sidebar__item">Отзывы о товарах</div>
                <div class="sidebar__item">Выход</div>
                
            </div>


            <div class="profile">
                <h1>Мой профиль</h1>
                <div class="profile__menu-container">
                        <div class="profile__menu-box  profile__menu-box--active">
                            Личные данные
                        </div>
                        <div class="profile__menu-box">
                            Адрес доставки
                        </div>
                        <div class="profile__menu-box">
                            Пароль
                        </div>
                </div>

                <form>
                    <label for="mail">E-mail</label>
                    <input type="email" id="mail" placeholder="example@mail.ru"  required>
                

        
            
                    <div class="profile__phones_block"> 
                        <div class="profile__phones_box">
                            <label for="phone">Номер телефона</label>
                            <input type="tel"  class="short" id="phone" placeholder="(XXX) XXX-XXXX" maxlength="17" required pattern="^\(\d{3}\) \d{3}-\d{4}$""></input>
                        </div>
                        <div class="profile__phones_box">
                            <label for="additionalPhone">Дополнительный номер</label>
                            <input type="tel"  class="short" id="additionalPhone" placeholder="(XXX) XXX-XXXX" maxlength="17" pattern="^\(\d{3}\) \d{3}-\d{4}$""></input>
                        </div>
                    </div>
            
                    <label for="surname">Фамилия</label>
                    <input type="text" class="fio-input" id="surname" required>

                    <label for="name">Имя</label>
                    <input type="text" class="fio-input" id="name" required>
                        
                    <label for="fatherName">Отчество</label>
                    <input type="text" id="fatherName" class="fio-input" "></input>
            
                    <label>Дата рождения</label>
                    <div class="profile__birthday-container">
                        <div class="profile__birthday-box"  >
                            <p id="day">1</p>
                            <ul class="popup" id="dayPopup"></ul>
                        </div>
                    
                        <div class="profile__birthday-box profile__birthday-box_months">
                            <p id="month">Январь</p>
                            <ul class="popup" id="monthPopup"></ul>
                            
                        </div>
                        <div class="profile__birthday-box">
                            <p id="year">1998</p>
                            <ul class="popup" id="yearPopup"></ul>
                        </div>
                    </div>
            
                    <label class="profile__label">Пол</label>
                    <div>
                        <input type="text" class="profile__gender-box" value="Мужской" readonly ></input>
                        <input type="text" class="profile__gender-box" value="Женский" readonly></input>
                    </div>

                    <!-- <input type="button" name="saveProfile" id="saveButton" placeholder="Сохранить изменения"> -->
                    <input type="button"  class="save-button" id="saveChangings" value="Сохранить изменения">
                    <!-- <div class="profile__save-button" id="saveButton">
                        <p>Сохранить изменения</p>
                    </div> -->
                </form>
            </div">

        </div>
    </div>
   
    
    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    

    <script>
        $(document).ready(function() {

            function formatPhoneNumber(input) {
                let value = input.value.replace(/\D/g, ''); // Удаляем все нецифровые символы
                let formatted = '';

                if (value.length > 0) {
                    formatted += '(' + value.substring(0, 3);
                }
                if (value.length >= 4) {
                    formatted += ') ' + value.substring(3, 6);
                }
                if (value.length >= 7) {
                    formatted += '-' + value.substring(6, 10);
                }

                input.value = formatted;
            }

            // Выбираем все поля ввода с типом 'tel'
            const phoneInputs = document.querySelectorAll('input[type="tel"]');

            // Добавляем обработчик событий на каждое поле
            phoneInputs.forEach(input => {
                input.addEventListener('input', function() {
                    formatPhoneNumber(this);
                });
            });

            function formatFIO(input) {
                let value = $(input).val(); 
                if (value.length === 1) {   
                    $(input).val(value.toUpperCase()); 
                }
            }

            $('.fio-input').on('input', function() {
                formatFIO(this);
            });

            const months = {
                'Январь': 31,
                'Февраль': 28,
                'Март': 31,
                'Aпрель': 30,
                'Май': 31,
                'Июнь': 30,
                'Июль': 31,
                'Август': 31,
                'Cентябрь': 30,
                'Октябрь': 31,
                'Ноябрь': 30,
                'Декабрь': 31,
            };



            for (let i = 1; i <= months[$('#month').text()]; i++) {
                $('#dayPopup').append(`<li class="popup__item">${i}</li>`);
            };

            Object.keys(months).forEach(element => {
                $('#monthPopup').append(`<li class="popup__item">${element}</li>`);
            });

            for (let i = 1970; i <= new Date().getFullYear(); i++) {
                $('#yearPopup').append(`<li class="popup__item">${i}</li>`);
            };

            $('.profile__birthday-container').on('click', 'div', function(){
                $('.popup--active').removeClass('popup--active');
                $(this).children('.popup').addClass('popup--active');
            });

            $('.popup__item').on('click', function(event){
                event.stopPropagation();
                if($(this).parent('.popup').is('#monthPopup')){
                    $('#day').text(1);
                };
                $(this).parents('.profile__birthday-box').children('p').text($(this).text());
                $('.popup--active').removeClass('popup--active');

            })

            $(document).on('click', function(event) {
                if (!$(event.target).closest('.profile__birthday-box').length) {
                    $('.popup--active').removeClass('popup--active');
                }
            });

            $('.profile__gender-box').on('click', function() {
                $('.profile__gender-box--active').removeClass('profile__gender-box--active');
                $(this).addClass('profile__gender-box--active');
            })

            $('#saveChangings').on('click', function() {
                const user = {
                    mail: $('#mail').val(),
                    phone: $('#phone').val(),
                    additionalPhone: $('#additionalPhone').val(),
                    surname: $('#surname').val(),
                    name: $('#name').val(),
                    fatherName: $('#fatherName').val(),
                    day: $('#day').text(),
                    month: $('#month').text(),
                    year: $('#year').text(),
                    gender: $('.profile__gender-box--active').val()

                    
                }

                console.log(user);
                let json = JSON.stringify(user);
                console.log(json);


            })

        });
    </script>
    
    
    
</body>
</html>
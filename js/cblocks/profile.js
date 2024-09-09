
$(document).ready(function() {

    function formatPhoneNumber(input) {
        if (input.value === '+7(') {
            input.value = '';
            return;
        }
        let value = input.value.replace(/\D/g, ''); // Удаляем все нецифровые символы
        if (value.length > 1) {
            value = value.slice(1);
        }
        let formatted = '';

        if (value.length > 0) {
            formatted += '+7(' + value.substring(0, 3);
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

    const daysInMonth = {
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
    const months = {
        'январь': 0,
        'февраль': 1,
        'март': 2,
        'апрель': 3,
        'май': 4,
        'июнь': 5,
        'июль': 6,
        'август': 7,
        'сентябрь': 8,
        'октябрь': 9,
        'ноябрь': 10,
        'декабрь': 11
    };



    for (let i = 1; i <= daysInMonth[$('#month').text()]; i++) {
        $('#dayPopup').append(`<li class="profile__popup-item">${i}</li>`);
    };

    Object.keys(daysInMonth).forEach(element => {
        $('#monthPopup').append(`<li class="profile__popup-item">${element}</li>`);
    });

    for (let i = 1970; i <= new Date().getFullYear(); i++) {
        $('#yearPopup').append(`<li class="profile__popup-item">${i}</li>`);
    };

    $('.profile__birthday').on('click', 'div', function(){
        $('.profile__popup--active').removeClass('profile__popup--active');
        $(this).children('.profile__popup').addClass('profile__popup--active');
    });

    $('.profile__popup-item').on('click', function(event){
        event.stopPropagation();
        if($(this).parent('.profile__popup').is('#monthPopup')){
            $('#day').text(1);
        };
        $(this).parents('.profile__birthday-item').children('p').text($(this).text());
        $('.profile__popup--active').removeClass('profile__popup--active');

    })

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.profile__birthday-item').length) {
            $('.profile__popup--active').removeClass('profile__popup--active');
        }
    });

    $('.profile__gender-item').on('click', function() {
        $('.profile__gender-item--active').removeClass('profile__gender-item--active');
        $(this).addClass('profile__gender-item--active');
    });

    // $(".profile__personal-data").on('submit', function(event) {

    //     console.log('sdfdfs')
    //     event.preventDefault(); // Останавливаем отправку формы для проверки
    //     const form = $(this)[0];


    //     const formData = new FormData(form);
    //     console.log(2);
    //     // Пример просмотра содержимого FormData
    //     console.log(formData.entries());
    //     for (let [key, value] of formData.entries()) {
    //         console.log(`${key}: ${value}`);
    //     }
    //     //     alert('Форма успешно отправлена.');
    //     // }
    //     console.log(3);
    // });

    $('.profile__personal-data').on('submit', function(event) {
        event.preventDefault();
        const form = $('.profile__personal-data')[0];
        const mail =$('#mail').val();
        const phone =$('#phone').val();
        const additionalPhone =$('#additionalPhone').val();
        const surname =$('#surname').val();
        const name =$('#name').val();
        const fatherName =$('#fatherName').val();
        const day =$('#day').text();
        const month =$('#month').text();
        const year =$('#year').text();
        const gender =$('.profile__gender-item--active').val();
        
        let invalids = [];

        validate_mail(mail);
        validate_fiofield(surname);
        validate_fiofield(name);
        if(fatherName !== '') {
            validate_fiofield(fatherName);
        }
        const date = new Date(year, months[month.toLowerCase()], day).toISOString();
        

        const formData = new FormData(form);
        formData.append('birthday', date);
       
        fetch('http://localhost:9000/profile/save_info', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            } else if (response.ok) {
                return response.json();
            } else {
                throw new Error('Network response error');
            }
        })
        .then(data => {
            console.log('Success', data);
        })
        .catch(error => {
            console.error('Error', error);
        })
        ;

        function validate_mail(mail) {
            const regexes = [/@yandex\.ru/, /@gmail\.com/, /@mail\.ru/]
            const isValid = regexes.some((regex)=> regex.test(mail));
            if (!isValid) {
                alert("Invalid email")
                return;
            }
        }
         function validate_fiofield(text) {
            if (2 < text.length > 20) {
                alert("fio fields length must be higher then 2 and lowwer then 20");
                return;
            }
        }


    });

});

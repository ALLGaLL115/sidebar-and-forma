<div class="profile">
                <h1>Мой профиль</h1>
                <div class="profile__menu">
                        <div class="profile__menu-item  profile__menu-item--active">
                            Личные данные
                        </div>
                        <div class="profile__menu-item">
                            Адрес доставки
                        </div>
                        <div class="profile__menu-item">
                            Пароль
                        </div>
                </div>

                <form class="profile__personal-data" action="http://localhost:9000/profile/index">
                    <label class="profile__label required" for="mail">E-mail</label>
                    <input 
                        type="email" 
                        class="profile__input" 
                        id="mail"  
                        name="email"
                        placeholder="example@mail.ru"
                        minlength="2"
                        maxlength="20" 
                        required 

                        
                     
                    >
                

                    <div class="profile__phones"> 
                        <div class="profile__phones_item">
                            <label class="profile__label required" for="phone">Номер телефона</label>
                            <input 
                                type="tel" 
                                class="profile__input profile__input--short" 
                                id="phone" 
                                name="phone"
                                placeholder="+7(XXX) XXX-XXXX" 
                                maxlength="17" 
                                pattern="^\+7\(\d{3}\) \d{3}-\d{4}$"
                                required
                            >
                        </div>
                        <div class="profile__phones_item">
                            <label class="profile__label" for="additionalPhone">Дополнительный номер</label>
                            <input 
                                type="tel" 
                                class="profile__input profile__input--short" 
                                id="additionalPhone" 
                                name="additionalPhone"
                                placeholder="+7(XXX) XXX-XXXX" 
                                maxlength="17" 
                                pattern="^\(\d{3}\) \d{3}-\d{4}$"
                            >
                        </div>
                    </div>
            
                    <label class="profile__label required" for="surname">Фамилия</label>
                    <input 
                        type="text" 
                        class="profile__input fio-input" 
                        id="surname"
                        name="surname" 
                        pattern="[A-Za-zА-Яа-я]+"
                        minlength="2"
                        maxlength="20"
                        required
                    >

                    <label class="profile__label required" for="name">Имя</label>
                    <input 
                        type="text"
                        class="profile__input fio-input" 
                        id="name"
                        name="name"
                        pattern="[A-Za-zА-Яа-я]+"
                        minlength=2
                        maxlength="20"
                        required
                    >
                        
                    <label class="profile__label" for="fatherName">Отчество</label>
                    <input 
                        type="text"
                        class="profile__input fio-input"
                        id="fatherName"
                        name="fatherName" 
                        minlength="2"
                        maxlength="20"
                        pattern="[A-Za-zА-Яа-я]+"
                    >
            
                    <label class="profile__label">Дата рождения</label>
                    <div class="profile__birthday">
                        <div class="profile__birthday-item"  >
                            <p id="day">1</p>
                            <ul class="profile__popup" id="dayPopup"></ul>
                        </div>
                    
                        <div class="profile__birthday-item profile__birthday-item_months">
                            <p id="month">Январь</p>
                            <ul class="profile__popup" id="monthPopup"></ul>
                            
                        </div>
                        <div class="profile__birthday-item">
                            <p id="year">1998</p>
                            <ul class="profile__popup" id="yearPopup"></ul>
                        </div>
                    </div>
            
                    <label class="profile__label ">Пол</label>
                    <div>
                        <input 
                            type="text"
                            class="profile__gender-item profile__gender-item--active" 
                            value="Мужской"
                            readonly 
                        >
                        <input 
                            type="text"
                            class="profile__gender-item"
                            value="Женский" 
                            readonly
                        >
                    </div>

                    <!-- <input type="button" name="saveProfile" id="saveButton" placeholder="Сохранить изменения"> -->
                    <input 
                        type="submit"
                        class="profile__save-button" 
                        id="saveChangings" 
                        value="Сохранить изменения"
                    >
                    <!-- <div class="profile__save-button" id="saveButton">
                        <p>Сохранить изменения</p>
                    </div> -->
                </form>
            </div>
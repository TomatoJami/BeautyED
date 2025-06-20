<?php
$availableLangs = ['en', 'rus'];

if (isset($_GET['lang']) && in_array($_GET['lang'], $availableLangs)) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $_SESSION['lang'] ?? 'en';
$GLOBALS['lang'] = $lang;
if (!in_array($lang, $availableLangs)) {
    $lang = 'en';
    $_SESSION['lang'] = $lang;
}

$translations = [
    'en' => [
        'feedback' => 'Feedback',
        'contacts' => 'Contacts',
        'adminpanel' => 'Admin panel',
        'book' => 'Book your time',
        'login' => 'Login',
        'logout' => 'Logout',
        'register' => 'Register',
        'our_mission' => 'OUR MISSION:',
        'narva' => 'Narva',
        'slogan' => 'A premium flagship beauty salon from the heart of Paris!',
        'mission_text' => 'To emphasize, enhance and support the style of each client,
                           taking into account their needs and wishes, using fundamental
                           knowledge and modern technologies in the beauty industry.',
        'salon' => 'SALON SERVICES:',
        'team' => 'OUR TEAM:',
        'adress' => 'Astri Keskus<br>Tallinna mnt 41,<br>Narva 3. floor',
        'content' => 'A leading premium beauty salon right from the heart of Paris!',
        'website' => 'Website',
        'opening_hours' => 'OPENING HOURS:<br>M-S: 10:00 — 20:00<br>S: 10:00 — 18:00',
        'greetings' => "Hello,",
        'name' => "Name",
        'mail' => "Mail",
        'phone' => "Phone",
        'password' => 'Password',
        'changeData' => 'Change data',
        'changeDataSuccess' => 'Data changed!',
        'deleteData' => 'Delete data',
        'service' => 'Service',
        'master' => 'Master',
        'price' => 'Price',
        'datetime' => 'Date & Time',
        'appointmentsTitle' => 'Your appointments',
        'accountEdit' => 'Account edit',
        'submit' => 'Submit',
        'accountDelete' => 'Account delete',
        'delete' => 'Delete',
        'noComment' => 'No comments found',
        'leaveComment' => 'Leave a comment',
        'loginComment' => 'Login to leave a comment',
        'insertData' => 'Insert your data',
        'login2' => 'Login',
        'regSuccess' => 'Registration successful!',
        'regFailure' => 'Registration error or email is already taken',
        'register2' => 'Register',
        'loginFailure' => 'Wrong name or password',
        'chooseSpecialist' => 'Choose specialist',
        'specialistFound' => 'No specialist found',
        'selectDateAndTime' => 'Select date and time',
        'selectService' => 'Select service',
        'confirmAppointment' => 'Confirm Appointment',
        'serviceFound' => 'No services found',
        'selectDate' => 'Select date',
        'selectTime' => 'Select time',
        'noAppointments' => 'Appointments not found',
        'appointmentAdd' => 'Appointment added!',
        'mainmenu' => 'Main menu',
        'error404' => 'Error 404',
        'invalidEmail' => 'Invalid email format!',
        'invalidPhone' => 'Invalid phone format!',
    ],
    'rus' => [
        'feedback' => 'Обратная связь',
        'contacts' => 'Контакты',
        'adminpanel' => 'Панель администратора',
        'book' => 'Записаться',
        'login' => 'Вход',
        'logout' => 'Выйти',
        'register' => 'Регистрация',
        'our_mission' => 'НАША МИССИЯ:',
        'narva' => 'Нарва',
        'slogan' => 'Флагманский салон красоты премиум-класса в самом сердце Парижа!',
        'mission_text' => 'Подчеркнуть, усилить и поддержать стиль каждого клиента,
                           учитывая его потребности и пожелания, используя фундаментальные
                           знания и современные технологии в индустрии красоты.',
        'salon' => 'УСЛУГИ САЛОНА:',
        'team' => 'НАША КОМАНДА:',
        'adress' => 'Astri Keskus<br>Tallinna mnt 41,<br>Нарва 3 этаж',
        'content' => 'Ведущий салон красоты премиум-класса в самом сердце Парижа!',
        'website' => 'Вебсайт',
        'opening_hours' => "ЧАСЫ РАБОТЫ:<br>П-C: 10:00 — 20:00<br>В: 10:00 — 18:00",
        'greetings' => "Привет,",
        'name' => "Имя",
        'mail' => "Почта",
        'phone' => "Телефон",
        'password' => 'Пароль',
        'changeData' => 'Изменить данные',
        'changeDataSuccess' => 'Данные изменены!',
        'deleteData' => 'Удалить данные',
        'service' => 'Услуга',
        'master' => 'Мастер',
        'price' => 'Цена',
        'datetime' => 'Дата и время',
        'appointmentsTitle' => 'Ваши встречи',
        'accountEdit' => 'Редактирование аккаунта',
        'submit' => 'Применить',
        'accountDelete' => 'Удаление аккаунта',
        'delete' => 'Удалить',
        'noComment' => 'Комментарии не найдены',
        'leaveComment' => 'Оставьте комментарий',
        'loginComment' => 'Войдите чтобы оставить комментарий',
        'insertData' => 'Вставьте свои данные',
        'login2' => 'Войти',
        'regSuccess' => 'Регистрация успешна!',
        'regFailure' => 'Ошибка регистрации или адрес электронной почты уже занят',
        'register2' => 'Зарегистрироваться',
        'loginFailure' => 'Неправильное имя или пароль',
        'chooseSpecialist' => 'Выберите специалиста',
        'specialistFound' => 'Не найдено специалистов',
        'selectDateAndTime' => 'Выберите дату и время',
        'selectService' => 'Выберите услугу',
        'confirmAppointment' => 'Подтвердить встречу',
        'serviceFound' => 'Услуги не найдены',
        'selectDate' => 'Выберите дату',
        'selectTime' => 'Выберите время',
        'noAppointments' => 'Встречи не найдены',
        'appointmentAdd' => 'Встреча добавлена!',
        'mainmenu' => 'Главное меню',
        'error404' => 'Ошибка 404',
        'invalidEmail' => 'Невалидный формат почты!',
        'invalidPhone' => 'Невалидный формат телефона!',
    ]
];

global $t;
$t = $translations[$lang];
?>

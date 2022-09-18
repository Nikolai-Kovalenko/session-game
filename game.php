<?php
session_start();

unset($_SESSION['range']);
unset($_SESSION['error']);
unset($_SESSION['log']);

//Проверка ХП юзера. Если в массиве ничего нет, то присваивается значение 10.
// Если же там уже есть значение, то этот шаг пропускается
if ($_SESSION['userHP'] == '') {
    $_SESSION['userHP'] = 10;
}

//Далее идёт этот шаг. Тут такую же проверку, как и юзер проходит север.
if ($_SESSION['serverHP'] == '') {
    $_SESSION['serverHP'] = 10;
}

// Число, которое ввёл пользователь
$range = $_POST["range"];
$_SESSION['range'] = $range;


//Функция для редиректа на основную страницу
function redirect(){
    header('Location: index.php');
//    exit();
}

// Проверка введённых значений
if ($range == ""){
    $_SESSION['error'] = "Ошибка! Вы ничего не ввели, введите число от 1 о 3";
    redirect();
}  else if ($range < 1) {
    $_SESSION['error'] = "Ошибка! $range не входит в диапазон целых чисел от 1 до 3";
    redirect();
} else if ($range > 3) {
    $_SESSION['error'] = "Ошибка! $range не входит в диапазон целых чисел от 1 до 3";
    redirect();
} elseif ($userHP > 0 and $serverHP > 0) {
    redirect();
} else {
    //Рандомное число сервера
    $server_random_num = rand(1,3);

    if ($range <> $server_random_num) { # Если компьютер не угадал число пользователя, то ХП отнимается у компьютера
        $_SESSION['serverHP'] -= rand(1, 4);
        $last_log_sr = "У сервера теперь ". $_SESSION['serverHP'].  " ХП";
        $_SESSION['log'] =  $last_log_sr;
        redirect();
    } elseif ($range == $server_random_num) { # Если компьютер угадал число пользователя, то ХП отнимается у пользователя
        $_SESSION['userHP'] -= rand(1, 4);
        $last_log_us = "У юзера теперь ". $_SESSION['userHP']. " ХП";
        $_SESSION['log'] =  $last_log_us;
        redirect();
    }
}


<?php
//Мини-игра, цель которой показать, что алкоголизм - это плохо.
// Мы создаём страничку /index.php?page=game1 под игру.
// Создаются 2 персонажа, у обоих по 10хп (2 сессионных переменных), создаётся форма,
// где пользователь вводит число от 1 до 3 и отправляет запрос на сервер.
// На сервере запустить rand(1,3), и если значение человека со значением случайным совпадает, то снимаются ХП с персонажа человека (клиента),
// если не совпадают - с серверного персонажа. Отнимать надо от 1 до 4хп, случайным образом).
// То есть вероятность 33%, что отнимутся у клиента, и 66%, что у серверного персонажа.
// В момент, когда у одного из персонажей ХП становится 0 и ниже, - перебрасывать на другую страницу
// при помощи переадресации (header) на страницу index.php?module=games&page=game1over , и выводить текст,
// победил ли игрок, или система. Не забываем, что для удобства пользователя необходимо выводить всю известную информацию,
// то есть какой урон был нанесён, кто кому нанёс, сколько сейчас хп осталось у каждого игрока.
// Так же возможность начать игру заново. Желательно для корректировки системы использовать переменные-свойства,
// то есть 10hp - это $basehp , то есть изменив эту переменную скрипт будет иным.

session_start();
//unset($_SESSION['serverHP']);
//unset($_SESSION['userHP']);
//unset($_SESSION['range']);
//unset($_SESSION['error']);
//unset($_SESSION['log']);

?>
<br><br>
<br><br>

<form action="game.php" method="post">
    <input type="text" name="range" value="<?=$_SESSION['range']?>" placeholder="Введите число от 1 до 3"><br>
    <br><div class="text danger"><?=$_SESSION['error']?></div>
    <div class="text danger"><?=$_SESSION['log']?></div><br>
    <button class="submit" class="btn btn-success">В бой</button><br>
</form>

<?php   


function new_game() {
    unset($_SESSION['serverHP']);
    unset($_SESSION['userHP']);
    unset($_SESSION['range']);
    unset($_SESSION['error']);
    unset($_SESSION['log']);
}

if ($_SESSION['userHP'] <= 0 ||  $_SESSION['serverHP'] <= 0) {

    unset($_SESSION['error']);
    unset($_SESSION['log']);

    if ($_SESSION['userHP'] <= 0) {
        echo "ВЫГРАЛ СЕРВЕР ! <br>";
        echo "У сервера осталось ". $_SESSION['serverHP']. " ХП. <br> А вот у юзера ". $_SESSION['userHP']. " ХП )";
        echo "<br> Чтобы начать заново нажмите: 'В бой'";
        new_game();
    } elseif ($_SESSION['serverHP'] <= 0) {
        echo "ВЫ ВЫГРАЛИ ! <br>";
        echo "У вас осталось ". $_SESSION['userHP']. " ХП. <br> А вот у сервера ". $_SESSION['serverHP']. " ХП )";
        echo "<br> Чтобы начать заново нажмите кнопку: 'В бой'";
        new_game();
    }
}

?>

<?php
//error_reporting(-1);
//header('Content-type: text/html; charset=utf-8');
//?>
<!--<html>-->
<!--<head>-->
<!--    <title>Битва алкоголиков или второе задание</title>-->
<!--    <link href="../CSS/Bitwa_alkogolikow.css" rel="stylesheet" type="text/css">-->
<!--</head>-->
<!--<body>-->
<?php
//
//session_start();
//
//$_SESSION['betmen']=10;
//$_SESSION['superman']=10;
//
//function bitwa($igrok, $udar){
//    $igrok-$udar;
//}
//
//if(isset($_POST['num'])){
//    if(!$_SESSION['betmen']||$_SESSION['superman'] ==0){
//        if($_POST['num']== rand(1, 3)){
//            $_SESSION['superman']=$_SESSION['superman']-rand(1, 4);
//        }  else {
//            $_SESSION['betmen']=  bitwa($_SESSION['betmen'], rand(1, 4));
//        }
//        header("Location: game.php?page=gameover");
//    }
//}
//?>
<!--<div class="meingame border">-->
<!--    <div class="bitwa_alkogolikowgame border">-->
<!--        <div class="f_l betmengame">-->
<!--            <div class="">-->
<!--                <img src="foto/betman.jpg" alt="Ваш персонаж">-->
<!--            </div>-->
<!--            <div>-->
<!--                <b>Ваш персонаж</b>-->
<!--            </div>-->
<!--            <div>-->
<!--                --><?php
//                echo 'Осталось '.$_SESSION['betmen'].' жизни';
//                ?>
<!--            </div>-->
<!--        </div>-->
<!--        <div class="f_r supermangame">-->
<!--            <div class="">-->
<!--                <img src="foto/superman.jpg" alt="Персонаж компа"/>-->
<!--            </div>-->
<!--            <div>-->
<!--                <b>Персонаж Компа</b>-->
<!--            </div>-->
<!--            <div>-->
<!--                --><?php
//                echo 'Осталось '.$_SESSION['superman'].' жизни';
//                ?>
<!--            </div>-->
<!--        </div>-->
<!--        <div>-->
<!--            <div class="border submitgame f_l">-->
<!--                <form action="" method="post">-->
<!--                    <input type="number" name="num" placeholder="введите число">-->
<!--                    <input type="submit" value="Ударить" name="submit">-->
<!--                </form>-->
<!--            </div>-->
<!--            <div>-->
<!--                --><?php // ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<!--</body>-->
<!--</html>-->


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
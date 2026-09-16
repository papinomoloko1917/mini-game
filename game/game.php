<?php

require_once __DIR__ . '/../ui.php';

clearScreen();

title('🐉 Вы встречаете дракона');

animation(
    'dragon_voice.gif',
    duration: 3,
    speed: '10fps',
    width: 50,
    height: 20
);

say();
say(red('Дракон рычит на вас!'));

say();

option(1, '⚔️ Атаковать');
option(2, '🏃 Убежать');

$choice = ask();

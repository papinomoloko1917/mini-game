<?php

require_once __DIR__
    . '/../ui/commands.php';

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

say(red('Дракон громко рычит!'));

say();

option(1, '⚔️ Атаковать');
option(2, '💬 Поговорить');
option(3, '🏃 Убежать');

$choice = ask();

if ($choice === '1') {
    say(red('Ты бросаешься на дракона!'));
}

if ($choice === '2') {
    say(yellow('Дракон внимательно тебя слушает...'));
}

if ($choice === '3') {
    say(green('Ты успешно убежал!'));
}

waitForEnter();

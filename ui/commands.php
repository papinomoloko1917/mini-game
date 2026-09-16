<?php

require_once __DIR__ . '/colors.php';


function clearScreen(): void
{
    echo "\033[2J\033[H";
}


function title(string $text): void
{
    echo cyan(
        "════════════════════════════════\n"
    );

    echo ' ' . bold($text) . "\n";

    echo cyan(
        "════════════════════════════════\n"
    );
}


function say(string $text = ''): void
{
    echo " $text\n";
}


function option(int $number, string $text): void
{
    echo ' '
        . cyan("[$number]")
        . " $text\n";
}


function ask(string $text = 'Твой выбор'): string
{
    echo "\n";
    echo cyan("$text > ");

    return trim(fgets(STDIN));
}


function waitForEnter(): void
{
    echo "\n";
    echo dim('Нажми Enter...');

    fgets(STDIN);
}


function chafaPath(): string
{
    return dirname(__DIR__)
        . '/runtime/chafa/chafa.exe';
}


function image(
    string $filename,
    int $width = 50,
    int $height = 20
): void {
    $root = dirname(__DIR__);

    $path = $root
        . '/images/'
        . $filename;

    $chafa = chafaPath();

    if (!is_file($path)) {
        echo red(
            "Картинка не найдена: $path"
        ) . "\n";

        return;
    }

    if (!is_file($chafa)) {
        echo red(
            "Chafa не найдена: $chafa"
        ) . "\n";

        return;
    }

    $command = sprintf(
        '%s --format symbols --size %dx%d %s',
        escapeshellarg($chafa),
        $width,
        $height,
        escapeshellarg($path)
    );

    passthru($command);
}


function animation(
    string $filename,
    float $duration = 2,
    string $speed = '12fps',
    int $width = 45,
    int $height = 18
): void {
    $root = dirname(__DIR__);

    $path = $root
        . '/images/'
        . $filename;

    $chafa = chafaPath();

    if (!is_file($path)) {
        echo red(
            "Анимация не найдена: $path"
        ) . "\n";

        return;
    }

    if (!is_file($chafa)) {
        echo red(
            "Chafa не найдена: $chafa"
        ) . "\n";

        return;
    }

    $command = sprintf(
        '%s --format symbols --duration %s --speed %s --size %dx%d %s',
        escapeshellarg($chafa),
        escapeshellarg((string) $duration),
        escapeshellarg($speed),
        $width,
        $height,
        escapeshellarg($path)
    );

    passthru($command);
}

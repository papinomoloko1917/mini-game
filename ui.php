<?php

function clearScreen(): void
{
    echo "\033[2J\033[H";
}

function color(string $text, int $color): string
{
    return "\033[{$color}m$text\033[0m";
}

function red(string $text): string
{
    return color($text, 31);
}

function green(string $text): string
{
    return color($text, 32);
}

function yellow(string $text): string
{
    return color($text, 33);
}

function cyan(string $text): string
{
    return color($text, 36);
}

function title(string $text): void
{
    echo color(
        "════════════════════════════════\n",
        36
    );

    echo " \033[1m$text\033[0m\n";

    echo color(
        "════════════════════════════════\n",
        36
    );
}

function say(string $text = ''): void
{
    echo " $text\n";
}

function option(int $number, string $text): void
{
    echo " " . cyan("[$number]") . " $text\n";
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
    echo "\033[2mНажми Enter...\033[0m";

    fgets(STDIN);
}

function image(
    string $filename,
    int $width = 50,
    int $height = 20
): void {
    $path = __DIR__ . '/images/' . $filename;
    $chafa = chafaPath();

    if (!is_file($path)) {
        echo red("Картинка не найдена: $path") . "\n";
        return;
    }

    if (!is_file($chafa)) {
        echo red("Chafa не найдена: $chafa") . "\n";
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
    $path = __DIR__ . '/images/' . $filename;
    $chafa = chafaPath();

    if (!is_file($path)) {
        echo red("Анимация не найдена: $path") . "\n";
        return;
    }

    if (!is_file($chafa)) {
        echo red("Chafa не найдена: $chafa") . "\n";
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

function chafaPath(): string
{
    return __DIR__ . '/runtime/chafa/chafa.exe';
}

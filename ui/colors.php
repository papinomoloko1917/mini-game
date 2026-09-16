<?php

const ANSI_RESET = "\033[0m";
const ANSI_BOLD = "\033[1m";
const ANSI_DIM = "\033[2m";

const ANSI_RED = "\033[31m";
const ANSI_GREEN = "\033[32m";
const ANSI_YELLOW = "\033[33m";
const ANSI_BLUE = "\033[34m";
const ANSI_MAGENTA = "\033[35m";
const ANSI_CYAN = "\033[36m";
const ANSI_WHITE = "\033[37m";


function color(string $text, string $color): string
{
    return $color . $text . ANSI_RESET;
}

function red(string $text): string
{
    return color($text, ANSI_RED);
}

function green(string $text): string
{
    return color($text, ANSI_GREEN);
}

function yellow(string $text): string
{
    return color($text, ANSI_YELLOW);
}

function blue(string $text): string
{
    return color($text, ANSI_BLUE);
}

function magenta(string $text): string
{
    return color($text, ANSI_MAGENTA);
}

function cyan(string $text): string
{
    return color($text, ANSI_CYAN);
}

function white(string $text): string
{
    return color($text, ANSI_WHITE);
}

function bold(string $text): string
{
    return ANSI_BOLD . $text . ANSI_RESET;
}

function dim(string $text): string
{
    return ANSI_DIM . $text . ANSI_RESET;
}

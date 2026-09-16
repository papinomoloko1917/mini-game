@echo off
cd /d "%~dp0"

if not exist "runtime\php\php.exe" (
    echo PHP runtime not found:
    echo runtime\php\php.exe
    echo.
    pause
    exit /b 1
)

"runtime\php\php.exe" "game\game.php"

echo.
pause

REM setting the application's directory to be the one where this bat file is.
set "APP_DIR=%~dp0"

REM checking to see if the application is already installed on the user's PC. Prevents user from reusing docker compose up by accident.
if exist ".installed" (
    echo The application is already installed.
    echo Use start.bat or stop.bat to manage it instead.
    pause
    exit /b 0
)

REM Creating the .installed  marker file the installation script checks for before running.
set MARKER_FILE=%APP_DIR%\.installed

REM Installing the docker containers for the application.
echo  Installing the application...
docker compose up -d

echo  Installation complete!
echo This app is now ready. Use start.bat and stop.bat to control it.

echo Installed on %date% %time% > "%MARKER_FILE%"

pause
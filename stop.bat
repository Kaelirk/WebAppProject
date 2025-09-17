REM Here docker compose stop is used instead of compose down. The is because the objective is to stop the containers, not to delete them and all their contents.
docker compose stop
echo  Application stopped. Data is preserved.
pause
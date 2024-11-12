@echo off
cd /d "C:\ruta\a\tu\repositorio"

REM Obtener la fecha actual en el formato deseado
for /f "tokens=2 delims==" %%i in ('wmic os get localdatetime /value') do set datetime=%%i
set fecha=%datetime:~0,4%-%datetime:~4,2%-%datetime:~6,2%
set hora=%datetime:~8,2%:%datetime:~10,2%

REM Realizar el commit con la fecha y hora en el mensaje
git add .
git commit -m "Auto commit de cambios diarios - %fecha% %hora%"
git push origin main  
REM Asegúrate de usar la rama correcta

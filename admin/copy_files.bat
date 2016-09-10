ECHO OFF

rem  /s all subdirs ex empty ones, /k cp attribs,
rem  /I   If destination does not exist and copying more than one file, assumes that destination must be a directory.
rem  /y Force overwrite.

rem Uncomment this to copy over all external libs. Not everyday job!
 xcopy "..\src\libs-3rd\*" "..\dist\libs-3rd" /s /k /i /y

rem First, remove old to avoid junk piling up in dist.
rmdir "..\dist\assets" /s /q

xcopy "..\src\assets\*" "..\dist\assets" /s /k /i /y



rem If need to do individual files...
rem  asterisk forces cp as file and not dir

rem xcopy "..\src\assets\js\codeApp.js" "..\dist\assets\js\codeApp.js"*  /y
rem xcopy "..\src\assets\css\styles.css" "..\dist\assets\css\styles.css"*  /y


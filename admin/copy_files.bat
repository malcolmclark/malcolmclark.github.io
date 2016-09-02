ECHO OFF

rem  /s all subdirs ex empty ones, /k cp attribs,
rem   /I   If destination does not exist and copying more than one file, 
rem  assumes that destination must be a directory.

rem Uncomment this to copy over all external libs. Not everyday job!
xcopy "..\src\libs-3rd\*" "..\dist\libs-3rd" /s /k /i
xcopy "..\src\images\*" "..\dist\images" /s /k /i


rem  asterisk forces cp as file and not dir

xcopy "..\src\codeApp.js" "..\dist\codeApp.js"*  
xcopy "..\src\styles.css" "..\dist\styles.css"*  


#Code Site - codeApp

## Features
- Nice simple presentation of code for gh-pages or similar.
- Inline JS Console - Redirects JS to JS engine, where results are sent to both browser and console.
- Simple build file: batch compiles to htm,  and copies over dependencies.

##Requirements

At moment it's built using XAMP using PHP 7.0.5 on Windows 8.1. It's pretty basic code so it probably runs on all php versions 5.*.

##Instructions

1. Edit  docs in ./src <your-filename>-src.php. 
2. When run in browser http://localhost/malcolmclark.github.io/[filename]-src.php 
, it compiles a static html page of ./dist/<filename>.htm
3. Batch compile & copy:
	http://localhost/malcolmclark.github.io/admin/build-dist.php
	Excludes external libs in libs-3rd. Uncomment this line in copy_files.bat:

	```sh
	rem xcopy "..\src\libs-3rd\*" "..\dist\libs-3rd" /s /k /i /y
	```
## Technologies

jquery-toc
bootstrap 4a3

##Github Pages

1. I just have a redirect to my dist folder. Don't see yet why any convoluted solution required, as seen on web, apart from maybe prettification and SEO. Have thought about renaming dist to 'en-us'  :)

## Comments

###XAMP
I have found life after WAMP easier with XAMPP. No hickups with any of the online setup tuts. I can share if there are questions.

##Help!
Can HTML5 tags like section and article be used to improve? I keep reading about them and am not yet convinced.
I think in every line of code there is a silent request for help, from somewhere. Feedback is sometimes an answer to such a request. Thank you.





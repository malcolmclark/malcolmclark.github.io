#Code Site

##Instructions

1. Edit src docs [filename]-src.php. When run in browser 
http://localhost/malcolmclark.github.io/[filename]-src.php 
,it compiles a static html page of [filename].htm

2. Batch compile & copy:
	http://localhost/malcolmclark.github.io/admin/build-dist.php
	Excludes external libs in libs-3rd. Uncomment this line in copy_files.bat:

	```sh
	rem xcopy "..\src\libs-3rd\*" "..\dist\libs-3rd" /s /k /i /y
	```

##Github Pages

1. I just have a redirect to my dist folder. Don't see yet why any convoluted solution required, as seen on web, apart from maybe prettification and SEO. Have thought about renaming dist to 'en-us'  :)



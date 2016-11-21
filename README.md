 _______          __  .__  _____         _____          
 \      \   _____/  |_|__|/ ____\__.__. /     \   ____  
 /   |   \ /  _ \   __\  \   __<   |  |/  \ /  \_/ __ \ 
/    |    (  <_> )  | |  ||  |  \___  /    Y    \  ___/ 
\____|__  /\____/|__| |__||__|  / ____\____|__  /\___  >
        \/                      \/            \/     \/ 
		NotifyMe 1.0.0
================================================================================================
Author : Rosdyana Kusuma ( rosdyana.kusuma@gameloft.com )

Author URL : http://r3m1ck.us

App Name : NotifyMe

App URL : https://svn02/vc/jog_hd_documentation/Generals/Products/KRE8/NotifyMe

Version : 1.0.0

Description : 
Simple app to generate simple daily report for devs. 
this app will trigered every devs commited the codes to svnand also in end of day ( 4.45pm ). 
then automatically sent the report after 5.pm to the supervisor.

How to use :
1. add run.bat into svn hooks, so every commit svn will trigered this app
2. modify create_task.bat, change path with which folder you put create_report.bat
3. run create_task.bat , it will create daily task about generate report and you need to check your report before commit it.

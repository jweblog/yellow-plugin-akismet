Akismet plugin
==============
Integrates the well known [Akismet.com](http://akismet.com) spam protection service into Yellow. 

Uses the [Akismet php5 class by Alex Potsides](https://github.com/achingbrain/php5-akismet), available under the terms of the BSD license. 

How do I install this?
----------------------
1. Download and install [Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/schulle4u/yellow-plugin-akismet/archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `master.zip` into your `system/plugins` folder.

To uninstall delete plugin files.

How to use Akismet?
-------------------
*Important*: In order to use Akismet, you first have to optain your Akismet API key from the service website. 

Open `system/config/config.ini` and add your API key: 

`akismetKey: 1234567abcde`

Thats it. The contact form and similar forms are now protected against spam with the Akismet service. You can test it by entering `viagra-test123` in the name field and populate all other fields with normal data. You should see the message `Spam detected` after submitting the form. 

Developer
---------
Steffen Schultz for Datenstrom Yellow. 

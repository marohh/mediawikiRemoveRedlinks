# mediawiki RemoveRedlinks Extension


An extension for Mediawiki to remove Red Links for users not logged in.

Developed by Malte Ahrholdt for https://www.nordicnames.de
Based on an original work by Chad Horohoe <innocentkiller@gmail.com>, 2009

Status **beta**

Purpose and Operation:

* This extension is for [Mediawiki](https://www.mediawiki.org/) installations
* Especially when users not logged in do not have editing privileges, the red visualization of wikilinks to non-existing pages is more confusing than helpful.
* This extension disables red links to non-existing pages to users which are not logged in.
* The red links are still shown to logged in users in order to facilitate editing.

Usage:

* extract "RemoveRedlinks" folder into "extension/" folder of Mediawiki installation
* add  `wfLoadExtension("RemoveRedlinks");` to your LocalSettings.php

Configuration (in LocalSettings.php)
* `$wgRemoveRedLinksAlsoLoggedInUsers = true;` -- set if you want all internal red links to disappear, also for logged in users

Limitation: 
* In mediawiki 1.39, page caching may need to be disabled, otherwise visualization for logged-in and not-logged-in users may mix up.
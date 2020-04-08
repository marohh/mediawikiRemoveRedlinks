# mediawiki RemoveRedlinks Extension

An extension for Mediawiki to remove Red Links for users not logged in. 

Developed by Malte Ahrholdt for https://www.nordicnames.de
Based on an orignal work by Chad Horohoe <innocentkiller@gmail.com>, 2009

Purpose and Operation: 

* This extension is for [Mediawiki](https://www.mediawiki.org/) installations
* Especially when users not logged in do not have editing priveledges, the red visualization of wikilinks to non-existing pages is more confusing than helpful. 
* This extension disables red links to non-existing pages to users which are not logged in. 
* The red links are still shown to logged in users in order to facilitate editing. 

Usage: 

* extract into "extension/" folder of mediawiki installation
* add  wfLoadExtension("RemoveRedlinks");
 to your LocalSettings.php

# mediawiki RemoveRedlinks Extension
An extension for [MediaWiki](https://www.mediawiki.org/) to remove red links for users not logged in.

Developed by Malte Ahrholdt for https://www.nordicnames.de based on an original work by Chad Horohoe <innocentkiller@gmail.com> in 2009.

Status: **release**

## Purpose and operation
* When users who aren't logged in don't have editing permissions or usually don't see the need to edit, links to non-existent pages is more confusing than helpful.
* Links to non-existent pages that aren't `nofollow` is bad for SEO
* This extension disables red links to non-existing pages to users which are not logged in.
* The red links are still shown to logged in users in order to facilitate editing.

## Installation
1. Download this repository as a ZIP file
2. Extract the "RemoveRedlinks" folder into the `extensions/` folder of your MediaWiki installation
3. Add `wfLoadExtension("RemoveRedlinks");` to `LocalSettings.php`

### Configuration
* `$wgRemoveRedLinksAlsoLoggedInUsers`: set to true in `LocalSettings.php` if you want all internal red links to disappear regardless of whether a user is logged in or not
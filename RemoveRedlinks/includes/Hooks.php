<?php
/**
 * Extension:RemoveRedlinks - Hide all redlinks and turn them into
 * their static text.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * @author Malte Ahrhodldt <nordicnames.de>
 * based on previous work Chad Horohoe <innocentkiller@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */


namespace MediaWiki\Extension\RemoveRedlinks;

class Hooks {

	public static function onHtmlPageLinkRendererBegin(
					\MediaWiki\Linker\LinkRenderer $linkRenderer,
					\MediaWiki\Linker\LinkTarget $target,
					&$text, &$extraAttribs, &$query,
					&$ret )
 	{
		global $wgUser;
		if ( $wgUser->isLoggedIn()) {
			return true;
		}

		if( $target->isKnown() ) {
			return true;
		} else {
			$ret =  $target->getText();
			return false;
		}
	}
}

?>

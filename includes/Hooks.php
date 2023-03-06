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

use RequestContext;

class Hooks {
		public static function onHtmlPageLinkRendererEnd(
			\MediaWiki\Linker\LinkRenderer $linkRenderer, 
			\MediaWiki\Linker\LinkTarget $target,
			$isKnown,
			&$text,
			&$attribs,
			&$ret 
		) {
			global $wgRemoveRedLinksAlsoLoggedInUsers;
			if (!$wgRemoveRedLinksAlsoLoggedInUsers)
			{
				$user = RequestContext::getMain()->getUser();
				if ($user->isSafeToLoad())
				{
					if ( $user->isRegistered()) {
							return true;
					}
				}
			}

			if ( $isKnown ) {
				return true;
			}

			if ( $target->isExternal() ) {
				return true;
			}

			$attribs['data-redlink-url'] = base64_encode($attribs['href']);
			$attribs['data-redlink-title'] = base64_encode($attribs['title']);
			$attribs['style'] = 'color:unset;cursor:text;text-decoration:none';

			unset($attribs['href']);
			unset($attribs['title']);
			unset($attribs['class']);

			return true;
		}

		public static function onBeforePageDisplay( $out, $skin ) : void { 
			$out->addModules( 'ext.RemoveRedlinks.app' );
		}
}
?>

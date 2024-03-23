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

class RemoveRedlinks {
	public static function onHtmlPageLinkRendererEnd(
		\MediaWiki\Linker\LinkRenderer $linkRenderer, 
		\MediaWiki\Linker\LinkTarget $target,
		$isKnown,
		&$text,
		&$attribs,
		&$ret 
	) {
		global $wgRemoveRedLinksAlsoLoggedInUsers;
		
		if ( $isKnown || $target->isExternal()) {
			return true;
		}

		$parser = MediaWiki\MediaWikiServices::getInstance()->getParser();
		$parserOptions = $parser->getOptions();

		if( $wgRemoveRedLinksAlsoLoggedInUsers || !$parserOptions->getOption( 'loggedin' ) ) {
			unset( $attribs['href'] );
			unset( $attribs['title'] );
			unset( $attribs['class'] );
			$attribs['style'] = 'color: unset; cursor: text; text-decoration: none';
		}

		return true;
	}

	/**
	 * Handler for the ParserOptionsRegister hook to add a "loggedin" option for cache-splitting
	 * @see https://github.com/wikimedia/mediawiki-extensions-WikiTextLoggedInOut/blob/09347a23b6351041f629bbc34a0e29b347e3a919/includes/WikiTextLoggedInOut.php
	 *
	 * @param array &$defaults Options and their defaults
	 * @param array &$inCacheKey Whether each option splits the parser cache
	 * @param array &$lazyLoad Initializers for lazy-loaded options
	 */
	public static function onParserOptionsRegister( &$defaults, &$inCacheKey, &$lazyLoad ) {
		$defaults['loggedin'] = false;
		$inCacheKey['loggedin'] = true;
		$lazyLoad['loggedin'] = static function ( ParserOptions $options ) {
			return $options->getUserIdentity()->isRegistered();
		};
	}
}
?>

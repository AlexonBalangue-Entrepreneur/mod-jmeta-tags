<?php

/**
 * @package	Module for Joomla!
 * @subpackage  mod_metatags
 * @version	4.2
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2018 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die;
use Joomla\Registry\Registry;
?>

<?php
/*********************[ JSON LD ]************************/
if($jsonLD_type == 'json-ld-person'){
$docs->addScriptDeclaration('{
		"@context": "http://schema.org",
		"@type": "Person",
		"honorificPrefix": "'.$JsonLD_person_honorificPrefix.'",
		"name": "'.$JsonLD_person_name.'",
		"birthDate": "'.$JsonLD_person_birthDate.'",
		"faxNumber": "'.$JsonLD_person_faxNumber.'",
		"gender": "'.$JsonLD_person_gender.'",
		"telephone": "'.$JsonLD_person_telephone.'",
		"description": "'.$desciption.'",
		"image": "'.$JsonLD_person_mediaimage.'",
		"url": "'.JURI::base().'",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "'.$CoB_StreetAddress.'",
			"addressLocality": "'.$CoB_City.'",
			"postalCode": "'.$CoB_Zipcode.'",
			"addressContry": "'.$CoB_Country.'"
		}
	}', 'application/ld+json');
}

if ($DJsonLDs == '1'){ $DJson = '"Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"'; }
elseif ($DJsonLDs == '2'){ $DJson = '"Monday"'; }
elseif ($DJsonLDs == '3'){ $DJson = '"Monday", "Tuesday"'; }
elseif ($DJsonLDs == '4'){ $DJson = '"Monday", "Tuesday", "Wednesday"'; }
elseif ($DJsonLDs == '5'){ $DJson = '"Monday", "Tuesday", "Wednesday", "Friday"'; }
elseif ($DJsonLDs == '6'){ $DJson = '"Monday", "Tuesday", "Wednesday", "Friday", "Saturday"'; }
elseif ($DJsonLDs == '7'){ $DJson = '"Monday", "Tuesday", "Wednesday", "Friday", "Saturday", "Sunday"'; }
elseif ($DJsonLDs == '8'){ $DJson = '"Tuesday"'; }
elseif ($DJsonLDs == '9'){ $DJson = '"Tuesday", "Wednesday"'; }
elseif ($DJsonLDs == '10'){ $DJson = '"Tuesday", "Wednesday", "Thursday"'; }
elseif ($DJsonLDs == '11'){ $DJson = '"Tuesday", "Wednesday", "Thursday", "Friday"'; }
elseif ($DJsonLDs == '12'){ $DJson = '"Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"'; }
elseif ($DJsonLDs == '13'){ $DJson = '"Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"'; }
elseif ($DJsonLDs == '14'){ $DJson = '"Wednesday"'; }
elseif ($DJsonLDs == '15'){ $DJson = '"Wednesday", "Thursday"'; }
elseif ($DJsonLDs == '16'){ $DJson = '"Wednesday", "Thursday", "Friday"'; }
elseif ($DJsonLDs == '17'){ $DJson = '"Wednesday", "Thursday", "Friday", "Saturday"'; }
elseif ($DJsonLDs == '18'){ $DJson = '"Wednesday", "Thursday", "Friday", "Saturday", "Sunday"'; }
elseif ($DJsonLDs == '19'){ $DJson = '"Thursday"'; }
elseif ($DJsonLDs == '20'){ $DJson = '"Thursday", "Friday"'; }
elseif ($DJsonLDs == '21'){ $DJson = '"Thursday", "Friday", "Saturday"'; }
elseif ($DJsonLDs == '22'){ $DJson = '"Thursday", "Friday", "Saturday", "Sunday"'; }
elseif ($DJsonLDs == '23'){ $DJson = '"Friday"'; }
elseif ($DJsonLDs == '24'){ $DJson = '"Friday", "Saturday"'; }
elseif ($DJsonLDs == '25'){ $DJson = '"Friday", "Saturday", "Sunday"'; }
elseif ($DJsonLDs == '26'){ $DJson = '"Saturday"'; }
elseif ($DJsonLDs == '27'){ $DJson = '"Saturday", "Sunday"'; }
elseif ($DJsonLDs == '28'){ $DJson = '"Sunday"'; }


		if(!empty($JsonLD_opens)){$JopenLD = '"opens": "'.$JsonLD_opens.'",'; } 
		if(!empty($JsonLD_close)){$JcloseLD = '"close": "'.$JsonLD_close.'"'; }

	
if($jsonLD_type == 'json-ld-organisation'){

$docs->addScriptDeclaration('{
	"@context": "http://schema.org",
	"@type": "Organization",
	"brand": "'.$sitename.'",
	"legalName": "'.$JsonLD_organisation_legalName.'",
	"founder": "'.$JsonLD_organisation_founder.'",
	"foundingDate": "'.$JsonLD_organisation_foundingDate.'",
	"logo": "'.$JsonLD_organisation_medialogo.'",
	"faxNumber": "'.$JsonLD_organisation_fax.'",
	"taxID": "'.$JsonLD_organisation_taxID.'",
	"vatID": "'.$JsonLD_organisation_vatID.'",
	"telephone": "'.$JsonLD_organisation_telephone.'",
	"description": "'.$desciption.'",
	"image": "'.$JsonLD_organisation_medialogo.'",
	"url": "'.JURI::base().'",
	"address": { 
		"@type": "PostalAddress",
		"streetAddress": "'.$CoB_StreetAddress.'",
		"addressLocality": "'.$CoB_City.'",
		"postalCode": "'.$CoB_Zipcode.'",
		"addressContry": "'.$CoB_Country.'" 
	},
	"numberOfEmployees": { 
		"@type": "QuantitativeValue",
		"minValue": "'.$JsonLD_organisation_minValue.'",
		"maxValue": "'.$JsonLD_organisation_maxValue.'"
	},
	"openingHoursSpecification": [ { 
		"@type": "OpeningHoursSpecification",
		"dayOfWeek": [
			'.$DJson.'
		],
		'.$JopenLD.'
		'.$JcloseLD.' 
	}],
	"contactPoint": [{ 
		"@type": "ContactPoint", 
		"telephone": "'.$JsonLD_organisation_telephone.'",
		"contactType": "customer service",
		"contactOption": "TollFree",
		"areaServed": "'.$language.'" 
	}]
}', 'application/ld+json');}
if($jsonLD_type == 'json-ld-custom'){
	$docs->addScriptDeclaration($jsonLD_custom, 'application/ld+json');
}
	$docs->addScriptDeclaration('{"@context": "http://schema.org","@type": "WebSite", "url": "'.$site_base.'", "potentialAction": {"@type": "SearchAction","target": "'.JUri::root(true).'/index.php?option=com_finder&view=search&lang='.$language.'?q={search_term_string}","query-input": "required name=search_term_string"}}', 'application/ld+json');

/*********************[ META-TAGS SEO BASIC/ADVANCE ]************************/
$docs->addCustomTag('<link rel="canonical" href="'.JURI::current().'">'); 
		if(!empty($CSP)){ 
			$docs->setMetaData( 'Content-Security-Policy', $CSP, true ); 
			$docs->setMetaData( 'Content-Security-Policy-Report-Only', $CSP, true ); 
			$docs->setMetaData( 'X-Content-Security-Policy', $CSP, true ); 
			$docs->setMetaData( 'X-Content-Security-Policy-Report-Only', $CSP, true ); 
			$docs->setMetaData( 'X-WebKit-CSP', $CSP, true ); 
			$docs->setMetaData( 'X-WebKit-CSP-Report-Only', $CSP, true ); 
		}
			$docs->setMetaData('application-name', $sitename.' '.$titles);
			$docs->setMetaData('apple-mobile-web-app-title', $sitename.' '.$titles);
			$docs->setMetaData('msapplication-tooltip', $sitename.' '.$titles);
			$docs->setMetaData('DC.title', $sitename.' '.$titles);
			$docs->setMetaData('DC.title.alternative', $sitename.' '.$titles);
			$docs->setMetaData('og:title', $sitename.' '.$titles);
			$docs->setMetaData('og:site_name', $sitename.' '.$titles);
			$docs->setMetaData('wt.ti', $sitename.' '.$titles);
			$docs->setMetaData('ZOOMTITLE', $sitename.' '.$titles);
			$docs->setMetaData('shareaholic:site_name', $sitename.' '.$titles);
		
		$docs->setMetaData('shareaholic:url', JURI::current());
		$docs->setMetaData('shareaholic:language', $language);
		if(!empty($desciption)){
			$docs->setMetaData('DC.description', $desciption);
			$docs->setMetaData('dcterms.description', $desciption);
			$docs->setMetaData('EssayDirectory', $desciption);
			$docs->setMetaData('fdse-description', $desciption);
			$docs->setMetaData('msapplication-tooltip', $desciption);
			$docs->setMetaData( 'abstract', $desciption );
			$docs->setMetaData( 'collection', $desciption );
		$docs->setMetaData( 'subject', $desciption );
		$docs->setMetaData( 'wt.cg_n', $desciption );
		$docs->setMetaData( 'ZOOMDESCRIPTION', $desciption );
		$docs->setMetaData( 'FSPageDescription', $desciption );
		
		}
		$docs->setMetaData( 'DCS.dcsuri', JURI::current() );
		$docs->setMetaData( 'DC.language', $language );
		$docs->setMetaData( 'dcterms.language', $language );
		$docs->setMetaData( 'msapplication-starturl', './' );
		$docs->setMetaData( 'msapplication-tooltip', $sitename.' '.$titles );
		$docs->setMetaData( 'msapplication-window', 'width=1024;height=768' );
		$docs->setMetaData( 'SKYPE_TOOLBAR', 'SKYPE_TOOLBAR_PARSER_COMPATIBLE' );
		$docs->setMetaData( 'startIndex', JURI::current() );
		
			$docs->setMetaData('DC.subject', $Keyword);
			$docs->setMetaData('fdse-keywords', $Keyword);
			$docs->setMetaData('note', $Keyword );
		
		if(!empty($RevisitAfter)){
			$docs->setMetaData('Revisit-After', $RevisitAfter);
		}
		if(!empty($Rating)){
			$docs->setMetaData('Rating', $Rating);
		}
		if(!empty($rights_standard)){
			$docs->setMetaData('rights-standard', ';'.$gconfigs->get('MetaRights'));
		}
		if(!empty($Distribution)){
			$docs->setMetaData('Distribution', $Distribution);
		}
		if(!empty($Location)){
			$docs->setMetaData('Location', $Location);
		}
		if(!empty($gconfigs->get('MetaRights'))){
			$docs->setMetaData('Copyright', $gconfigs->get('MetaRights'));
			$docs->setMetaData('DC.rights', $gconfigs->get('MetaRights'));
			$docs->setMetaData('DC.dateCopyrighted', date("Y"));
			$docs->setMetaData('dcterms.dateCopyrighted', date("Y"));
		}
		if(!empty($Publisher)){
			$docs->setMetaData('Publisher', $Publisher);
			$docs->setMetaData('DC.publisher', $Publisher);
			$docs->setMetaData('dcterms.publisher', $Publisher);
		}
			$docs->setMetaData('ZOOMWORDS', $Keyword);
		if(!empty($witgetdotcom)){
			$docs->setMetaData('widget', $witgetdotcom);
		}
		if(!empty($blogcatalogdotcom)){
			$docs->setMetaData('blogcatalog', $blogcatalogdotcom);
		}
		if(!empty($audiencemeta)){
			$docs->setMetaData('audience', $audiencemeta);
		}
		$docs->setMetaData('ZOOMPAGEBOOST', '5');
		$docs->setMetaData('FSLanguage', $language);
		if(!empty($DateCreationyyyymmdd)){
			$docs->setMetaData('Date-Creation-yyyymmdd', explode('-', $DateCreationyyyymmdd));
			$docs->setMetaData('DC.created', explode('-', $DateCreationyyyymmdd));
			$docs->setMetaData('dcterms.created ', explode('-', $DateCreationyyyymmdd));
			$docs->setMetaData( 'creation_date', explode('-', $DateCreationyyyymmdd) );
		}
		if(!empty($DateRevisionyyyymmdd)){
			$docs->setMetaData('Date-Revision-yyyymmdd', explode('-', $DateRevisionyyyymmdd));
		}
		if(!empty($Category)){
			$docs->setMetaData('Category', $Category);
		}
		if(!empty($Publisher)){
			$docs->setMetaData('DC.publisher', $Publisher);
		}

		if(!empty($auteur)){
			$docs->setMetaData('author', $auteur);
			$docs->setMetaData('DC.creator', $auteur);
			$docs->setMetaData('creator', $auteur);
			$docs->setMetaData('dcterms.creator', $auteur);
			$docs->setMetaData('dcterms.rightsHolder', $auteur);
			$docs->setMetaData('host-admin', $auteur );		
			$docs->setMetaData('operator', $auteur );
			$docs->setMetaData('FLBlogAuthor', $auteur );
			$docs->setMetaData('shareaholic:article_author_name', $auteur );
			$docs->setMetaData('shareaholic:article_author', $auteur );
			
		}
		$docs->setMetaData('shareaholic:shareable_page', JURI::current() );
		
			$docs->setMetaData('DC.language', $language);
			$docs->setMetaData('gwt:property', 'locale='.$language);
			
		$docs->setMetaData('mobile-agent', 'format=html5; url='.JURI::current());
		if(!empty($expires)){
			$docs->setMetaData('expires', $expires);
			
		}
		if(!empty($classification)){
			switch($classification){
						case "1" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_1')); break;
						case "2" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_2')); break;
						case "3" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_3')); break;
						case "4" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_4')); break;
						case "5" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_5')); break;
						case "6" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_6')); break;
						case "7" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_7')); break;
						case "8" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_8')); break;
						case "9" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_9')); break;
						case "10" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_10')); break;
						case "11" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_11')); break;
						case "12" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_12')); break;
						case "13" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_13')); break;
						case "14" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_14')); break;
						case "15" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_15')); break;
						case "16" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_16')); break;
						case "17" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_17')); break;
						case "18" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_18')); break;
						case "19" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_19')); break;
						case "20" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_20')); break;
						case "21" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_21')); break;
						case "22" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_22')); break;
						case "23" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_23')); break;
						case "24" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_24')); break;
						case "25" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_25')); break;
						case "26" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_26')); break;
						case "27" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_27')); break;
						case "28" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_28')); break;
						case "29" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_29')); break;
						case "30" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_30')); break;
						case "31" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_31')); break;
						case "32" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_32')); break;
						case "33" : $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_33')); break;
			}
			/*****
			 * // Show output number case not this methode
			 * $classification_final = $classification;
			 * $docs->setMetaData('classification', JText::_('JFIELD_MOD_METATAGS_CLASSIFICATION_OPTION_'));
			 * 
			 *****/ 
		}
		if(!empty($startver)){
			$docs->setMetaData('startver', $startver);
			
		}
		if(!empty($shareaholicsite_idAPI)){
			$docs->addCustomTag("<script type='text/javascript' src='//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js' data-shr-siteid='".$shareaholicsite_idAPI."' data-cfasync='false' async='async'></script>");
		}
		$docs->setMetaData('shareaholic:article_visibility', 'private');
		if(!empty($shareaholicsite_shareablepage)){ $docs->setMetaData('shareaholic:shareable_page', $shareaholicsite_shareablepage); }
		if(!empty($shareaholicsite_analytics)){ $docs->setMetaData('shareaholic:analytics', $shareaholicsite_analytics); }
		if(!empty($robots)){
			$docs->setMetaData('robots', $robots);
			$docs->setMetaData('baiduspider', $robots);
			$docs->setMetaData('dse-robots', $robots);
			$docs->setMetaData('googlebot', $robots);
			$docs->setMetaData('googlebot-mobile', $robots);
			$docs->setMetaData('ia_archive', $robots);
			$docs->setMetaData('msnbot', $robots);
			$docs->setMetaData('slurp', $robots);
			$docs->setMetaData('teoma', $robots);
		}	


			$docs->setMetaData('format-print', 'A4');
			$docs->setMetaData('resolutions', '2x, 4x, 8x');

/*********************[ META-TAGS GEO MAP ]************************/
	
		if(!empty($georegion)){ $docs->setMetaData('geo.region', $georegion); }		
		if(!empty($geoplacename)){ $docs->setMetaData('geo.placename', $geoplacename); }	
		if(!empty($geoposition)){ $docs->setMetaData('geo.position', $geoposition); }	
		if(!empty($ICBM)){ $docs->setMetaData('ICBM', $ICBM); }
		if(!empty($language)){ $docs->setMetaData('FSLanguage', $language); }


/*********************[ FACEBOOK/OPENGRAPH OGP.ME ]*******************$logo_tld*****/
		/**Namespace URI: http://ogp.me/ns/website#**/
		$docs->addCustomTag( '<meta property="og:title" content="'.$sitename.'">
			<meta property="og:type" content="'.$ogtypes.'">
			<meta property="og:url" content="'.JURI::current().'">
			<meta property="shareaholic:image" content="'.$ogpimages.'">
			<meta property="og:image" content="'.$ogpimages.'">
			<meta property="og:locale" content="'.$language.'">
			<meta property="og:description" content="'.$desciption.'">
			<meta property="og:site_name" content="'.$sitename.' '.$titles.'">
			<meta property="og:admins" content="'.$fbapp_admin.'">
			<meta property="og:app_id" content="'.$fbapp_idopgme.'">
			<meta property="og:profile_id" content="'.$fb_profils.'">
			<meta property="fb:admins" content="'.$fbapp_admin.'">
			<meta property="fb:app_id" content="'.$fbapp_idopgme.'">
			<link rel="search" href="'.JURI::current().'">
			<link rel="image_src" href="'.$logoimg.'">' );
		
/*********************[ META-TAGS Reputation/Security/Bank ]************************/

		if(!empty($bitly)){
			$docs->setMetaData('bitly-verification', $bitly);
		}
			$docs->setMetaData('fdse-index-as', JURI::current());
			$docs->setMetaData('Identifier-URL', JURI::current());
			$docs->setMetaData('msapplication-starturl', JURI::current().'?pinned=true');	

		if(!empty($wotverification)){
			$docs->setMetaData('wot-verification', $wotverification);
		}	

		if(!empty($okpays)){
			$docs->setMetaData('okpay-verification', $okpays);
		}
/*********************[ META-TAGS SEARCH/CRAWL/SPIDER ]************************/

		if(!empty($googlekey)){
			$docs->setMetaData('google-site-verification', $googlekey);
		}	
		if(!empty($Pinterestkey)){
			$docs->setMetaData('p:domain_verify', $Pinterestkey);
		}
		if(!empty($pingdomkey)){
			$docs->setMetaData('pingdom', $pingdomkey);
		}
		if(!empty($yandexkey)){
			$docs->setMetaData('yandex-verification', $yandexkey);
		}	
		if(!empty($bingkey)){
			$docs->setMetaData('msvalidate.01', $bingkey);
		}		
		if(!empty($alexakey)){
			$docs->setMetaData('alexaVerifyID', $alexakey);
		}
		if(!empty($baidukey)){
			$docs->setMetaData('baidu-site-verification', $baidukey);
		}
		if(!empty($majestickey)){
			$docs->setMetaData('majestic-site-verification', $majestickey);
		}
		if(!empty($myblogguestkey)){
			$docs->setMetaData('myblogguest-verification', $myblogguestkey);
		}
		if(!empty($sefewebnorton)){
			$docs->setMetaData('norton-safeweb-site-verification', $sefewebnorton);
		}
		
/*********************[ META-TAGS TWITTER CARD ]************************/
		if(!empty($twittercards)){
			$docs->setMetaData('twitter:card', $twittercards);
		}
		
		if($twittercards == 'summary'){
			
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
		$docs->setMetaData('twitter:card', $twittercards);
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		
		$docs->setMetaData('twitter:description', $desciption);
		$docs->setMetaData('twitter:image:src', $tw_pix);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
				
		if(!empty($nameiphoneapps)){ $docs->setMetaData('twitter:app:name:iphone', $nameiphoneapps); }
		if(!empty($nameipadapps)){ $docs->setMetaData('twitter:app:name:ipad', $nameipadapps); }
		if(!empty($nameandroidapps)){ $docs->setMetaData('twitter:app:name:googleplay', $nameandroidapps); }
		if(!empty($urliphoneapps)){ $docs->setMetaData('twitter:app:url:iphone', $urliphoneapps); }
		if(!empty($urlipadapps)){ $docs->setMetaData('twitter:app:url:ipad', $urlipadapps); }
		if(!empty($urlandroidapps)){ $docs->setMetaData('twitter:app:url:googleplay', $urlandroidapps); }
		if(!empty($idiphoneapps)){ $docs->setMetaData('twitter:app:id:iphone', $idiphoneapps); }
		if(!empty($idipadapps)){ $docs->setMetaData('twitter:app:id:ipad', $idipadapps); }
		if(!empty($idandroidapps)){ $docs->setMetaData('twitter:app:id:googleplay', $idandroidapps); }
		
		}
		if($twittercards == 'summary_large_image'){
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
	
		$docs->setMetaData('twitter:card', $twittercards);
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		$docs->setMetaData('twitter:creator', '@'.$TwitterCreate);
		$docs->setMetaData('twitter:title', $sitename.' '.$titles);
		$docs->setMetaData('twitter:description', $desciption);
		$docs->setMetaData('twitter:image:src', $tw_pix);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
		
		if(!empty($nameiphoneapps)){ $docs->setMetaData('twitter:app:name:iphone', $nameiphoneapps); }
		if(!empty($nameipadapps)){ $docs->setMetaData('twitter:app:name:ipad', $nameipadapps); }
		if(!empty($nameandroidapps)){ $docs->setMetaData('twitter:app:name:googleplay', $nameandroidapps); }
		if(!empty($urliphoneapps)){ $docs->setMetaData('twitter:app:url:iphone', $urliphoneapps); }
		if(!empty($urlipadapps)){ $docs->setMetaData('twitter:app:url:ipad', $urlipadapps); }
		if(!empty($urlandroidapps)){ $docs->setMetaData('twitter:app:url:googleplay', $urlandroidapps); }
		if(!empty($idiphoneapps)){ $docs->setMetaData('twitter:app:id:iphone', $idiphoneapps); }
		if(!empty($idipadapps)){ $docs->setMetaData('twitter:app:id:ipad', $idipadapps); }
		if(!empty($idandroidapps)){ $docs->setMetaData('twitter:app:id:googleplay', $idandroidapps); }
		if(!empty($urlgooglechrome_webapps)){ $docs->setMetaData('application-url', $urlgooglechrome_webapps); }
		if(!empty($mybitcoin_account)){ $docs->setMetaData('bitcoin', $mybitcoin_account); }
		if(!empty($detectify_verification)){ $docs->setMetaData('detectify-verification', $detectify_verification); }
		
		if(!empty($blazerr_ssl)){ 
			$docs->setMetaData('blazerr-ssl', $blazerr_ssl);
			$docs->setMetaData('blazerr-secure', $blazerr_ssl); 
		}
		
		}
		if($twittercards == 'product'){
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
		
		$docs->setMetaData('twitter:card', $twittercards);
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		$docs->setMetaData('twitter:creator', '@'.$TwitterCreate);
		$docs->setMetaData('twitter:title', $sitename.' '.$titles);
		$docs->setMetaData('twitter:description', $desciption);
		$docs->setMetaData('twitter:image:src', $tw_pix);
		$docs->setMetaData('twitter:data1', $Twprd_data1);
		$docs->setMetaData('twitter:label1', $Twprd_label1);
		$docs->setMetaData('twitter:data2', $Twprd_data2);
		$docs->setMetaData('twitter:label2', $Twprd_label2);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
		
		if(!empty($nameiphoneapps)){ $docs->setMetaData('twitter:app:name:iphone', $nameiphoneapps); }
		if(!empty($nameipadapps)){ $docs->setMetaData('twitter:app:name:ipad', $nameipadapps); }
		if(!empty($nameandroidapps)){ $docs->setMetaData('twitter:app:name:googleplay', $nameandroidapps); }
		if(!empty($urliphoneapps)){ $docs->setMetaData('twitter:app:url:iphone', $urliphoneapps); }
		if(!empty($urlipadapps)){ $docs->setMetaData('twitter:app:url:ipad', $urlipadapps); }
		if(!empty($urlandroidapps)){ $docs->setMetaData('twitter:app:url:googleplay', $urlandroidapps); }
		if(!empty($idiphoneapps)){ $docs->setMetaData('twitter:app:id:iphone', $idiphoneapps); }
		if(!empty($idipadapps)){ $docs->setMetaData('twitter:app:id:ipad', $idipadapps); }
		if(!empty($idandroidapps)){ $docs->setMetaData('twitter:app:id:googleplay', $idandroidapps); }
		
		}
		if($twittercards == 'photo'){
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
		
		$docs->setMetaData('twitter:card', $twittercards);
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		$docs->setMetaData('twitter:creator', '@'.$TwitterCreate);
		$docs->setMetaData('twitter:title', $sitename.' '.$titles);
		$docs->setMetaData('twitter:image:src', $tw_pix);
		$docs->setMetaData('twitter:image:src:width', $tw_pix_width);
		$docs->setMetaData('twitter:image:src:height', $tw_pix_height);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
		
		if(!empty($nameiphoneapps)){ $docs->setMetaData('twitter:app:name:iphone', $nameiphoneapps); }
		if(!empty($nameipadapps)){ $docs->setMetaData('twitter:app:name:ipad', $nameipadapps); }
		if(!empty($nameandroidapps)){ $docs->setMetaData('twitter:app:name:googleplay', $nameandroidapps); }
		if(!empty($urliphoneapps)){ $docs->setMetaData('twitter:app:url:iphone', $urliphoneapps); }
		if(!empty($urlipadapps)){ $docs->setMetaData('twitter:app:url:ipad', $urlipadapps); }
		if(!empty($urlandroidapps)){ $docs->setMetaData('twitter:app:url:googleplay', $urlandroidapps); }
		if(!empty($idiphoneapps)){ $docs->setMetaData('twitter:app:id:iphone', $idiphoneapps); }
		if(!empty($idipadapps)){ $docs->setMetaData('twitter:app:id:ipad', $idipadapps); }
		if(!empty($idandroidapps)){ $docs->setMetaData('twitter:app:id:googleplay', $idandroidapps); }
		
		}
		if($twittercards == 'app'){
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
	
		$docs->setMetaData('twitter:card', $twittercards);
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		$docs->setMetaData('twitter:creator', '@'.$TwitterCreate);
		$docs->setMetaData('twitter:description', $desciption);
		$docs->setMetaData('twitter:app:id:iphone', $idiphoneapps);
		$docs->setMetaData('twitter:app:id:ipad', $idipadapps);
		$docs->setMetaData('twitter:app:id:googleplay', $idandroidapps);
		$docs->setMetaData('twitter:app:country', $langsapps);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
		}
		if($twittercards == 'gallery'){
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
	
		$docs->setMetaData('twitter:card', $twittercards);
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		$docs->setMetaData('twitter:creator', '@'.$TwitterCreate);
		$docs->setMetaData('twitter:title', $sitename.' '.$titles);
		$docs->setMetaData('twitter:description', $desciption);
		$docs->setMetaData('twitter:image0:src', $Tw_imgsrc0);
		$docs->setMetaData('twitter:image1:src', $Tw_imgsrc1);
		$docs->setMetaData('twitter:image2:src', $Tw_imgsrc2);
		$docs->setMetaData('twitter:image3:src', $Tw_imgsrc3);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
		
		if(!empty($nameiphoneapps)){ $docs->setMetaData('twitter:app:name:iphone', $nameiphoneapps); }
		if(!empty($nameipadapps)){ $docs->setMetaData('twitter:app:name:ipad', $nameipadapps); }
		if(!empty($nameandroidapps)){ $docs->setMetaData('twitter:app:name:googleplay', $nameandroidapps); }
		if(!empty($urliphoneapps)){ $docs->setMetaData('twitter:app:url:iphone', $urliphoneapps); }
		if(!empty($urlipadapps)){ $docs->setMetaData('twitter:app:url:ipad', $urlipadapps); }
		if(!empty($urlandroidapps)){ $docs->setMetaData('twitter:app:url:googleplay', $urlandroidapps); }
		if(!empty($idiphoneapps)){ $docs->setMetaData('twitter:app:id:iphone', $idiphoneapps); }
		if(!empty($idipadapps)){ $docs->setMetaData('twitter:app:id:ipad', $idipadapps); }
		if(!empty($idandroidapps)){ $docs->setMetaData('twitter:app:id:googleplay', $idandroidapps); }
		
		}
		if($twittercards == 'player'){
			if(!empty($TwitterDev)){ $docs->addCustomTag('<link rel="me" href="https://twitter.com/'.$TwitterDev.'">'); }
	
		$docs->setMetaData('twitter:widgets:theme', $Twitterwidgettheme);	
		$docs->setMetaData('twitter:widgets:link-color', $TwitterWthemelink);	
		$docs->setMetaData('twitter:widgets:border-color', $TwitterWthemeborder);	
		$docs->setMetaData('twitter:widgets:autoload', $Twitterautoload);	
		$docs->setMetaData('twitter:dnt', $Twitterdnt);	
		$docs->setMetaData('twitter:widgets:csp', $Twittercsp);	
		
		$docs->setMetaData('twitter:card', $twittercards);	
		$docs->setMetaData('twitter:site', '@'.$Twittersite);
		$docs->setMetaData('twitter:creator', '@'.$TwitterCreate);
		$docs->setMetaData('twitter:title', $sitename);
		$docs->setMetaData('twitter:description', $desciption);
		$docs->setMetaData('twitter:image:src', $tw_pix);
		$docs->setMetaData('twitter:player', $tw_movie);
		$docs->setMetaData('twitter:player:width', $tw_movie_width);
		$docs->setMetaData('witter:player:height', $tw_movie_height);
		$docs->setMetaData('twitter:domain', $_SERVER['SERVER_NAME']);
		
		if(!empty($nameiphoneapps)){ $docs->setMetaData('twitter:app:name:iphone', $nameiphoneapps); }
		if(!empty($nameipadapps)){ $docs->setMetaData('twitter:app:name:ipad', $nameipadapps); }
		if(!empty($nameandroidapps)){ $docs->setMetaData('twitter:app:name:googleplay', $nameandroidapps); }
		if(!empty($urliphoneapps)){ $docs->setMetaData('twitter:app:url:iphone', $urliphoneapps); }
		if(!empty($urlipadapps)){ $docs->setMetaData('twitter:app:url:ipad', $urlipadapps); }
		if(!empty($urlandroidapps)){ $docs->setMetaData('twitter:app:url:googleplay', $urlandroidapps); }
		if(!empty($idiphoneapps)){ $docs->setMetaData('twitter:app:id:iphone', $idiphoneapps); }
		if(!empty($idipadapps)){ $docs->setMetaData('twitter:app:id:ipad', $idipadapps); }
		if(!empty($idandroidapps)){ $docs->setMetaData('twitter:app:id:googleplay', $idandroidapps); }
		
		}

/*********************[ Tynt How Copy/Past your website? ]************************/
		if(!empty($Tynpush)){
			$docs->addCustomTag( '<script type="text/javascript">if(document.location.protocol==\'http:\'){ var Tynt=Tynt||[];Tynt.push(\''.$Tynpush.'\'); (function(){var s=document.createElement(\'script\');s.async="async";s.type="text/javascript";s.src=\'http://tcr.tynt.com/ti.js\';var h=document.getElementsByTagName(\'script\')[0];h.parentNode.insertBefore(s,h);})();}</script>' );

		}
/*********************[ AUTRES/LINK ]************************/

$docs->addCustomTag( '<link rel="meta" type="application/rdf+xml" href="'.JURI::base().'dublincore.rdf">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="profile" href="http://dublincore.org/documents/2008/08/04/dc-html/">
<link type="text/plain" rel="author" href="'.JURI::base().'humans.txt">
<meta prefix="fb: http://ogp.me/ns/fb#" property="fb:app_id" content="'.$fbapp_idopgme.'">' );


/*********************[ AUTRES  ]************************/
		$docs->setMetaData('MSSmartTagsPreventParsing', 'true');
		//$docs->setMetaData( 'X-UA-Compatible', 'IE=edge,chrome=1', true ); Seo not validate
		$docs->setMetaData( 'web_author', $auteur);
		$docs->setMetaData( 'MSThemeCompatible', 'yes' );
		$docs->setMetaData( 'presdate', date("m-d-Y") );
		$docs->setMetaData( 'host', $_SERVER['SERVER_NAME'] );		
		$docs->setMetaData( 'linkage', JURI::base() );			
		$docs->setMetaData( 'msapplication-tap-highlight', 'yes' );	
		$docs->setMetaData( 'DP.PopRank', '2.00000' );	
		$docs->setMetaData( 'msapplication-window', 'width=250;height=250' );	
/*********************[ AUTRES / Contact Business or Individual  ]************************/
		if(!empty($CoB_Name)){ $docs->setMetaData( 'contactName', $CoB_Name ); }
		if(!empty($CoB_Organization)){ $docs->setMetaData( 'contactOrganization', $CoB_Organization ); }
		if(!empty($CoB_StreetAddress)){ $docs->setMetaData( 'contactStreetAddress1', $CoB_StreetAddress ); }
		if(!empty($CoB_Zipcode)){ $docs->setMetaData( 'contactZipcode', $CoB_Zipcode ); }
		if(!empty($CoB_City)){ $docs->setMetaData( 'contactCity', $CoB_City ); }
		if(!empty($CoB_Country)){ $docs->setMetaData( 'contactCountry', $CoB_Country ); }
		if(!empty($CoB_PhoneNumber)){ $docs->setMetaData( 'contactPhoneNumber', $CoB_PhoneNumber ); }
		if(!empty($CoB_FaxNumber)){ $docs->setMetaData( 'contactFaxNumber', $CoB_FaxNumber ); }
		if(!empty($CoB_NetworkAddress)){ $docs->setMetaData( 'contactNetworkAddress', $CoB_NetworkAddress ); }
		if(!empty($format_detection_SafariiOS)){ $docs->setMetaData( 'format-detection', 'telephone='.$format_detection_SafariiOS ); }
		$docs->setMetaData( 'contact', $CoB_PhoneNumber.' '.$CoB_NetworkAddress.' \''.$CoB_StreetAddress.', '.$CoB_City.', '.$CoB_Country.'\'' );
		$docs->setMetaData( 'fragment', '!' );

		

/*********************[ AUTRES Traduction ]************************/
		if(!empty($googletranslatecustomization)){
			$docs->addCustomTag('<meta name="google-translate-customization" content="'.$googletranslatecustomization.'">' );
		}

/*********************[ AUTRES analystic ]************************/

if(!empty($gganalystic_UA)){ 
	$docs->addCustomTag('<script>{function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\'); ga(\'create\', \''.$gganalystic_UA.'\', \''.$gganalystic.'\'); ga(\'send\', \'pageview\');</script>	<link rel="shortlink" href="'.JURI::base().'">'); 
}


if(!empty($optimizelyKEYjs)){ $docs->addCustomTag('<script src="//cdn.optimizely.com/js/'.$optimizelyKEYjs.'.js"></script>'); }

//PIWIK
if($show_piwik == 1){
	
	echo '<script>var _paq = _paq || []; _paq.push(["setDocumentTitle", document.domain + "/" + document.title]); _paq.push(["setCookieDomain", "'.$setCookieDomain_piwik.'"]); _paq.push(["setDomains", ["'.$setCookieDomain_piwik.'"]]); _paq.push(["setCustomVariable", 1, "type", "client", "visit"]); _paq.push(["setDoNotTrack", true]); _paq.push(["alcoolisables"]); _paq.push([\'trackPageView\']); _paq.push([\'enableLinkTracking\']); (function() { var u="https://'.$urldomain_piwik_interne.'"; _paq.push([\'setTrackerUrl\', u+\'piwik.php\']); _paq.push([\'setSiteId\', '.$idsite_piwik.']); var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0]; g.type=\'text/javascript\'; g.async=true; g.defer=true; g.src=u+\'piwik.js\'; s.parentNode.insertBefore(g,s); })();</script><noscript><p><img src="https://'.$urldomain_piwik_interne.'piwik.php?idsite='.$idsite_piwik.'&amp;rec=1" style="border:0;" alt="Tracker visitor intern with Piwik on '.JURI::base().'"></p></noscript>';
	

}
if($show_piwik == 2){
echo '<img src="https://'.$urldomain_piwik_interne.'piwik.php?idsite='.$idsite_piwik.'&amp;rec=1" style="border:0" alt="Tracker visitor interne with Piwik on '.JURI::base().'">';	
	
}
/*********************[ AUTRES Smartphone/Mobile ]************************/
if($show_mobile == 1){
	$docs->setMetaData('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
	$docs->setMetaData('HandheldFriendly', 'true');
	$docs->setMetaData('apple-mobile-web-app-capable', 'YES');
	$docs->setMetaData('mobileoptimized', '480');
}	
		if($doYouHave_AffilateApple == 1){ 
				if(!empty($myAffiliateDataapps) AND !empty($idiphoneapps)){ 
					$docs->setMetaData('apple-itunes-app','app-id='.$idiphoneapps.', affiliate-data='.$myAffiliateDataapps.', app-argument='.JURI::base()); 
				}
		} else if($doYouHave_AffilateApple == 2) {
			if(!empty($idiphoneapps)){ 
						$docs->setMetaData('apple-itunes-app','app-id='.$idiphoneapps.', app-argument='.JURI::base()); 
			}
		}
if(!empty($logoimg_mobile_startup)){
	$docs->addCustomTag('<link href="'.$logoimg_mobile_startup.'" rel="apple-touch-startup-image">'); 
}
if(!empty($plogoimg_mobile)){
	$docs->addCustomTag('<link href="'.$logoimg_mobile.'" rel="apple-touch-icon">');
	}
if(!empty($plogoimg_mobile72x72)){
	$docs->addCustomTag('<link href="'.$logoimg_mobile72x72.'" sizes="72x72" rel="apple-touch-icon">');
	}
if(!empty($plogoimg_mobile114x114)){
	$docs->addCustomTag('<link href="'.$logoimg_mobile114x114.'" sizes="114x114" rel="apple-touch-icon">');
}
if(!empty($opensearch_url)){
	$docs->addCustomTag('<link rel="search" type="application/opensearchdescription+xml" title="'.$sitename.'" href="'.$opensearch_url.'">');
}
if(!empty($sitemap_url)){
	$docs->addCustomTag('<link rel="sitemap" type="application/xml" title="'.$sitename.'" href="'.$sitemap_url.'">');
	$docs->setMetaData('FSOnSitemap', $sitemap_url); }

/*********************[ Pinned website on windows 8/8.1 ]************************/
if(!empty($pinned8_color)){ 
	$docs->setMetaData('msapplication-TileColor', $pinned8_color); 
}
if(!empty($pinned8_navbutton_color)){ $docs->setMetaData('msapplication-navbutton-color', $pinned8_navbutton_color); }
if(!empty($pinned8_square70x70logo)){ $docs->setMetaData('msapplication-square70x70logo', $pinned8_square70x70logo); }
if(!empty($pinned8_square150x150logo)){ $docs->setMetaData('msapplication-square150x150logo', $pinned8_square150x150logo); }
if(!empty($pinned8_square144x144logo)){ $docs->setMetaData('msapplication-TileImage', $pinned8_square144x144logo); }
if(!empty($pinned8_wide310x150logo)){ $docs->setMetaData('msapplication-wide310x150logo', $pinned8_wide310x150logo); }
if(!empty($pinned8_square310x310logo)){ $docs->setMetaData('msapplication-square310x310logo', $pinned8_square310x310logo); }
if(!empty($pinned8_linksrss)){
$docs->setMetaData('msapplication-notification', 'frequency=30;polling-uri='.$pinned8_linksrss.'&amp;amp;id=1;polling-uri2='.$pinned8_linksrss.'&amp;amp;id=2;polling-uri3='.$pinned8_linksrss.'&amp;amp;id=3;polling-uri4='.$pinned8_linksrss.'&amp;amp;id=4;polling-uri5='.$pinned8_linksrss.'&amp;amp;id=5; cycle=1');
}
if(!empty($pinned8_badgebrowser)){ 
	$docs->setMetaData('msapplication-badge', 'frequency=30;polling-uri='.$pinned8_badgebrowser); 	
}
if(!empty($pinned8_IEconfig)){ 
	$docs->setMetaData('msapplication-config', $pinned8_IEconfig);  	
}
/*********************[ Jump List "Tasks" for Pinned Sites on windows 7 ]************************/
$docs->setMetaData('msapplication-task', 'name='.$sitename.';action-uri='.JURI::root().';icon-uri='.JURI::root().$JltaskIcons_final); //final
if(!empty($JltaskNames_1) AND !empty($JltaskPages_1)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_1.';action-uri='.$JltaskPages_1.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_2) AND !empty($JltaskPages_2)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_2.';action-uri='.$JltaskPages_2.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_3) AND !empty($JltaskPages_3)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_3.';action-uri='.$JltaskPages_3.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_4) AND !empty($JltaskPages_4)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_4.';action-uri='.$JltaskPages_4.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_5) AND !empty($JltaskPages_5)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_5.';action-uri='.$JltaskPages_5.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_6) AND !empty($JltaskPages_6)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_6.';action-uri='.$JltaskPages_6.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_7) AND !empty($JltaskPages_7)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_7.';action-uri='.$JltaskPages_7.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_8) AND !empty($JltaskPages_8)){
	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_8.';action-uri='.$JltaskPages_8.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}
if(!empty($JltaskNames_9) AND !empty($JltaskPages_9)){	
	$docs->setMetaData('msapplication-task', 'name='.$JltaskNames_9.';action-uri='.$JltaskPages_9.';icon-uri='.JURI::root().$JltaskIcons_final); //final
}

/*********************[ AUTRES (Front-End Output Show) ]************************/
if(!empty($backlinks_frontendh)){ $docs->addCustomTag($backlinks_frontendh);}

if(!empty($backlinks_frontendf)){ echo $backlinks_frontendf; }

		if(!empty($linkstantkey)){
			$docs->setMetaData('linkstant', $linkstantkey);
			echo '<script src="http://www.linkstant.com/linkstant.js"></script>';
		}
/************** [ Mesure d'audiance ]************************/

if(!empty($myAccountGoogleplus)){
	$docs->addCustomTag('<link rel="publisher" href="https://plus.google.com/'.$myAccountGoogleplus.'">');
}


if(!empty($APPID_webstoreGoogle)){
	$docs->addCustomTag('<link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/'.$APPID_webstoreGoogle.'">');
}

if(!empty($Pingback_url)){
	$docs->addCustomTag('<link rel="pingback" href="'.$Pingback_url.'">');
}
if(!empty($viglink_idsite)){
	echo '<a href="http://www.viglink.com/?vgref='.$viglink_idsite.'">  <img alt="VigLink badge" height="31" src="//www.viglink.com/images/badges/88x31.png" title="Links monetized by VigLink" width="88">
</a>';
}


if(!empty($gtagsmanager)){
	$docs->addCustomTag('<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\''.$gtagsmanager.'\');</script>
<!-- End Google Tag Manager -->');
	echo '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id='.$gtagsmanager.'"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
}
?>

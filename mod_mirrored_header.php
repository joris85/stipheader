<?php

/**
 * @package		Joomla.Site
 * @subpackage	mod_mirrored_header
 * @copyright	Copyright (C) 2015 Stip - All rights reserved.
 * @license		GNU General Public License version 2 or later
 */

//no direct access

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$stipbase = JURI::base();
if(substr($stipbase, -1)=="/") { $stipbase = substr($stipbase, 0, -1); }
$modURL 	= JURI::base().'modules/mod_mirrored_header';

// get parameters 

$bgImage = $params->get('bgImage');
$options = $params->get('options');
$bgheight= $params->get('bgheight');
$headerheight= $params->get('headerheight');
$bgposition= $params->get('bgposition');
$usp= $params->get('usp');
$scrolldown = $params->get('scrolldown');
$scrolldownanchor = $params->get('scrolldownanchor');
$moduleclass_sfx = $params->get( 'moduleclass_sfx',    '' );
$scrolldowntime= $params->get('scrolldowntime');
$scrolltijd= $params->get('scrolltijd');

// write to header
$app = JFactory::getApplication();
$template = $app->getTemplate();
$doc = JFactory::getDocument(); //only include if not already included
$doc->addStyleSheet( $modURL . '/css/mirror.css');


if($options == 0) {
$style = '
.header-image{background-image: url('.$stipbase.'/'.$bgImage.')!important; background-position: '.$bgposition.'!important; background-repeat: no-repeat!important;} .header-image.reflect {display:none!important;}
'; 
   
}

elseif($options == 1 ) {
$style = '
.header-image{background-image: url('.$stipbase.'/'.$bgImage.')!important; background-position: '.$bgposition.'!important; background-repeat: no-repeat!important;}
'; 
    
}

elseif($options == 2 ) {
$style = '
.cover-teaser-group-grid {max-width:100%!important;}
.header-image{background-size:cover;}
.header-image{background-image: url('.$stipbase.'/'.$bgImage.')!important; background-position: '.$bgposition.'!important; background-repeat: no-repeat!important;} .header-image.reflect {display:none!important;}
'; 


}

elseif($options == 3 ) {
$style = '
.cover-teaser-group-grid {max-width:100%!important;}
.header-image{background-size:cover!important;}
.header-image{ background-image: url('.$stipbase.'/'.$bgImage.')!important; background-position: '.$bgposition.'!important; background-repeat: no-repeat!important;} .header-image.reflect {display:none!important;}
'; 
   

}

$doc->addStyleDeclaration( $style );


?>



        
		<div id="header">
			<section class="cover-teaser-group">
				<div class="cover-teaser-group-grid">
					<div class="cover-teaser-header-images ">
						<div class="header-images-bottom">
							<div id="header-image" class="header-image " style="height:<?php echo $bgheight ?>;"><div class="usp"><?php echo $usp ?></div><?php if($scrolldown == 1) { ?><div class="anker-header"><a href="#mirankor"><style>.anker-header a {cursor: url('/modules/mod_mirrored_header/images/cursordown.png'), auto;} </style><img alt="arrowdown" src="/modules/mod_mirrored_header/images/arrowdown.png"></a></div><?php }; ?></div>
                            <div class="header-image reflect right " style="height:<?php echo $bgheight ?>;" ></div>
							<div class="header-image reflect left " style="height:<?php echo $bgheight ?>;"></div>




						</div>
                        
					</div>
				</div>
				<div class="ankor-mirror-header"><a name="mirankor" id="mirankor">&nbsp;</a> </div>
			</section>
		</div>
<?php if($options == 3) { ?>
	<link rel="stylesheet" type="text/css" href="/modules/mod_mirrored_header/css/fullscreen.css">
	<script type="text/javascript">//<![CDATA[
		function resize()
		{
			var heights = window.innerHeight;
			document.getElementById("header-image").style.height = heights -<?php echo $headerheight ?> + "px";
		}
		resize();
		window.onresize = function() {
			resize();
		};
		//]]>

	</script>
<?php }; ?>


<?php if($scrolldowntime == 1) { ?>
    <script type="text/javascript">//<![CDATA[
        setTimeout(function(){ gotoanchor(); }, <?php echo $scrolltijd ?>000);
        function gotoanchor()
        {
            jQuery('html, body').animate({
                scrollTop: jQuery('#mirankor').offset().top
            },2000);
        }
    </script>
<?php }; ?>







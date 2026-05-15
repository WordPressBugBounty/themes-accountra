<?php
/**
 * Pattern content.
 */
return array(
	'title'      => __( 'Core Header', 'accountra' ),
	'categories' => array( 'accountra-core' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"15px"}}},"layout":{"contentSize":"1140px","type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:10px;padding-bottom:15px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1135,"width":"15px","height":"15px","sizeSlug":"full","linkDestination":"none","className":"accountra-margin-top-n10"} -->
<figure class="wp-block-image size-full is-resized accountra-margin-top-n10"><img src="' . esc_url( trailingslashit( get_template_directory_uri() ) ) . 'assets/img/icon-clock-new.webp" alt="icon clock" class="wp-image-1135" style="width:15px;height:15px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"accountra-margin-left-n10","style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"14px"}},"textColor":"accountra_secondary","fontFamily":"heebo"} -->
<p class="accountra-margin-left-n10 has-accountra-secondary-color has-text-color has-heebo-font-family" style="font-size:14px;font-style:normal;font-weight:300">Opening : Mon-Fri 08:00 - 17:00</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:social-links {"iconColor":"accountra_secondary","iconColorValue":"#FFFFFF","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"pinterest"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><!-- wp:group {"layout":{"contentSize":"1140px","type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"color":{"background":"#9494946e"},"spacing":{"padding":{"top":"20px","bottom":"20px","left":"25px","right":"25px"}},"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group has-background" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;background-color:#9494946e;padding-top:20px;padding-right:25px;padding-bottom:20px;padding-left:25px"><!-- wp:site-title {"level":0,"isLink":false,"style":{"typography":{"fontSize":"28px","fontStyle":"normal","fontWeight":"600"}},"fontFamily":"heebo"} /-->

<!-- wp:navigation {"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"horizontal","justifyContent":"center"}} --><!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About Us","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Services","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-submenu {"label":"Pages","url":"#","kind":"custom","isTopLevelItem":true} -->
<!-- wp:navigation-link {"label":"Cases","url":"#","kind":"custom","isTopLevelLink":false} /-->

<!-- wp:navigation-link {"label":"Pricing","url":"#","kind":"custom","isTopLevelLink":false} /-->

<!-- wp:navigation-link {"label":"FAQ","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- /wp:navigation-submenu -->

<!-- wp:navigation-submenu {"label":"Blog","url":"#","kind":"custom","isTopLevelItem":true} -->
<!-- wp:navigation-link {"label":"Blog","url":"#","kind":"custom","isTopLevelLink":false} /-->

<!-- wp:navigation-link {"label":"Single Blog","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- /wp:navigation-submenu -->

<!-- wp:navigation-link {"label":"Contact","url":"#","kind":"custom","isTopLevelLink":true} /--><!-- /wp:navigation -->

<!-- wp:buttons {"className":"accountra-button-header","layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons accountra-button-header"><!-- wp:button {"className":"is-style-custombuttonfill  is-style-custombuttonone","style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"30px","right":"30px"}},"border":{"radius":"5px"},"typography":{"fontSize":"14px"}},"fontFamily":"poppins"} -->
<div class="wp-block-button is-style-custombuttonfill  is-style-custombuttonone"><a class="wp-block-button__link has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-radius:5px;padding-top:12px;padding-right:30px;padding-bottom:12px;padding-left:30px;font-size:14px">CALL US</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
	'is_sync' => false,
);

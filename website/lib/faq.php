<?php 
// Copyright (c) Isaac Gouy 2004, 2005
// LIBRARIES ////////////////////////////////////////////////

require_once(BLIB);  
require_once(LIB); 
// $HTTP_GET_VARS ///////////////////////////////////////////

if (isset($HTTP_GET_VARS['sort'])){ $S = $HTTP_GET_VARS['sort']; } 
else { $S = 'cpu'; }
// TEMPLATE VARS //////////////////////////////////////////////// 

$Page = & new Template(LIB_PATH);  
$Page->set('PageTitle', FAQ_TITLE.BAR.SITE_TITLE);
$Page->set('BannerTitle', BANNER_TITLE);
$Page->set('FaqTitle', FAQ_TITLE);
$Page->set('PageBody', BLANK);
$Page->set('Sort', $S);
$Body = & new Template(LIB_PATH); 
$Body->set('Sort', $S);$Body->set('Download', DOWNLOAD_PATH);
$Page->set('PageBody', $Body->fetch('faq.tpl.php'));
$Page->set('Robots', '<meta name="robots" content="all" /><meta name="revisit" content="10 days" />');
echo $Page->fetch('page.tpl.php');
?>

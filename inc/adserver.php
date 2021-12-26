<!-- Revive Adserver Метка JavaScript - Generated with Revive Adserver v5.0.5 -->
<?php
$lang = '';
if (function_exists('pll_current_language')) {
    $lang = pll_current_language();
}
else if (function_exists('get_locale')) {
    $lang = substr(strtolower(get_locale()), 0,2);
}else{
    $searchValue = array_filter(headers_list(), function ($item) {
        if (stripos($item, 'X-Page-Lang') !== false) return $item;
        return false;
    });
    if (!empty($searchValue) AND $searchValue !== false) {
        $val = explode(':', $searchValue[array_key_first($searchValue)]);
        if (array_key_exists(1, $val)) $lang = trim($val[1]);
    }
}
$lang = !empty($lang) ? "&amp;lang=".$lang : "";
?>

<script type='text/javascript'><!--//<![CDATA[
const params = new URLSearchParams({
                        lang: document.querySelector('html').getAttribute('lang').slice(0, 2).toLowerCase()
                    });

                       var m3_u = (location.protocol=='https:'?'https://protate.live/www/dlr/urpa.php?fl=ajs':'http://protate.live/www/dlr/urpa.php?fl=ajs');
   m3_u  += '&amp;' + params.toString();
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("&amp;cuszi=105");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://protate.live/www/dlr/urpa.php?fl=ck&amp;n=a0b4c414&amp;cb=INSERT_RANDOM_NUMBER_HERE<?= $lang ?>' target='_blank'><img src='http://protate.live/www/dlr/urpa.php?fl=avw&amp;cuszi=105&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a0b4c414<?= $lang ?>' border='0' alt='' /></a></noscript>
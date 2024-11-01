<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// User tracking id
	$wpnerd_tracking_id = $analytics_id;
  	//Ab hier nichts mehr ändern
  	echo "
      <!-- Google Analytics -->
      <script>
      var gaProperty = '" . $wpnerd_tracking_id . "';
      var disableStr = 'ga-disable-' + gaProperty;
      if (document.cookie.indexOf(disableStr + '=true') > -1) {
          window[disableStr] = true;
      }
      function google_a_out() {
          alert ('Google Opt out wurde gesetzt.');
          document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
          window[disableStr] = true;
      }

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '" . $wpnerd_tracking_id . "', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');

      </script>
    ";
?>
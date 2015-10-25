<hr/>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>GitHub<li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact & support</a></li>
                <li><a href="#">Enterprise</a></li>
                <li><a href="#">Site status</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Applications<li>
                <li><a href="#">Product for Mac</a></li>
                <li><a href="#">Product for Windows</a></li>
                <li><a href="#">Product for Eclipse</a></li>
                <li><a href="#">Product mobile apps</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Services<li>
                <li><a href="#">Web analytics</a></li>
                <li><a href="#">Presentations</a></li>
                <li><a href="#">Code snippets</a></li>
                <li><a href="#">Job board</a></li>
            </ul>
        </div>
        <div class="col-xs-3 hidden-xs">
            <a href="https://mixpanel.com/f/partner" rel="nofollow"><img src="//cdn.mxpnl.com/site_media/images/partner/badge_blue.png" alt="Mobile Analytics" /></a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-8">
            <ul class="list-unstyled list-inline pull-left">
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
        <div class="col-xs-4">
            <p class="text-muted pull-right">© {{ date('Y') }} <a href="https://devpane.com">devpane.com</a>. All rights reserved</p>
        </div>
    </div>
</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="{{ elixir('js/app.js') }}"></script>
<!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
        for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
    mixpanel.init("26c15757f6efaea8946d365a9d87dfd8");</script><!-- end Mixpanel -->
@include('sweet::alert')
</body>
</html>
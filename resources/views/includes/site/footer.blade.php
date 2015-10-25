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

<script type="text/javascript">
    !function(o,n){function i(o){return function(){return threads.push({m:o,args:Array.prototype.slice.call(arguments)}),threads}}var threads=o.threads=o.threads||[];if(!threads.initialize){if(threads.invoked)return void(o.console&&console.error&&console.error("threads snippet included twice."));threads.invoked=!0;for(var c=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","group","track","ready","alias","page","once","off","on"],p=0;p<c.length;p++){var l=c[p];threads[l]=i(l)}
        threads.load=function(o){var i=n.createElement("script"),c="https:"===n.location.protocol?"https://":"http://";i.type="text/javascript",i.async=!0,i.src=c+"cdn.threads.io/analytics/"+o+"/threads.min.js";var p=n.getElementsByTagName("script")[0];p.parentNode.insertBefore(i,p)},threads.SNIPPET_VERSION="1.1.0",
                threads.load("4NxMHY"),
                threads.page()}}(window,document);
</script>

@if(env('APP_ENV') != 'local')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-66152253-1', 'auto');
        ga('send', 'pageview');

    </script>
@endif

@include('sweet::alert')

</body>
</html>
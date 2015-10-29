<hr/>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>devpane<li>
                <li><a href="#">About</a></li>
                <a href="devpane@helpful.io" data-helpful="devpane" data-helpful-modal="on" data-helpful-overlay="on">Support</a>
                <li><a href="{{ url('contact') }}">Contact</a></li>
                <li><a href="{{ url('contribute') }}">Contribute</a></li>
                <li><a href="{{ url('faq') }}">FAQ</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Contributions<li>
                <li><a href="#">Meetups</a></li>
                <li><a href="#">Lists</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Jobs</a></li>
            </ul>
        </div>
        <div class="col-xs-3">
            <ul class="list-unstyled">
                <li>Elsewhere<li>
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
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
                <li><a href="#">FOOTER LINK</a></li>
                <li><a href="#">FOOTER LINK</a></li>
                <li><a href="#">FOOTER LINK</a></li>
            </ul>
        </div>
        <div class="col-xs-4">
            <p class="text-muted pull-right">© {{ date('Y') }} <a href="https://devpane.com">devpane.com</a>. All rights reserved</p>
        </div>
    </div>
</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>
<script async src="https://assets.helpful.io/assets/widget.js"></script>

@yield('scripts')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-66152253-1', 'auto');
    ga('send', 'pageview');

</script>

@include('sweet::alert')

</body>
</html>
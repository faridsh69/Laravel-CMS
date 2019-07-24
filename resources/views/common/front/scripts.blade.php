@stack('scripts')
{!! config('0-developer.scripts') !!}

@if(config('0-general.hotjar'))
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1405862,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
@endif

@if(config('0-general.google_analytics'))
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', '{{ config("0-general.google_analytics") }}', 'auto' @if(\Auth::id()) ,{ userId: "{{ \Auth::id() ? \Auth::id() : 'Guest' }}" } @endif );
    ga('send', 'pageview');
	ga('set', 'userId', {{ \Auth::user() ? \Auth::id() : 0 }} );
</script>
@endif

@if(config('0-general.crisp'))
<script data-cfasync='false'>
    window.$crisp=[];
    CRISP_RUNTIME_CONFIG = {
      locale : 'fa'
    };
    CRISP_WEBSITE_ID = "{{ config('0-general.crisp') }}";(function(){
          d=document;s=d.createElement('script');
          s.src='https://client.crisp.chat/l.js';
          s.async=1;d.getElementsByTagName('head')[0].appendChild(s);
    })();       
</script>
@endif

@if(false)
<!-- <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 
 -->
<!-- <script type="text/javascript" src="//cdn.callrail.com/companies/315389868/1f41f4d0e4d704b1158e/12/swap.js"></script>
 -->
<!-- <script async custom-element="amp-call-tracking" src="https://cdn.ampproject.org/v0/amp-call-tracking-0.1.js"></script>
 -->
@endif
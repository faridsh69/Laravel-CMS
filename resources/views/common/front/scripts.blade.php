@stack('scripts')
{!! config('0-developer.scripts') !!}

@if(config('0-general.hotjar_id'))
    <!-- hotjar codes -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:{{config('0-general.hotjar_id')}},hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- hotjar codes -->
@endif
@if(config('0-general.google_analytics_id'))
    <!-- google analytics codes -->
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
        ga('create', '{{ config("0-general.google_analytics_id") }}', 'auto' @if(\Auth::id()) ,{ userId: "{{ \Auth::id() ? \Auth::id() : 'Guest' }}" } @endif );
        ga('send', 'pageview');
        ga('set', 'userId', {{ \Auth::user() ? \Auth::id() : 0 }} );
    </script>
    <!-- google analytics codes -->
@endif
@if(config('0-general.crisp_id'))
    <!-- crisp codes -->
    <script data-cfasync='false'>
        window.$crisp=[];
        CRISP_RUNTIME_CONFIG = {
          locale : 'fa'
        };
        CRISP_WEBSITE_ID = "{{ config('0-general.crisp_id') }}";(function(){
              d=document;s=d.createElement('script');
              s.src='https://client.crisp.chat/l.js';
              s.async=1;d.getElementsByTagName('head')[0].appendChild(s);
        })();       
    </script>
    <!-- crisp codes -->
@endif
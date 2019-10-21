<?php

use App\Models\SettingContact;
use App\Models\SettingDeveloper;
use App\Models\SettingGeneral;
use Illuminate\Database\Seeder;

class EricSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general_settings = [
			'app_title' => 'Synergy Power',
			'default_meta_title' => 'Bay Area Solar Panels Install and Repair | Synergy Power Livermore CA',
			'default_meta_description' => 'Bay Area Solar Panels Install and Repair | Synergy Power Livermore CA',
			'logo' => 'storage/files/shares/synergypower/logo.jpg',
			'favicon' => 'storage/files/shares/synergypower/favicon.png',
			'default_meta_image' => 'storage/files/shares/synergypower/default_meta_image.jpg',
			'default_user_image' => 'storage/files/shares/synergypower/default_user_image.ico',
			'default_product_image' => 'storage/files/shares/synergypower/default_product_image.png',
			'google_index' => 0,
			'pagination_number' => '10',
			'android_application_url' => 'https://play.google.com/store/apps/details?id=com.synergypower.android.play&hl=en',
			'ios_application_url' => 'https://apple-store.com/applications/synergypower',
			'introduce_video_url' => 'storage/files/shares/synergypower/video.mp4',
			'introduce_video_cover_photo' => 'storage/files/shares/synergypower/video.jpg',
			'subscribe_description' => '<h2>It\'s Time to Go Green</h2>
                        <p>Let 2019 be the year you invest in solar, saving you money on your energy bill, which helps you and helps the planet. Learn about the benefits of solar.</p>',
			'contact_us_description' => '<p>Our Promise <br>
                        We hate spam and would never mishandle the information you share with us.  
                        Our mission is to help with your solar needs with quality, 
                        expert service and nothing more.</p>',
        	'google_analytics_id' => '',
			'hotjar_id' => '',
			'crisp_id' => '',
        ];

        $contact_settings = [
			'email' => 'Hello@SynergyPower.com',
			'mobile' => '+18668770901',
			'phone' => '+18668770901',
			'fax' => '+18668770901',
			'address' => '962 Sunset Drive, Livermore, CA, 94551.',
			'latitude' => '37.760532',
			'longitude' => '-121.8909916',
			'google_plus' => 'Eric@synergypower.com',
			'twitter' => 'SynergyPowerCA',
			'facebook' => 'SynergyPowerCorp',
			'skype' => 'Eric@synergypower.com',
			'instagram' => 'synergypowercorp',
			'telegram' => 'synergypower',
        ];

        $developer_settings = [
			'app_debug' => '1',
			'app_env' => 'production',
			'theme' => '1-original',
			'throttle' => '15,0.2',
			'lazy_loading' => '1',
			'email_username' => 'farid.sh69@gmail.com',
			'email_password' => '********',
			'email_default_ccc' => 'farid.sh69@gmail.com',
			'email_default_subject' => 'Laravel Cms',
			'seo_title_min' => '3',
			'seo_title_max' => '60',
			'seo_url_max' => '80',
			'seo_url_regex' => '/^[a-z0-9-]+$/',
			'scripts' => '<!-- Call Tracking start  --> 
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 
<script async custom-element="amp-call-tracking" src="https://cdn.ampproject.org/v0/amp-call-tracking-0.1.js"></script>
<script type="text/javascript" src="//cdn.callrail.com/companies/315389868/1f41f4d0e4d704b1158e/12/swap.js"></script>
<!-- Call Tracking end --> 

<!-- HOTJAR  start --> 
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1405862,hjsv:6};
        a=o.getElementsByTagName(\'head\')[0];
        r=o.createElement(\'script\');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,\'https://static.hotjar.com/c/hotjar-\',\'.js?sv=\');
</script>
<!-- HOTJAR end --> 

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\'GTM-58TD6DR\');</script>
<!-- End Google Tag Manager -->

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script>
window.__lc = window.__lc || {};
window.__lc.license = 7036871;
window.__lc.chat_between_groups = false;
(function() {
var lc = document.createElement(\'script\'); lc.async = true;
lc.src = (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'cdn.livechatinc.com/tracking.js\';
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->


<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window,document,\'script\',

\'https://connect.facebook.net/en_US/fbevents.js\');


fbq(\'init\', \'2146073775654213\'); 

fbq(\'track\', \'PageView\');
</script>

<noscript>

<img height="1" width="1" alt="fb" 

src="https://www.facebook.com/tr?id=2146073775654213&ev=PageView

&noscript=1"/>
</noscript>

<!-- End Facebook Pixel Code -->


<!-- Google Tag Manager (noscripts) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58TD6DR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->',
        ];

        SettingGeneral::updateOrCreate(['id' => 1], $general_settings);
        SettingDeveloper::updateOrCreate(['id' => 1], $developer_settings);
        SettingContact::updateOrCreate(['id' => 1], $contact_settings);
    }
}

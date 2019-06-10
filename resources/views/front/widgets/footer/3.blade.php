@if(Request::segment(1) != 'admin')
<div class="background-footer">
<div class="container">
    <div class="seperate"></div>
    <div class="row">
        <div class="col-sm-4 col-md-3 col-lg-3">
            <h4 class="page-header">
            title
            </h4>
        </div>
        <div class="col-xs-11 col-xs-offset-1 col-sm-offset-0 col-md-8 col-lg-9">
            <!-- <div class="seperate"></div> -->
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-4 col-md-3">
            <ul class="list-unstyled">
                <li>                
                    <a href="{{ url('/product') }}">محصولات</a>
                </li>
                <li>                    
                    <a href="{{ url('/content/news') }}">اخبار</a>
                </li>
                <li>                    
                    <a href="{{ url('/content/article') }}">مقالات</a>
                </li>
                <li>                    
                    <a href="{{ url('/forum') }}">پرسش و پاسخ</a>
                </li>
            </ul>
            <div class="half-separator"></div>
        </div>
        <div class="col-sm-4 col-md-3">
            <ul class="list-unstyled">
                @foreach(\App\Models\Page::take(3)->get() as $page)
                <li>
                    <a href="{{ url('/content/page/'. $page->id) }}">
                        {{ $page->title }}
                    </a>
                </li>
                @endforeach
                <li><a href="{{ url('/product/comparison') }}">مقایسه</a></li>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#contact-us-modal" class="draw">تماس با ما</a></li>
            </ul>
            <div class="half-separator"><!-- sep --></div>
        </div>
        <div class="col-sm-4 col-md-3">
            <span class="display-none">
                enam
            </span>
            <img src="https://trustseal.enamad.ir/logo.aspx?id=96129&amp;p=EN6o2dVeZvFsjM6F" alt="" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=96129&amp;p=EN6o2dVeZvFsjM6F&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" style="cursor:pointer" id="EN6o2dVeZvFsjM6F">
            <div class="half-separator"><!-- sep --></div>
        </div>
    	<div class="col-md-12 col-md-3 text-right">
            <div>title در شبکه‌های اجتماعی</div>
            <div class="half-seperate"></div>
            <div class="social">
                @if( isset($constant['facebook']) )
                <a href="https://www.facebook.com/{{ $constant['facebook'] }}"> 
                    <i class="fa fa-facebook "></i> </a> @endif @if( isset($constant['telegram']) )
                <a href="https://telegram.me/{{ $constant['telegram'] }}"> 
                    <i class="fa fa-telegram"></i> </a> @endif @if( isset($constant['instagram']) )
                <a href="https://www.instagram.com/{{ $constant['instagram'] }}"> 
                    <i class="fa fa-instagram"></i> </a> @endif @if( isset($constant['twitter']) )
                <a href="https://www.twitter.com/{{ $constant['twitter'] }}"> 
                    <i class="fa fa-twitter"></i> </a> @endif @if( isset($constant['google_plus']) )
                <a href="https://www.plus.google.com/{{ $constant['google_plus'] }}"> 
                    <i class="fa fa-google-plus"></i> </a> @endif @if( isset($constant['linkden']) )
                <a href="https://www.linkden.com/{{ $constant['linkden'] }}">
                    <i class="fa fa-external-link"></i> </a> @endif
            </div>
            <div class="one-third-seperate"></div>
            <p>کلیه حقوق این سایت متعلق به title
            می‌باشد.</p>
            <p class="author-link">
                نویسنده سایت :<a href="http://rotbeyek.ir/cv">رتبه یک</a>
            </p>
        </div>
    </div>
    <div class="seperate"></div>
    <div class="seperate"></div>
</div>
</div>
@endif
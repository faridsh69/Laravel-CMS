<div class="py-1 bg-black top">
	<div class="container">
		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
    		<div class="col-lg-12 d-block">
	    		<div class="row d-flex">
	    			<div class="col-md pr-4 d-flex topper align-items-center">
				    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
					    <span class="text">{{ config('0-contact.phone') }}</span>
				    </div>
				    <div class="col-md pr-4 d-flex topper align-items-center">
				    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    <span class="text">{{ config('0-contact.email') }}</span>
				    </div>
				    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
					    <!-- <p class="mb-0 register-link"><a href="#" class="mr-3">Sign Up</a><a href="#">Sign In</a></p> -->
				    </div>
			    </div>
		    </div>
	    </div>
	  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">{{ config('0-general.app_title') }}</a>
      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav nav ml-auto">
          @foreach(\App\Models\Menu::get()->toTree() as $menu_item)
          <li class="nav-item">
            <a href="{{ route('front.page.index', $menu_item->url) }}" class="nav-link">
              <span>{{ $menu_item->title }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </nav>
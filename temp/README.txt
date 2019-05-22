structure:
	+ github
	+ v-host o system 32 o tosh bezan cms.new o cms.old
	+ zoodtar das be code sho
	+ init laravel
	+ use codestyle
	+ write unit tests
	+ migration, 
	+ model,
	+ faker, 
	+ seeder, 
	+ route, 
	+ controller, 
	+ cdn structure,
	+ trottle 
	+ route ha ba name bashan hamegi
	+ theme admin,
		+ header
		+ script o ham ezafe kon
		+ meta -> package import kon
		+ breadcrumb -> package import kon
		+ sidebar items -> item hae menu ha ro beriz inja 
		+ horizontal-menu -> linkae morede niaz
		+ toolbar -> profile o ina ro ok kon nesfe 
		+ header-tools -> export excel - print o ina ro bezar ...
		+ footer
	+ form:
		+ logic:
			+ form create
			+ validate form
			+ save data to database
			+ edit
			+ delete
			+ checkbox
			+ regex validation for url
		+ ux:
			+ old values
			+ good validation error
			+ show hints
		+ ui:
			+ all metronic theme
			+ input 
			+ textarea
			+ checkbox
			+ switch1
			+ switch2
			+ maxlength
			+ multiselect
			+ button
			+ help block
			+ validations
			+ icon
			+ ckeditor
			+ upload image
			+ file manager
			+ sync file manager with cdn
		+ extra:
			+ notification after save and edit
			+ add tags
			+ add user activity log
			+ activity log bezanam bade pak o update o create
			add category id 
			add related blogs
			notification after delete ...
			add some related blogs
			add category_id
			sakhtare tree vase category
			drag kardane page vase block
			unit test
			code style
	+ table
		+ created_at
		+ user_id
		+ render html
		+ export excel
		+ height table
		+ height each column
		+ sort,
		+ filter, 
		+ class khob besh bedim,
		+ paginate, 
		+ edit
		+ delete
		+ status checkbox
		+ status activation
		+ export with csv
		+ import with csv
	structure:
		meta to controller ha ro fix kon sakhtaresh o to view ham
		admin layout o sakhtaresh o fix kon kollan vase table o form
		constructor toe controller o bezan o chizae tosh o tamiz kon
		vase sidebar o route ha ye array khob besaz
		be route ha id nade balke khode blog o bede biad biron
		migration o vasash ye sakhtar bezan ke az to model bekhone khodesh
		hame chizae toe factory o bego az ye ja bekhone
		hame chizae toe seeder ham yekparche kon
		hame function hae index to controller o baghie o ye shekl kon
		hame chizae to function ha ro daghighan mese ham kon
		activity log
			meta ha ro bego ke az ye ja bekhone
			function hae toe controller ha ro az ye function bekhon
			view ha ham bayad az ye sakhtar biad o moshtarak taresh konam
			form ha ro bebinam mishe az ye sakhtaresh kard ya na
			bebin mishe ye model benevisam ke bad form az rosh sakhte beshe
			to route blog bede na id
			ye sakhtar khob vase create form
			ye sakhtare khob vase validation
			validation o form o hame ina ro betonim az dakhele model generate konim
			ye kari konam har chi to model hast o ham migration kone ham to form o ina azash estefade kone
			page o daghighan copy blog bezan bebin kojahash fargh dare ba ham
			structure meta ha ro ina ro fix kon kollan az ye ja bekhone
			sakhtare notification o ok kon to kolle safahat
			activity log o ok kon ke ye sakhtare sabet dashte bashe
			breadcrumb o fixesh kon
			ye fekri kon ke chia bayad to hidden bashan chia na
	+ log o neshon bede
	+ backup giri o bezar to proje
	+ changelog show in dashboard vase eric benevis
	subdomains
	admin subdomain
	change log read me o bezar avvale proje
	settings o bezarim to .env ya config ya az database bekhone
	front
		theme 
		block
		widgets
	seo rule: 
		find h1 and h2 in page
	webpack for compile css js files
	login page complete
	notification email o sms
	check php load time in front views after developing them
models: multiple
	blog: 
		fields:
			name:				type:		rule:		help: 		relation: table name -> users
			id, 				increments	-Automatic
			url, 				string		required|max:80|regex:/^[a-z0-9-_]+$/|unique:blogs,url,0
			title, 				string		required|max:60|min:10|unique:blogs,title,0
			short_content, 		string		nullable|max:191
			content, 			text 		required|seo_header
			meta_description, 	string		required|max:191|min:70
			keywords, 			string		nullable|max:191
			meta_image, 		string		nullable|max:191|url
			published, 			boolean		
			google_index, 		boolean		
			canonical_url, 		string		nullable|max:191|url
			creator_id, 		foreign		-Automatic
			editor_id, 			foreign		-Automatic
			created_at, 		datetime	-Automatic
			updated_at, 		datetime	-Automatic
			deleted_at			datetime	-Automatic
migrations: multiple automatic
	Schema::create('blogs {{table_name}} ', function (Blueprint $table) {
        $table->increments {{type}} ('id' {{name}} );
        $table->string {{type}} ('url' {{name}} )->unique() {{unique exist in rule}}
        $table->string {{type}} ('title' {{name}} )->unique()  {{unique exist in rule}}
        $table->string {{type}} ('short_content' {{name}} )->nullable(); {{nullable exist in rule}}
        $table->text {{type}} ('content' {{name}} );
        $table->string {{type}} ('meta_description' {{name}} );
        $table->string {{type}} ('keywords' {{name}} )->nullable(); {{nullable exist in rule}}
        $table->string {{type}} ('meta_image' {{name}} )->nullable(); {{nullable exist in rule}}
        $table->boolean {{type}} ('published' {{name}} )->default(true); {{az roe type bayad default true beshe}}
        $table->boolean {{type}} ('google_index' {{name}}  )->default(true); {{az ro type}}
        $table->string {{type}} ('canonical_url' {{name}} )->nullable();  {{nullable exist in rule}}
        
        // $table->string('related_blogs')->nullable();
        // $table->integer('category_id')->unsigned();
        // $table->foreign('category_id')->references('id')->on('categories');

        $table->integer {{type}} ('creator_id' {{name}} )->unsigned(); {{ type???? }}
        $table->foreign {{ type???? }} ('creator_id' {{name}} )->references('id')->on('users'); {{ relation???? }}
        $table->integer('editor_id')->unsigned();
        $table->foreign('editor_id')->references('id')->on('users');

        $table->timestamps();
        $table->softDeletes();
    });

factory: single or multi
	return [
		{{ required ha inja hastan faghat }}
        'url' => $faker->uuid, {{ unique -> uuid }}
        'title' => $faker->uuid, {{ unique -> uuid }}
        'short_content' => $faker->address, {{ type:string -> text(100) }}
        'content' => $faker->text, {{ type:text -> text }}
        'meta_description' => {{ type:string -> text(100) }}
        'keywords' => {{ type:string -> text(100) }}
    ];

seeders: single with one array
	factory(Blog::class, 5)->create();

validation: 

routes: single with one array
	$model_name = 'blog';
	$resource_controller = 'ResourceController';

	Route::group(['prefix' => 'blog' {{$model_name}} , 'namespace' => 'Blog' {{ bigname $model_name}}, 'as' => 'blog.' {{$model_name.}}], function () {
		Route::resource('list' {{static}} , 'ResourceController' {{static}} );
		Route::get('datatable' {{static}} , 'ResourceController@getDatatable' {{static}} )->name('datatable' {{static}} );
		Route::get('export' {{static}} , 'ResourceController@getExport' {{static}} )->name('export' {{static}} );
		Route::get('import' {{static}} , 'ResourceController@getImport' {{static}} )->name('import');
		Route::get('change-status/{id} {{static}} ', 'ResourceController@getChangeStatus' {{static}} )->name('change-status' {{static}} );
		Route::get('pdf' {{static}} , 'ResourceController@getPdf' {{static}} )->name('pdf' {{static}} );
		Route::redirect('/', route('admin.blog.list.index' {{model_name}} ));
	});

controllers: multiple automatic

add tags: single automatic
activity log: single automatic
excel: single automatic
exceptions: single
views:
	breadcrumb: single automatic
	meta ha: single automatic
	layout: single automatic
	print layout: single automatic
form: ???????
table: ????????
unit test: ??????
Export: ?????
Import: ??????
notifications: single automatic
	email layout: single automatic
storage: single automatic
services: 
	handle all subdomains
return view ba block o widgets -> ??????
elexir:
Css:
Js:
authorizations: ??????


packages:
	+ admin theme: drag and drop, calendar, notification, upload image, chart, forms
		+ kinshines/metronic
	+ form builder:
		+ "kris/laravel-form-builder": "^1.20",
	+ tables: sort, filter, paginate, status activation
		+ "yajra/laravel-datatables-oracle": "~9.0"
		+ datatables.net
	+ HTML editor:
		+ ckeditor4
	+ file manager:
		+ "unisharp/laravel-filemanager": "dev-master",
	+ image: crop, resize, ye url base dashte bashe kolle system, alt axesh
		+ "unisharp/laravel-filemanager": "dev-master",
	+ add tags: for blog
		+ rtconner/laravel-tagging
	+ log:
		+ "rap2hpoutre/laravel-log-viewer": "^1.1",
	+ export excel:
		+ Maatwebsite/Laravel-Excel
	+ import with csv:
		+ Maatwebsite/Laravel-Excel
	+ backup:
		+ spatie/laravel-backup
	+ activity user log ,page and blog view:
		+ "spatie/laravel-activitylog": "^3.5",
	+ validation phone:
		+ Propaganistas/Laravel-Phone
	+ api document:
		+ mpociot/laravel-apidoc-generator
	+ country o city:
		+ antonioribeiro/countries
	+ pdf:
		barryvdh/laravel-dompdf
	+ breadcrumb:
		+ myself
	+ meta:
		myself
	+ seo:
		myself
	+ cdn:
		myself
	+ print layout:
		myself
	lazy :
		myself 
	- tracker
		antonioribeiro/tracker
	- health
		antonioribeiro/health
	- firewall
		antonioribeiro/firewall
	code style
		squizlabs/PHP_CodeSniffer
		FriendsOfPHP/PHP-CS-Fixer
	comment o rate o share in social networks:
	role&permission:
	module maker:

Features:
	CMS ADMIN PANEL:
		+ 0-dashboard
			login 
				chandbar eshteba zad natone dge request bezane 1 min ban she
				code captcha bashe barash
				kolle recordae login ha zabt beshe
			profile 
			change password
			dashboard contents
				neshon bede chand ta page darim, user, blog, image, ...
		+ 1-page
			+ title, url, status, (block), (seo)
		+ 2-blog
			title, url, status, short_desc, long_desc, image, commentable, ratable, (block), (seo)
		+ 3-category 
			manage tags
			title, order, page-or-blog
		+ 4-file manager
			file manager with full feature crop image, resize, ...
		+ 5-comment o rate
			status for show or hide or delete
		6-form builder
			fields ( field maker ) title, type, parent, default, required or not,
		+ 7-menu
			select urls, sort urls
		+ 8-theme
			list of themes -> we will start with 3 different themes
		+ 9-block
			each page has its block structure
			blocks uses widgets
			url, status,
			3 column, 2 colomn - right and middle, 2 colomnt - left and middle, 1 column
		+ 10-widgets
		+ 11-seo
			Setting:
				google no index
				site map
			Content Rules: 
				h1 finder, h2 h3, full metas, canonical link, ... it crowl on all of the blog and pages ... seo principles
				blog - article:
				+ url required|min:10|max:80|lowercase|alphabetic, 
				+ title required|unique:posts,post_title|min:10|max:60, 
				+ description required|min:70|max:300, 
				+ content h1 required|count:1|!=title

			lazy loading -> default lazy loading image

			bade ha ye package minevisam ke tahlil kone chandta kalame to in blog hast o in dastana
			bad miad mige ke in url che DA dare o che PA dare
			ye seri link hae dakheli be toe safahat midim to site

		+ 12-user manager
			first name, last name, phone, password, birthday, country, male, profile, address	
			role and permission: name, title, address ha ham bezar barash
			settings:
				login fields: phone, password, automatice activation or not,
				login page status, register status	
		+ 13-setting
			General: 
				site name, default meta description, favicon, logo, paginations numbers, crisp o google analytics betone add kone, default user profile image, user login email? sms?
			Contact Info: 
				email, phone, mobile, fax, address, social networks, 
			Developer Options:
				debug mode off - on, truttle number, google no index, cdn vase axa, email sender, sms sender,
			Advance Developer Options:
				clear server cache, migrate o config cache, cache clear, route lists, ...
			Logs:
				show logs
		+ 14-notifications
			log sms ha o email ha beriz to ye table
		+ 15-backupgiri
		+ 16-log
		? 17-forum
		? 18-tickets&messaging
		? 19-sliders
		? 20-partners
		+ 21-reports
		? 22-news
		? 23-events
	Frontend
		0-structure:
			breadcrumb
			seperator moji shekl
			lazy loading on axe image google biad 
		1-Slider,
		2-Show you business features,
		3-Partners,
		4-Countings -> for show how many users, project done, etc
		5-google map,
		6-show your site statistics,
		7-form
		8-social media icons,
		9-counting down for time to start your events,
		10-customers review,
		11-contact us,
		12-custome media like video,
		13-search,
		14-menu,
		15-login panel,
		16-download app
		17-baner
		18-vase product slider reyli
		19-css for buttons, images, inputs, ... hame ina begard biar
		custome HTML CSS JS widget, Ifram, etc


Extra features:
	- cache forms and sidebar
	- notification email o sms
	- check php load time in front views after developing them
	- login page complete
	- unit test benevisam 
	- excel export and import 
	- laravel code style
	- use data in models to create migrations
	-- use docker
	-- two step verification
	create a learning videos
	have company in github social network and answer questions
	- class new for table
	- image showing in table
	- pdf
	- print
	- quick-sidebar
	- quick-navbar	

BUGS:
	server unable to send email
	server unable to create backup


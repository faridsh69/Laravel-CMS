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
		toolbar -> profile o ina ro ok kon nesfe 
		header-tools -> export excel - print o ina ro bezar ...
		footer
		- quick-sidebar
		- quick-navbar
	table, 
	view, 
	validation,
	form,
		in matn o be englisi convert kon vase eric
	- use docker
	- use data in models to create migrations
models:
	blog: title, content, short_content, creator_id, editor_id, status, url, seo_id
migrations:
factory:
seeders:
validation:
authorizations:
routes:
controllers:
exceptions:
views:
	return view ba block o widgets
	layout:
	meta ha:
	print layout:
notifications:
	email layout:
storage:
services:
	handle all subdomains
	different status in database
exceptions:
elexir:
Css:
Js:

packages:
	admin theme: drag and drop, calendar, notification, upload image, chart, forms
		kinshines/metronic
	form builder:
		yajra/laravel-datatables-oracle
	tables: sort, filter, paginate, status activation
		datatables.net
	HTML editor:
		ckeditor
	file manager:
	image: crop, resize, ye url base dashte bashe kolle system, alt axesh
	add tags: for blog
	comment o rate o share in social networks:
	log:
	api document:
	role&permission:
	export excel:
	pdf:
	import with csv:
	print layout:
	validation phone:
	country o city:
	activity user log ,page and blog view:
	module maker:
	backup:
		spatie/laravel-backup
	+ breadcrumb
		myself
	meta
		myself
	seo
		myself
	cdn
		myself
	lazy 
		myself 

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
			title, url, status, (block), (seo)
		+ 2-blog
			title, url, status, short_desc, long_desc, image, commentable, ratable, (block), (seo)
		+ 3-category 
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
			Content Rules: 
				h1 finder, h2 h3, full metas, canonical link, ... it crowl on all of the blog and pages ... seo principles
			lazy loading -> default lazy loading image
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








Vue.component('comparison-cinema', {
  	template: `
  	<div>
  		<h3>فروش فیلم ها</h3>
		<div id="comparison-cinema" class="ltr"></div>
		<div style="display:none">
			<table id="freq" border="0" cellspacing="0" cellpadding="0">
				<tr bgcolor="#CCCCFF">
					<th colspan="9" class="hdr">Table of (percent)</th>
				</tr>
				<tr bgcolor="#CCCCFF">
					<th class="freq"></th>
					<th class="freq">فروشنده</th>
					<th class="freq">من سالوادور نیستم</th>
					<th class="freq">پنجاه کیلو آلبالو</th>
					<th class="freq">ابد و یک روز</th>
					<th class="freq">بارکد</th>
					<th class="freq">بادیگارد</th>
					<th class="freq">لانتوری</th>
					<th class="freq">زاپاس</th>
				</tr>
				<tr v-for="cinema in cinemas">
					<td class="dir">{{cinema.name}}</td>
					<td class="data" v-for="data in cinema.data">{{data}}</td>
				</tr>
			</table>
		</div>
	</div>`,
	props: {},
	data: function () {
		return {
			cinemas: [
				{
					name: "سینما آزادی",
					data: [9000000, 2000000, 4000000, 4000000, 5000000, 3000000, 2000000]
				}, {
					name: "سینما آفریقا",
					data: [8000000, 1000000, 2000000, 2000000, 1000000, 2000000, 1000000]
				}, {
					name: "پردیس اریکه ایرانیان",
					data: [7000000, 3000000, 2000000, 1000000, 2000000, 3000000, 2000000]
				}, {
					name: "پردیس زندگی",
					data: [10000000, 6000000, 2000000, 4000000, 5000000, 1000000, 2000000]
				}, {
					name: "پردیس سینمایی ملت",
					data: [7000000, 1000000, 2000000, 1000000, 2000000, 2000000, 2000000]
				}, {
					name: "سینما استقلال",
					data: [5000000, 1000000, 3000000, 4000000, 2000000, 3000000, 2000000]
				}, {
					name: "سینما ایران",
					data: [7000000, 1000000, 1000000, 0, 3000000, 2000000, 1000000]
				}, {
					name: "پردیس بهمن",
					data: [6000000, 1000000, 1000000, 2000000, 1000000, 1000000, 2000000]
				}, {
					name: " سینما پارس",
					data: [7000000, 1000000, 2000000, 4000000, 2000000, 2000000, 2000000]
				}, {
					name: "پردیس حافظ",
					data: [6000000, 1000000, 8000000, 2000000, 1000000, 1000000, 2000000]
				}, {
					name: " سینما میلاد",
					data: [6000000, 4000000, 2000000, 5000000, 4000000, 4000000, 0]
				}, {
					name: "پردیس فرهنگ",
					data: [6000000, 1000000, 0, 2000000, 1000000, 5000000, 2000000]
				}, {
					name: " سینما پارس",
					data: [6000000, 1000000, 2000000, 3000000, 2000000, 0, 0]
				}, {
					name: "پردیس فلسطین",
					data: [10000000, 1000000, 0, 8000000, 1000000, 3000000, 2000000]
				}, {
					name: " سینما قدس",
					data: [6000000, 3000000, 7000000, 3000000, 2000000, 0, 0]
				}
			]
		}
	},
	mounted: function () {
		this.createChart();
	},
	methods: {
		createChart: function () {
			this.$http.get('/api/admin/comparison-cinema').then(function (response) {
				Highcharts.chart('comparison-cinema', {
					data: {
						table: 'freq',
						startRow: 1,
						endRow: 15,
						endColumn: 7
					},
					chart: {
						polar: true,
						type: 'column',
						style: {
							fontFamily: "iranian-sans, tahoma",
							fontSize: '10px'
						}
					},
					title: {
						text: ''
					},
					pane: {
						size: '82%'
					},
					legend: {
						align: 'right',
						verticalAlign: 'top',
						y: 100,
						layout: 'vertical',
					},
					xAxis: {
						labels: {
							autoRotation: 1
						},
					},
					yAxis: {
						labels: {
							enabled: false
						},
						title: {
							text: null
						},
						min: 0,
						endOnTick: false,
						reversedStacks: false
					},
					tooltip: {
						pointFormat: '<div class="charts-tooltip"><br><div><span style="color:{series.color}">\u25CF</span> {series.name}: </div><div style="direction:ltr"> {point.y}   ریال</div></div>',
						headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
						useHTML: true,
						zIndex: 9999999
					},
					plotOptions: {
						series: {
							stacking: 'normal',
							shadow: false,
							groupPadding: 0,
							pointPlacement: 'on'
						}
					}
				});
				Highcharts.setOptions({
					lang: {
						thousandsSep: ','
					}
				});
			});
		}
	}
});

Vue.component('comparison-daily', {
  	template: `
  	<div>
		<h3>تفکیک فیلم‌ها در هر سینما</h3>
		<div id="chart-comparison-film-daily" class="ltr"></div>
	</div>`,
	props: {},
	data:function(){
		return{
			comparisonFilmDaily :[]
		}
	},
	mounted: function() {
		this.createChart();
	},
	methods: {
		createChart: function () {
			jQuery.getJSON('/api/admin/comparison-daily', function (data) {
				this.comparisonFilmDaily = data;
				Highcharts.chart('chart-comparison-film-daily', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie',
						style: {
							fontFamily: "iranian-sans, tahoma",
							fontSize: '10px'
						},
					},
					title: {
						text: '',
						style: {
							display: 'none'
						}
					},
					subtitle: {
						text: '',
						style: {
							display: 'none'
						}
					},
					tooltip: {
						pointFormat: '<div class="charts-tooltip-header"><br><div> {point.y} ٪ </div></div>',
						headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
						useHTML: true,
						zIndex: 9999999
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								format: '{point.name} %{point.percentage:.1f} ',
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								}
							}
						}
					},
					series: [{
						name: 'درصد فروش',
						colorByPoint: true,
						data: this.comparisonFilmDaily
					}]
				});
			});
		}
	}
});

Vue.component('comparison-theater', {
  	template: `
  	<div>
  		<h3>تفکیک سالن ها در هر سینما</h3>
		<div id="chart-comparison-theater" class="ltr"></div>
	</div>`,
	props: {
	},
	data:function(){
		return{
			comparisonSalon :[]
		}
	},
	mounted: function() {
		this.createChart();
	},
	methods: {
		createChart: function () {
			jQuery.getJSON('/api/admin/comparison-theater', function (data) {
				this.comparisonSalon = data;
				Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
					return {
						radialGradient: {
							cx: 0.5,
							cy: 0.3,
							r: 0.7
						},
						stops: [
							[0, color],
							[1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
						]
					};
				});
				Highcharts.chart('chart-comparison-theater', {
					chart: {
						type: 'pie',
						options3d: {
							enabled: true,
							alpha: 45,
							beta: 0
						},
						style: {
							fontFamily: "iranian-sans, tahoma",
							fontSize: '10px'
						},
					},
					title: {
						text: '',
						style: {
							display: 'none'
						}
					},
					subtitle: {
						text: '',
						style: {
							display: 'none'
						}
					},
					tooltip: {
						pointFormat: '<div class="charts-tooltip-header"><br><div> {point.y} ریال </div></div>',
						headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
						useHTML: true,
						zIndex: 9999999
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							depth: 35,
							dataLabels: {
								enabled: true,
								format: '{point.name} %{point.percentage:.1f} '
							}
						}
					},
					series: [{
						type: 'pie',
						name: 'تعداد فروش سالن',
						data: this.comparisonSalon
					}]
				});
				Highcharts.setOptions({
					lang: {
						thousandsSep: ','
					}
				});
			});
		}
	}
});

Vue.component('comparison-total', {
	template: `
	<div>
		<h3>تفکیک فیلم‌ها در مجموع</h3>
		<div id="chart-comparison-film-total" class="ltr"></div>
	</div>`,
	props: {
	},
	data:function(){
		return{
			comparisonFilmTotal :[]
		}
	},
	mounted: function() {
		this.createChart();
	},
	methods: {
		createChart: function () {
			jQuery.getJSON('/api/admin/comparison-total', function (data) {
				this.comparisonFilmTotal = data;
				Highcharts.chart('chart-comparison-film-total', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie',
						style: {
							fontFamily: "iranian-sans, tahoma",
							fontSize: '10px'
						},
					},
					title: {
						text: '',
						style: {
							display: 'none'
						}
					},
					subtitle: {
						text: '',
						style: {
							display: 'none'
						}
					},
					tooltip: {
						pointFormat: '<div class="charts-tooltip-header"><br><div> {point.y} ٪ </div></div>',
						headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
						useHTML: true,
						zIndex: 9999999
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								format: '{point.name} %{point.percentage:.1f} ',
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								}
							}
						}
					},
					series: [{
						name: 'درصد فروش',
						colorByPoint: true,
						data: this.comparisonFilmTotal
					}]
				});
			});
		}
	}
});

Vue.component('customer-detail',{
	template:`
	<div>
		<h3>مشتریان</h3>
		<div id="chart-customers-details" class="ltr"></div>
	</div>`,
	props: {},
	data: function () {
		return {}
	},
	mounted: function () {
		this.createChart();
	},
	methods: {
		createChart: function () {
			Highcharts.chart('chart-customers-details', {
				chart: {
					polar: true,
					type: 'line',
					style: {
						fontFamily: "iranian-sans, tahoma",
						fontSize: '10px'
					},
				},
				title: {
					text: ' سن و جنسیت افراد',
					x: -80
				},
				pane: {
					size: '89%'
				},
				xAxis: {
					categories: [' ۰ - ۱۰', '۱۰ - ۱۸', '۱۸ - ۲۵', '۲۵ - ۳۵', ' ۳۵ - ۵۰', '۵۰ - ۸۰'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b><br/>'
				},
				tooltip: {
					shared: true,
					pointFormat: '<div class="charts-tooltip"><div><span style="color:{series.color}">\u25CF</span> {series.name}: </div><div style="direction:ltr"> {point.y}   نفر</div></div>',
					useHTML: true,
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 100,
					layout: 'vertical'
				},
				series: [{
					name: 'زن',
					data: [414310, 774310, 1444310, 1124310, 934310, 444310],
					pointPlacement: 'on'
				}, {
					name: 'مرد',
					data: [314310, 374310, 844310, 1424310, 934310, 344310],
					pointPlacement: 'on'
				}]
			});
			Highcharts.setOptions({
				lang: {
					thousandsSep: ','
				}
			});
		}
	}
});

Vue.component('last-year',{
	template:`
	<div>
		<h3>فروش در طی سال گذشته</h3>
		<div id="chart-last-year" class="ltr"></div>
	</div>`,
	props: {},
	data: function () {
		return {
			categories: []
		}
	},
	mounted: function () {
		this.createChart();
	},
	methods: {
		createChart: function () {
			this.categories = ['کل فروش سال', 'پرفروش‌ترین فیلم سال', 'کم‌فروش‌ترین فیلم سال', 'بیشترین فروش ماه', 'کمترین فروش ماه', 'بیشترین فروش هفته', 'کمترین فروش هفته', 'بیشترین فروش روز', 'کمترین فروش روز'];
			Highcharts.chart('chart-last-year', {
				chart: {
					type: 'bar',
					style: {
						fontFamily: "iranian-sans, tahoma",
						fontSize: '10px'
					}
				},
				title: {
					text: ''
				},
				xAxis: [{
					categories: this.categories,
					reversed: false,
					labels: {
						step: 1
					}
				}, { // mirror axis on right side
					opposite: true,
					reversed: false,
					categories: this.categories,
					linkedTo: 0,
					labels: {
						step: 1
					}
				}],
				yAxis: {
					title: {
						text: 'فروش به ریال'
					},
					labels: {
						formatter: function () {
							return this.value;
						}
					}
				},
				plotOptions: {
					series: {
						stacking: 'normal'
					}
				},
				tooltip: {
					pointFormat: '<div class="charts-tooltip"><br><div><span style="color:{series.color}">\u25CF</span> {series.name}: </div><div style="direction:ltr"> {point.y}  ریال</div></div>',
					headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
					useHTML: true,
					zIndex: 9999999
				},
				series: [{
					name: 'امسال',
					data: [37100000000, 28100000000, 24300000000, 15300000000, 11300000000, 2800000000, 2200000000, 1600000000, 1900000000]
				}, {
					name: 'پارسال',
					data: [-32700000000, -19300000000, -6100000000, -12100000000, -7100000000, -2100000000, -1700000000, -2300000000, -2500000000]
				}]
			});
			Highcharts.setOptions({
				lang: {
					thousandsSep: ','
				}
			});
		}
	}
});

Vue.component('sale-annual',{
	template:`
	<div>
		<div id="result"></div>
		<table id="table-sparkline">
			<thead>
			<tr>
				<th>نام فیلم</th>
				<th>فروش به ریال</th>
			</tr>
			</thead>
			<tbody id="tbody-sparkline">

			<tr>
				<th>فروشنده</th>
				<th>۱۵۱,۱۶۹,۱۴۲۳,۰۰۰
				</th>
			</tr>
			</tbody>
		</table>
	</div>`,
	props: {},
	data: function () {
		return {
			saleDaily: []
		}
	},
	mounted: function () {
		this.createChart();
	},
	methods: {
		createChart: function () {
			jQuery(function () {
				/**
				 * Create a constructor for sparklines that takes some sensible defaults and merges in the individual
				 * chart options. This function is also available from the jQuery plugin as $(element).highcharts('SparkLine').
				 */
				Highcharts.SparkLine = function (a, b, c) {
					var hasRenderToArg = typeof a === 'string' || a.nodeName,
						options = arguments[hasRenderToArg ? 1 : 0],
						defaultOptions = {
							chart: {
								renderTo: (options.chart && options.chart.renderTo) || this,
								backgroundColor: null,
								borderWidth: 0,
								type: 'area',
								margin: [2, 0, 2, 0],
								width: 120,
								height: 20,
								style: {
									overflow: 'visible'
								},
								// small optimalization, saves 1-2 ms each sparkline
								skipClone: true
							},
							title: {
								text: ''
							},
							credits: {
								enabled: false
							},
							xAxis: {
								labels: {
									enabled: false
								},
								title: {
									text: null
								},
								startOnTick: false,
								endOnTick: false,
								tickPositions: []
							},
							yAxis: {
								endOnTick: false,
								startOnTick: false,
								labels: {
									enabled: false
								},
								title: {
									text: null
								},
								tickPositions: [0]
							},
							legend: {
								enabled: false
							},
							tooltip: {
								backgroundColor: null,
								borderWidth: 0,
								shadow: false,
								useHTML: true,
								hideDelay: 0,
								shared: true,
								padding: 0,
								positioner: function (w, h, point) {
									return {x: point.plotX - w / 2, y: point.plotY - h};
								}
							},
							plotOptions: {
								series: {
									animation: false,
									lineWidth: 1,
									shadow: false,
									states: {
										hover: {
											lineWidth: 1
										}
									},
									marker: {
										radius: 1,
										states: {
											hover: {
												radius: 2
											}
										}
									},
									fillOpacity: 0.25
								},
								column: {
									negativeColor: '#910000',
									borderColor: 'silver'
								}
							}
						};
					options = Highcharts.merge(defaultOptions, options);
					return hasRenderToArg ?
						new Highcharts.Chart(a, options, c) :
						new Highcharts.Chart(options, b);
				};
				var start = +new Date(),
					$tds = jQuery('td[data-sparkline]'),
					fullLen = $tds.length,
					n = 0;
				// Creating 153 sparkline charts is quite fast in modern browsers, but IE8 and mobile
				// can take some seconds, so we split the input into chunks and apply them in timeouts
				// in order avoid locking up the browser process and allow interaction.
				function doChunk() {
					var time = +new Date(),
						i,
						len = $tds.length,
						$td,
						stringdata,
						arr,
						data,
						chart;
					for (i = 0; i < len; i += 1) {
						$td = $($tds[i]);
						stringdata = $td.data('sparkline');
						arr = stringdata.split('; ');
						data = jQuery.map(arr[0].split(', '), parseFloat);
						chart = {};
						if (arr[1]) {
							chart.type = arr[1];
						}
						n += 1;
						// If the process takes too much time, run a timeout to allow interaction with the browser
						if (new Date() - time > 500) {
							$tds.splice(0, i + 1);
							setTimeout(doChunk, 0);
							break;
						}
						// Print a feedback on the performance
						if (n === fullLen) {
							jQuery('#result').html('Generated ' + fullLen + ' sparklines in ' + (new Date() - start) + ' ms');
						}
					}
				}

				doChunk();
			});
		}
	}
});

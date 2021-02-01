Vue.component('price-chart',{
	template:`
	<div>
		<h3>نمودار پیش بینی افزایش قیمت این ملک</h3>
		<div id="chart-sale-daily" class="ltr"></div>
	</div>`,
	props: {
	},
	data:function(){
		return{
			saleDaily: [],
			increase: 1,
			increasePriceTime: [0.14, 0.26, 0.52, 0.74],
		}
	},
	mounted: function() {
		this.createChart();
	},
	methods: {
		createChart: function () {
			var saleDaily = [],
				seriesCounter = 0,
				names = ['فروشنده', 'لانتوری', 'بارکد'];
			jQuery.each(names, function (i, name) {
				jQuery.getJSON('/admin/test/sale-daily/' + name, function (data) {
					saleDaily[i] = {
						name: name,
						data: data.data
					};
					seriesCounter += 1;
					if (seriesCounter === names.length) {
						var maxRate = 1;
						var minRate = 1;
						var average = 1;
						var sum = 0;
						var numbers = 0;
						saleDaily.forEach(function (item) {
							item.data.forEach(function (data) {
								if (data[1] > maxRate) {
									maxRate = data[1];
								}
								if (data[1] < minRate) {
									minRate = data[1];
								}
								sum += data[1];
								numbers++;
							})
						});
						average = sum / numbers;

						Highcharts.stockChart('chart-sale-daily', {
							chart: {
								type: 'spline',
								backgroundColor: 'transparent',
								style: {
									fontFamily: "iranian-sans, tahoma",
									fontSize: '10px'
								},
							},
							navigator: {
								enabled: false
							},
							scrollbar: {
								enabled: false
							},
							legend: {
								enabled: true
							},
							title: {
								text: '',
							},
							subtitle: {
								text: '',
								style: {
									display: 'none'
								}
							},
							dataLabels: {
								enabled: false,
								useHTML: true,
								format: '<div style="direction:rtl">{y} ریال</div>'
							},
							tooltip: {
								pointFormat: '<div class="charts-tooltip"><br><div><span style="color:{series.color}">\u25CF</span> {series.name}: </div><div style="direction:ltr"> {point.y}  ریال</div></div>',
								headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
								useHTML: true,
								zIndex: 9999999
							},
							rangeSelector: {
								buttons: [{
									type: 'day',
									count: 7,
									text: 'هفته'
								}, {
									type: 'day',
									count: 31,
									text: 'ماه'
								}, {
									type: 'month',
									count: 3,
									text: 'در۳ماه'
								}, {
									type: 'month',
									count: 6,
									text: 'در۶ماه'
								}, {
									type: 'ytd',
									text: 'امسال'
								}, {
									type: 'all',
									count: 1,
									text: 'همه'
								}],
								inputStyle: {
									fontSize: '10px'
								},
								inputEnabled: false,
								buttonTheme: {
									fill: '#EEE',
									stroke: '#C0C0C8',
									'stroke-width': 0,
									states: {
										select: {
											fill: '#D0D0D8'
										}
									}
								},
								selected: 5
							},
							yAxis: {
								labels: {
									enabled: false
								},
								title: {
									text: null
								},
								plotLines: [{
									value: average,
									color: 'green',
									dashStyle: 'shortdash',
									width: 2,
									label: {
										text: 'میانگین فروش روزانه'
									}
								}, {
									value: maxRate,
									color: 'red',
									dashStyle: 'shortdash',
									width: 2,
									label: {
										text: 'بیشترین فروش روزانه'
									}
								}]
							},
							plotOptions: {
								series: {
									shadow: true
								},
								line: {},
								map: {
									shadow: true
								}
							},
							series: saleDaily
						});
					}
				});
			});
			Highcharts.options = {
				global: {
					// Date: JDate,
					timezoneOffset: -210,
					useUTC: true
				},
				lang: {
					thousandsSep: ',',
					rangeSelectorTo: 'الی',
					rangeSelectorFrom: '',
					rangeSelectorZoom: '',
					months: ['فروردين', 'ارديبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
					shortMonths: ['فروردين', 'ارديبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
					weekdays: ["یک‌شنبه", "دو‌شنبه", "سه‌شنبه", "چهار‌شنبه", "پنج‌شنبه", "جمعه", "شنبه"]
				}
			};
			Highcharts.setOptions(Highcharts.options);
		}
	}
});
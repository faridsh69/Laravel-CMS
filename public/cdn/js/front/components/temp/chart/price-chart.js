
Vue.component('price-chart',{
	template:`
	<div>
		<div id="price-chart" class="ltr"></div>
	</div>`,
	props: {
        data: {
            type: String,
        },
	},
	data:function(){
		return{
			saleDaily: [],
			increase: 1,
			chartData: null,
		}
	},
	mounted: function() {
		this.createChart();
	},
	methods: {
		createChart: function () {
			// this.chartData = JSON.parse(this.data);
			jQuery.getJSON('/admin/manage/report/price-chart', function (data) {
				this.chartData = data;
			    ranges = this.chartData.ranges;
			    averages = this.chartData.averages;
				Highcharts.chart('price-chart', {
					chart: {
		      		  	height: 190
		    		},
				    title: {
				        text: ''
				    },

				    xAxis: {
				    	categories: ['امروز', '6 ماه', '1 سال', '2 سال', '3 سال'],
				    },
				    legend: { enabled: false } ,

				    yAxis: {
				        title: {
				            text: ''
				        }
				    },
				    // tooltip: {
				    //     crosshairs: true,
				    //     shared: true,
				    //     valueSuffix: ''
				    // },
				    plotOptions: {
				        line: {
				            dataLabels: {
				                enabled: true,
				                // format: '{y} میلیون تومان',
				                useHTML: true,
				                format: '<div class="charts-tooltip"> {y} م </div>',
				            },
				            enableMouseTracking: false
				        }
				    },
				 //    dataLabels: {
					// 	enabled: false,
					// 	useHTML: true,
					// 	format: '<div style="direction:rtl">{y} ریال</div>'
					// },
					// tooltip: {
					// 	pointFormat: '<div class="charts-tooltip"><div><span style="color:{series.color}">\u25CF</span> {series.name}: </div><div style="direction:ltr"> از {point.low}  میلیون تومان تا {point.high}  میلیون تومان</div></div>',
					// 	headerFormat: '<div class="charts-tooltip-header">{point.key}</div>',
					// 	useHTML: true,
					// 	zIndex: 9999999,
					// },
				    series: [{
				        name: 'قیمت',
				        data: averages,
				        zIndex: 1,
				        marker: {
				            fillColor: 'white',
				            lineWidth: 15,
				            lineColor: Highcharts.getOptions().colors[0]
				        }
				    } ]
				});
			});
		}
	}
});
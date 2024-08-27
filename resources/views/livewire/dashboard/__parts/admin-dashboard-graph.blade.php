<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Performance</h4>
            </div>

            <div class="card-body">
                <div id="column_chart" data-colors='["red", "yellow", "brown"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var chartColumnColors = getChartColorsArray("column_chart");
    var options = {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "45%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"]
        },
        series: [{
            name: "Performing",
            data: @json($chartData['performing'])
        }, {
            name: "Non-Performing",
            data: @json($chartData['nonPerforming'])
        }],
        colors: chartColumnColors,
        xaxis: {
            categories: @json($chartData['months'])
        },
        yaxis: {
            title: {
                text: "Number of Applications"
            }
        },
        grid: {
            borderColor: "#f1f1f1"
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " applications"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#column_chart"), options);
    chart.render();
});
</script>
@endpush --}}

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    After Dispatch Report (Stock Balance)
        <!-- <small>Control panel</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Small box (Stat box) -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h2><?php echo '1'; ?></h2>
                    <p>Admin</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-earth"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h2><?php echo '4'; ?></h2>
                    <p>Total Stocks</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-android-home"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h2><?php echo '3'; ?></h2>
                    <p>Total Agents</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h2><?php echo '3'; ?></h2>
                    <p>Total Designs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->


    <!-- <div class="row"> -->
    <div class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#custom-revenue-chart" data-toggle="tab">Area</a></li>
                <li><a href="#custom-sales-chart" data-toggle="tab">Donut</a></li>
                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
                <div class="chart tab-pane active" id="custom-revenue-chart" style="position: relative; height: 300px;">
                    <canvas id="customRevenueChartCanvas"></canvas>
                </div>
                <div class="chart tab-pane" id="custom-sales-chart" style="position: relative; height: 300px;">
                    <canvas id="customSalesChartCanvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /.nav-tabs-custom -->
    </div>

    </div>
    <!-- /.row -->
</section>

</div>

</section>
<!-- /.content -->


<!-- Morris chart -->
<?php echo $this->Html->css('AdminLTE./bower_components/morris.js/morris', ['block' => 'css']); ?>
<!-- jvectormap -->
<?php echo $this->Html->css('AdminLTE./bower_components/jvectormap/jquery-jvectormap', ['block' => 'css']); ?>
<!-- Date Picker -->
<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min', ['block' => 'css']); ?>
<!-- Daterange picker -->
<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker', ['block' => 'css']); ?>
<!-- bootstrap wysihtml5 - text editor -->
<?php echo $this->Html->css('AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min', ['block' => 'css']); ?>

<!-- jQuery UI 1.11.4 -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-ui/jquery-ui.min', ['block' => 'script']); ?>
<!-- Morris.js charts -->
<?php echo $this->Html->script('AdminLTE./bower_components/raphael/raphael.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/morris.js/morris.min', ['block' => 'script']); ?>
<!-- Sparkline -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-sparkline/dist/jquery.sparkline.min', ['block' => 'script']); ?>
<!-- jvectormap -->
<?php echo $this->Html->script('AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en', ['block' => 'script']); ?>
<!-- jQuery Knob Chart -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-knob/dist/jquery.knob.min', ['block' => 'script']); ?>
<!-- daterangepicker -->
<?php echo $this->Html->script('AdminLTE./bower_components/moment/min/moment.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker', ['block' => 'script']); ?>
<!-- datepicker -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min', ['block' => 'script']); ?>
<!-- Bootstrap WYSIHTML5 -->
<?php echo $this->Html->script('AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min', ['block' => 'script']); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo $this->Html->script('AdminLTE.pages/dashboard', ['block' => 'script']); ?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->Html->script('AdminLTE.demo', ['block' => 'script']); ?>

<?php $this->start('scriptBottom'); ?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<?php $this->end(); ?>



<!-- Include Chart.js library -->
<!-- In your view (e.g., view.php) -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var Length = <?php echo json_encode($Length); ?>;
    var designsValue = <?php echo json_encode($designsValue); ?>;
    var chartOptions = <?php echo json_encode($chartOptions); ?>;

    var ctxCustomRevenue = document.getElementById('customRevenueChartCanvas').getContext('2d');
    var customRevenueChart = new Chart(ctxCustomRevenue, {
        type: 'line',
        data: {
            labels: designsValue,
            datasets: [{
                label: 'Length',
                data: Length,
                backgroundColor: 'rgba(60,141,188,0.2)',
                borderColor: 'rgba(60,141,188,1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(255,99,132,1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(255,99,132,1)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: "rgba(200, 200, 200, 0.2)",
                    },
                    title: {
                        display: true,
                        text: 'Length (cm)',
                        color: '#666',
                        font: {
                            family: 'Helvetica',
                            size: 16,
                            weight: 'bold',
                            lineHeight: 1.2
                        },
                    },
                },
                x: {
                    grid: {
                        color: "rgba(200, 200, 200, 0.2)",
                    },
                    title: {
                        display: true,
                        text: 'Design Numbers',
                        color: '#666',
                        font: {
                            family: 'Helvetica',
                            size: 16,
                            weight: 'bold',
                            lineHeight: 1.2
                        },
                    },
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        color: '#666',
                        font: {
                            family: 'Helvetica',
                            size: 14,
                        },
                    }
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: 'rgba(0,0,0,0.7)',
                    titleFont: {
                        family: 'Helvetica',
                        size: 16,
                    },
                    bodyFont: {
                        family: 'Helvetica',
                        size: 14,
                    },
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' cm';
                        }
                    }
                }
            }
        }
    });
});
</script>




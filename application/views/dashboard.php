<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Control Panel</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><a href="<?= site_url('item') ?>"><i class="fas fa-cog"></i></a></span>

        <div class="info-box-content">
          <span class="info-box-text">Items</span>
          <span class="info-box-number">
            <?= $this->fungsi->count_item() ?>

          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><a href="<?= site_url('supplier') ?>"><i class="fas fa-users"></i></a></span>

        <div class="info-box-content">
          <span class="info-box-text">Supplier</span>
          <span class="info-box-number"><?= $this->fungsi->count_supplier() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><a href="<?= site_url('user') ?>"><i class="fas fa-user-plus"></i></a></span>

        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <span class="info-box-number"><?= $this->fungsi->count_user() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><a href="<?= site_url('user') ?>"><i class="fas fa-users"></i></a></span>

        <div class="info-box-content">
          <span class="info-box-text">Customer</span>
          <span class="info-box-number"><?= $this->fungsi->count_customer() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

  <div class="card card-solid">
    <div class="card-header">
      <i class="fa fa-th"></i>
      <h3>Produk terlaris bulan ini</h3>
      <div class="card-tools float-right">
        <button type="button" class="btn btn-sm" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

      <?php foreach ($row as $key => $value) {
        $name_item[] = $value->name;
        $total[]     = $value->sold;
        
      } ?>
      <canvas id="sales-bar" class="graph">
      </canvas>
    </div>
  </div>
</section>
<!-- /.content -->

<!-- ChartJS -->
<script src="<?= base_url() ?>assets/template/plugins/chart.js/Chart.min.js"></script>

<script>
  $(function() {

    var areaChartCanvas = $('#sales-bar').get(0).getContext('2d')

    var areaChartData = {
      labels: <?php echo json_encode($name_item);?>,
      datasets: [{
          label: 'Penjualan terlaris',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: <?php echo json_encode($total);?>,
        },
        
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#sales-bar').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


  })
</script>
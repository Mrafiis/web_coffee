@extends('layout.owner')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Grafik Data Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Data Penjualan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- LINE CHART Harian -->
    <div class="card">
        <div class="card-header">
          Grafik Data penjualan Harian
        </div>
        <div class="card-body">
            <div class="charts">
                <div class="chart">
                    <h2>Earnings </h2>
                    <canvas id="linechart"></canvas>
                </div>
            </div>
        </div>
      </div>
    <!-- END LINE CHART Harian -->

    <!-- LINE CHART Bulanan -->
   <!-- BAR CHART -->
   <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Bar Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
    <!-- END LINE CHART Bulanan -->
        {{-- link cdn chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

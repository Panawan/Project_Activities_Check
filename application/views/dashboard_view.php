<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>:: Dashboard ระบบเช็คชื่อ :: </h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3><?php echo $rowSTD->totalSTD;?></h3>
									<p>จำนวนนักศึกษา</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-user" style="margin-top: 20px"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-green">
								<div class="inner">
									<h3><?php echo $rowCls->totalCLASS;?></h3>
									<p>จำนวนห้อง</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-home" style="margin-top: 20px"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3><?php echo $rowCHK->totalCHK;?></h3>
									<p>จำนวนการเช็คชื่อ</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-ok" style="margin-top: 20px"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-red">
								<div class="inner">
									<h3><?php echo $rowENROLL->totalENROLL;?></h3>
									<p>จำนวนการลงทะเบียน</p>
								</div>
								<div class="icon">
									<i class="glyphicon glyphicon-book" style="margin-top: 20px"></i>
								</div>
								<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						<h4>กราฟเส้นแสดงการเช็คชื่อ</h4>
						<?php
							//for chart
							$datesave = array();
							$total = array();
							foreach ($rsCHKINBD AS $rs) {
								$datesave[] = "\"".$rs->check_in_date."\"";
								$total[] = "\"".$rs->totalcheckINByDate."\"";
							}
							$datesave = implode(",", $datesave);
							$total = implode(",", $total);
							// print_r ($datesave);
						?>
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
						<canvas id="myChart" width="800px" height="300px"></canvas>
						<script>
						var ctx = document.getElementById("myChart").getContext('2d');
						var myChart = new Chart(ctx, {
						type: 'line',
						data: {
						labels: [<?php echo $datesave;?>
						
						],
						datasets: [{
						label: 'รายงานการเช็คชื่อ แยกตามวัน',
						data: [<?php echo $total;?>
						],
						backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
						}]
						},
						options: {
						scales: {
						yAxes: [{
						ticks: {
						beginAtZero:true
						}
						}]
						}
						}
						});
						</script>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
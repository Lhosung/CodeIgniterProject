<script>
			function find_text1()
			{
				form1.action="/~team4/admin/lists/text1/" + form1.text1.value + "/text2/" + form2.text2.value ;
				form1.submit();
			}
			function find_text2()
			{
				form2.action="/~team4/admin/lists/text1/" + form1.text1.value + "/text2/" + form2.text2.value ;
				form2.submit();
			}
			$(function(){
				$("#text1") .datetimepicker({
					locale: 'ko',
					format: 'M',
					defaultDate: moment()
				});
				$("#text2") .datetimepicker({
					locale: 'ko',
					format: 'YYYY',
					viewMode: "years",
					defaultDate: moment()
				});

				$("#text1") .on("dp.change", function (e){
					find_text1();
				});
				$("#text2") .on("dp.change", function (e){
					find_text2();
				});

			});
</script>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
	<?
		$str_label = "";
		$str_data = "";

		foreach($list2 as $row)
		

		
	?>
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
										<form name="form2" method="post" action="" >
											<div class="input-group input-group-sm table-sm date" id="text2">
												<input type="hidden" name="text2" value="<?=$text2;?>"class="form-control">
												<div class="input-group-append">
													<div class="input-group-text">
														<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
													</div>
												</div>
											</div>
										</form>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">월간 객실 이용 현황</h6>
                                    <div class="dropdown no-arrow">
										<form name="form1" method="post" action="" >
											<div class="input-group input-group-sm table-sm date" id="text1">
												<input type="hidden" name="text1" value="<?=$text1;?>"class="form-control">
												<div class="input-group-append">
													<div class="input-group-text">
														<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
													</div>
												</div>
											</div>
										</form>
                                    </div>
                                </div>
	<?
		$str_label = "";
		$str_data = "";
		
		foreach($list as $row)
		{
			$str_label .= "'$row->room_name',";
			$str_data .= $row->book_cnt . ',';
		}
	?>
<script src="/~team4/my/admin/js/utils.js"></script>
	<style>
		canvas {
			-moz-user-select : none;
			-webkit-user-select : none;
			-ms-user-select : none;
		}
	</style>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart2"></canvas> 
                                    </div>
	<script>
		
		var config = {
			type:  "doughnut",
			data: {
				datasets:[{
						data: [ <?=$str_data;?>],
						backgroundColor : [
							'#4e73df',
							'#1cc88a',
							'#36b9cc',
							window.chartColors.yellow,
							window.chartColors.orange,						
							],
							label: "Dataset 1"
				}],
				labels: [ <?=$str_label;?>]
			},
			options: {
				responsive: true,
				legend: {
					labels: {
						padding: 15,
				    },
					position: "bottom",
				},
				title: {
					disply: false,
					text: "객실 분포도"
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}				
			}
		};

		window.onload = function(){
			var ctx = document.getElementById("myPieChart2").getContext("2d");
			window.myDoughnut = new Chart(ctx, config);
		};
	</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


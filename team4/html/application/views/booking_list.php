
<script>
			function find_text()
			{
				form1.action="/~team4/booking/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/text3/" + form1.text3.value + "/page";
				form1.submit();
			}
			function find_room()
			{
				var start = form1.text1.value;
				var end = form1.text2.value;
				var arrStart = start.split('-');
				var arrEnd = end.split('-');
				var datStart = new Date(arrStart[0], arrStart[1], arrStart[2]);
				var datEnd = new Date(arrEnd[0], arrEnd[1], arrEnd[2]);

				if(datStart >= datEnd){
					alert('시작일보다 종료일이 커야합니다.');
				}
				else{
					find_text();
				}
			}

			$(function(){
				$("#text1") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});
				$("#text2") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});

			});
</script>
		<!--================Header Area =================-->

<!-- 헤더 -->

        <!--================Header Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">

				</div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
					<form name="form1" method="post" action="" >
						<div class="hotel_booking_table">
							<div class="col-md-3">
								<h2>예약하기</h2>
							</div>
							<div class="col-md-9">
								<div class="boking_table">
									<div class="row">
										<div class="col-md-4">
											<div class="book_tabel_item">
												<div class="form-group">
													<div class='input-group date' id='text1'>
														<input type='text' name='text1' class="form-control" placeholder="시작 날짜" value="<?=$text1; ?>"/>
														<span class="input-group-addon">
															<i class="far fa-calendar-alt fa-lg"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<div class='input-group date' id='text2'>
														<input type='text' name='text2' class="form-control" placeholder="종료 날짜" value="<?=$text2; ?>"/>
														<span class="input-group-addon">
															<i class="far fa-calendar-alt fa-lg"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="book_tabel_item">
												<div class="input-group">
													<select class="wide">
														<option data-display="Adult">Adult</option>
														<option value="1">Old</option>
														<option value="2">Younger</option>
														<option value="3">Potato</option>
													</select>
												</div>
											<div class="input-group">

													<select name="text3" class="wide">
														<option value="0">선택하세요.</option>
														<?
															foreach ($list_room as $row)
															{
																if($row->ID==$text3)
																	echo("<option value='$row->ID' selected>$row->name</option>");
																else
																	echo("<option value='$row->ID'>$row->name</option>");
															}
														?>		
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">

																								
												<a class="book_now_btn button_hover" href="javascript:find_room();">찾아보기</a>

										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Hotel Accomodation</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
                </div>
					<?
						foreach($list as $row)
						{
							$cid[] = $row->ID;
							$cpic[] = $row->pic;
							$cprice[] = $row->price;
							$cname[] = $row->name;
						}// 사용자번호
					?>
<!---------------큰 화면 시작----------------->
				<div id="carouselExampleIndicators3" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000">
				  <div class="carousel-inner">
					<?
						if($row_count == 0){
						echo("<div class='carousel-item active'>
								<div style='float:center;'>
									<div class='accomodation_item text-center'>

										<h5> 찾으시는 방이 없습니다</h5>
									</div>
								</div>
							</div>
						");
						}
						else{							
							$row_mod = $limit;
							for($i=0; $i<($row_count/$limit); $i++){
								
								if($i+1 > ($row_count/$limit)){
									$row_mod = $row_count % $limit;
								}																
					?>

					<div class="carousel-item <?if($i==0){echo("active");}?>" >
					<?
						for($j=$i*$limit; $j<($i * $limit)+$row_mod;$j++){
					?>
						<div class="<?if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
							<div class="accomodation_item text-center">
								<div class="hotel_img">
									<img src="/~team4/room_img/<?=$cpic[$j]?>" alt="" width="260" height="270">
									<a href='#exampleModal' data-toggle='modal' class="btn theme_btn button_hover">Book Now</a>
								</div>
								<a href='#exampleModal' data-toggle='modal'><h4 class="sec_h4"><?=$cname[$j]?></h4></a>
								<h5><?$cprice[$j]?></h5>
							</div>
						</div>
					<?
						}
					?>
					</div>
					<?
							}
						}
					?>
				  </div>
				  <?
					  if($row_count > 0){
				  ?>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				  <?
					}
				  ?>
				</div>

<!---------------큰 화면 끝----------------->
<!---------------중간 화면 시작----------------->
				<div id="carouselExampleIndicators2" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000">
				  <div class="carousel-inner">
					<?
						$limit = 2;
						if($row_count == 0){
						echo("<div class='carousel-item active'>
								<div style='float:center;'>
									<div class='accomodation_item text-center'>

										<h5> 찾으시는 방이 없습니다</h5>
									</div>
								</div>
							</div>
						");
						}
						else{							
							$row_mod = $limit;
							for($i=0; $i<($row_count/$limit); $i++){
								
								if($i+1 > ($row_count/$limit)){
									$row_mod = $row_count % $limit;
								}																
					?>

					<div class="carousel-item <?if($i==0){echo("active");}?>" >
					<?
						for($j=$i*$limit; $j<($i * $limit)+$row_mod;$j++){
					?>
						<div class="<?if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
							<div class="accomodation_item text-center">
								<div class="hotel_img">
									<img src="/~team4/room_img/<?=$cpic[$j]?>" alt="" width="260" height="270">
									<a href="#" class="btn theme_btn button_hover">Book Now</a>
								</div>
								<a href="#"><h4 class="sec_h4"><?=$cname[$j]?></h4></a>
								<h5><?$cprice[$j]?></h5>
							</div>
						</div>
					<?
						}
					?>
					</div>
					<?
							}
						}
					?>
				  </div>
				  <?
					  if($row_count > 0){
				  ?>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				  <?
					}
				  ?>
				</div>
<!---------------중간 화면 끝----------------->
<!---------------작은 화면 시작----------------->
				<div id="carouselExampleIndicators1" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="0">
				  <div class="carousel-inner">
					<?
						$limit = 1;
						if($row_count == 0){
						echo("<div class='carousel-item active'>
								<div style='float:center;'>
									<div class='accomodation_item text-center'>

										<h5> 찾으시는 방이 없습니다</h5>
									</div>
								</div>
							</div>
						");
						}
						else{							
							$row_mod = $limit;
							for($i=0; $i<($row_count/$limit); $i++){
								
								if($i+1 > ($row_count/$limit)){
									$row_mod = $row_count % $limit;
								}																
					?>

					<div class="carousel-item <?if($i==0){echo("active");}?>" >
					<?
						for($j=$i*$limit; $j<($i * $limit)+$row_mod;$j++){
					?>
						<div class="<?if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
							<div class="accomodation_item text-center">
								<div class="hotel_img">
									<img src="/~team4/room_img/<?=$cpic[$j]?>" alt="" width="260" height="270">
									<a href='#exampleModal' data-toggle='modal' class="btn theme_btn button_hover">Book Now</a>
								</div>
								<a href='#exampleModal' data-toggle='modal'><h4 class="sec_h4"><?=$cname[$j]?></h4></a>
								<h5><?$cprice[$j]?></h5>
							</div>
						</div>
					<?
						}
					?>
					</div>
					<?
							}
						}
					?>
				  </div>
				  <?
					  if($row_count > 0){
				  ?>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				  <?
					}
				  ?>				
				</div>
<!---------------------작은화면 끝------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">예약하기</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</button>
      </div>
			<div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex" style="padding-right:0px;">
                        <div class="about_content" style="padding-right:0px;">
                            <h2 class="title title_color" style="font-size:32px;">이코노미더블룸</h2>
                            <p>전 객실 발코니를 보유한 디럭스 객실은 넓고 쾌적한 공간감으로 진정한 휴식을 제공합니다.</p>                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="/~team4/room_img/room1.jpg" alt="img" width="260" height="270">
                    </div>
                </div>
            </div>

      <div class="modal-body bg-light" style="text-align:center">
        <form name="form_login" method="post" action="/~sale31/_login/check">
          <div class="form-inline">
            회&nbsp;&nbsp;원&nbsp;&nbsp;명 : &nbsp;&nbsp;
            <input type="text" name="name" size="48" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            체&nbsp;&nbsp;크&nbsp;&nbsp;인 : &nbsp;&nbsp;
            <input type="text" name="start" size="48" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            체크아웃 : &nbsp;&nbsp;
            <input type="text" name="end" size="48" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            예약인원 : &nbsp;&nbsp;
            <input type="text" name="checkout" size="15" value="" class="form-control form-control-sm">
          </div>
        </form>
      </div>
      <div class="modal-footer alert-secondary" style="text-align:center">
        <button type="button" class="btn btn-sm btn-secondary" onclick="javascript:form_login.submit();">확인</button>
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>
			</div>
        </section>


        <!--================ Accomodation Area  =================-->
        

        <!--================ Recent Area  =================-->

        

        <!--================ start footer Area  =================-->	

							<!-- 푸터 -->

		<!--================ End footer Area  =================-->

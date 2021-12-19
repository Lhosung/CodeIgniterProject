<script>
			function find_text()
			{
				form1.action="/~team4/booking/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/text3/" + form1.text3.value + "/text4/" + form1.text4.value + "/page";
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

				var diff = new Date() - new Date(arrStart[0], arrStart[1]-1, arrStart[2]);
				var currDay = 24*60*60*1000;
				var diff_day = diff/currDay;
				
				if(datStart >= datEnd){
					alert('시작일보다 종료일이 커야합니다.');
				}
				else if(diff_day >= 0 ){
					alert('시작일이 오늘보다 커야합니다.');
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
					<div class="banner_content text-center">
						<h6>인덕 로얄 리조트에 오신 것을 환영합니다.</h6>
						<h2>Induk Royal</h2>
						<p>보다 편안하고 고급스러운 휴식의 세상으로 초대합니다.</p>
					</div>
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
												<div class="input-group">
													<select name="text4" class="wide">
													<option value="0">선택하세요.</option>
													<?
														$maxPeople = 4;
														for($i=1;$i<=$maxPeople;$i++){
															if($i==$text4){
																	echo("<option value='$i' selected>$i");
																	echo("명</option>");
															}
															else{
																echo("<option value='$i'>$i");
																echo("명</option>");
															}
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
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color" align="center">Induk Royal<br>"특별한 휴식을 위하여"<br>힐링 & 휴식</h2>
                            <p>고품격 Refresh를 제공하는 생활 속의 리조트를 컨셉으로 개발된 "Induk Royal"은 다양하고 독특한 시설을 갖춘 사계절 종합리조트입니다.</p>
                            <a href="#" class="button_hover theme_btn_two">Request Custom Price</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="/~team4/my/image/about_bg.jpg" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->
        
        <!--================ Facilities Area  =================-->
        <section class="facilities_area section_gap">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">  
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">편의시설</h2>
                    <p>Induk Royal만의 시설</p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>레스토랑</h4>
                            <p>최고의 셰프들이 만들어주는 양식 뷔페를 먹고 기분 좋은 아침을 시작하세요.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>헬스 클럽</h4>
                            <p>여행와서 근손실 걱정하는 당신을 위한 맞춤공간!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>인피니티 풀</h4>
                            <p>일상에서 벗어나 자연에서 즐기는 인피니티풀</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-car"></i>발렛파킹</h4>
                            <p>수준급의 기사님들이 차를 대기시키고 주차시켜드립니다.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>카페</h4>
                            <p>편안한 분위기와 깔끔하고 고급스러운 원두를 사용한 카페</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-construction"></i>바 & 라운지</h4>
                            <p>연인과 함께 편안하게 술과 음악을 즐길수 있는 바 & 라운지</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Facilities Area  =================-->
        
         <!--================ About History Area  =================-->

        <!--================ About History Area  =================-->
        
        <!--================ Testimonial Area  =================-->
        <section class="testimonial_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Testimonial from our Clients</h2>
                    <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
                </div>
                <div class="testimonial_slider owl-carousel">
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="/~team4/my/image/testtimonial-1.jpg" alt="">
                        <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>    
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="/~team4/my/image/testtimonial-1.jpg" alt="">
                        <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="/~team4/my/image/testtimonial-1.jpg" alt="">
                        <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>    
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="/~team4/my/image/testtimonial-1.jpg" alt="">
                        <div class="media-body">
                            <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                            <a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>
                            <div class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Testimonial Area  =================-->
        
        <!--================ Latest Blog Area  =================-->
        <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">latest posts from blog</h2>
                    <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="/~team4/my/image/blog/blog-1.jpg" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn">Travel</a>
                                    <a href="#" class="button_hover tag_btn">Life Style</a>
                                </div>
                                <a href="#"><h4 class="sec_h4">Low Cost Advertising</h4></a>
                                <p>Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.</p>
                                <h6 class="date title_color">31st January,2018</h6>
                            </div>	
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="/~team4/my/image/blog/blog-2.jpg" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn">Travel</a>
                                    <a href="#" class="button_hover tag_btn">Life Style</a>
                                </div>
                                <a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a>
                                <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                                <h6 class="date title_color">31st January,2018</h6>
                            </div>	
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="/~team4/my/image/blog/blog-3.jpg" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn">Travel</a>
                                    <a href="#" class="button_hover tag_btn">Life Style</a>
                                </div>
                                <a href="#"><h4 class="sec_h4">It S Classified How To Utilize Free</h4></a>
                                <p>Why do you want to motivate yourself? Actually, just answering that question fully can </p>
                                <h6 class="date title_color">31st January,2018</h6>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Recent Area  =================-->

        

        <!--================ start footer Area  =================-->	

							<!-- 푸터 -->

		<!--================ End footer Area  =================-->

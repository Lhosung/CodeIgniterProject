	<br>
	<div class="my_container">
        <div class="alert mycolor1" role="alert">갤러리 사진</div>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~team4/gallery/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~team4/gallery/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

</script>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
        <form name="form1" method="post" action="">
            <div class="row">
                <div class="col-6" align="left">            
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">이름</span>
                        </div>
                        <input type="text" name="text1" class="form-control" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) { find_text(); }">
                        <div class="input-group-append">
                            <button class="btn btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
                        </div>
                    </div>
                </div>
                <div class="col-6" align="right">
					<a href="/~team4/gallery/add<?=$tmp;?>" class="btn btn-primary">사진 추가</a>
                </div>
            </div>

        </form>


		<div class="row">			
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
		$ID=$row->ID;
        $iname=$row->pic ? $row->pic : "";                       
		$pname=$row->name;
?>
			<div class="col-3">
				<div class="mythumb_box">
					<a href="/~team4/gallery/view/ID/<?=$ID ;?><?=$tmp; ?>">
						<img class="mythumb_image" src="/~team4/gallery_img/thumb/<?=$iname; ?>" />
					</a>
					<div class="bg-primary text-white"><?=$pname; ?></div>
				</div>
			</div>
<?
    }
?>
		</div>
	</div>
<?=$pagination; ?>
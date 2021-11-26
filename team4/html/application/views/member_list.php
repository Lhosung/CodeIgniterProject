<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-3 font-weight-bold text-primary">회원 목록
			<button type="button" class="btn btn-info" style="float:right;"><a href="/~team4/member/add<?=$tmp; ?>">회원 추가</a></button>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID(number)</th>
						<th>userId</th>
						<th>password</th>
						<th>name</th>
						<th>phone</th>
						<th>email</th>
						<th>rank</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>번호</th>
						<th>유저 아이디</th>
						<th>비밀번호</th>
						<th>이름</th>
						<th>전화번호</th>
						<th>이메일</th>
						<th>등급</th>
					</tr>
				</tfoot>
				<tbody>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $no=$row->ID;                                 // 사용자번호
        $phone1 = trim(substr($row->phone,0,3));			// 전화 : 지역번호 추출
        $phone2 = trim(substr($row->phone,3,4));			// 전화 : 국번호 추출
        $phone3 = trim(substr($row->phone,7,4));			// 전화 : 번호 추출
        $phone = $phone1 . "-" . $phone2 . "-" . $phone3;       // 합치기
        $rank = $row->rank==0 ? "고객" : "관리자" ;     // 0->고객, 1->관리자 
?>
					<tr>
						<td><?=$no; ?></td>
						<td><?=$row->uid; ?></td>
						<td><?=$row->pwd; ?></td>
						<td><a href="/~team4/member/view/ID/<?=$no; ?><?=$tmp; ?>"><?=$row->name; ?></a></td>
						<td><?=$phone; ?></td>
						<td><?=$row->email; ?></td>
						<td><?=$rank; ?></td>
					</tr>
<?
    }
?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?=$pagination; ?>
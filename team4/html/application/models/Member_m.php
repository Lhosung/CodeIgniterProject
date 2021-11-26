<?
    class Member_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			if (!$text1)
				$sql="select * from member order by name limit $start,$limit";    // 전체 자료
			else
				$sql="select * from member where name like '%$text1%' order by name limit $start,$limit";

            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from member order by name";
			else
				$sql="select * from member where name like '%$text1%' order by name";
	
			return $this->db->query($sql)->num_rows();
		}

		function getrow($ID) 
		{
			$sql="select * from member where ID=$ID";
			return  $this->db->query($sql)->row();
		}

		function deleterow($ID)
		{
			$sql="delete from member where ID=$ID";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("member",$row);
		}
		
		function updaterow($row, $ID)
		{
			$where=array("ID"=>$ID);
			return $this->db->update("member",$row,$where);
		}
		
    }
?>

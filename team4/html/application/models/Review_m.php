<?
    class Review_m extends CI_Model     // 모델 클래스 선언
    {

		public function getlist($text1, $start,$limit)
		{
			if (!$text1)
				$sql="select review.*, reviewType.name as reviewType_name 
                  from review left join reviewType on review.reviewtypeId=reviewType.ID
                  order by review.name limit $start,$limit";
			else
				$sql="select review.*, reviewType.name as reviewType_name 
                  from review left join reviewType on review.reviewtypeId=reviewType.ID
                  where review.name like '%$text1%' order by review.name limit $start,$limit";
			return $this->db->query($sql)->result();
		}
		function getlist_reviewType()
		{
			$sql="select * from reviewType order by name";
			return $this->db->query($sql)->result();
		}
		public function rowcount( $text1 )
		{
			if (!$text1)
				$sql="select * from review";
			else
				$sql="select * from review where name like '%$text1%' ";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($ID)  {
			$sql="select review.*, reviewType.name as reviewType_name 
              from review left join reviewType on review.reviewtypeId=reviewType.ID 
              where review.ID=$ID";
			return  $this->db->query($sql)->row();
		}

		function deleterow($ID)  {
			$sql="delete from review where ID=$ID";
			return  $this->db->query($sql);
		}

		function insertrow($row)  {
			return  $this->db->insert("review",$row);
		}

		function updaterow( $row, $ID )
		{
			$where=array( "ID"=>$ID );
			return $this->db->update( "review", $row, $where );
		}

    }
?>

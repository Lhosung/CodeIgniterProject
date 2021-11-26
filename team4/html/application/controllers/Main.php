<?
	// team 4 호텔
	class Main extends CI_Controller {               // 클래스이름 첫 글자는 대문자
		public function index()                      // 제일 먼저 실행되는 함수
		{
			$this->load->view("main_header");		// view폴더의 header.php 와
			$this->load->view("index");
			$this->load->view("main_footer");		//  footer.php 호출
		}
	}
?>

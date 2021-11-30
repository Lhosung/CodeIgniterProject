<?
    class Login extends CI_Controller {       // login클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("login_m");				// 모델 login_m 연결
			$this->load->helper(array("url","date"));	// helper 선언
        }
		
		public function index()                            // 제일 먼저 실행되는 함수
		{
            $this->loginForm();                     // loginForm 함수 호출
        }
		
		public function loginForm()                      // 제일 먼저 실행되는 함수
		{
			$this->load->view("main_header");		// view폴더의 header.php 와
			$this->load->view("loginForm");
			$this->load->view("main_footer");		//  footer.php 호출
		}
	
        public function check()
        {
			$uid=$this->input->post("uid",TRUE);
			$pwd=$this->input->post("pwd",TRUE);
            
			$row=$this->login_m->getrow($uid,$pwd);
			if($row)
			{
				$data=array(
					"uid"=>$row->uid,
					"rank"=>$row->rank
				);
				$this->session->set_userdata($data);
				

				$this->load->view("main_header");
				$this->load->view("index");
				$this->load->view("main_footer");
			}
			else{
				$this->load->view("main_header");
				$this->load->view("loginForm");
				$this->load->view("main_footer");
			}
		}

		public function logout()
		{
			$data=array('uid','rank');
			$this->session->unset_userdata($data);

			$this->load->view("main_header");
			$this->load->view("index");
			$this->load->view("main_footer");
		}
	}
?>
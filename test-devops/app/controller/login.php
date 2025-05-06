<?php
class login extends Controller
{
	// Constructor
	public function __construct()
	{

	}

	// Display UI login form
	public function index()
	{
		$data['title'] = "Login page";

		$this->display('template/header', $data);
		$this->display('login/index', $data);
		$this->display('template/footer', $data);
	}

	// handle login user
	public function verification()
	{
		// Start session
		session_start();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// validate user input

			$user = $_POST['usernameoremail'];
			$password = $_POST['password'];

			// check status login in database
			$arr_data['status-login'] = $this->logic("Login_model")->check_login($_POST);

			if (!empty($arr_data['status-login'])) {
				// set session variables
				$_SESSION['user-id'] = $arr_data['status-login'][0]["id"];
				$_SESSION['user-name'] = $arr_data['status-login'][0]["name"];
				$_SESSION['user-username'] = $arr_data['status-login'][0]["username"];
				$_SESSION['user-email'] = $arr_data['status-login'][0]["email"];
				$_SESSION['user-password'] = $arr_data['status-login'][0]["password"];
				$_SESSION['user-role'] = $arr_data['status-login'][0]["role"];
				$_SESSION['user-phone'] = $arr_data['status-login'][0]["phone"];
				// var_dump($_SESSION['user-name']);

				if (!empty($_SESSION['user-role']) && $_SESSION['user-role'] == "admin") {
					header('Location: ' . APP_PATH . '/home/index');
				} else {
					header('Location: ' . APP_PATH . '/patient/index');
				}
				exit();
			} else {
				// handle failed login attempt
				$_SESSION['error-message'] = "Username/email atau password tidak ditemukan";
				// redirect to login page
				header('Location: ' . APP_PATH . '/login/index');
				exit();
			}
		} else {
			$_SESSION['error-message'] = "Request method tidak valid";
			header('Location: ' . APP_PATH . '/login/index');
			exit();
		}
	}

	// Tampilkan halaman register
	public function register()
	{
		$data['title'] = "Register page";

		$this->display('template/header', $data);
		$this->display('login/register', $data); // view baru
		$this->display('template/footer', $data);
	}

	// Tangani form submit dari register
	public function store()
	{
		session_start();

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
			$data = [
				'name' => $_POST['name'],
				'username' => $_POST['username'],
				'email' => $_POST['email'],
				'password' => $_POST['password'],
				'phone' => $_POST['phone']
			];

			// Panggil model untuk menyimpan data user baru
			$result = $this->logic("Login_model")->register_user($data);

			if ($result) {
				$_SESSION['success-message'] = "Akun berhasil dibuat. Silakan login.";
				header('Location: ' . APP_PATH . '/login/index');
				exit();
			} else {
				$_SESSION['error-message'] = "Registrasi gagal. Coba lagi.";
				header('Location: ' . APP_PATH . '/login/register');
				exit();
			}
		} else {
			$_SESSION['error-message'] = "Request tidak valid.";
			header('Location: ' . APP_PATH . '/login/register');
			exit();
		}
	}


	public function logout()
	{
		// Mulai session jika belum aktif
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		// Hapus semua data session
		session_unset();
		session_destroy();

		// Redirect ke halaman login atau landing page
		header('Location: ' . APP_PATH . '/auth/login');
		exit;
	}

}
?>
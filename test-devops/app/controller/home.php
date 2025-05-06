<?php
class home extends Controller
{
	// Constructor
	public function __construct()
	{

	}

	// Default method
	public function index()
	{
		// Associative Arrays (arrays with keys)

		$arr_data['title'] = "Dashboard";
		$arr_data['totals'] = $this->logic("Appointment_model")->total_data();
		$arr_data['recent_appointment'] = $this->logic("Appointment_model")->get_recent_appointments();
		$arr_data['total_doctors'] = $this->logic("Doctor_model")->total_data();
		$arr_data['total_completed'] = $this->logic("Appointment_model")->total_completed_appointments();

		$this->display('template/header', $arr_data);
		$this->display('template/navbar', $arr_data);
		$this->display("home/dashboard", $arr_data);
		$this->display('template/footer');
	}

	public function appointment()
	{
		// Associative Arrays (arrays with keys)

		$arr_data['title'] = "Appointment";
		$arr_data['schedules'] = $this->logic("Appointment_model")->get_data_appointment();

		$this->display('template/header', $arr_data);
		$this->display('template/navbar', $arr_data);
		$this->display("home/appointment", $arr_data);
		$this->display('template/footer');
	}
	public function new_appointment()
	{
		if ($this->logic("Appointment_model")->new_data($_POST)) {
			header('Location: ' . APP_PATH . '/home/appointment');
			exit;
		}
	}
	public function update_appointment()
	{
		if ($this->logic("Appointment_model")->update_data($_POST)) {
			header('Location: ' . APP_PATH . '/home/appointment');
			exit;
		}
	}

	public function delete_appointment($id)
	{
		if ($this->logic("Appointment_model")->delete_data($id)) {
			header('Location: ' . APP_PATH . '/home/appointment');
			exit;
		}
	}



	public function doctor()
	{
		// Associative Arrays (arrays with keys)

		$arr_data['title'] = "Doctor";
		$arr_data['doctors'] = $this->logic("doctor_model")->get_data_appointment();
		

		$this->display('template/header', $arr_data);
		$this->display('template/navbar', $arr_data);
		$this->display("home/doctor", $arr_data);
		$this->display('template/footer');
	}

	public function new_doctor()
	{
		if ($this->logic("Doctor_model")->new_data($_POST)) {
			header('Location: ' . APP_PATH . '/home/doctor');
			exit;
		}
	}
	public function update_doctor()
	{
		// var_dump($_POST);
		if ($this->logic("Doctor_model")->update_data($_POST)) {
			header('Location: ' . APP_PATH . '/home/doctor');
			exit;
		}
	}

	public function delete_doctor($id)
	{
		if ($this->logic("Doctor_model")->delete_data($id)) {
			header('Location: ' . APP_PATH . '/home/doctor');
			exit;
		}
	}

	public function profile()
	{
		// Associative Arrays (arrays with keys)

		$arr_data['title'] = "Profile";
		$arr_data['schedules'] = $this->logic("Appointment_model")->get_data_appointment();

		$this->display('template/header', $arr_data);
		$this->display('template/navbar', $arr_data);
		$this->display("home/profile", $arr_data);
		$this->display('template/footer');
	}

	public function update_user()
	{
		if ($this->logic("Profile_model")->update_data($_POST)) {
			header('Location: ' . APP_PATH . '/home/profile');
			exit;
		}
	}

	public function delete_user($id)
	{
		if ($this->logic("Profile_model")->delete_data($id)) {
			header('Location: ' . APP_PATH . '/home/profile');
			exit;
		}
	}

}
?>
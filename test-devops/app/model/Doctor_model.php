<?php
class Doctor_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;

        if ($this->db == false) {
            echo "<script>console.log('Connection failed.' );</script>";
        } else {
            echo "<script>console.log('Connected successfully.' );>/script>";
        }
    }

    public function total_data()
    {
        $sql = "SELECT COUNT(*) AS total FROM doctor"; // Query untuk menghitung total baris
        $result = $this->db->query($sql); // Eksekusi query
        $row = mysqli_fetch_assoc($result); // Ambil hasil query
        return $row['total']; // Kembalikan total jadwal
    }

    public function get_data_appointment()
    {
        $result = $this->db->query("SELECT * FROM doctor;");
        $this->db->db_close();

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function new_data($data)
    {
        // Extract data from the input array
        $doctor_name = $data['doctor_name'];
        $doctor_schedule_from = $data['doctor_schedule_from'];
        $doctor_schedule_to = $data['doctor_schedule_to'];
        $doctor_email = $data['doctor_email'];
        $doctor_number = $data['doctor_number'];

        $sql = "INSERT INTO doctor (doctor_name, doctor_schedule_from, doctor_schedule_to, doctor_email, doctor_number)
        VALUES ('$doctor_name', '$doctor_schedule_from', '$doctor_schedule_to', '$doctor_email', '$doctor_number')";

        return $this->db->query($sql) === TRUE;
    }


    public function delete_data($doctor_id)
    {
        $sql = "DELETE FROM doctor WHERE doctor_id = '$doctor_id'";
        return $this->db->query($sql) === TRUE;
    }

    public function update_data($data)
    {
        // Extract data from the input array
        $doctor_id = $data['doctor_id'];
        $doctor_name = $data['doctor_name'];
        $doctor_schedule_from = $data['doctor_schedule_from'];
        $doctor_schedule_to = $data['doctor_schedule_to'];
        $doctor_email = $data['doctor_email'];
        $doctor_number = $data['doctor_number'];

        $sql = "UPDATE doctor SET
                doctor_name = '$doctor_name',
                doctor_schedule_from = '$doctor_schedule_from',
                doctor_schedule_to = '$doctor_schedule_to',
                doctor_email = '$doctor_email',
                doctor_number = '$doctor_number'
            WHERE doctor_id = '$doctor_id'";

        return $this->db->query($sql) === TRUE;
    }
}

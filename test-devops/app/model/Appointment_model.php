<?php
class Appointment_model
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

    public function get_recent_appointments()
    {
        // Query untuk mengambil 5 data terbaru berdasarkan start_date atau kolom lain yang menandakan waktu penambahan
        $sql = "SELECT * FROM schedule ORDER BY start_date DESC LIMIT 5"; // Atau gunakan created_at DESC jika ada kolom created_at

        $result = $this->db->query($sql); // Eksekusi query
        $this->db->db_close();

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function total_completed_appointments()
    {
        $sql = "SELECT COUNT(*) AS total FROM schedule WHERE status = 'completed'"; // Query untuk menghitung jumlah status 'completed'
        $result = $this->db->query($sql); // Eksekusi query
        $row = mysqli_fetch_assoc($result); // Ambil hasil query
        return $row['total']; // Kembalikan total jadwal dengan status 'completed'
    }

    // Fungsi untuk mendapatkan total jumlah data dalam tabel schedule
    public function total_data()
    {
        $sql = "SELECT COUNT(*) AS total FROM schedule"; // Query untuk menghitung total baris
        $result = $this->db->query($sql); // Eksekusi query
        $row = mysqli_fetch_assoc($result); // Ambil hasil query
        return $row['total']; // Kembalikan total jadwal
    }


    public function get_data_appointment()
    {
        $result = $this->db->query("SELECT * FROM schedule;");
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
        $patient_name = $data['patient_name'];
        $doctor_name = $data['doctor_name'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $status = $data['status'];

        $sql = "INSERT INTO schedule (patient_name, doctor_name, start_date, end_date, status)
        VALUES ('$patient_name', '$doctor_name', '$start_date', '$end_date', '$status')";

        return $this->db->query($sql) === TRUE;
    }


    public function delete_data($id)
    {
        $sql = "DELETE FROM schedule WHERE id = '$id'";
        return $this->db->query($sql) === TRUE;
    }

    public function update_data($data)
    {
        // Extract data from the input array
        $id = $data['edit_id'];
        $patient_name = $data['edit_patient_name'];
        $doctor_name = $data['edit_doctor_name'];
        $start_date = $data['edit_start_date'];
        $end_date = $data['edit_end_date'];
        $status = $data['edit_status'];

        $sql = "UPDATE schedule  SET
                patient_name = '$patient_name',
                doctor_name = '$doctor_name',
                start_date = '$start_date',
                end_date = '$end_date',
                status = '$status'
                WHERE id = '$id'";

        return $this->db->query($sql) === TRUE;
    }
}

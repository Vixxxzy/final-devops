<?php
class Profile_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;

        if ($this->db == false) {
            echo "<script>console.log('Connection failed.' );</script>";
        } else {
            echo "<script>console.log('Connected successfully.');</script>";

        }
    }

    public function get_data_appointment()
    {
        $result = $this->db->query("SELECT * FROM user;");
        $this->db->db_close();

        if ($result->num_rows > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }


    public function delete_data($id)
    {
        $sql = "DELETE FROM user WHERE user_id = '$id'";
        return $this->db->query($sql) === TRUE;
    }

    public function update_data($data)
    {
        // Extract data from the input array
        $id = $data['id'];
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];

        $sql = "UPDATE user  SET
                name = '$name',
                username = '$username',
                email = '$email',
                password = '$password',
                phone = '$phone'
                WHERE user_id = '$id'";

        return $this->db->query($sql) === TRUE;
    }
}

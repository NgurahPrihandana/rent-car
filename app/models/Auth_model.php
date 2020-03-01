<?php 

    class Auth_model
    {
        private $table = 'auth';
        private $db,$url;

        public function __construct() 
        {
            $this->db = new Database;
        }

        public function getAllAuth()
        {
            $query = "SELECT * FROM ". $this->table . " WHERE level = 2";
            $this->db->query($query);
            $this->db->execute();
            return $this->db->resultSet();
        }

        public function getUserBy($verificator, $value)
        {
            if (isset($verificator) && isset($value)) {
                $q = "SELECT * FROM " . $this->table . " WHERE $verificator = :$verificator";
                $this->db->query($q);
                $this->db->bind($verificator, $value);
                return $this->db->single();
            }
        }

        public function login($data)
    {
   		$username = $data['username'];
        $password = $data['password'];

          if ( isset($username) && $username !== '') {
            if ($datauser = $this->getUserBy("username", $username)) {
                $password_user = $datauser["password"];
                $role = $datauser['level'];
                $nama_pekerja = $datauser['nama_pekerja'];

                if (password_verify($password,$password_user)) {
                    if ($role == '1' || $role == 1) {
                        session_start();
                        $_SESSION['nama_pekerja'] = $datauser['nama_pekerja'];
                        $_SESSION['username'] = $username;
                        $_SESSION['status'] = 'login';
                        $_SESSION['role'] = '1';
                        header('Location: '.BASEURL.'/user');
                    }
                    elseif ($role == '2' || $role == 2) {
                        session_start();
                        $_SESSION['nama_pekerja'] = $datauser['nama_pekerja'];
                        $_SESSION['id_auth'] = $datauser['id_auth'];
                        $_SESSION['username'] = $username;
                        $_SESSION['status'] = 'login';
                        $_SESSION['role'] = '2';
                        header('Location: '.BASEURL.'');
                    }
                }else{
                    Flasher::setAuthFlash('Username / Password', 'Salah','danger');
                    header('Location: '.BASEURL.'/auth/login');
                }
            } else {
                Flasher::setAuthFlash('Username / Password', 'Salah','danger');
                header('Location: '.BASEURL.'/auth/login');
            }
        }
    }

    public function post($nama)
    {
        if (isset($name) &&  $name !== '') {
            if (isset($_POST[$name])) {
                return htmlspecialchars($_POST[$name]);
            }
        }       
    }

    public function register($data)
    {
        
        $nama_pekerja = htmlspecialchars($data["nama_pekerja"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $conf_password =htmlspecialchars($data["conf_password"]);

        if(isset($nama_pekerja) && $nama_pekerja !== 0) {
            if(isset($username) && $username !== 0) {
                if ($datauser = $this->getUserBy("username", $username)) {
                    Flasher::setAuthFlash('Username / Password', 'Telah Digunakan','danger');
                    header('Location: ' . BASEURL . "/auth/register"); //Untuk Catatan, ingat tambahkan alertnya
                } else {
                    if (isset($password) && $password !== '' || isset($conf_password) && $conf_password !== '') {
                        if ($password === $conf_password) {
                            $query = "INSERT INTO ". $this->table. " VALUES ('',:nama_pekerja,:username,:password,:level)";
                            $this->db->query($query);
                            $this->db->bind("nama_pekerja", $nama_pekerja);
                            $this->db->bind("username", $username);
                            $this->db->bind("password", password_hash($password,PASSWORD_DEFAULT));
                            $this->db->bind("level", 2);
                            $this->db->execute();
                            return $this->db->rowCount();
                        }else {
                            Flasher::setAuthFlash('Password / Confirm Password', 'Tidak Sesuai','danger');
                            header('Location: ' . BASEURL . "/auth/register"); //Untuk Catatan, ingat tambahkan alertnya
                        }
                    }else {
                        Flasher::setAuthFlash('Password / Confirm Password', 'Belum Diinputkan','danger');
                        header('Location: ' . BASEURL . "/auth/register"); //Untuk Catatan, ingat tambahkan alertnya
                    }
                }
            } else {
                Flasher::setAuthFlash('Username', 'Belum Diinputkan','danger');
                header('Location: ' . BASEURL . "/auth/register"); //Untuk Catatan, ingat tambahkan alertnya
            }
        } else {
            Flasher::setAuthFlash('Nama Pekerja', 'Belum Diinputkan','danger');
            header('Location: ' . BASEURL . "/auth/register"); //Untuk Catatan, ingat tambahkan alertnya
        }
    }
    }

?>
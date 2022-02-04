<?php
//Lớp db
class DB
{
    //Biến thông tin connect
    private $hostname = 'localhost',
            $username = 'root',
            $password = '',
            $dbname = 'sound_dreamer';
    
    //Biến lưu kết nối
    public $cn = NULL;

    //Hàm kết nối
    public function connect()
    {
        if(!$this->cn) $this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }

    //Hàm ngắt kết nối
    public function close()
    {
        if ($this->cn)
        {
            mysqli_close($this->cn);
        }
    }

    //Hàm truy vấn
    public function query($sql = null)
    {
        if ($this->cn)
        {
            mysqli_query($this->cn, $sql);
        }
    }

    //Đếm số hàng
    public function num_rows($sql = null)
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                $row = mysqli_num_rows($query);
                return $row;
            }
        }
    }

    //Hàm lấy dữ liệu
    public function fetch_assoc($sql = null, $type)
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                if ($type == 0)
                {
                    // Lấy nhiều dữ liệu gán vào mảng
                    while ($row = mysqli_fetch_assoc($query))
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                else if ($type == 1)
                {
                    // Lấy một hàng dữ liệu gán vào biến
                    $data = mysqli_fetch_assoc($query);
                    return $data;
                }
            }       
        }
    }
        // Hàm charset cho database
    public function set_char($uni)
    {
        if ($this->cn)
        {
            mysqli_set_charset($this->cn, $uni);
        }
    }
}
?>
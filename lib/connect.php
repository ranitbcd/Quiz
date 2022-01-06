        <?php  
          class connect
    {
        function __construct()
        {
            $this->host='localhost';
            $this->user='root';
            $this->pwd='';
            $this->db='test';
            $this->con=mysqli_connect($this->host,$this->user,$this->pwd) or die("Unable to connect with localhost");
            mysqli_select_db($this->con,$this->db) or die("Unable to connect with database");
        
        }
        function save_rec($uid,$pwd,$uname,$dob,$cno)
        {
            $sql="INSERT INTO tbl_register_user(uid,pwd,uname,dob,contact_no)values('$uid','$pwd','$uname','$dob','$cno')";
            $n=mysqli_query($this->con,$sql);
            return $n;
        }
        function update_rec($uid,$pwd,$uname,$dob,$cno,$img_name)
        {
            $sql="UPDATE tbl_register_user set pwd='$pwd',uname='$uname',dob='$dob',contact_no='$cno',img_name='$img_name' WHERE uid='$uid'";
            $n=mysqli_query($this->con,$sql);
            return $n;
        }

        function check_user($uid,$pwd)
        {
            $sql="SELECT uname,img_name FROM tbl_register_user WHERE uid='$uid' and pwd='$pwd'";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }

        function getUserDetails($uid)
        {
            $sql="SELECT * FROM tbl_register_user WHERE uid='$uid'";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }
        //------------------TABLE CATEGORY------------------------------------
        public function getCatId()
        {
            $sql="SELECT cid from tbl_setting";
            $res=mysqli_query($this->con,$sql);
            $arr=mysqli_fetch_array($res);
            return $arr['cid'];
        }
        public function updateCatId()
        {
            $sql="UPDATE tbl_setting SET cid=cid+1";
            $n=mysqli_query($this->con,$sql);
        }
        public function save_cate($cid,$cname)
        {
            $sql="INSERT INTO tbl_category(cid,cname)VALUES('$cid','$cname')";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            return $n;
        }
        public function update_cate($cid,$cname)
        {
            $sql="UPDATE tbl_category SET cname='$cname' WHERE cid='$cid'";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            return $n;
        }
        public function getCatDetails()
        {
            $sql="SELECT cid,cname FROM tbl_category ORDER BY cid";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }
        public function DEL_CATE($cid)
        {
            $sql="DELETE FROM tbl_category WHERE cid='$cid'";
            $n=mysqli_query($this->con,$sql);
        }
        function getQno($cid)
        {
            $sql="SELECT qno FROM tbl_category WHERE cid='$cid'";
            $res=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            $arr=mysqli_fetch_array($res);
            return $arr['qno'];
        }
        function updateQno($cid)
        {
            $sql="UPDATE tbl_category SET qno=qno+1 WHERE cid='$cid'";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
        }
        function add_question($cid,$qno,$question,$op1,$op2,$op3,$op4,$ca)
        {
            $sql="INSERT INTO tbl_question(cid,qno,question,op1,op2,op3,op4,ca)values('$cid','$qno','$question','$op1','$op2','$op3','$op4','$ca')";
            $n=mysqli_query($this->con,$sql);
            return $n;
        }

    }//End of class
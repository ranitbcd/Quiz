<?php
class connect{
    
    public function __construct()

        {
            $this->host='localhost';
            $this->user='root';
            $this->pwd='';
            $this->db='test';
            $this->con=mysqli_connect($this->host,$this->user,$this->pwd) or die("Unable to connect with localhost");
            mysqli_select_db($this->con,$this->db) or die("Unable to connect with database");
        }
        public function register($email,$password,$user_name,$dob)
        {
            $sql="INSERT INTO tbl_player(email,password,user_name,dob)values('$email','$password','$user_name','$dob')";
            $n=mysqli_query($this->con,$sql);
            return $n;
        }
        function check_user($email,$password)
        {
            $sql="SELECT user_name FROM tbl_player WHERE email='$email' and password='$password'";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }
        function getCategory()
        {
        $sql="SELECT cid,cname FROM tbl_category order by cname";
        $res=mysqli_query($this->con,$sql);
        return $res;
        }
        function getQuestion($cid,$qno)
        {
            $sql="SELECT question,op1,op2,op3,op4 from tbl_question where cid='$cid' and qno='$qno'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            $arr=mysqli_fetch_array($res);
            return $arr;
        }
        function saveanswer($uid,$cid,$qno,$ca){
            $dop=date('Y-m-d');
            $sql="INSERT INTO tbl_answer(uid,cid,qno,ca,dop)values('$uid','$cid','$qno','$ca','$dop')";
            $n=mysqli_query($this->con,$sql);
            return $n;
        }
        function getCount($cid)
        {
            $sql="SELECT COUNT(*) FROM tbl_question WHERE cid='$cid'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            $arr=mysqli_fetch_row($res);
            return $arr[0];
        }
        function getTopic($cid)
        {
            $sql="SELECT cname from tbl_category WHERE cid='$cid'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            $arr=mysqli_fetch_row($res);
            return $arr[0];
        }
        function getAtempted($cid)
        {
            $sql="SELECT count(*) from tbl_answer WHERE ca IN ('A','B','C','D') and cid='$cid'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            $arr=mysqli_fetch_row($res);
            return $arr[0];
        }
        
        function getReview($uid,$cid,$dop)
        {
            $sql="SELECT * FROM tbl_answer WHERE uid='$uid' and cid='$cid' and dop='$dop'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            return $res;
        }
        function updateAnswer($uid,$cid,$qno,$ans)
        {
            $sql="UPDATE tbl_answer SET ca='$ans' where uid='$uid' and cid='$cid' and qno='$qno'";
            $n=mysqli_query($this->con,$sql) or mysqli_error($this->con); 
        }
        function getusername($uid)
        {
            $sql="SELECT user_name from tbl_player WHERE email='$uid'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            $arr=mysqli_fetch_array($res);
            return $arr['user_name'];

        }
        function getCorrectAnswer($cid,$qno)
        {
            $sql="SELECT ca from  tbl_question where cid='$cid' and qno='$qno'";
            $res=mysqli_query($this->con,$sql) or mysqli_error($this->con);
            $arr=mysqli_fetch_array($res);
            return $arr['ca'];
        }
    
}//end of class
?>
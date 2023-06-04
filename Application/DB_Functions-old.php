<?php
require "connection.php";


Class Connections {

    public $db;
    public function __Construct()
    {
        $this->db = new mPDO();
        //return $this->db;
    }
	
	
/*
 * 
 * FUNCTION FOR INSERTING CLIENT LIST DATA INTO FOUR TABLES 1. STUD_GENRAL, 2. STUD_EXAM_DETAIL, 3. REFRENCE, 4. ATTACHMENT.
 * 
 * AUTHOR: KUSHAL DHOLE 
 * 
 */
	
	

    function Stud_Details($sname,$fname,$foccu,$sclclg,$addr,$Email,$bithday,$ssc,$hsc,
$pcb,$pcm,$cat,$mbbs1,$mbbs2,$mbbs3,$mbbs4,$pref,$aipmt,$aiims,$mupmdc,$other,$attch,$pic,$name,$birthdayref,$mobile,$emails)
    {
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("INSERT INTO stud_general(`stud_name`, `father_name`, `father_occp`, 
`scl_clg_name`, `address`, `email`, `birthday`, `ssc`, `hsc`, `pcb`, `pcm`, `cat`, `mbbs_fst`,
 `mbbs_scnd`, `mbbs_third`, `mbbs_fourth`, `Preference`)
VALUES(:sname,:fname,:foccu,:sclclg,:addr,:Email,:bithday,:ssc,:hsc,:pcb,
:pcm,:cat,:mbbs1,:mbbs2,:mbbs3,:mbbs4,:pref)");

        $sql->bindParam(':sname', $sname);
        $sql->bindParam(':fname', $fname);
        $sql->bindParam(':foccu', $foccu);
        $sql->bindParam(':sclclg', $sclclg);
        $sql->bindParam(':addr', $addr);
        $sql->bindParam(':Email', $Email);
        $sql->bindParam(':bithday', $bithday);
        $sql->bindParam(':ssc', $ssc);
        $sql->bindParam(':hsc', $hsc);
        $sql->bindParam(':pcb', $pcb);
        $sql->bindParam(':pcm', $pcm);
        $sql->bindParam(':cat', $cat);
        $sql->bindParam(':mbbs1', $mbbs1);
        $sql->bindParam(':mbbs2', $mbbs2);
        $sql->bindParam(':mbbs3', $mbbs3);
        $sql->bindParam(':mbbs4', $mbbs4);
        $sql->bindParam(':pref', $pref);
        $sql->execute();
		
		$stmt = $this->db->prepare("SELECT * FROM stud_general ORDER BY ID DESC LIMIT 1"); // $obj->db is refer to the connection db is the public variable define in ADB_Fuctions file
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$last_id=$row['ID'];
			}
			
$sql = $this->db->prepare("INSERT INTO stud_exam_detail( `stud_id`, `aipmt`, `aiims`, `mupmdc`, `other`)
VALUES(:last_id,:aipmt,:aiims,:mupmdc,:other)");
        $sql->bindParam(':last_id', $last_id);
        $sql->bindParam(':aipmt', $aipmt);
        $sql->bindParam(':aiims', $aiims);
        $sql->bindParam(':mupmdc', $mupmdc);
        $sql->bindParam(':other', $other);
        $sql->execute();	
		
		$sql = $this->db->prepare("INSERT INTO attachment(`stud_id`, `attachment`, `photo`)
VALUES(:last_id,:attch,:pic)");
$attch=date("mdYHis")."-".$attch;
$pic=date("mdYHis")."-".$pic;
        $sql->bindParam(':last_id', $last_id);
        $sql->bindParam(':attch', $attch);
        $sql->bindParam(':pic', $pic);
        $sql->execute();	
$tmp_name4=$_FILES['attch']['tmp_name'];
$tmp_name5=$_FILES['pic']['tmp_name'];
$location1='assets/attachment/';
$location2='assets/pics/';
move_uploaded_file($tmp_name4,$location1.$attch);
move_uploaded_file($tmp_name5,$location2.$pic);
	
	
	$sql = $this->db->prepare("INSERT INTO referance( `stud_id`, `name`, `birthday`, `mobile`, `email`)
VALUES(:last_id,:name,:birthdayref,:mobile,:emails)");
        $sql->bindParam(':last_id', $last_id);
        $sql->bindParam(':name', $name);
        $sql->bindParam(':birthdayref', $birthdayref);
        $sql->bindParam(':mobile', $mobile);
        $sql->bindParam(':emails', $emails);
        $sql->execute();
	
	
			
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
        return 0;
        }
    }
	
	
	public function CheckLogin($name,$password)
	{
		$sql = $this->db->prepare("select * from admin_login where username=:name and password=:password");
			/* execute statement */
		$sql->bindParam(':name', $name);
        $sql->bindParam(':password', $password);
		$sql->execute();
		
			/* bind result variables */
			$row=$sql->fetchColumn();  ///fetchColumn() is used to select rows from table like mysql_num_row used in normal php 
				if ($row > 0)
				{
					return true;
					
				}
				else 
				{
					return false;	
				}
	}
        
     	
/*
 * 
 * FUNCTION FOR INSERTING CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
	
    function StoreCategory($category_name,$status)
    {
          //$status = 0;
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("INSERT INTO ep_category(`CATEGORY_NAME`, `STATUS`)
VALUES(:category_name,:status)");

        $sql->bindParam(':category_name', $category_name);
        $sql->bindParam(':status', $status);
       
        

        $sql->execute();
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
             print_r($this->db->errorCode());
             print_r($this->db->errorInfo());
        }
 }

    
   /* 
 * FUNCTION FOR UPDATING CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
     function UpdateCategory($id,$category_name,$status)
    
                {
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("UPDATE ep_category SET CATEGORY_NAME=:category_name,STATUS=:status WHERE CAT_ID='$id'");

        $sql->bindParam(':category_name', $category_name);
         $sql->bindParam(':status', $status);
        

        $sql->execute();
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
            // echo $this->db->$sql;
             
             print_r($this->db->errorCode());
             print_r($this->db->errorInfo());
        }
    }
    /* 
 * FUNCTION FOR DELETING CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
    function DeleteCategory($id)
    {
 
                $sql = $this->db->prepare("delete from ep_category where CAT_ID=:id");
                $sql->bindParam(':id', $id);
                $sql->execute();
                if($sql)
                {
                return 1;
                }
                else
                {
                return 0;
                }
      }
      
    /*
 * 
 * FUNCTION FOR INSERTING SUB-CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
	
    function StoreSubCategory($main_cate,$sub_cate,$status)
    {
          //$status = 0;
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("INSERT INTO ep_sub_category(`MAIN_CATEGORY`, `SUB_CATEGORY_NAME`, `STATUS`)
VALUES(:MAIN_CATEGORY,:SUB_CATEGORY_NAME,:STATUS)");

        $sql->bindParam(':MAIN_CATEGORY', $main_cate);
        $sql->bindParam(':SUB_CATEGORY_NAME', $sub_cate);
        $sql->bindParam(':STATUS', $status);
 
        $sql->execute();
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
             print_r($this->db->errorCode());
             print_r($this->db->errorInfo());
        }
 }
 
  /* 
 * FUNCTION FOR UPDATING Sub CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
     function UpdateSubCategory($id,$main_cate,$sub_cate,$status)
    
                {
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("UPDATE ep_sub_category SET MAIN_CATEGORY=:MAIN_CATEGORY, SUB_CATEGORY_NAME=:SUB_CATEGORY_NAME, STATUS=:STATUS WHERE SUB_ID='$id'");

        $sql->bindParam(':MAIN_CATEGORY', $main_cate);
        $sql->bindParam(':SUB_CATEGORY_NAME', $sub_cate);
        $sql->bindParam(':STATUS', $status);

        $sql->execute();
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
            // echo $this->db->$sql;
             
             print_r($this->db->errorCode());
             print_r($this->db->errorInfo());
        }
    }
    
        /* 
 * FUNCTION FOR DELETING CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
    function DeleteSubCategory($id)
    {
 
                $sql = $this->db->prepare("delete from ep_sub_category where SUB_ID=:id");
                $sql->bindParam(':id', $id);
                $sql->execute();
                if($sql)
                {
                return 1;
                }
                else
                {
                return 0;
                }
      }
      
      
      /*
 * 
 * FUNCTION FOR INSERTING PRODUCT
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
	
    function StoreProduct($pname,$price,$desc,$mfd,$qty,$main_cate,$sub_cate,$unit,$status)
    {
          //$status = 0;
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("INSERT INTO ep_product(`PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QTY`, `PRODUCT_TYPE`, `PRODUCT_SUB_TYPE`, `PACKAGE_UNIT`, `MANUFACTRE`,`STATUS`)
VALUES(:pname,:price,:desc,:qty,:main_cate,:sub_cate,:unit,:mfd,:status)");

        $sql->bindParam(':pname', $pname);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':desc', $desc);
        $sql->bindParam(':qty', $qty);
        $sql->bindParam(':main_cate', $main_cate);
        $sql->bindParam(':sub_cate', $sub_cate);
        $sql->bindParam(':unit', $unit);
        $sql->bindParam(':mfd', $mfd);
        $sql->bindParam(':status', $status);
      

        $sql->execute();
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
             print_r($this->db->errorCode());
             print_r($this->db->errorInfo());
        }
 }
    /* 
 * FUNCTION FOR UPDATING Sub CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
     function UpdateProduct($id,$pname,$price,$desc,$mfd,$qty,$main_cate,$sub_cate,$unit,$status)
    
                {
	
//$db = new PDO('mysql:host=localhost;dbname=hostelakola;charset=utf8', 'root', '');
$sql = $this->db->prepare("UPDATE ep_product SET PRODUCT_NAME=:pname, PRICE=:price, DESCRIPTION=:desc, QTY=:qty, PRODUCT_TYPE=:main_cate, PRODUCT_SUB_TYPE=:sub_cate, PACKAGE_UNIT=:unit, MANUFACTRE=:mfd, STATUS=:status WHERE PD_ID='$id'");

        $sql->bindParam(':pname', $pname);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':desc', $desc);
        $sql->bindParam(':qty', $qty);
        $sql->bindParam(':main_cate', $main_cate);
        $sql->bindParam(':sub_cate', $sub_cate);
        $sql->bindParam(':unit', $unit);
        $sql->bindParam(':mfd', $mfd);
        $sql->bindParam(':status', $status);
      
        $sql->execute();
        if($sql->rowCount())
        {
        return 1;
        }
        else
        {
            // echo $this->db->$sql;
             
             print_r($this->db->errorCode());
             print_r($this->db->errorInfo());
        }
    }
    /* 
 * FUNCTION FOR DELETING CATEGORY
 * 
 * AUTHOR: VIDUR SHARMA 
 * 
 */
    function DeleteProduct($id)
    {
 
                $sql = $this->db->prepare("delete from ep_product where PD_ID=:id");
                $sql->bindParam(':id', $id);
                $sql->execute();
                if($sql)
                {
                return 1;
                }
                else
                {
                return 0;
                }
      }
    
}
?>
<?php

class CrudClass{
    public function __construct(){
        $db=new DatabaseConnection();
    }



    public function crud_registration($st_id,$st_name,$st_pass,$st_email,$bday,$st_dept,$st_contact,$st_gender,$st_add){
		global $conn;
		$query = $conn->query("select st_id from create_info where st_id='$st_id' or email ='$st_email' ");

		$num = $query->num_rows;
		$in_sql = "INSERT INTO create_info (st_id,name,password,email,bday,program,contact,gender,address) VALUES ('$st_id','$st_name','$st_pass','$st_email','$bday','$st_dept','$st_contact','$st_gender','$st_add') ";
		if($num == 0){
			$conn->query($in_sql);
			return true;
		}else{
			return false;
		}
	}

    public function get_all_student(){
		global $conn;
		$sql = "select * from create_info order by st_id ASC";
		$query = $conn->query($sql);
		return $query;
	}



    public function search($query){
		global $conn;
		$result = $conn->query("SELECT * FROM create_info WHERE (st_id LIKE '%".$query."%'
							OR name LIKE '%".$query."%'
								OR contact LIKE '%".$query."%'
									OR email LIKE '%".$query."%') order by st_id");
		return $result;
	}
	



public function getusername($sid){
    global $conn;
    $query = $conn->query("select name from create_info where st_id='$sid'");
    $result = $query->fetch_assoc();
    echo $result['name'];
}

public function getuserbyid($st_id){
    global $conn;
    $query = $conn->query("select * from create_info where st_id='$st_id'");
    return $query;
}
//Update Student Profile
public function updateprofile($sid,$st_name,$st_email,$st_dept,$st_gender,$st_contact,$st_add,$file){
    global $conn;
    $query = $conn->query("update create_info set name='$st_name',email='$st_email',program='$st_dept',gender='$st_gender',contact='$st_contact', address='$st_add',img='$file' where st_id='$sid'");
    return true;
}

//delete student
public function delete_student($st_id){
    global $conn;
    $sql = "delete from create_info where st_id='$st_id' ";
    $result = $conn->query($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

}
?>
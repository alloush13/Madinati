<?php

function validateSignup($request){

    if(!numberCharValidate($request['first_name'],2,25))
        return ["err"=>true,"msg"=>"يرجى إدخال الاسم الأول بشكل صحيح"];
    if(!numberCharValidate($request['last_name'],2,25))
        return ["err"=>true,"msg"=>"يرجى إدخال الاسم الأخير بشكل صحيح"];
    if(!filter_var($request['email'],FILTER_VALIDATE_EMAIL) || !numberCharValidate($request['email'],3,200))
        return ["err"=>true,"msg"=>"يرجى إدخال البريد الالكتروني بشكل صحيح"];
    if($request['password'] != $request['c_password'] || !numberCharValidate($request['password'],6,200))
        return ["err"=>true,"msg"=>"يرجى إدخال كلمة المرور بشكل صحيح"];
    if(!($request['gender'] == "M" || $request['gender'] == "F"))
        return ["err"=>true,"msg"=>"يرجى إدخال الجنس "];
    if(!($request['type'] == "user" || $request['type'] == "guide"))
        return ["err"=>true,"msg"=>"يرجى إدخال نوع الحساب "];
    if(!numberCharValidate($request['phone'],10,20))
        return ["err"=>true,"msg"=>"يرجى إدخال رقم الجوال  بشكل صحيح"];
    if(!numberCharValidate($request['address'],10,200))
        return ["err"=>true,"msg"=>"يرجى إدخال العنوان  بشكل صحيح"];
    if($request['experience']<=0 && $request['type']=="guide")
        return ["err"=>true,"msg"=>"يرجى إدخال عدد سنوات الخبرة  بشكل صحيح"];

    return ["err"=>false,"msg"=>""];
}
function validateLogin($request){


    if(!filter_var($request['email'],FILTER_VALIDATE_EMAIL) || !numberCharValidate($request['email'],3,200))
        return ["err"=>true,"msg"=>"يرجى إدخال البريد الالكتروني بشكل صحيح"];
    if(!numberCharValidate($request['password'],6,200))
        return ["err"=>true,"msg"=>"يرجى إدخال كلمة المرور بشكل صحيح"];

    return ["err"=>false,"msg"=>""];
}
function validateCreatePackage($request){

    if(!numberCharValidate($request['name'],2,60))
        return ["err"=>true,"msg"=>"يرجى إدخال اسم الحزمة  بشكل صحيح"];
    if($request['price']<0)
        return ["err"=>true,"msg"=>"يرجى إدخال سعر الحزمة  بشكل صحيح"];
    if(!numberCharValidate($request['details'],2,1500))
        return ["err"=>true,"msg"=>"يرجى إدخال وصف للحزمة  بشكل صحيح"];

    return ["err"=>false,"msg"=>""];
}
function numberCharValidate($field,$min,$max)
{
    if(strlen($field) < $min || strlen($field) > $max)
        return false;

    return true;
}


function checkLogin($conn,$table,$email,$password)
{
    $sql = "select * from $table where email = '$email' and password = '$password' ";
    if($table=="tourist_guides")$sql.=" and status = 'Activated'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);
        if($result->num_rows != 1){
           return ["err"=>true,"msg"=>"غير مصرح بالدخول" ,"id"=>0];
        }
    return  ["err"=>false,"msg"=>"تم تسجيل الدخول" ,"id"=>$row[0]];
}


function checkUnique($conn,$table,$field,$value)
{
    $sql = "select count(*) from $table where $field = '$value' ";
    $res = mysqli_query($conn, $sql);
    $res = mysqli_fetch_row($res);
    if ($res[0] != 0) {
       return false;
    }
    return true;
}




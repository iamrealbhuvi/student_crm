<?php 

$uploader_sql = " INSERT INTO `$instit"."_students` (`rollnumber`, `student_name`, `search_keyword`, `photo_name`, `class`, `acad_year`, `class_status`, `edu_group`, `dob`,`blood_group`, `id_mark_1`, `id_mark_2`, `pwd`, `pwd_issue`, `address`, `father_name`, `father_qualification`, `father_employment_type`, `father_occupation`,`mother_name`, `contact_1`, `contact_2`, `annual_income`, `guardian`, `cared_by`, `academic_year`, `account_status`, `stu_pass`, `mother_qualification`, `mother_employment_type`, `mother_occupation`, `guardian_cont`, `gender`) VALUES ('".$newdata['roll']."','".$newdata['name']."','".$newdata['dob']."','$picname','".$newdata['stuclass']."','".$newdata['stuacayear']."','not yet provided','".$newdata['stuedugrp']."','".$newdata['dob']."','".$newdata['bloodgrp']."','".$newdata['idmark1']."','".$newdata['idmark2']."','".$newdata['pwdSts']."','".$newdata['pwdIssue']."','".$newdata['stuaddr']."','".$newdata['father']."','".$newdata['stufaqual']."','".$newdata['stufaoccutype']."','".$newdata['stufaoccu']."','".$newdata['mother']."','".$newdata['stucont1']."','".$newdata['stucont2']."','".$newdata['stuanninc']."','".$newdata['guardianname']."','".$newdata['stucaredby']."','".$newdata['stuacayear']."','active','".$newdata['stupass']."','".$newdata['stumaqual']."','".$newdata['stumaoccutype']."','".$newdata['stumaoccu']."', '".$newdata['guardiancont']."', '".$newdata['stugen']."'); ";
$uploader_request = mysqli_query($conn, $uploader_sql);

?>
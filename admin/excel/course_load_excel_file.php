<!doctype>
<html>
<head>
</head>
<body>
<?php
//require_once "../../Classes/PHPExcel.php";
//require_once "../../Classes/PHPExcel/IOFactory.php";

include_once __DIR__ . '/../Classes/PHPExcel.php';
include_once __DIR__ . '/../Classes/PHPExcel/IOFactory.php';
include_once __DIR__ . '/../model/Course.php';

$mCourse = new Course();


if(isset($_POST['SubmitButton'])){
    try {       //attached file formate

        $new_id = 1;
        $up_filename=$_FILES["filepath"]["name"];
        $file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
        $file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
        $f2 = $file_basename . $file_ext;

        echo $f2. " " . $file_basename;

        move_uploaded_file($_FILES["filepath"]["tmp_name"], $f2);

        $inputFileName = $f2;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file"' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
//  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $rowData = array();
        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
        }

//print_r($rowData);
//echo $rowData[0][0][1];

        foreach ($rowData as $datum) {
            foreach ($datum as $item) {

                $course_name = $item[1];
                $course_code = $item[2];
                $course_credit = $item[3];
                $teacher_id = $item[4];
                $semester_id = $item[5];
                $dept_id = $item[6];
                $created_by = $item[7];
                $created_date = $item[8];
                $modified_by = $item[9];
                $modified_date = $item[10];
                $remark = $item[11];
                $is_active = $item[12];

                $mCourse->save_course($course_name, $course_code, $course_credit, $teacher_id, $semester_id, $dept_id, $created_by, $created_date, $modified_by, $modified_date, $is_active);
            }
        }
    }
    catch(Exception $e) {
        $error_message = $e->getMessage();
    }
}

//require_once "Classes/PHPExcel/I";

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file"  name="filepath" id="filepath"/></td><td>
        <input type="submit" name="SubmitButton"/>
</form>

</body>
</html>
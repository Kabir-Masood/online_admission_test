<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/model/Applicant.php';

$mApplicant = new Applicant();

$id = 0;

if (!empty($_GET)) {
    $id = htmlentities($_GET['id'], ENT_QUOTES);
    $mApplicant->delete_applicant($id);
    header("location:applicant.php");
}

?>

</html>
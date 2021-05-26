<?php
session_start();
include('../connection.php');
if(isset($_SESSION["user_type"]))
{
$id = "";
    $select = "SELECT Eid FROM `ebook` ORDER by Eid desc LIMIT 1";
    $result1 = mysqli_query($con, $select);
    if($row1 = mysqli_fetch_array($result1))
    {
        $id = $row1["Eid"] + 1;
    }
    else
    {
        $id = 101;
    }

    $data="";
    $type="new";
    $btnname="Submit";
 if(isset($_GET["eid"])){
$select1="Select * from ebook where eid='".$_GET["eid"]."'";
$result2 = mysqli_query($con, $select1);
$row2 = mysqli_fetch_array($result2);
$data=$row2["Ebookcontent"];
$type="update";
$btnname="Update";
 }
 else{
    $select2="Select * from ebook where Aid='".$_SESSION["Aid"]."' and status ='pending'";
    $result3 = mysqli_query($con, $select2);
 
    if(mysqli_num_rows($result3)>=3){
        echo '<script>alert("You have to complete Pending Book")</script>';
        echo "<script>window.location.href='ebook.php';</script>";
    }
    else{

    }

$data="<h2>  f </h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>
<h3>Context</h3>
<ul>
    <li>Suspendisse tincidunt urna ut velit ullamcorper fermentum.</li>
    <li>Nullam mattis sodales lacus, in gravida sem auctor at.</li>
    <li>Praesent non lacinia mi.</li>
    <li>Mauris a ante neque.</li>
    <li>Aenean ut magna lobortis nunc feugiat sagittis.</li>
</ul>";
 }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <title>Editors | Bootstrap Based Admin Template - Material Design</title> -->
    <!-- Favicon-->

    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body style="background-color: lightgreen;">
  <?php
   include 'header.php'; 
  ?>

    <section class="content">
    <div class="container my-5">

        <div class="container-fluid">
            <div class="block-header">
             
            </div>

            <!-- CKEditor -->
            <div class="row clearfix" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CKEDITOR
                                <small>CKEditor is a ready-for-use HTML text editor designed to simplify web content
                                    creation. Taken from <a href="http://ckeditor.com/"
                                        target="_blank">ckeditor.com</a></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <textarea id="ckeditor">
                                <h2>WYSIWYG Editor</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>
                                <h3>Lacinia</h3>
                                <ul>
                                    <li>Suspendisse tincidunt urna ut velit ullamcorper fermentum.</li>
                                    <li>Nullam mattis sodales lacus, in gravida sem auctor at.</li>
                                    <li>Praesent non lacinia mi.</li>
                                    <li>Mauris a ante neque.</li>
                                    <li>Aenean ut magna lobortis nunc feugiat sagittis.</li>
                                </ul>
                                <h3>Pellentesque adipiscing</h3>
                                <p>Maecenas quis ante ante. Nunc adipiscing rhoncus rutrum. Pellentesque adipiscing urna mi, ut tempus lacus ultrices ac. Pellentesque sodales, libero et mollis interdum, dui odio vestibulum dolor, eu pellentesque nisl nibh quis nunc. Sed porttitor leo adipiscing venenatis vehicula. Aenean quis viverra enim. Praesent porttitor ut ipsum id ornare.</p>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
            <!-- TinyMCE -->

            <form method="post" id="product_form"  method="post" enctype="multipart/form-data">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h2> EBook Editor
                            </h2>
                        </div>
                        <div class="body">
                            <textarea  id="tinymce" name="tinymce" required>
                              <?php echo $data;?>
                              
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
   <br/>
     <label style="margin-left: -462px;"><h3>File</h3> </label>
   <input type="file" name="fileToUpload" required class="form-control" id="fileToUpload">
    </div>
    <div class="col-md-3"></div>
    </div>
          
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
   <br/>

   <button class="btn btn-primary"  name="submit" required><?php echo $btnname;?></button>
    </div>
    <div class="col-md-3"></div>
    </div>
    </br></form>
    </div>
            <!-- #END# TinyMCE -->
        </div>
    </section>
<?php

if(isset($_POST["submit"])) {

   
$valid_extensions = array('pdf');
        $path = '../file/';
        $file = $_FILES['fileToUpload']['name'];
        $tmp = $_FILES['fileToUpload']['tmp_name'];
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($file);
            if(move_uploaded_file($tmp,$path))
            {
                
                $filename=$file;
        
                 $ab = htmlentities($_POST["tinymce"]);
                 $b = html_entity_decode($ab);
                 $query2="";
                 if($type=="update"){
                    $query2 = "Update  `ebook` set  `Ebname`='".$filename."', `Ebookcontent`='". $b."', `filepath`='".$file."' where `Eid`='".$_GET["eid"]."'";
                   if(mysqli_query($con, $query2))
                    {
               
                    echo '<script>alert("Ebook Document Updated Successfully")</script>';
                    echo "<script>window.location.href='ebook.php';</script>";
                    }
                 }
                 else{
                    $query2 = "INSERT INTO `ebook`(`Eid`, `Aid`, `Ebname`, `Ebookcontent`, `status`, `filepath`) VALUES ('".$id."','".$_SESSION["Aid"]."','".$filename."','". $b."','pending','".$file."')";
                    if(mysqli_query($con, $query2))
                    {
                   
                    echo '<script>alert("New  Document Added Successfully")</script>';
                    echo "<script>window.location.href='ebook.php';</script>";
                    }
                 }
                    
            }
            else{
                echo 'Not Added Successfully';
            }       
        }
}
?>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Ckeditor -->
    <script src="plugins/ckeditor/ckeditor.js"></script>

    <!-- TinyMCE -->
    <script src="plugins/tinymce/tinymce.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/editors.js"></script>

    <!-- Demo Js -->
    <!-- <script src="js/demo.js"></script> -->
</body>

</html>

<?php
}
else{
    echo "<script>window.location.href='../index.php';</script>";
}
?>
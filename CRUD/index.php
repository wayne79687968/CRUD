<?php
    $dbms='mysql';     
    $host='localhost'; 
    $dbName='crud';    
    $user='root';      
    $pass='';          
    $dsn="$dbms:host=$host;dbname=$dbName";
    
    try {
        $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
        
        $sql = "SELECT * FROM account_info";
        $result = $dbh->query($sql);
    } catch (PDOException $e) {
        die ("Error!: " . $e->getMessage() . "<br/>");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>    

</head>
<body>
    <!--標題列-->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br><br>   
   
<div class="container">
    <div class="row">
        <div class="col-md-1">
            <div class="row text-center text-inline">
                <button style="white-space:nowrap" type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">新增資料</button> 
            </div>  
        </div>
    </div>  
    <br>
    <div class="row">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark" id="account_info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Account</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Email</th>
                    <th scope="col">Remark</th>
                    <th scope="col">CRUD</th>
                </tr>
            </thead>
            <tbody id="doajax">
                <!--動態表格-->
                <?php
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if ($row["gender"] == 1) {
                        echo '
                                  <tr>
                                  <td scope="col">' . 
                                      $row["account"] . 
                                  '</td><td scope="col">' . 
                                      $row["name"] . 
                                  '</td><td scope="col">
                                      男
                                  </td><td scope="col">' . 
                                      strtr($row["birthday"], "-", "/") . 
                                  '</td><td scope="col">' . 
                                      $row["email"] . 
                                  '</td><td scope="col">' . 
                                      $row["remark"] . 
                                  '</td><td scope="col" class="text-center">
                                      <button style="white-space:nowrap" type="button" data-id="' . $row["id"] . ',' . $row["account"] . ',' . $row["name"] . ',' . $row["gender"] . ',' . $row["birthday"] . ',' . $row["email"] . ',' . $row["remark"] . '" class="btn btn-dark edit" data-toggle="modal" data-target="#editModal">編輯</button><br><br>
                                      <button style="white-space:nowrap" type="button" data-id="' . $row["id"] . '"  class="btn btn-danger del" data-toggle="modal" data-target="#deldoublecheck">刪除</button>
                                  </td>
                                </tr>';

                    }else{
                        echo '
                                  <tr>
                                  <td scope="col">' . 
                                      $row["account"] . 
                                  '</td><td scope="col">' . 
                                      $row["name"] . 
                                  '</td><td scope="col">
                                      女
                                  </td><td scope="col">' .
                                      strtr($row["birthday"], "-", "/") . 
                                  '</td><td scope="col">' . 
                                      $row["email"] . 
                                  '</td><td scope="col">' . 
                                      $row["remark"] . 
                                  '</td><td scope="col" class="text-center text-inline">
                                      <button style="white-space:nowrap" type="button" data-id="' . $row["id"] . ',' . $row["account"] . ',' . $row["name"] . ',' . $row["gender"] . ',' . $row["birthday"] . ',' . $row["email"] . ',' . $row["remark"] . '" class="btn btn-dark edit" data-toggle="modal" data-target="#editModal">編輯</button><br><br>
                                      <button style="white-space:nowrap" type="button" data-id="' . $row["id"] . '"  class="btn btn-danger del" data-toggle="modal" data-target="#deldoublecheck">刪除</button>
                                  </td>
                                </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


    <!--頁數選擇-->
    <div class=row>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class='pagination-container'>
        
        
            <ul class="pagination">
                <li data-page="prev" class="page-item">
                    <span class="page-link"> < <span class="sr-only">(current)</span></span>
                </li>

                <li data-page="next" class="page-item"  id="prev">
                    <span class="page-link"> > <span class="sr-only">(current)</span></span>
                </li>
            </ul>
        
            </div>
        </div>
        <div class="col-md-4"></div>
    </div> 
</div>


<!--id-->
<script>
$(function () {
  // Just to append id number for each row
  var id = 0;

  $('table tr:gt(0)').each(function () {
    id++;
    $(this).prepend('<td scope="col">' + id + '</td>');
  });
});
</script>

<!--Edit_Modal-->
<!--顯示編輯頁面-->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="editaccount_info" method="post">
                    <div class="form-group">
                        <input type="hidden" name="editid" value="" id="editid" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputAccount">Account <a style="color: red;">*</a></label>
                        <input type="text" name="editaccount" value="" id="editaccount" class="form-control" placeholder="Enter account" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name <a style="color: red;">*</a></label>
                        <input type="text" class="form-control" name="editname" id="editname" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputGender">Gender <a style="color: red;">*</a></label><br>
                        <label class="radio-inline"><input type="radio" id="editgendermale" name="editgender" value="1" required>Male</label>
                        <label class="radio-inline"><input type="radio" id="editgenderfemale" name="editgender" value="0" required>Female</label>
                    </div>
                    <div class="form-group">
                        <label for="inputBirthday">Birthday <a style="color: red;">*</a></label>
                        <input type="date" class="form-control" id="editbirthday" name="editbirthday" placeholder="Enter birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email <a style="color: red;">*</a></label>
                        <input type="email" class="form-control" id="editemail" name="editemail" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputRemark">Remark</label>
                        <textarea class="form-control" id="editremark" name="editremark" placeholder="Enter remark"></textarea>
                    </div>                
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#editdoublecheck">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!--doubleedit-->
                    <div class="modal fade" id="editdoublecheck">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">DoubleCheck</h4>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-dark" id="doubleedit_btn">確定</button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Edit_Modal_function-->
<!--將表格的資料填入編輯頁面中-->
<script type="text/javascript">
$(document).on("click", ".edit", function () {
    var edit = $(this).data('id').split(",");

    $(".modal-body #editid").val( edit[0] );
    $(".modal-body #editaccount").val( edit[1] );
    $(".modal-body #editname").val( edit[2] );
    if (edit[3] == '1') {
        $('input[name="editgender"]')[0].checked = true; 
    }else{
        $('input[name="editgender"]')[1].checked = true;
    }
    $(".modal-body #editbirthday").val( edit[4] );
    $(".modal-body #editemail").val( edit[5] );
    $(".modal-body #editremark").val( edit[6] );
    
     
});
</script>

<!--edit.php-->
<script>
$(document).ready(function() {
    $('#doubleedit_btn').on('click', function() {
        var id = $('#editid').val();
        var account = $('#editaccount').val();
        var name = $('#editname').val();
        var gender = $('#editgender').val();
        var birthday = $('#editbirthday').val();
        var email = $('#editemail').val();
        var remark = $('#editremark').val();
        console.log(gender);

        if(id!="" && account!="" && name!="" && gender!="" && birthday!="" && email!=""){
            $.ajax({
                url: "edit.php",
                type: "POST",
                data: {
                    "id": id,
                    "account": account,
                    "name": name,
                    "gender": gender,
                    "birthday": birthday,
                    "email": email,
                    "remark": remark                
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#edit_btn").removeAttr("disabled");
                        $('#editdoublecheck').modal('hide');
                        $('#editModal').modal('hide');                    
                    }
                    else if(dataResult.statusCode==201){
                        alert("Error occured !");
                        $('#editdoublecheck').modal('hide');
                    }
                    
                }
            });
        }
        else{
            alert('ERROR!');
        }
    });
});
</script>

<!--Add_Modal-->
<!--顯示新增頁面-->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
                <form id="addaccount_info" method="post">
                    <div class="form-group">
                        <label for="inputAccount">Account <a style="color: red;">*</a></label>
                        <input type="text" name="addaccount" pattern="[A-Za-z]{1,}[0-9]{1,}" value="" id="addaccount" class="form-control" placeholder="Enter account" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name <a style="color: red;">*</a></label>
                        <input type="text" class="form-control" id="addname" name="addname" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputGender">Gender <a style="color: red;">*</a></label><br>
                        <label class="radio-inline"><input type="radio" id="addgendermale" name="addgender" value="1" required>Male</label>
                        <label class="radio-inline"><input type="radio" id="addgenderfemale" name="addgender" value="0" required>Female</label>
                    </div>
                    <div class="form-group">
                        <label for="inputBirthday">Birthday <a style="color: red;">*</a></label>
                        <input type="date" class="form-control" id="addbirthday" name="addbirthday" placeholder="Enter birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email <a style="color: red;">*</a></label>
                        <input type="email" class="form-control" id="addemail" name="addemail" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputOther">Remark</label>
                        <textarea class="form-control" id="addremark" name="addremark" placeholder="Enter remark"></textarea>
                    </div>                
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#adddoublecheck">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    <!--doubleadd-->
                    <div class="modal fade" id="adddoublecheck">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">DoubleCheck</h4>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-dark" id="doubleadd_btn">確定</button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--add.php-->
<script>
$(document).ready(function() {
    $('#doubleadd_btn').on('click', function() {
        var account = $('#addaccount').val();
        var name = $('#addname').val();
        var gender = $('#addgender').val();
        var birthday = $('#addbirthday').val();
        var email = $('#addemail').val();
        var remark = $('#addremark').val();

        if(account!="" && name!="" && gender!="" && birthday!="" && email!=""){
            $.ajax({
                url: "add.php",
                type: "POST",
                data: {
                    "account": account,
                    "name": name,
                    "gender": gender,
                    "birthday": birthday,
                    "email": email,
                    "remark": remark                
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#add_btn").removeAttr("disabled");
                        $('#addaccount_info').find('input:text').val('');
                        $("#success").show();
                        $('#success').html('Data added successfully !'); 
                        $('#adddoublecheck').modal('hide');    
                        $('#addModal').modal('hide');                  
                    }
                    else if(dataResult.statusCode==201){
                        alert("Error occured !");
                        $('#adddoublecheck').modal('hide');    
                    }
                    
                }
            });
        }
        else{
            $('#adddoublecheck').modal('hide');
        }
    });
});
</script>


<!--DelModal-->
<!--顯示刪除頁面-->
<div class="modal fade" id="deldoublecheck">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">DoubleCheck</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <button type="submit" class="btn btn-dark" id="doubledel_btn">確定</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>


<!--del.php-->
<script>
$(document).ready(function() {
    $(document).on("click", ".del", function () {
        var id = $(this).data('id');
        $('#doubledel_btn').on('click', function() {

            $('#deldoublecheck').modal('hide');

            if(id!=""){
                $.ajax({
                    url: "del.php",
                    type: "POST",
                    data: {
                        "id": id                
                    },
                    cache: false,
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            $("#del_btn").removeAttr("disabled");                      
                        }
                        else if(dataResult.statusCode==201){
                           alert("Error occured !");
                        }
                        
                    }
                });
            }
            else{
                alert('ERROR!');
            }
        });
    });
});
</script>

<link href="assets/datatables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugin JavaScript-->
<script src="assets/jquery.datatables.min.js"></script>

<script src="assets/datatables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>

</body>
</html>
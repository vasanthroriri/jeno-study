<?php
session_start();
    include("db/dbConnection.php");
    
    $selQuery = "SELECT student_tbl.*,
    additional_details_tbl.*,
    course_tbl.*
     FROM student_tbl
    LEFT JOIN additional_details_tbl on student_tbl.stu_id=additional_details_tbl.stu_id
    LEFT JOIN course_tbl on student_tbl.course_id=course_tbl.course_id
    WHERE student_tbl.stu_status = 'Active' and student_tbl.entity_id=1";
    $resQuery = mysqli_query($conn , $selQuery); 
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>
<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- ========== Topbar Start ========== -->
        <?php include("top.php") ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

        <?php include("left.php"); ?>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        
        <div class="content-page">
            <div class="content">
            <?php include("formSubject.php");?>
                <!-- Start Content-->
                <div class="container-fluid" id="StuContent">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-flower">
                                <img src="assets/images/flowers/img-3.png">
                            </div>

                            <div class="bg-flower-2">
                                <img src="assets/images/flowers/img-1.png">
                            </div>
        
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" id="addSubjectBtn" class="btn btn-info">
                                            Add New Subject
                                        </button>
                                    </div>
                                </div>
                                <h4 class="page-title">Subjects</h4>   
                            </div>
                        </div>
                    </div>

                   
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Year</th>
                                    <?php if ($user_role == 'Admin') { ?>
                                      <th scope="col">Action</th>
                                     <?php } ?>
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>
                    
                     <tr>
                        <td>1</td>
                        <td>CS705</td>
                        <td>Cloud Computing</td>
                        <td>1 st Year</td>
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>CS709</td>
                        <td>Internet Protocol</td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>CS745</td>
                        <td>Artificial Inteligence</td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>CS805</td>
                        <td>Python</td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>CS205</td>
                        <td>Maths 1 </td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>

                        
                    </tbody>
                  </table>

                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include("footer.php") ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->


    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-------Start Add Student--->
    <!-- <script>

$(document).ready(function () {
  $('#addStudentBtn').click(function () {
    $('#addStudentModal').modal('show'); // Show the modal
    resetForm('addStudent'); // Reset the form 
  });

function resetForm(formId) {
    document.getElementById(formId).reset(); // Reset the form
}

  
  $('#addStudent').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);
    $.ajax({
      url: "action/actStudent.php",
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        // Handle success response
        console.log(response);
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.message,
            timer: 2000
          }).then(function() {
            resetForm('addStudent');
                    $('#addStudentModal').modal('hide');
            $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
              $('#scroll-horizontal-datatable').DataTable().destroy();
              $('#scroll-horizontal-datatable').DataTable({
                "paging": true, // Enable pagination
                "ordering": true, // Enable sorting
                "searching": true // Enable searching
              });
            });
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message
          });
        }
      },
      error: function(xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred while adding Student data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });
});


//Edit Student Ajax


document.addEventListener('DOMContentLoaded', function() {
    $('#editStudent').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actStudent.php",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Handle success response
                
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000
                    }).then(function() {
                      $('#editStudentModal').modal('hide'); // Close the modal
                        
                        $('.modal-backdrop').remove(); // Remove the backdrop   
                          $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                               
                              $('#scroll-horizontal-datatable').DataTable().destroy();
                               
                                $('#scroll-horizontal-datatable').DataTable({
                                   "paging": true, // Enable pagination
                                   "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                               });
                            });
                      });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while Edit student data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});

//Student document ajax
$('#docStudent').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actStudent.php",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Handle success response
                
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000
                    }).then(function() {
                      window.location.href="student.php";
                      });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while Add Student Document.'
                });
                // Re-enable the submit button on error
                $('#docSubmit').prop('disabled', false);
            }
        });
    });




    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-104952515-1', 'auto');
    ga('send', 'pageview');
  </script>
<script>
    function goEditStudent(editId)
{ 
      $.ajax({
        url: 'action/actStudent.php',
        method: 'POST',
        data: {
          editId: editId
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

          $('#editid').val(response.stu_id);
          $('#editFname').val(response.first_name);
          $('#editLname').val(response.last_name);
         
          $('#editDob').val(response.dob);
          $('#editLocation').val(response.address);
          $('#editEmail').val(response.email);
          $('#editMobile').val(response.phone);
          $('#editAadhar').val(response.aadhar);
          $('#editCourse').val(response.course_id);
          $('#editMonth').val(response.course_month);
          $('#editGender').val(response.stu_gender);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}


function goDeleteStudent(id)
{
    //alert(id);
    if(confirm("Are you sure you want to delete Student?"))
    {
      $.ajax({
        url: 'action/actStudent.php',
        method: 'POST',
        data: {
          deleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                               
                               $('#scroll-horizontal-datatable').DataTable().destroy();
                               
                                $('#scroll-horizontal-datatable').DataTable({
                                    "paging": true, // Enable pagination
                                    "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                                });
                            });
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
}
function goViewStudent(id)
{
    //location.href = "clientDetail.php?clientId="+id;
    $.ajax({
        url: 'studentDetail.php',
        method: 'POST',
        data: {
            id: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#StuContent').hide();
          $('#studentDetail').html(response);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}

function goDocStu(id) 
  
  {
    $.ajax({
        url: 'getDocStudent.php',
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#stuDocId').val(response.stuId);
          $('#userName').val(response.username);
          var baseUrl = window.location.origin + "/Admin/roriri software/document/students/"; 
          var aadharUrl = baseUrl + response.aadhar;
          var marksheetUrl = baseUrl + response.marksheet;
         // var bankUrl = baseUrl + response.bank;
                    
            // Set the href attribute and text content of the a tags with the constructed URLs
            $('#aadharLink').attr('href', aadharUrl).find('#aadharImg').text(response.aadhar);
            $('#marksheetLink').attr('href', marksheetUrl).find('#marksheetImg').text(response.marksheet);
           // $('#bankLink').attr('href', bankUrl).find('#bankImg').text(response.bank);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}
</script> -->

<script>
    $(document).ready(function() {
        // Function to show or hide the category field based on the selected course
        function toggleCategoryField() {
            var selectedCourse = $('#course').val();
            if (selectedCourse === 'MBA') {
                $('#categoryField').show();
            } else {
                $('#categoryField').hide();
            }
            updateLanguageButtonLabel(); // Call to update the button label
        }

        // Function to update the label and inputs of the "Add Language Subject" button
        function updateLanguageButtonLabel() {
            var selectedCourse = $('#course').val();
            var selectedCategory = $('#category').val();
            var addButton = $('#addElectiveButton');

            if (selectedCourse === 'MBA' && selectedCategory !== '') {
                addButton.text('Add Elective Subject').attr('data-type', 'elective');
                $('#languageSubjectsHeader').text('Elective Subjects');
            } else {
                addButton.text('Add Language Subject').attr('data-type', 'language');
                $('#languageSubjectsHeader').text('Language Subjects');
            }
        }

        // Initial state on document ready
        toggleCategoryField();

        // Event listener for course select change
        $('#course').change(function() {
            toggleCategoryField();
        });

        // Event listener for category select change
        $('#category').change(function() {
            updateLanguageButtonLabel();
        });

        $('#addInputButton').click(function() {
            var newInputDiv = $('<div class="row mt-3"></div>');

            var inputDiv1 = $('<div class="col-sm-5"></div>');
            var inputLabel1 = $('<label class="form-label"><b>Subject Code</b></label>');
            var input1 = $('<input type="text" class="form-control" name="newInputSubjectCode[]">');
            inputDiv1.append(inputLabel1);
            inputDiv1.append(input1);
            newInputDiv.append(inputDiv1);

            var inputDiv2 = $('<div class="col-sm-5"></div>');
            var inputLabel2 = $('<label class="form-label"><b>Subject Name</b></label>');
            var input2 = $('<input type="text" class="form-control" name="newInputSubjectName[]">');
            inputDiv2.append(inputLabel2);
            inputDiv2.append(input2);
            newInputDiv.append(inputDiv2);

            var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
            var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
            deleteButton.click(function() {
                newInputDiv.remove();
            });
            deleteButtonDiv.append(deleteButton);

            newInputDiv.append(deleteButtonDiv);

            $('#additionalInputs').append(newInputDiv);
        });

        $('#addElectiveButton').click(function() {
            var buttonType = $(this).attr('data-type');

            if (buttonType === 'language') {
                var newInputDiv = $('<div class="row mt-3"></div>');

                var inputDiv1 = $('<div class="col-sm-3"></div>');
                var inputLabel1 = $('<label class="form-label"><b>Language Name</b></label>');
                var input1 = $('<input type="text" class="form-control" name="newInputElectiveSubjectCode[]">');
                inputDiv1.append(inputLabel1);
                inputDiv1.append(input1);
                newInputDiv.append(inputDiv1);

                var inputDiv2 = $('<div class="col-sm-4"></div>');
                var inputLabel2 = $('<label class="form-label"><b>Language Subject Code</b></label>');
                var input2 = $('<input type="text" class="form-control" name="newInputElectiveSubjectName[]">');
                inputDiv2.append(inputLabel2);
                inputDiv2.append(input2);
                newInputDiv.append(inputDiv2);

                var inputDiv3 = $('<div class="col-sm-4"></div>');
                var inputLabel3 = $('<label class="form-label"><b>Language Subject Name</b></label>');
                var input3 = $('<input type="text" class="form-control" name="newInputElectiveSubjectType[]">');
                inputDiv3.append(inputLabel3);
                inputDiv3.append(input3);
                newInputDiv.append(inputDiv3);

                var deleteButtonDiv = $('<div class="col-sm-1 d-flex align-items-end"></div>');
                var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
                deleteButton.click(function() {
                    newInputDiv.remove();
                });
                deleteButtonDiv.append(deleteButton);

                newInputDiv.append(deleteButtonDiv);

                $('#electiveInputs').append(newInputDiv);
            } else if (buttonType === 'elective') {
                var newInputDiv = $('<div class="row mt-3"></div>');

                var inputDiv1 = $('<div class="col-sm-5"></div>');
                var inputLabel1 = $('<label class="form-label"><b>Elective Subject Code</b></label>');
                var input1 = $('<input type="text" class="form-control" name="newInputElectiveSubjectCode[]">');
                inputDiv1.append(inputLabel1);
                inputDiv1.append(input1);
                newInputDiv.append(inputDiv1);

                var inputDiv2 = $('<div class="col-sm-5"></div>');
                var inputLabel2 = $('<label class="form-label"><b>Elective Subject Name</b></label>');
                var input2 = $('<input type="text" class="form-control" name="newInputElectiveSubjectName[]">');
                inputDiv2.append(inputLabel2);
                inputDiv2.append(input2);
                newInputDiv.append(inputDiv2);

                var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
                var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
                deleteButton.click(function() {
                    newInputDiv.remove();
                });
                deleteButtonDiv.append(deleteButton);

                newInputDiv.append(deleteButtonDiv);

                $('#electiveInputs').append(newInputDiv);
            }
        });
    });
</script>







<script>
    document.getElementById('addSubjectBtn').addEventListener('click', function() {
        document.getElementById('StuContent').classList.add('d-none');
        document.getElementById('addSubjectModal').classList.remove('d-none');
    });
    document.getElementById('backToMainBtn').addEventListener('click', function() {
            document.getElementById('StuContent').classList.remove('d-none');
            document.getElementById('addSubjectModal').classList.add('d-none');
        });
</script>
     

</body>

</html>




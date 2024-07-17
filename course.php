<?php
session_start();
    
    include "class.php";
    
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
                                        <button type="button" id="addCourseBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                                            Add New Course
                                        </button>
                                    </div>
                                </div>
                                <h4 class="page-title">Courses</h4>   
                            </div>
                        </div>
                    </div>

                    <?php include "formClgCourse.php" ;?>
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">University</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody> 
                      <tr>
                        <td>1</td>
                        <td>Anna University</td>
                        <td>MBA</td>
                        <td>2 Years</td>
                    
                        <td>
                        <?php if ($user_role == 'Admin') { ?>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="editCourse(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editCourseModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                            <?php } else { ?>
          <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                           <?php } ?>
                        </td>
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



    <script>
      
      $('#addCourseBtn').click(function() {

        $('#addCourse').removeClass('was-validated');
        $('#addCourse').addClass('needs-validation');
        $('#addCourse')[0].reset(); // Reset the form
        $('#fessType').val('');
        
    });

    $('#backButton').click(function() {
        $('#universityView').addClass('d-none');
        $('#StuContent').show();
    });


    $(document).ready(function () {
 

  $('#addCourse').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    
    var form = this; // Get the form element
            if (form.checkValidity() === false) {
                // If the form is invalid, display validation errors
                form.reportValidity();
                return;
            }

    var formData = new FormData(this);
    $.ajax({
      url: "action/actCourse.php",
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
            
                    $('#addCourseModal').modal('hide');
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

      // edit function -------------------------
function editCourse(editId) {
    alert("afa");

    $.ajax({
        url: 'action/actCourse.php',
        method: 'POST',
        data: {
            editId: editId
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            $('#editCouseId').val(response.cou_id);
            $('#editUniversity').val(response.cou_uni_id);
            $('#editCourseName').val(response.cou_name);
            $('#editMedium').val(response.cou_medium);
            $('#editExamType').val(response.cou_exam_type);
            $('#editFessType').val(response.cou_fees_type);
            $('#ediDuration').val(response.cou_duration);

            
            // Clear previous input fields
        $('#editItionalInputs').empty();

            // Assuming uni_department and uni_contact arrays are of equal length and matched by index
            if (Array.isArray(response.cou_university_fess) && Array.isArray(response.cou_study_fees) && Array.isArray(response.cou_total_fees)) {
                response.uni_department.forEach(function(department, index) {
                    var contact = response.uni_contact[index];
                    var newInputDiv = $('<div class="row mb-3"></div>'); // Added mb-3 class for some margin

                    var input1Div = $('<div class="col-sm-5"></div>');
                    var input1Label = $('<label class="form-label"><b>University Fees</b></label>');
                    var input1 = $('<input type="text" class="form-control" name="editUniversityFees[]" required>').val(department);
                    input1Div.append(input1Label);
                    input1Div.append(input1);

                    var input2Div = $('<div class="col-sm-5"></div>');
                    var input2Label = $('<label class="form-label"><b>Study Center Fees.</b></label>');
                    var input2 = $('<input type="text" class="form-control" name="editStudyFees[]" required>').val(contact);
                    input2Div.append(input2Label);
                    input2Div.append(input2);

                    var input3Div = $('<div class="col-sm-5"></div>');
                    var input3Label = $('<label class="form-label"><b>Total Fees.</b></label>');
                    var input3 = $('<input type="text" class="form-control" name="editTotalFees[]" required>').val(contact);
                    input3Div.append(input3Label);
                    input3Div.append(input3);

                   

                    newInputDiv.append(input1Div);
                    newInputDiv.append(input2Div);
                    newInputDiv.append(input3Div);
                    

                    $('#editItionalInputs').append(newInputDiv);
                });
            } else {
                // If not arrays or lengths do not match, handle the error accordingly
                console.error('Department and contact arrays are not properly matched.');
            }
                    },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}





    //Edit Update Course Ajax


document.addEventListener('DOMContentLoaded', function() {
    $('#editCourse').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actCourse.php",
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
                      $('#editCourseModal').modal('hide'); // Close the modal
                        
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
                    text: 'An error occurred while Edit Course data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
    });


    </script>

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
        $('#duration, #fessType').on('input change', function() {
            $('#additionalInputs').empty(); // Clear previous inputs
            var duration = parseInt($('#duration').val()) || 0;
            var graduationType = $('#fessType').val();
            
            var totalSemesters = (graduationType === 'Semester') ? duration * 2 : duration;

            for (var i = 1; i <= totalSemesters; i++) {
                var yearText;
                if (graduationType === 'Semester') {
                    yearText = 'Semester ' + i;
                } else {
                    switch (i) {
                        case 1:
                            yearText = '1st Year';
                            break;
                        case 2:
                            yearText = '2nd Year';
                            break;
                        case 3:
                            yearText = '3rd Year';
                            break;
                        default:
                            yearText = i + 'th Year';
                            break;
                    }
                }

                var newInputDiv = $('<div class="row m-2"></div>');

                var yearDiv = $('<div class="col-sm-12"><label class="form-label"><b>' + yearText + '</b></label></div>');

                var input1Div = $('<div class="col-sm-4"></div>');
                var input1Label = $('<label class="form-label"><b>University Fees</b></label>');
                var input1 = $('<input type="number" class="form-control university-fees" name="universityFees[]" placeholder="Enter University Fees" required>');
                input1Div.append(input1Label);
                input1Div.append(input1);

                var input2Div = $('<div class="col-sm-4"></div>');
                var input2Label = $('<label class="form-label"><b>Study Center Fees</b></label>');
                var input2 = $('<input type="number" class="form-control study-center-fees" name="studyCenterFees[]" placeholder="Enter Study Center Fees" required>');
                input2Div.append(input2Label);
                input2Div.append(input2);

                var input3Div = $('<div class="col-sm-4"></div>');
                var input3Label = $('<label class="form-label"><b>Total Fees</b></label>');
                var input3 = $('<input type="number" class="form-control total-fees" name="totalFees[]" readonly placeholder="Total Fees" required>');
                input3Div.append(input3Label);
                input3Div.append(input3);

                newInputDiv.append(yearDiv);
                newInputDiv.append(input1Div);
                newInputDiv.append(input2Div);
                newInputDiv.append(input3Div);

                $('#additionalInputs').append(newInputDiv);

                // Add event listeners to update total fees
                (function(input1, input2, input3) {
                    input1.add(input2).on('input', function() {
                        var universityFees = parseFloat(input1.val()) || 0;
                        var studyCenterFees = parseFloat(input2.val()) || 0;
                        input3.val(universityFees + studyCenterFees);
                    });
                })(input1, input2, input3);
            }
        });
    });
</script>




</body>

</html>




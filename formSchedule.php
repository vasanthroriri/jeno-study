<!-- Modal -->
    <div class="modal fade" id="addScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="needs-validation" novalidate name="frmAddSchedule" id="addSchedule" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addScheduleId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                        <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="facultyName" class="form-label"><b>Faculty Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" id="facultyName" name="facultyName" required="required">
                                        <option value="">--Select the Faculty--</option>
                                        <?php 
                                            $facQuery = "SELECT * FROM `jeno_faculty` WHERE fac_status = 'Active'";
                                            $fac_result = mysqli_query($conn , $facQuery);
                                            while ($row = $fac_result->fetch_assoc()) {
                                                $id = $row['fac_id']; 
                                                $name = $row['fac_name'];    
                                            
                                            ?>
                                            
                                        <option value="<?php echo $id;?>"><?php echo $name;?></option>

                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="fromDate" class="form-label"><b>Schedule Date</b><span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter the Schedule Date" name="fromDate" id="fromDate" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="session" class="form-label"><b>Session</b><span class="text-danger">*</span></label>
                                    <select class="form-control" id="session" name="session" required="required">
                                        <option value="">--Select the Session--</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Full Day">Full Day</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="timing" class="form-label"><b>Timing</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  placeholder="Ex : 10-12, 1-5, 2-5" name="timing" id="timing" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="course" class="form-label"><b>Course</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="course" id="course" required="required">
                                        <option value="">--Select the Course--</option>
                                        <?php 
                                            $couQuery = "SELECT * FROM `jeno_course` WHERE cou_status='Active'";
                                            $course_result = mysqli_query($conn , $couQuery);
                                            while ($row = $course_result->fetch_assoc()) {
                                                $id = $row['cou_id']; 
                                                $name = $row['cou_name'];    
                                            ?>
                                        <option value="<?php echo $id;?>"><?php echo $name;?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="subject" class="form-label"><b>Subject</b><span class="text-danger">*</span></label>
                                            <select class="select2 form-control select2-multiple" name="subject[]" id="subject" data-toggle="select2" multiple="multiple" data-placeholder="Choose the Subjects..." required="required">
                                                        <option value="">--Select the Subject--</option>
                                                
                                            </select>
                            </div> <!-- end col -->
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- ------------------------------------------------------------------------------------------------------------------ -->

    <!-- Modal -->
    <div class="modal fade" id="editScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form name="frmEditSchedule" id="editSchedule" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editSchedule">
                    <input type="hidden" name="editId" id="editId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                        <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="facultiesName" class="form-label"><b>Faculties Name</b></label>
                                    <select class="form-control" id="facultiesName" name="facultiesName" required="required">
                                         <option>----select----</option>
                                        <option value="vasanth">Vasanth</option>
                                        <option value="raj">Raj</option>
                                        <option value="sankar">Sankar</option>
                                        <option value="muthu">Muthu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="fromDate" class="form-label"><b>Schedule Date</b></label>
                                    <input type="date" class="form-control" placeholder="Enter From Date" name="fromDate" id="fromDate" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="session" class="form-label"><b>Session</b></label>
                                    <select class="form-control" id="session" name="session" required="required">
                                         <option>--Select the Session--</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Evening">Afternoon</option>
                                        <option value="Full time">Full Day</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="Subject" class="form-label"><b>Timing</b></label>
                                    <input type="text" class="form-control"  placeholder="Ex : 10-12, 1-5, 2-5" name="Subject" id="Subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="subject" class="form-label"><b>Course</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="subject" id="subject" required="required">
                                        <option value="">--Select the Course--</option>
                                        <option value="online">BBA</option>
                                        <option value="cash">BCA</option>
                                        <option value="cash">MBA</option>
                                        <option value="cash">MCA</option>
                                        <option value="cash">BSc</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="subject" class="form-label"><b>Subject</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="subject" id="subject" required="required">
                                        <option value="">--Select Subject--</option>
                                        <option value="online">Networking</option>
                                        <option value="cash">php</option>
                                        <option value="cash">java</option>
                                        <option value="cash">Web development</option>
                                        <option value="cash">python</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

  
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->
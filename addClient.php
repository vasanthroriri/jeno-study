                                   <!-- Modal -->
                                   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddClient" id="addClient">
                    <input type="hidden" name="hdnAction" value="addClient">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Enquiry</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="firstname" class="form-label"><b>First Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" pattern="^\S.*$" name="firstname" id="firstname" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="lastname" class="form-label"><b>Last Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Lirst Name" pattern="^\S.*$" name="lastname" id="lastname" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="dateofbirth" class="form-label"><b>Date Of Birth</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dateofbirth" id="dateofbirth" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                <label for="gender" class="form-label"><b>Gender</b></label>
                                <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select The Gender</option>
                                    <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                </select>
                                </div>
                            </div>

                            
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="mobile" class="form-label"><b>Mobile No</b></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="mobile" id="mobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="address" class="form-label"><b>Address</b></label>
                                    <input type="text" class="form-control" placeholder="Enter address" name="address" id="address" required="required">
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

<!------------------------------------------>
                                   <!-- Modal -->
        <div class="modal fade" id="editClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddClient" id="editform">
                    <input type="hidden" name="hdnAction" value="editClient">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Client</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="name" class="form-label"><b>Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Client Name" name="editname" id="editname" required="required">
                                    <input type="hidden" class="form-control"  name="editid" id="editid" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="Company" class="form-label"><b>Company</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Company" name="editCompany" id="editCompany" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="location" class="form-label"><b>Location</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Location" name="editlocation" id="editlocation" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="mobile" class="form-label"><b>Mobile No</b></label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile No" name="editmobile" id="editmobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="editemail" id="editemail" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="gst" class="form-label"><b>GST Number</b></label>
                                    <input type="text" class="form-control" placeholder="Enter GST Number" name="editgst" id="editgst">
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



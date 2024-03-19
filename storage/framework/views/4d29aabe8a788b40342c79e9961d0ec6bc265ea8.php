;

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal">
    Add User
  </button>
  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form onsubmit="return false" method="POST" enctype="multipart/form-data" id="formdata">
                <input type="hidden" name="hid" id="hid" value="">
            <label for="" class="form-label"><b>Firstname:</b></label>
          <input type="text" name="firstname" id="firstname" class="form-control" value="">

          <label for="" class="form-label"><b>Lastname:</b></label>
          <input type="text" name="lastname" id="lastname" class="form-control" value="">

          <label for="" class="form-label"><b>Email:</b></label>
          <input type="email" name="email" id="email" class="form-control" value="">

          <label for="" class="form-label"><b>Password:</b></label>
          <input type="password" name="password" id="password" class="form-control" value="" required>

          <label for="" class="form-label"><b>Confirm Password:</b></label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="" required>

          <div class="mt-2 mb-2 lol">
          <label for="" class="form-label"><b>Gender:</b></label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
        </div>

          <div class="mb-3">
            <label class="form-label"><b>Image:-</b></label>
            <input class="form-control" type="file" id="image" name="image">
          </div>
          <div id="img" name="img"></div>

          <div class="mt-2 mb-2">
          <label for="" class="form-label"><b>Role:</b></label>
          <select class="form-select" id="role" name="role">
            <option selected disabled>Select...</option>
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="Employee">Employee</option>
            <option value="Workers">Workers</option>
          </select>
        </div>
        <div class="mt-2 mb-2" id="roledropdown" style="display: none;">
            <label for="" class="form-label"><b>Role Types:</b></label>
                <select class="form-select" id="role_type" name="role_type">
                    <option selected disabled>Select...</option>
                </select>
        </div>
        <div class="mt-2 mb-2" id="admindropdown" style="display: none;">
            <label for="" class="form-label"><b>Admin Types:</b></label>
                <select class="form-select" id="admin_type" name="admin_type">
                    <option selected disabled>Select...</option>
                </select>
        </div>

        <div class="mt-2 mb-2">
        <label for="" class="form-label"><b>Joining Date:</b></label>
        <input type="date" id="joining_date" name="joining_date" value="">
        </div>

        <div class="mt-2 mb-2">
            <label for="" class="form-label"><b>Status:</b></label>
            <select class="form-select" id="status" name="status">
                <option selected disabled>Select...</option>
                <option value="0">Active</option>
                <option value="1">Inactive</option>
              </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <table class="table table-striped table-hover" id="tabledata">
<thead>
    <tr>
        <th>No</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Confirm Password</th>
        <th>Gender</th>
        <th>Image</th>
        <th>Role</th>
        <th>Role_type</th>
        <th>Admin_type</th>
        <th>Joining Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
</tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Admin_panal\resources\views/backend/admin/user/index.blade.php ENDPATH**/ ?>
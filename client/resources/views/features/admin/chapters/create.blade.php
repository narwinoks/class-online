<div class="modal-header">
    <h5 class="modal-title" id="modalCenterTitle">Add Chapters</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="alert alert-danger" role="alert" id="error-alert">
    <!-- Alert content goes here -->
</div>
<div class="modal-body">
    <input type="hidden" name="course_id" id="course_id" value="{{ $courseId }}">
    <div class="row">
        <div class="col mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"name="name" class="form-control" id="chapter" placeholder="Enter Name">
            <span class="error text-danger d-none" id="error-name"></span>
        </div>
    </div>
    <div class="row">
        <div class="col mb-0">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" cols="3" rows="3"></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary save-chapter" id="save-chapter">Save changes</button>
</div>


<style>
    #error-alert {
        display: none;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title" id="modalCenterTitle">Add Lesson</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="alert alert-danger" role="alert" id="error-alert">
    <!-- Alert content goes here -->
</div>
<div class="modal-body">
    <input type="hidden" name="chapter_id" id="chapter_id" value="{{ $chapter_id }}">
    <div class="row">
        <div class="col mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"name="name" class="form-control" id="chapter" placeholder="Enter Name">
            <span class="error text-danger d-none" id="error-name"></span>
        </div>
    </div>
    <div class="row">
        <div class="col mb-0">
            <label for="video" class="form-label">Video</label>
            <input type="text" id="video" class="form-control" placeholder="pZqk57Xvujs">
            <span class="error text-danger d-none" id="1"></span>
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

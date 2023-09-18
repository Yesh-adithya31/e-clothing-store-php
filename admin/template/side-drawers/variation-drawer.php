<div class="fixed-plugin">
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Create Variation</h5>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <form id="variationForm" role="form" method="POST" >
                <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Category Name</label> -->
                    <select id="category_id" name="category_id" class="form-control" required>
                        <option class="form-label" value="">Category Name</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Variation Name</label>
                    <input name="variation_name" type="text" class="form-control" required>
                </div>
                <div class="position-absolute bottom-0">
                    <hr class="horizontal dark my-sm-4">
                    <div class="d-grid gap-2 d-md-flex">
                        <button type="reset" class="btn btn-outline-danger col-10">Cancel</button>
                        <button type="submit" class="btn bg-gradient-dark col-10">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="fixed-plugin">
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Create Variation Options</h5>
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
            <form id="variationOptionForm" role="form" method="POST">
                <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Category Name</label> -->
                    <select id="variation_id" name="variation_id" class="form-control" required>
                        <option class="form-label" value="">Variation Name</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Option Name:</label>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <button type="button" id="addoptions" class="btn bg-dark"><i class="material-icons text-sm text-white">add</i></button>
                </div>
                <div id="optionsDetails">
                    <div class="input-group input-group-outline mb-3 mt-2 optionsName">
                        <input type="text" id="optionsName" name="optionsName" class="form-control" required><br>
                    </div>
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
<script>
    var optionsInputCounter = 1; 
    $('#addoptions').click(function() {
    // Clone the existing optionsName input field
    var clonedInput = $('.optionsName').first().clone();

    // Increment the counter and set a unique ID for the cloned input
    optionsInputCounter++;
    clonedInput.attr('id', 'optionsName' + optionsInputCounter);
    // Clear the cloned input field's value
    clonedInput.val('');

    // Append the cloned input field to the optionsDetails div
    $('#optionsDetails').append(clonedInput);
});

$('#variationOptionForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Serialize the form data (including multiple colorName values)
    var formData = $(this).serializeArray();
    console.log(formData)
});
</script>
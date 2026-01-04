<!-- Modal ADD -->
<div class="modal fade" id="AddModalCatalogue" tabindex="-1" role="dialog" aria-labelledby="AddModalCatalogue"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddModalCatalogueLabel">Add New Catalog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/store/catalogue" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                value="{{ old('title') }}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price"
                                value="{{ old('price') }}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="book" {{ old('category') == 'book' ? 'selected' : '' }}>Buku</option>
                                <option value="t-shirt" {{ old('category') == 't-shirt' ? 'selected' : '' }}>Pakaian</option>
                                <option value="merchandise" {{ old('category') == 'merchandise' ? 'selected' : '' }}>Merchandise</option>
                                <option value="pigura" {{ old('category') == 'pigura' ? 'selected' : '' }}>Pigura</option>
                            </select>
                        </div>                        
                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" />
                            <div class="col-md-3 mt-3">
                                <img id="imagePreview" src="" alt="Image Preview"
                                    style="display:none; margin-top: 10px; width: 100%;" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const imagePreview = document.getElementById('imagePreview');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        }

        reader.readAsDataURL(file);
    } else {
        imagePreview.src = '';
        imagePreview.style.display = 'none';
    }
});
</script>
<!--END MODAL-->

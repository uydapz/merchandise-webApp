<!-- Modal EDIT -->
<div class="modal fade" id="EditModalCatalogue-{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="EditModalCatalogueLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalCatalogueLabel">Edit Catalog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update/catalogue/{{ $c->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $c->title }}" placeholder="Title" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ $c->description }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $c->price }}" placeholder="Price" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="book" {{ old('category', $c->category) == 'book' ? 'selected' : '' }}>Buku</option>
                                <option value="t-shirt" {{ old('category', $c->category) == 't-shirt' ? 'selected' : '' }}>Pakaian</option>
                                <option value="pigura" {{ old('category', $c->category) == 'pigura' ? 'selected' : '' }}>Pigura</option>
                                <option value="merchandise" {{ old('category', $c->category) == 'merchandise' ? 'selected' : '' }}>Merchandise</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image-{{ $c->id }}" name="image" />
                            <div class="col-md-3 mt-3">
                                <img id="imagePreview-{{ $c->id }}" src="{{ isset($c->image) ? asset('storage/catalogue/' . $c->image) : '' }}" alt="Image Preview" style="display: block; margin-top: 10px; width: 100%;" />
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
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                const imageId = event.target.id.split('-').pop();
                const imagePreview = document.getElementById('imagePreview-' + imageId);

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }

                    reader.readAsDataURL(file);
                } else {
                    // Display the existing image
                    imagePreview.src = '{{ isset($c->image) ? asset('storage/catalogue/' . $c->image) : '' }}';
                    imagePreview.style.display = 'block';
                }
            });
        });
    });
</script>
<!--END MODAL-->

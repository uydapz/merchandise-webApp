<!-- Modal ADD -->
<div class="modal fade" id="AddModalStory" tabindex="-1" role="dialog" aria-labelledby="AddModalStory"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddModalArticleLabel">Add New Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/store/story" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <input type="text" class="form-control" id="excerpt" name="excerpt" placeholder="Excerpt"
                                value="{{ old('excerpt') }}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea id="body" name="body" placeholder="Body">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" />
                            <div class="col-md-3">
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
<script src="https://cdn.tiny.cloud/1/7v0ppq2eg2r7qq1bety6oavos0nqskl9ol3icyrxxmy1geh6/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body',
        plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help',
        content_style: 'body { font-family:Arial, Helvetica, sans-serif; font-size:14px }'
    });
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

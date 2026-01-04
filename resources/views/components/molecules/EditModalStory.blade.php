<!-- Modal EDIT -->
<div class="modal fade" id="EditModalStory-{{ $a->id ?? '' }}" tabindex="-1" role="dialog" aria-labelledby="EditModalArticleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalArticleLabel">Edit Story</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update/story/{{ $a->id ?? '' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $a->title ?? '' }}" placeholder="Title" />
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <input type="text" class="form-control" id="excerpt" name="excerpt" value="{{ $a->excerpt ?? '' }}" placeholder="Excerpt" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" id="body" name="body" rows="5" placeholder="Body">{{ $a->body ?? '' }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image-{{ $a->id ?? '' }}" name="image" />
                            <div class="col-md-3 mt-3">
                                <img id="imagePreview-{{ $a->id ?? '' }}" src="{{ isset($a->image) ? asset('storage/story/' . $a->image) : '' }}" alt="Image Preview" style="display: block; margin-top: 10px; width: 100%;" />
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
                    imagePreview.src = '{{ isset($a->image) ? asset('storage/story/' . $a->image) : '' }}';
                    imagePreview.style.display = 'block';
                }
            });
        });
    });
</script>
<!--END MODAL-->

<div class="modal fade" id="EditModalCustomer-{{ $c->id ?? '' }}" tabindex="-1" role="dialog" aria-labelledby="EditModalCustomer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update/customer/{{ $c->id ?? '' }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div>
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama" aria-describedby="nameHelp" value="{{ old('name', $c->name ?? '') }}" />
                        </div>
                        <div>
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Judul" aria-describedby="titleHelp" value="{{ old('title', $c->title ?? '') }}" />
                        </div>
                        <div>
                            <label for="said" class="form-label">Quotes</label>
                            <input type="text" class="form-control" id="said" name="said"
                                placeholder="Quotes" aria-describedby="saidHelp" value="{{ old('said', $c->said ?? '') }}" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image-{{ $c->id }}" name="image" />
                            <div class="col-md-3 mt-3">
                                <img id="imagePreview-{{ $c->id }}" src="{{ isset($c->image) ? asset('storage/customer/' . $c->image) : '' }}" alt="Image Preview" style="display: block; margin-top: 10px; width: 100%;" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
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
                    imagePreview.src = '{{ isset($c->image) ? asset('storage/customer/' . $c->image) : '' }}';
                    imagePreview.style.display = 'block';
                }
            });
        });
    });
</script>

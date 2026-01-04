<div class="modal fade" id="AddModalCustomer" tabindex="-1" role="dialog" aria-labelledby="AddModalCustomer"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/store/customer" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" name="name"
                            placeholder="Nama" aria-describedby="defaultFormControlHelp" value="{{ old('name') }}"/>
                    </div>
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" name="title"
                            placeholder="Judul" aria-describedby="defaultFormControlHelp" value="{{ old('title') }}"/>
                    </div>
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Quotes</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" name="said"
                            placeholder="Quotes" aria-describedby="defaultFormControlHelp" value="{{ old('said') }}"/>
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
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
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

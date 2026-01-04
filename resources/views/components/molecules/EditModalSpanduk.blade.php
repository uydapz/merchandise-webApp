  <div class="modal fade" id="EditModalSpanduk-{{ $s->id ?? '' }}" tabindex="-1" role="dialog" aria-labelledby="EditModalSpanduk"
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
                <form action="/update/spanduk/{{ $s->id ?? '' }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" name="title"
                                placeholder="{{ old('title') }}" aria-describedby="defaultFormControlHelp" value="{{ old('title',$s->title ?? '') }}"/>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" name="description"
                                placeholder="Deskripsi" aria-describedby="defaultFormControlHelp" value="{{ old('description',$s->description ?? '') }}"/>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Link</label>
                            <input type="text" class="form-control" id="defaultFormControlInput" name="link"
                                placeholder="Link" aria-describedby="defaultFormControlHelp" value="{{ old('link',$s->link ?? '') }}" />
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
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Title</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{ route('faculties.store') }}" method="post" id="form_faculties">
  @csrf
<div class="modal-body">
<div class="mb-3">
    <label for="kode_fakultas" class="col-form-label">Kode Fakultas</label>
    <input type="text" class="form-control @error('kode_fakultas') is-invalid @enderror" id="kode_fakultas" name="kode_fakultas" value="{{old('kode_fakultas')}}">
    @error('kode_fakultas')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="nama_fakultas" class="col-form-label">Nama Fakultas</label>
    <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas">
  </div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary"  onClick="store()">Add</button>
</div>
</form>
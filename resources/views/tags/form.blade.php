@csrf
<div class="form-group">
    <label for="title">Título</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $tag->title }}" required>
    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" required>
</div>
<button type="submit" class="btn btn-success">Salvar</button>
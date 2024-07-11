@section('content')
<div class="container">
    <h1>Edit Berita</h1>
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $berita->title }}" required>
        </div>
        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $berita->subtitle }}"
                required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" required>{{ $berita->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $berita->author }}" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $berita->date }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="kota" {{ $berita->type == 'kota' ? 'selected' : '' }}>Kota</option>
                <option value="lainnya" {{ $berita->type == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
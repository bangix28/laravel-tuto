    <section id="form-creation" class="mx-5">
        <form action="" method="post">
            @method($post->id ? "PATCH": "POST")
            @csrf
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" class="form-control form-control-lg" value="{{ old('title', $post->title) }}">
                @error('title')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug :</label>
                <input type="text" name="slug" id="slug" class="form-control form-control-lg" value="{{ old('slug', $post->slug) }}">
                @error('slug')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenu :</label>
                <textarea class="form-control form-control-lg" rows="5" name="content" id="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-3">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary mb-3">
                    @if($post->id)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </section>

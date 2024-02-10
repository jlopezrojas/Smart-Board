<div class="row">
    <div class="col s12">
        <h3>Lista de Post-its</h3>
        <a href="{{ route('post-its.create') }}" class="btn">+</a>
    </div>
</div>

<div class="row">
    @foreach ($postIts as $postIt)
    <div class="col s12 m6 l4">
        <a href="{{ route('post-its.show', $postIt->id) }}" class="card-link">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">{{ $postIt->title }}</span>
                    <p>{{ $postIt->content }}</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
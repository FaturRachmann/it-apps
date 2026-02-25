@props(['article'])

<div class="article-card" onclick="window.location.href='{{ route('articles.show', $article->slug) }}'">
    <div class="article-img" style="background: linear-gradient(135deg, {{ $article->gradient ?? '#eff6ff' }}, {{ $article->gradient2 ?? '#dbeafe' }});">
        {{ $article->emoji ?? '📄' }}
    </div>
    <div class="article-body">
        @isset($article->category)
        <div class="article-tag">{{ $article->category }}</div>
        @endisset
        <h3>{{ $article->title }}</h3>
        <p>{{ Str::limit($article->excerpt ?? $article->description, 80) }}</p>
        <div class="article-meta">
            @isset($article->read_time)
            <span>{{ $article->read_time }} min read</span>
            <span>•</span>
            @endisset
            @isset($article->published_at)
            <span>{{ $article->published_at->format('d M Y') }}</span>
            @endisset
        </div>
    </div>
</div>

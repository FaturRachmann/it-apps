<x-admin-layout>
    @section('page-title', 'Kelola Artikel')
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--navy-900); margin-bottom: 4px;">Daftar Artikel</h2>
            <p style="color: var(--gray-500); font-size: 0.9rem;">Kelola artikel blog dan konten edukasi</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="btn-action green" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Tambah Artikel Baru
        </a>
    </div>

    @if(session('success'))
        <div style="margin-bottom: 24px; background: #dcfce7; border: 1px solid #16a34a; color: #15803d; padding: 14px 18px; border-radius: 10px; display: flex; align-items: center; gap: 12px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Articles Table -->
    <div style="background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
        <!-- Table Header -->
        <div style="display: grid; grid-template-columns: 1fr 150px 150px 120px 120px; gap: 16px; padding: 16px 20px; background: var(--gray-50); border-bottom: 2px solid var(--gray-200); font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em;">
            <div>Judul Artikel</div>
            <div>Kategori</div>
            <div>Tanggal Publish</div>
            <div>Status</div>
            <div style="text-align: right;">Aksi</div>
        </div>

        <!-- Table Body -->
        <div style="display: flex; flex-direction: column;">
            @forelse($articles as $article)
                <div style="display: grid; grid-template-columns: 1fr 150px 150px 120px 120px; gap: 16px; padding: 20px; border-bottom: 1px solid var(--gray-100); align-items: center; transition: background 0.2s;"
                     onmouseover="this.style.background='var(--gray-50)'"
                     onmouseout="this.style.background='white'">
                    
                    <!-- Article Info -->
                    <div>
                        <div style="font-weight: 700; color: var(--navy-900); font-size: 0.95rem; margin-bottom: 4px;">{{ $article->title }}</div>
                        <div style="font-size: 0.8rem; color: var(--gray-500);">{{ Str::limit($article->excerpt, 80) }}</div>
                    </div>
                    
                    <!-- Category -->
                    <div>
                        <span style="display: inline-flex; padding: 6px 12px; border-radius: 100px; font-size: 0.75rem; font-weight: 600; background: #dbeafe; color: #2563eb;">
                            {{ $article->category ?? 'Umum' }}
                        </span>
                    </div>
                    
                    <!-- Published Date -->
                    <div style="font-size: 0.875rem; color: var(--gray-600);">
                        {{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}
                    </div>
                    
                    <!-- Status -->
                    <div>
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 100px; font-size: 0.75rem; font-weight: 600; {{ $article->is_published ? 'background: #dcfce7; color: #16a34a;' : 'background: var(--gray-100); color: var(--gray-600);' }}">
                            <span style="width: 6px; height: 6px; border-radius: 50%; {{ $article->is_published ? 'background: #16a34a;' : 'background: var(--gray-400);' }}"></span>
                            {{ $article->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                    
                    <!-- Actions -->
                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <a href="{{ route('admin.articles.edit', $article) }}" style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #dbeafe; color: #2563eb; transition: all 0.2s;"
                           onmouseover="this.style.background='#2563eb'; this.style.color='white'"
                           onmouseout="this.style.background='#dbeafe'; this.style.color='#2563eb'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #fee2e2; color: #dc2626; border: none; cursor: pointer; transition: all 0.2s;"
                                    onmouseover="this.style.background='#dc2626'; this.style.color='white'"
                                    onmouseout="this.style.background='#fee2e2'; this.style.color='#dc2626'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"/>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="padding: 60px 20px; text-align: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--gray-300)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 16px;">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--navy-900); margin-bottom: 8px;">Belum Ada Artikel</h3>
                    <p style="color: var(--gray-500); font-size: 0.9rem; margin-bottom: 20px;">Mulai dengan menulis artikel pertama Anda</p>
                    <a href="{{ route('admin.articles.create') }}" class="btn-action green" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Tambah Artikel Baru
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>

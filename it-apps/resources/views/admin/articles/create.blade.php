<x-admin-layout>
    @section('page-title', 'Tambah Artikel Baru')
    
    <div style="max-width: 900px;">
        <!-- Header dengan Back Button -->
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
            <a href="{{ route('admin.articles.index') }}" style="display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: white; border-radius: 10px; text-decoration: none; color: var(--gray-600); font-size: 0.9rem; font-weight: 500; transition: all 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
               onmouseover="this.style.background='var(--blue-50)'; this.style.color='var(--blue-600)'; this.style.transform='translateX(-2px)'"
               onmouseout="this.style.background='white'; this.style.color='var(--gray-600)'; this.style.transform='translateX(0)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <form action="{{ route('admin.articles.store') }}" method="POST" style="background: white; border-radius: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden;">
            @csrf
            
            <!-- Form Header -->
            <div style="padding: 32px 40px; border-bottom: 1px solid var(--gray-100); background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-900); margin-bottom: 8px; letter-spacing: -0.02em;">Tambah Artikel Baru</h2>
                <p style="color: var(--gray-500); font-size: 0.9rem;">Buat konten artikel blog baru untuk website</p>
            </div>

            <!-- Form Content -->
            <div style="padding: 40px;">
                <div style="display: flex; flex-direction: column; gap: 28px;">
                    
                    <!-- Title & Category Row -->
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
                        <div>
                            <label for="title" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Judul Artikel <span style="color: #dc2626;">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Contoh: 5 Cara Merawat Laptop Agar Awet"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); font-weight: 500;"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                            @error('title')
                                <p style="margin-top: 8px; font-size: 0.8rem; color: #dc2626; font-weight: 500;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="category" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Kategori
                            </label>
                            <input type="text" name="category" id="category" value="{{ old('category', 'Tips') }}" placeholder="Tips"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Slug (URL) <span style="color: var(--gray-400); font-weight: 400; font-size: 0.8rem;">- akan otomatis jika kosong</span>
                        </label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--gray-400); font-size: 0.9rem; font-family: 'IBM Plex Mono', monospace;">techfix.com/article/</span>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="cara-merawat-laptop"
                                style="width: 100%; padding: 14px 18px 14px 220px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'IBM Plex Mono', monospace; font-size: 0.9rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Ringkasan Singkat <span style="color: #dc2626;">*</span>
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3" required placeholder="Tulis ringkasan singkat tentang artikel ini (1-2 kalimat)"
                            style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); resize: vertical; line-height: 1.6;"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p style="margin-top: 8px; font-size: 0.8rem; color: #dc2626; font-weight: 500;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Konten Artikel <span style="color: #dc2626;">*</span>
                        </label>
                        <textarea name="content" id="content" rows="15" required placeholder="Tulis konten artikel lengkap di sini. Gunakan paragraf yang jelas dan mudah dibaca..."
                            style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); resize: vertical; line-height: 1.8;"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">{{ old('content') }}</textarea>
                        @error('content')
                            <p style="margin-top: 8px; font-size: 0.8rem; color: #dc2626; font-weight: 500;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Read Time & Published Date Row -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                        <div>
                            <label for="read_time" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Waktu Baca (menit)
                            </label>
                            <input type="number" name="read_time" id="read_time" value="{{ old('read_time', 5) }}" placeholder="5" min="1"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                        <div>
                            <label for="published_at" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Tanggal Publish
                            </label>
                            <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                    </div>

                    <!-- Is Published -->
                    <div style="padding: 20px; background: linear-gradient(135deg, var(--gray-50) 0%, white 100%); border-radius: 12px; border: 2px solid var(--gray-200);">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}
                                style="width: 22px; height: 22px; border: 2px solid var(--gray-300); border-radius: 6px; cursor: pointer; accent-color: var(--blue-600);">
                            <label for="is_published" style="flex: 1;">
                                <span style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--gray-800); margin-bottom: 4px;">Publikasikan Artikel</span>
                                <span style="font-size: 0.85rem; color: var(--gray-500);">Centang untuk menampilkan artikel di website</span>
                            </label>
                            <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; {{ old('is_published', true) ? 'background: #dcfce7; color: #16a34a;' : 'background: var(--gray-100); color: var(--gray-600);' }}">
                                <span style="width: 8px; height: 8px; border-radius: 50%; {{ old('is_published', true) ? 'background: #16a34a;' : 'background: var(--gray-400);' }}"></span>
                                {{ old('is_published', true) ? 'Published' : 'Draft' }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Form Actions -->
            <div style="padding: 24px 40px; background: var(--gray-50); border-top: 1px solid var(--gray-200); display: flex; gap: 16px; justify-content: flex-end;">
                <a href="{{ route('admin.articles.index') }}" style="padding: 14px 28px; background: white; color: var(--gray-700); border: 2px solid var(--gray-200); border-radius: 12px; text-decoration: none; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 600; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px;"
                   onmouseover="this.style.background='var(--gray-50)'; this.style.borderColor='var(--gray-300)'"
                   onmouseout="this.style.background='white'; this.style.borderColor='var(--gray-200)'">
                    Batal
                </a>
                <button type="submit" style="padding: 14px 32px; background: #16a34a; color: white; border: none; border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 2px 8px rgba(22,163,74,0.2);"
                        onmouseover="this.style.background='#15803d'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 16px rgba(22,163,74,0.3)'"
                        onmouseout="this.style.background='#16a34a'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(22,163,74,0.2)'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Buat Artikel
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>

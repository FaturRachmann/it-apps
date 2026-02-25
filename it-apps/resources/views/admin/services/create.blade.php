<x-admin-layout>
    @section('page-title', 'Tambah Layanan Baru')
    
    <div style="max-width: 800px;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
            <a href="{{ route('admin.services.index') }}" style="display: inline-flex; align-items: center; gap: 6px; color: var(--gray-500); text-decoration: none; font-size: 0.9rem; transition: color 0.2s;"
               onmouseover="this.style.color='var(--blue-600)'"
               onmouseout="this.style.color='var(--gray-500)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" style="background: white; border-radius: 16px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            @csrf
            
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <!-- Title -->
                <div>
                    <label for="title" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                        Nama Layanan <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Contoh: Service Komputer & Laptop"
                        style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                        onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                        onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                    @error('title')
                        <p style="margin-top: 6px; font-size: 0.8rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                        Slug (URL) <span style="color: var(--gray-400); font-weight: 400;">(opsional, otomatis dibuat)</span>
                    </label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="service-komputer-laptop"
                        style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); font-family: 'IBM Plex Mono', monospace;"
                        onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                        onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                    @error('slug')
                        <p style="margin-top: 6px; font-size: 0.8rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Description -->
                <div>
                    <label for="short_description" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                        Deskripsi Singkat <span style="color: #dc2626;">*</span>
                    </label>
                    <textarea name="short_description" id="short_description" rows="3" required placeholder="Deskripsi singkat untuk ditampilkan di card layanan"
                        style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); resize: vertical;"
                        onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                        onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">{{ old('short_description') }}</textarea>
                    @error('short_description')
                        <p style="margin-top: 6px; font-size: 0.8rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Full Description -->
                <div>
                    <label for="full_description" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                        Deskripsi Lengkap <span style="color: var(--gray-400); font-weight: 400;">(opsional)</span>
                    </label>
                    <textarea name="full_description" id="full_description" rows="6" placeholder="Deskripsi lengkap tentang layanan, cakupan pekerjaan, dll"
                        style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); resize: vertical;"
                        onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                        onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">{{ old('full_description') }}</textarea>
                </div>

                <!-- Price & Display Order -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label for="estimated_price" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                            Harga <span style="color: var(--gray-400); font-weight: 400;">(opsional)</span>
                        </label>
                        <input type="text" name="estimated_price" id="estimated_price" value="{{ old('estimated_price') }}" placeholder="Rp 150.000"
                            style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        @error('estimated_price')
                            <p style="margin-top: 6px; font-size: 0.8rem; color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="display_order" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                            Urutan Tampil <span style="color: var(--gray-400); font-weight: 400;">(opsional)</span>
                        </label>
                        <input type="number" name="display_order" id="display_order" value="{{ old('display_order', 0) }}" placeholder="0"
                            style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                    </div>
                </div>

                <!-- Price Note -->
                <div>
                    <label for="price_note" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                        Catatan Harga <span style="color: var(--gray-400); font-weight: 400;">(opsional)</span>
                    </label>
                    <input type="text" name="price_note" id="price_note" value="{{ old('price_note') }}" placeholder="Contoh: Harga dapat bervariasi tergantung kerusakan"
                        style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                        onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                        onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                </div>

                <!-- Is Active -->
                <div style="display: flex; align-items: center; gap: 12px; padding: 16px; background: var(--gray-50); border-radius: 10px;">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        style="width: 20px; height: 20px; border: 1.5px solid var(--gray-300); border-radius: 6px; cursor: pointer; accent-color: var(--blue-600);">
                    <label for="is_active" style="font-size: 0.9rem; font-weight: 600; color: var(--gray-700); cursor: pointer;">
                        Aktif (tampilkan di website)
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div style="display: flex; gap: 12px; margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--gray-200);">
                <button type="submit" style="flex: 1; background: var(--blue-600); color: white; padding: 14px 24px; border: none; border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 600; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px;"
                        onmouseover="this.style.background='var(--blue-500)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(37,99,235,0.3)'"
                        onmouseout="this.style.background='var(--blue-600)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Simpan Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" style="flex: 1; background: var(--gray-100); color: var(--navy-900); padding: 14px 24px; border-radius: 10px; text-align: center; text-decoration: none; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 600; transition: all 0.2s; display: flex; align-items: center; justify-content: center;"
                   onmouseover="this.style.background='var(--gray-200)'"
                   onmouseout="this.style.background='var(--gray-100)'">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>

<x-admin-layout>
    @section('page-title', 'Tambah Service Baru')

    <div style="max-width: 900px;">
        <!-- Header dengan Back Button -->
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
            <a href="{{ route('admin.services.index') }}" style="display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: white; border-radius: 10px; text-decoration: none; color: var(--gray-600); font-size: 0.9rem; font-weight: 500; transition: all 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
               onmouseover="this.style.background='var(--blue-50)'; this.style.color='var(--blue-600)'; this.style.transform='translateX(-2px)'"
               onmouseout="this.style.background='white'; this.style.color='var(--gray-600)'; this.style.transform='translateX(0)'">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <form action="{{ route('admin.services.store') }}" method="POST" style="background: white; border-radius: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden;">
            @csrf

            <!-- Form Header -->
            <div style="padding: 32px 40px; border-bottom: 1px solid var(--gray-100); background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-900); margin-bottom: 8px; letter-spacing: -0.02em;">Tambah Service Baru</h2>
                <p style="color: var(--gray-500); font-size: 0.9rem;">Tambahkan service baru ke website Anda</p>
            </div>

            <!-- Form Content -->
            <div style="padding: 40px;">
                <div style="display: flex; flex-direction: column; gap: 28px;">

                    <!-- Title & Slug Row -->
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
                        <div>
                            <label for="title" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Nama Service <span style="color: #dc2626;">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Masukkan nama service"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); font-weight: 500;"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                            @error('title')
                                <p style="margin-top: 8px; font-size: 0.8rem; color: #dc2626; font-weight: 500;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="slug" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Slug <span style="color: var(--gray-400); font-weight: 400; font-size: 0.8rem;">- opsional</span>
                            </label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="nama-service"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'IBM Plex Mono', monospace; font-size: 0.9rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="short_description" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Deskripsi Singkat <span style="color: #dc2626;">*</span>
                        </label>
                        <textarea name="short_description" id="short_description" rows="2" required placeholder="Deskripsi singkat tentang service ini (1-2 kalimat)"
                            style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); resize: vertical; line-height: 1.6;"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p style="margin-top: 8px; font-size: 0.8rem; color: #dc2626; font-weight: 500;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Full Description -->
                    <div>
                        <label for="full_description" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Deskripsi Lengkap <span style="color: #dc2626;">*</span>
                        </label>
                        <textarea name="full_description" id="full_description" rows="8" required placeholder="Deskripsi lengkap tentang service Anda..."
                            style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50); resize: vertical; line-height: 1.8;"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">{{ old('full_description') }}</textarea>
                        @error('full_description')
                            <p style="margin-top: 8px; font-size: 0.8rem; color: #dc2626; font-weight: 500;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price & Display Order Row -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                        <div>
                            <label for="estimated_price" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Estimasi Harga
                            </label>
                            <input type="text" name="estimated_price" id="estimated_price" value="{{ old('estimated_price') }}" placeholder="Rp 150.000"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                        <div>
                            <label for="display_order" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                                Urutan Tampil
                            </label>
                            <input type="number" name="display_order" id="display_order" value="{{ old('display_order', 1) }}" placeholder="1" min="1"
                                style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        </div>
                    </div>

                    <!-- Price Note -->
                    <div>
                        <label for="price_note" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Catatan Harga
                        </label>
                        <input type="text" name="price_note" id="price_note" value="{{ old('price_note') }}" placeholder="Harga dapat bervariasi tergantung..."
                            style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        <p style="margin-top: 6px; font-size: 0.8rem; color: var(--gray-500);">Contoh: "Harga dapat bervariasi tergantung kerusakan dan suku cadang"</p>
                    </div>

                    <!-- Icon URL -->
                    <div>
                        <label for="icon_url" style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--gray-700); margin-bottom: 10px; letter-spacing: 0.02em;">
                            Icon (Flowbite Icon Name)
                        </label>
                        <input type="text" name="icon_url" id="icon_url" value="{{ old('icon_url') }}" placeholder="computer, wifi, security, dll"
                            style="width: 100%; padding: 14px 18px; border: 2px solid var(--gray-200); border-radius: 12px; font-family: 'IBM Plex Mono', monospace; font-size: 0.9rem; color: var(--gray-800); transition: all 0.2s; outline: none; background: var(--gray-50);"
                            onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.1)'"
                            onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'">
                        <p style="margin-top: 6px; font-size: 0.8rem; color: var(--gray-500);">Gunakan nama icon dari Flowbite Icons (contoh: computer, wifi, security, backup, home, consult)</p>
                    </div>

                    <!-- Is Active -->
                    <div style="padding: 20px; background: linear-gradient(135deg, var(--gray-50) 0%, white 100%); border-radius: 12px; border: 2px solid var(--gray-200);">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                style="width: 22px; height: 22px; border: 2px solid var(--gray-300); border-radius: 6px; cursor: pointer; accent-color: var(--blue-600);">
                            <label for="is_active" style="flex: 1;">
                                <span style="display: block; font-size: 0.95rem; font-weight: 700; color: var(--gray-800); margin-bottom: 4px;">Aktifkan Service</span>
                                <span style="font-size: 0.85rem; color: var(--gray-500);">Centang untuk menampilkan service di website</span>
                            </label>
                            <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 100px; font-size: 0.75rem; font-weight: 700; {{ old('is_active', true) ? 'background: #dcfce7; color: #16a34a;' : 'background: var(--gray-100); color: var(--gray-600);' }}">
                                <span style="width: 8px; height: 8px; border-radius: 50%; {{ old('is_active', true) ? 'background: #16a34a;' : 'background: var(--gray-400);' }}"></span>
                                Active
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Form Actions -->
            <div style="padding: 24px 40px; background: var(--gray-50); border-top: 1px solid var(--gray-200); display: flex; gap: 16px; justify-content: flex-end;">
                <a href="{{ route('admin.services.index') }}" style="padding: 14px 28px; background: white; color: var(--gray-700); border: 2px solid var(--gray-200); border-radius: 12px; text-decoration: none; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 600; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px;"
                   onmouseover="this.style.background='var(--gray-50)'; this.style.borderColor='var(--gray-300)'"
                   onmouseout="this.style.background='white'; this.style.borderColor='var(--gray-200)'">
                    Batal
                </a>
                <button type="submit" style="padding: 14px 32px; background: var(--blue-600); color: white; border: none; border-radius: 12px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 2px 8px rgba(37,99,235,0.2);"
                        onmouseover="this.style.background='var(--blue-500)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 16px rgba(37,99,235,0.3)'"
                        onmouseout="this.style.background='var(--blue-600)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(37,99,235,0.2)'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Simpan Service
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>

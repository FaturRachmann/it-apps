<x-admin-layout>
    @section('page-title', 'Kelola Layanan')
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--navy-900); margin-bottom: 4px;">Daftar Layanan</h2>
            <p style="color: var(--gray-500); font-size: 0.9rem;">Kelola semua layanan IT yang ditawarkan</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn-action blue" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Tambah Layanan Baru
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

    <!-- Services Table -->
    <div style="background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
        <!-- Table Header -->
        <div style="display: grid; grid-template-columns: 40px 1fr 180px 100px 100px 120px; gap: 16px; padding: 16px 20px; background: var(--gray-50); border-bottom: 2px solid var(--gray-200); font-size: 0.75rem; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.05em;">
            <div>#</div>
            <div>Layanan</div>
            <div>Harga</div>
            <div>Urutan</div>
            <div>Status</div>
            <div style="text-align: right;">Aksi</div>
        </div>

        <!-- Table Body -->
        <div style="display: flex; flex-direction: column;">
            @forelse($services as $index => $service)
                <div style="display: grid; grid-template-columns: 40px 1fr 180px 100px 100px 120px; gap: 16px; padding: 20px; border-bottom: 1px solid var(--gray-100); align-items: center; transition: background 0.2s;"
                     onmouseover="this.style.background='var(--gray-50)'"
                     onmouseout="this.style.background='white'">
                    
                    <!-- Order Number -->
                    <div style="font-size: 0.875rem; font-weight: 600; color: var(--gray-400);">{{ $index + 1 }}</div>
                    
                    <!-- Service Info -->
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <div style="width: 48px; height: 48px; border-radius: 12px; background: #dbeafe; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            @if($service->icon_svg)
                                {!! $service->icon_svg !!}
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--navy-900); font-size: 0.95rem;">{{ $service->title }}</div>
                            <div style="font-size: 0.8rem; color: var(--gray-500); margin-top: 2px;">{{ Str::limit($service->short_description, 60) }}</div>
                        </div>
                    </div>
                    
                    <!-- Price -->
                    <div>
                        <div style="font-weight: 700; color: var(--blue-600); font-size: 0.95rem;">{{ $service->estimated_price ?? '-' }}</div>
                        @if($service->price_note)
                            <div style="font-size: 0.75rem; color: var(--gray-400); margin-top: 2px;">{{ Str::limit($service->price_note, 20) }}</div>
                        @endif
                    </div>
                    
                    <!-- Display Order -->
                    <div style="font-size: 0.875rem; color: var(--gray-600);">{{ $service->display_order ?? 0 }}</div>
                    
                    <!-- Status -->
                    <div>
                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 100px; font-size: 0.75rem; font-weight: 600; {{ $service->is_active ? 'background: #dcfce7; color: #16a34a;' : 'background: var(--gray-100); color: var(--gray-600);' }}">
                            <span style="width: 6px; height: 6px; border-radius: 50%; {{ $service->is_active ? 'background: #16a34a;' : 'background: var(--gray-400);' }}"></span>
                            {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    
                    <!-- Actions -->
                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <a href="{{ route('admin.services.edit', $service) }}" style="display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: #dbeafe; color: #2563eb; transition: all 0.2s;"
                           onmouseover="this.style.background='#2563eb'; this.style.color='white'"
                           onmouseout="this.style.background='#dbeafe'; this.style.color='#2563eb'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
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
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                    </svg>
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: var(--navy-900); margin-bottom: 8px;">Belum Ada Layanan</h3>
                    <p style="color: var(--gray-500); font-size: 0.9rem; margin-bottom: 20px;">Mulai dengan menambahkan layanan pertama Anda</p>
                    <a href="{{ route('admin.services.create') }}" class="btn-action blue" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Tambah Layanan Baru
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>

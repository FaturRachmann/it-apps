<x-app-layout>

    <!-- Article Detail Page -->
    <article style="background: var(--gray-50); min-height: 100vh; padding: 40px 24px;">
        <div class="container" style="max-width: 900px; margin: 0 auto;">
            
            <!-- Breadcrumb -->
            <nav style="margin-bottom: 32px;">
                <div style="display: flex; align-items: center; gap: 8px; font-size: 0.875rem; color: var(--gray-500);">
                    <a href="{{ route('home') }}" style="color: var(--gray-500); text-decoration: none; transition: color 0.2s;"
                       onmouseover="this.style.color='var(--blue-600)'"
                       onmouseout="this.style.color='var(--gray-500)'">
                        Beranda
                    </a>
                    <span style="color: var(--gray-300);">/</span>
                    <a href="{{ route('articles.index') }}" style="color: var(--gray-500); text-decoration: none; transition: color 0.2s;"
                       onmouseover="this.style.color='var(--blue-600)'"
                       onmouseout="this.style.color='var(--gray-500)'">
                        Artikel
                    </a>
                    <span style="color: var(--gray-300);">/</span>
                    <span style="color: var(--gray-800); font-weight: 500;">{{ Str::limit($article->title, 50) }}</span>
                </div>
            </nav>

            <!-- Article Card -->
            <div style="background: white; border-radius: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden;">
                
                <!-- Article Header -->
                <div style="padding: 48px 48px 32px; background: linear-gradient(135deg, {{ $article->gradient ?? '#dbeafe' }}, {{ $article->gradient2 ?? '#bfdbfe' }});">
                    <!-- Category Badge -->
                    @if($article->category)
                    <span style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: rgba(255,255,255,0.9); border-radius: 100px; font-size: 0.8rem; font-weight: 700; color: var(--blue-600); margin-bottom: 20px; text-transform: uppercase; letter-spacing: 0.05em;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--blue-600);"></span>
                        {{ $article->category }}
                    </span>
                    @endif

                    <!-- Title -->
                    <h1 style="font-size: 2.25rem; font-weight: 800; color: var(--navy-900); line-height: 1.3; margin-bottom: 24px; letter-spacing: -0.02em;">
                        {{ $article->title }}
                    </h1>

                    <!-- Excerpt -->
                    <p style="font-size: 1.125rem; color: var(--gray-700); line-height: 1.8; margin-bottom: 32px; max-width: 700px;">
                        {{ $article->excerpt }}
                    </p>

                    <!-- Meta Info -->
                    <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--blue-600); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.125rem;">
                                {{ substr($article->title, 0, 1) }}
                            </div>
                            <div>
                                <div style="font-weight: 600; color: var(--navy-900); font-size: 0.95rem;">TechFix Team</div>
                                <div style="font-size: 0.8rem; color: var(--gray-600);">Tim Editorial TechFix</div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 16px; color: var(--gray-600); font-size: 0.875rem;">
                            @if($article->published_at)
                            <span style="display: flex; align-items: center; gap: 6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                {{ $article->published_at->isoFormat('D MMMM YYYY') }}
                            </span>
                            @endif
                            @if($article->read_time)
                            <span style="display: flex; align-items: center; gap: 6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                {{ $article->read_time }} menit baca
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Article Content -->
                <div style="padding: 48px;">
                    <!-- Content -->
                    <div class="article-content" style="font-size: 1.05rem; line-height: 1.9; color: var(--gray-700);">
                        {!! $article->content !!}
                    </div>

                    <!-- Content Styling -->
                    <style>
                        .article-content h2 {
                            font-size: 1.75rem;
                            font-weight: 800;
                            color: var(--navy-900);
                            margin: 40px 0 20px;
                            letter-spacing: -0.02em;
                        }
                        .article-content h3 {
                            font-size: 1.35rem;
                            font-weight: 700;
                            color: var(--navy-800);
                            margin: 32px 0 16px;
                            letter-spacing: -0.01em;
                        }
                        .article-content p {
                            margin-bottom: 20px;
                            text-align: justify;
                        }
                        .article-content ul,
                        .article-content ol {
                            margin: 20px 0;
                            padding-left: 24px;
                        }
                        .article-content li {
                            margin-bottom: 12px;
                            line-height: 1.8;
                        }
                        .article-content strong {
                            font-weight: 700;
                            color: var(--navy-900);
                        }
                        .article-content blockquote {
                            border-left: 4px solid var(--blue-600);
                            padding: 20px 24px;
                            margin: 32px 0;
                            background: var(--gray-50);
                            border-radius: 0 12px 12px 0;
                            font-style: italic;
                            color: var(--gray-700);
                        }
                        .article-content a {
                            color: var(--blue-600);
                            text-decoration: underline;
                            text-underline-offset: 2px;
                        }
                        .article-content a:hover {
                            color: var(--blue-700);
                        }
                    </style>

                    <!-- Share & Tags -->
                    <div style="margin-top: 48px; padding-top: 32px; border-top: 2px solid var(--gray-100); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                        <!-- Share Buttons -->
                        <div>
                            <span style="font-size: 0.875rem; font-weight: 600; color: var(--gray-600); margin-right: 12px;">Bagikan:</span>
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . route('articles.show', $article->slug)) }}" target="_blank" 
                               style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 10px; background: #25d366; color: white; margin-right: 8px; transition: all 0.2s; text-decoration: none;"
                               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(37,211,102,0.3)'"
                               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('articles.show', $article->slug)) }}" target="_blank"
                               style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 10px; background: #1877f2; color: white; margin-right: 8px; transition: all 0.2s; text-decoration: none;"
                               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(24,119,242,0.3)'"
                               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Back to Articles -->
                        <a href="{{ route('articles.index') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: var(--gray-100); color: var(--gray-700); border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s;"
                           onmouseover="this.style.background='var(--gray-200)'; this.style.transform='translateX(-4px)'"
                           onmouseout="this.style.background='var(--gray-100)'; this.style.transform='translateX(0)'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H5M12 19l-7-7 7-7"/>
                            </svg>
                            Kembali ke Artikel
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Articles -->
            @isset($relatedArticles)
            @if($relatedArticles->count() > 0)
            <section style="margin-top: 64px;">
                <h2 style="font-size: 1.75rem; font-weight: 800; color: var(--navy-900); margin-bottom: 32px; letter-spacing: -0.02em;">
                    Artikel Terkait
                </h2>
                <div class="articles-grid">
                    @foreach($relatedArticles->take(3) as $relatedArticle)
                        <x-article-card :article="$relatedArticle" />
                    @endforeach
                </div>
            </section>
            @endif
            @endisset

            <!-- CTA Banner -->
            <section style="margin-top: 64px; background: linear-gradient(135deg, var(--navy-900), var(--navy-800)); border-radius: 20px; padding: 48px; text-align: center; color: white;">
                <h2 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 16px; letter-spacing: -0.02em;">
                    Butuh Bantuan IT Profesional?
                </h2>
                <p style="font-size: 1.05rem; color: var(--gray-400); margin-bottom: 32px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    TechFix siap membantu semua kebutuhan IT Anda. Dari service laptop hingga instalasi jaringan, kami solusinya.
                </p>
                <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                    <button onclick="openWA()" class="btn-wa" style="display: inline-flex; align-items: center; gap: 10px; padding: 14px 32px; background: #25d366; color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.2s;"
                            onmouseover="this.style.background='#1fb857'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(37,211,102,0.3)'"
                            onmouseout="this.style.background='#25d366'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.895-1.424A9.956 9.956 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2"/>
                        </svg>
                        Hubungi via WhatsApp
                    </button>
                    <a href="{{ route('contact.index') }}" style="display: inline-flex; align-items: center; padding: 14px 32px; background: rgba(255,255,255,0.1); color: white; border: 1.5px solid rgba(255,255,255,0.3); border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.2s;"
                       onmouseover="this.style.background='rgba(255,255,255,0.2)'; this.style.borderColor='rgba(255,255,255,0.5)'"
                       onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.3)'">
                        Hubungi Kami
                    </a>
                </div>
            </section>

        </div>
    </article>

</x-app-layout>

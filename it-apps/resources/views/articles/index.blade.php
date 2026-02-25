<x-app-layout>

    <!-- ARTICLES SECTION -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Resources</div>
                <h2>Latest Articles & Insights</h2>
                <p>Expert tips, guides, and industry insights to help you make informed technology decisions.</p>
            </div>

            <!-- Search and Filter -->
            <div style="display: flex; gap: 12px; margin-bottom: 48px; flex-wrap: wrap; justify-content: center;">
                <input type="search" placeholder="Search articles..." style="padding: 12px 18px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; background: var(--gray-50); min-width: 280px;">
                <select style="padding: 12px 18px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.9rem; background: var(--gray-50);">
                    <option value="">All Categories</option>
                    <option value="tips">Tips & Guides</option>
                    <option value="security">Security</option>
                    <option value="network">Network</option>
                    <option value="hardware">Hardware</option>
                </select>
            </div>

            <div class="articles-page-grid">
                @isset($articles)
                    @forelse($articles as $article)
                        <x-article-card :article="$article" />
                    @empty
                        <!-- Default articles when no data -->
                        <div class="article-card">
                            <div class="article-img" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: var(--blue-600);">
                                    <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3M3.343 7.05l.707.707M6 12a6 6 0 016-6v0a6 6 0 016 6"/>
                                </svg>
                            </div>
                            <div class="article-body">
                                <div class="article-tag">Guide</div>
                                <h3>Essential Laptop Maintenance Tips</h3>
                                <p>Keep your laptop running smoothly with these proven maintenance practices.</p>
                                <div class="article-meta">
                                    <span>5 min read</span>
                                    <span>•</span>
                                    <span>Jan 12, 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-card">
                            <div class="article-img" style="background: linear-gradient(135deg, #fef3c7, #fde68a);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #92400e;">
                                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                                </svg>
                            </div>
                            <div class="article-body">
                                <div class="article-tag">Security</div>
                                <h3>Protecting Your Business from Ransomware</h3>
                                <p>Comprehensive guide to safeguarding your data from increasingly sophisticated attacks.</p>
                                <div class="article-meta">
                                    <span>7 min read</span>
                                    <span>•</span>
                                    <span>Jan 10, 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-card">
                            <div class="article-img" style="background: linear-gradient(135deg, #d1fae5, #a7f3d0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #059669;">
                                    <rect x="2" y="2" width="6" height="6"/>
                                    <rect x="16" y="2" width="6" height="6"/>
                                    <rect x="2" y="16" width="6" height="6"/>
                                    <rect x="16" y="16" width="6" height="6"/>
                                </svg>
                            </div>
                            <div class="article-body">
                                <div class="article-tag">Network</div>
                                <h3>Optimizing WiFi for Remote Work</h3>
                                <p>Improve your home network performance for seamless work-from-home experience.</p>
                                <div class="article-meta">
                                    <span>4 min read</span>
                                    <span>•</span>
                                    <span>Jan 8, 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-card">
                            <div class="article-img" style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #db2777;">
                                    <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                                </svg>
                            </div>
                            <div class="article-body">
                                <div class="article-tag">Hardware</div>
                                <h3>When to Upgrade Your RAM</h3>
                                <p>Identify the signs that your computer needs a memory upgrade for better performance.</p>
                                <div class="article-meta">
                                    <span>3 min read</span>
                                    <span>•</span>
                                    <span>Jan 5, 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-card">
                            <div class="article-img" style="background: linear-gradient(135deg, #e0e7ff, #c7d2fe);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #4f46e5;">
                                    <path d="M17.5 19c0-1.7-1.3-3-3-3h-5c-1.7 0-3 1.3-3 3M12 3v13"/>
                                    <path d="M8 8h8M6 11h12"/>
                                </svg>
                            </div>
                            <div class="article-body">
                                <div class="article-tag">Cloud</div>
                                <h3>Google Drive vs OneDrive Comparison</h3>
                                <p>Detailed comparison of leading cloud storage solutions for personal and business use.</p>
                                <div class="article-meta">
                                    <span>6 min read</span>
                                    <span>•</span>
                                    <span>Jan 3, 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-card">
                            <div class="article-img" style="background: linear-gradient(135deg, #ffedd5, #fed7aa);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #ea580c;">
                                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                                </svg>
                            </div>
                            <div class="article-body">
                                <div class="article-tag">Guide</div>
                                <h3>Smartphone Data Backup Best Practices</h3>
                                <p>Ensure your mobile data is secure with these essential backup strategies.</p>
                                <div class="article-meta">
                                    <span>4 min read</span>
                                    <span>•</span>
                                    <span>Jan 1, 2025</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                @else
                    <!-- Default articles when no variable passed -->
                    <div class="article-card">
                        <div class="article-img" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: var(--blue-600);">
                                <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3M3.343 7.05l.707.707M6 12a6 6 0 016-6v0a6 6 0 016 6"/>
                            </svg>
                        </div>
                        <div class="article-body">
                            <div class="article-tag">Guide</div>
                            <h3>Essential Laptop Maintenance Tips</h3>
                            <p>Keep your laptop running smoothly with these proven maintenance practices.</p>
                            <div class="article-meta">
                                <span>5 min read</span>
                                <span>•</span>
                                <span>Jan 12, 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-img" style="background: linear-gradient(135deg, #fef3c7, #fde68a);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #92400e;">
                                <rect x="3" y="11" width="18" height="11" rx="2"/>
                                <path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                        </div>
                        <div class="article-body">
                            <div class="article-tag">Security</div>
                            <h3>Protecting Your Business from Ransomware</h3>
                            <p>Comprehensive guide to safeguarding your data from increasingly sophisticated attacks.</p>
                            <div class="article-meta">
                                <span>7 min read</span>
                                <span>•</span>
                                <span>Jan 10, 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-img" style="background: linear-gradient(135deg, #d1fae5, #a7f3d0);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #059669;">
                                <rect x="2" y="2" width="6" height="6"/>
                                <rect x="16" y="2" width="6" height="6"/>
                                <rect x="2" y="16" width="6" height="6"/>
                                <rect x="16" y="16" width="6" height="6"/>
                            </svg>
                        </div>
                        <div class="article-body">
                            <div class="article-tag">Network</div>
                            <h3>Optimizing WiFi for Remote Work</h3>
                            <p>Improve your home network performance for seamless work-from-home experience.</p>
                            <div class="article-meta">
                                <span>4 min read</span>
                                <span>•</span>
                                <span>Jan 8, 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-img" style="background: linear-gradient(135deg, #fce7f3, #fbcfe8);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #db2777;">
                                <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                        </div>
                        <div class="article-body">
                            <div class="article-tag">Hardware</div>
                            <h3>When to Upgrade Your RAM</h3>
                            <p>Identify the signs that your computer needs a memory upgrade for better performance.</p>
                            <div class="article-meta">
                                <span>3 min read</span>
                                <span>•</span>
                                <span>Jan 5, 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-img" style="background: linear-gradient(135deg, #e0e7ff, #c7d2fe);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #4f46e5;">
                                <path d="M17.5 19c0-1.7-1.3-3-3-3h-5c-1.7 0-3 1.3-3 3M12 3v13"/>
                                <path d="M8 8h8M6 11h12"/>
                            </svg>
                        </div>
                        <div class="article-body">
                            <div class="article-tag">Cloud</div>
                            <h3>Google Drive vs OneDrive Comparison</h3>
                            <p>Detailed comparison of leading cloud storage solutions for personal and business use.</p>
                            <div class="article-meta">
                                <span>6 min read</span>
                                <span>•</span>
                                <span>Jan 3, 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="article-card">
                        <div class="article-img" style="background: linear-gradient(135deg, #ffedd5, #fed7aa);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" style="color: #ea580c;">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/>
                            </svg>
                        </div>
                        <div class="article-body">
                            <div class="article-tag">Guide</div>
                            <h3>Smartphone Data Backup Best Practices</h3>
                            <p>Ensure your mobile data is secure with these essential backup strategies.</p>
                            <div class="article-meta">
                                <span>4 min read</span>
                                <span>•</span>
                                <span>Jan 1, 2025</span>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </section>

</x-app-layout>

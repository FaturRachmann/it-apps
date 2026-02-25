<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div style="text-align: center; margin-bottom: 24px;">
        <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--navy-900); margin-bottom: 8px;">Selamat Datang</h2>
        <p style="color: var(--gray-600); font-size: 0.9rem;">Masuk ke akun Admin Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 20px;">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                Email
            </label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username"
                placeholder="admin@techfix.com"
                style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s ease; outline: none; background: var(--gray-50);"
                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'"
            />
            @if($errors->has('email'))
                <p style="margin-top: 6px; font-size: 0.8rem; color: #dc2626;">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <!-- Password -->
        <div>
            <label for="password" style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--gray-700); margin-bottom: 8px;">
                Password
            </label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required 
                autocomplete="current-password"
                placeholder="••••••••"
                style="width: 100%; padding: 12px 16px; border: 1.5px solid var(--gray-200); border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; color: var(--gray-800); transition: all 0.2s ease; outline: none; background: var(--gray-50);"
                onfocus="this.style.borderColor='var(--blue-400)'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.08)'"
                onblur="this.style.borderColor='var(--gray-200)'; this.style.background='var(--gray-50)'; this.style.boxShadow='none'"
            />
            @if($errors->has('password'))
                <p style="margin-top: 6px; font-size: 0.8rem; color: #dc2626;">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <!-- Remember Me -->
        <div style="display: flex; align-items: center; gap: 8px;">
            <input 
                id="remember_me" 
                type="checkbox" 
                name="remember"
                style="width: 18px; height: 18px; border: 1.5px solid var(--gray-300); border-radius: 6px; cursor: pointer; accent-color: var(--blue-600);"
            />
            <label for="remember_me" style="font-size: 0.9rem; color: var(--gray-700); cursor: pointer;">
                Ingat saya
            </label>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            style="width: 100%; padding: 14px; background: var(--navy-900); color: white; border: none; border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.95rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease; display: flex; align-items: center; justify-content: center; gap: 8px;"
            onmouseover="this.style.background='var(--navy-800)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 16px rgba(15,26,39,0.25)'"
            onmouseout="this.style.background='var(--navy-900)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                <polyline points="10 17 15 12 10 7"/>
                <line x1="15" y1="12" x2="3" y2="12"/>
            </svg>
            Masuk
        </button>

        @if (Route::has('password.request'))
            <div style="text-align: center; margin-top: 16px;">
                <a 
                    href="{{ route('password.request') }}" 
                    style="font-size: 0.875rem; color: var(--blue-600); text-decoration: none; font-weight: 500; transition: color 0.2s;"
                    onmouseover="this.style.color='var(--blue-700)'"
                    onmouseout="this.style.color='var(--blue-600)'"
                >
                    Lupa password Anda?
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>

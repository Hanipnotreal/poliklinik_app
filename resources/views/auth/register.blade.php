<x-layouts.guest title="Register">

<style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

/* =========================================================
   ROOT VARIABLES
========================================================= */

:root{
    --bg-primary:#050816;
    --bg-secondary:#0f172a;

    --text-primary:#f8fafc;
    --text-secondary:#94a3b8;
    --text-muted:#64748b;

    --border-color:rgba(255,255,255,.08);

    --primary:#38bdf8;
    --primary-dark:#6366f1;

    --danger:#ef4444;

    --radius-lg:18px;
    --radius-xl:24px;

    --transition:.25s ease;
}

/* =========================================================
   RESET
========================================================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Inter',sans-serif;
    background:var(--bg-primary);
}

/* =========================================================
   PAGE
========================================================= */

.register-page{
    min-height:100vh;
    display:flex;
    overflow:hidden;
    position:relative;
}

/* BACKGROUND GLOW */

.register-page::before{
    content:'';

    position:absolute;

    width:500px;
    height:500px;

    top:-180px;
    left:-150px;

    background:#2563eb;

    opacity:.14;

    filter:blur(150px);
}

.register-page::after{
    content:'';

    position:absolute;

    width:420px;
    height:420px;

    bottom:-150px;
    right:-120px;

    background:#7c3aed;

    opacity:.12;

    filter:blur(140px);
}

/* =========================================================
   LEFT SIDE
========================================================= */

.auth-brand{
    flex:1;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:80px;

    position:relative;
    z-index:2;
}

.brand-wrapper{
    width:100%;
    max-width:420px;
}

.logo-box{
    width:90px;
    height:90px;

    border-radius:28px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin-bottom:42px;

    background:linear-gradient(
        135deg,
        #0ea5e9,
        #6366f1
    );

    box-shadow:
        0 12px 40px rgba(59,130,246,.35),
        inset 0 1px 1px rgba(255,255,255,.1);

    animation:floating 4s ease-in-out infinite;
}

.logo-box img{
    width:52px;
    filter:brightness(0) invert(1);
}

@keyframes floating{

    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-8px);
    }
}

.brand-title{
    font-size:3.8rem;
    line-height:1.05;

    font-weight:800;

    color:var(--text-primary);

    letter-spacing:-2px;

    margin-bottom:18px;
}

.brand-title span{
    background:linear-gradient(
        135deg,
        #38bdf8,
        #818cf8
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.brand-subtitle{
    color:var(--text-muted);

    text-transform:uppercase;
    letter-spacing:.14em;

    margin-bottom:50px;
}

/* =========================================================
   STEPS
========================================================= */

.step-list{
    display:flex;
    flex-direction:column;
    gap:20px;
}

.step-item{
    display:flex;
    gap:16px;
}

.step-number{
    width:40px;
    height:40px;

    border-radius:14px;

    display:flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;

    font-size:.85rem;
    font-weight:700;
}

.step-blue{
    background:rgba(56,189,248,.12);
    color:#38bdf8;
}

.step-indigo{
    background:rgba(99,102,241,.12);
    color:#818cf8;
}

.step-teal{
    background:rgba(45,212,191,.12);
    color:#2dd4bf;
}

.step-content h4{
    color:var(--text-secondary);

    font-size:.92rem;

    margin-bottom:4px;
}

.step-content p{
    color:var(--text-muted);

    font-size:.82rem;

    line-height:1.6;
}

/* =========================================================
   DIVIDER
========================================================= */

.auth-divider{
    width:1px;

    background:linear-gradient(
        to bottom,
        transparent,
        rgba(255,255,255,.08),
        transparent
    );

    z-index:2;
}

/* =========================================================
   RIGHT SIDE
========================================================= */

.auth-form-section{
    width:540px;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:60px 50px;

    position:relative;
    z-index:2;

    overflow-y:auto;
}

.form-container{
    width:100%;
    max-width:420px;
}

/* =========================================================
   FORM HEADER
========================================================= */

.form-top-label{
    color:var(--primary);

    font-size:.78rem;
    font-weight:600;

    text-transform:uppercase;
    letter-spacing:.18em;

    margin-bottom:12px;
}

.form-title{
    font-size:2.4rem;
    font-weight:800;

    color:var(--text-primary);

    letter-spacing:-1px;

    margin-bottom:10px;
}

.form-description{
    color:var(--text-secondary);

    line-height:1.7;

    margin-bottom:34px;
}

/* =========================================================
   ERROR ALERT
========================================================= */

.alert-error{
    display:flex;
    align-items:center;
    gap:12px;

    padding:16px 18px;

    border-radius:16px;

    background:rgba(239,68,68,.08);

    border:1px solid rgba(239,68,68,.16);

    color:#fca5a5;

    margin-bottom:24px;
}

/* =========================================================
   FORM
========================================================= */

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;

    margin-bottom:10px;

    color:var(--text-secondary);

    font-size:.8rem;
    font-weight:600;

    text-transform:uppercase;
    letter-spacing:.08em;
}

.input-wrapper{
    height:56px;

    display:flex;
    align-items:center;

    padding:0 18px;

    border-radius:18px;

    background:rgba(255,255,255,.03);

    border:1px solid var(--border-color);

    transition:var(--transition);
}

.input-wrapper:focus-within{
    border-color:rgba(56,189,248,.45);

    background:rgba(56,189,248,.04);

    box-shadow:0 0 0 4px rgba(56,189,248,.08);
}

.input-icon{
    color:#475569;

    margin-right:14px;

    flex-shrink:0;
}

.input-wrapper input{
    flex:1;

    background:transparent;
    border:none;
    outline:none;

    color:var(--text-primary);

    font-size:.95rem;
}

.input-wrapper input::placeholder{
    color:#475569;
}

.password-toggle{
    cursor:pointer;

    color:#475569;

    transition:var(--transition);
}

.password-toggle:hover{
    color:#94a3b8;
}

/* REMOVE NUMBER ARROWS */

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button{
    -webkit-appearance:none;
}

/* GRID */

.grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
}

/* SECTION DIVIDER */

.section-divider{
    display:flex;
    align-items:center;

    gap:12px;

    margin:26px 0 20px;
}

.section-divider::before,
.section-divider::after{
    content:'';

    flex:1;
    height:1px;

    background:rgba(255,255,255,.06);
}

.section-divider span{
    color:#475569;

    font-size:.74rem;
    font-weight:600;

    letter-spacing:.14em;

    text-transform:uppercase;
}

/* BUTTON */

.btn-submit{
    width:100%;
    height:56px;

    border:none;
    border-radius:18px;

    margin-top:8px;

    cursor:pointer;

    color:white;

    font-size:.95rem;
    font-weight:700;

    background:linear-gradient(
        135deg,
        #0ea5e9,
        #6366f1
    );

    box-shadow:
        0 12px 30px rgba(99,102,241,.25);

    transition:var(--transition);
}

.btn-submit:hover{
    transform:translateY(-2px);

    box-shadow:
        0 18px 40px rgba(99,102,241,.35);
}

/* FOOTER */

.auth-footer{
    text-align:center;

    margin-top:26px;

    color:var(--text-muted);
}

.auth-footer a{
    color:var(--primary);

    text-decoration:none;

    font-weight:600;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:960px){

    .auth-brand,
    .auth-divider{
        display:none;
    }

    .auth-form-section{
        width:100%;
        padding:50px 24px;
    }

    .form-title{
        font-size:2rem;
    }

    .grid-2{
        grid-template-columns:1fr;
    }
}

</style>

<div class="register-page">

    {{-- LEFT SIDE --}}
    <section class="auth-brand">

        <div class="brand-wrapper">

            <div class="logo-box">
                <img src="{{ asset('images/logo-bengkot.png') }}" alt="Logo">
            </div>

            <h1 class="brand-title">
                Bergabung Bersama
                <span>Poliklinik</span>
            </h1>

            <p class="brand-subtitle">
                Daftar Akun Baru
            </p>

            <div class="step-list">

                <div class="step-item">

                    <div class="step-number step-blue">
                        01
                    </div>

                    <div class="step-content">
                        <h4>Isi Data Diri</h4>
                        <p>Lengkapi nama, email, dan alamat lengkap.</p>
                    </div>

                </div>

                <div class="step-item">

                    <div class="step-number step-indigo">
                        02
                    </div>

                    <div class="step-content">
                        <h4>Verifikasi Identitas</h4>
                        <p>No HP dan KTP digunakan untuk keamanan akun.</p>
                    </div>

                </div>

                <div class="step-item">

                    <div class="step-number step-teal">
                        03
                    </div>

                    <div class="step-content">
                        <h4>Buat Password</h4>
                        <p>Gunakan password yang aman dan mudah diingat.</p>
                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- DIVIDER --}}
    <div class="auth-divider"></div>

    {{-- RIGHT SIDE --}}
    <section class="auth-form-section">

        <div class="form-container">

            <p class="form-top-label">
                Poliklinik — Registrasi
            </p>

            <h2 class="form-title">
                Buat Akun Baru
            </h2>

            <p class="form-description">
                Lengkapi seluruh data berikut untuk membuat akun baru pada sistem Poliklinik.
            </p>

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="alert-error">

                    <i class="fas fa-circle-exclamation"></i>

                    <span>
                        {{ $errors->first() }}
                    </span>

                </div>

            @endif

            {{-- FORM --}}
            <form action="{{ route('register') }}" method="POST">

                @csrf

                {{-- NAMA --}}
                <div class="form-group">

                    <label>Nama Lengkap</label>

                    <div class="input-wrapper">

                        <i class="fas fa-user input-icon"></i>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                        >

                    </div>

                </div>

                {{-- EMAIL --}}
                <div class="form-group">

                    <label>Email</label>

                    <div class="input-wrapper">

                        <i class="fas fa-envelope input-icon"></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                        >

                    </div>

                </div>

                {{-- ALAMAT --}}
                <div class="form-group">

                    <label>Alamat</label>

                    <div class="input-wrapper">

                        <i class="fas fa-location-dot input-icon"></i>

                        <input
                            type="text"
                            name="alamat"
                            value="{{ old('alamat') }}"
                            placeholder="Masukkan alamat lengkap"
                            required
                        >

                    </div>

                </div>

                {{-- GRID --}}
                <div class="grid-2">

                    {{-- HP --}}
                    <div class="form-group">

                        <label>No HP</label>

                        <div class="input-wrapper">

                            <i class="fas fa-phone input-icon"></i>

                            <input
                                type="number"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                placeholder="08xxxx"
                                required
                            >

                        </div>

                    </div>

                    {{-- KTP --}}
                    <div class="form-group">

                        <label>No KTP</label>

                        <div class="input-wrapper">

                            <i class="fas fa-id-card input-icon"></i>

                            <input
                                type="number"
                                name="no_ktp"
                                value="{{ old('no_ktp') }}"
                                placeholder="16 digit"
                                required
                            >

                        </div>

                    </div>

                </div>

                {{-- SECURITY --}}
                <div class="section-divider">
                    <span>Keamanan Akun</span>
                </div>

                {{-- PASSWORD --}}
                <div class="form-group">

                    <label>Password</label>

                    <div class="input-wrapper">

                        <i class="fas fa-lock input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Minimal 8 karakter"
                            required
                        >

                        <i
                            class="fas fa-eye password-toggle"
                            id="togglePassword"
                            onclick="togglePassword('password','togglePassword')"
                        ></i>

                    </div>

                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="form-group">

                    <label>Konfirmasi Password</label>

                    <div class="input-wrapper">

                        <i class="fas fa-lock input-icon"></i>

                        <input
                            type="password"
                            name="password_confirmation"
                            id="confirmPassword"
                            placeholder="Ulangi password"
                            required
                        >

                        <i
                            class="fas fa-eye password-toggle"
                            id="toggleConfirmPassword"
                            onclick="togglePassword('confirmPassword','toggleConfirmPassword')"
                        ></i>

                    </div>

                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn-submit">

                    <i class="fas fa-user-plus"></i>

                    &nbsp;

                    Buat Akun

                </button>

            </form>

            {{-- FOOTER --}}
            <div class="auth-footer">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Masuk di sini
                </a>

            </div>

        </div>

    </section>

</div>

@push('scripts')

<script>

function togglePassword(inputId, iconId)
{
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    const isPassword = input.type === 'password';

    input.type = isPassword ? 'text' : 'password';

    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}

</script>

@endpush

</x-layouts.guest>
<h3 class="text-center mb-4" style="font-weight:700;color:var(--slate-900);">Créer un compte</h3>

<form method="POST" action="<?php echo APP_URL; ?>/auth/register">
    <div class="row">
        <div class="col-6">
            <div class="auth-input-group">
                <label for="prenom" class="form-label">Prénom</label>
                <div style="position:relative;">
                    <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Jean" required>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="auth-input-group">
                <label for="nom" class="form-label">Nom</label>
                <div style="position:relative;">
                    <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Dupont" required>
                </div>
            </div>
        </div>
    </div>
    
    <div class="auth-input-group">
        <label for="login" class="form-label">Login</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"/></svg>
            <input type="text" class="form-control" id="login" name="login" placeholder="jean.dupont" required>
        </div>
    </div>
    
    <div class="auth-input-group">
        <label for="email" class="form-label">Email</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <input type="email" class="form-control" id="email" name="email" placeholder="jean@entreprise.com" required>
        </div>
    </div>
    
    <div class="auth-input-group">
        <label for="password" class="form-label">Mot de passe</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>
    </div>
    
    <div class="auth-input-group">
        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/><circle cx="12" cy="16" r="1"/></svg>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary w-100" style="padding:12px;font-weight:600;">
        <i data-lucide="user-plus" style="width:18px;height:18px;"></i> Créer mon compte
    </button>
    
    <div class="auth-footer">
        Déjà inscrit ? <a href="<?php echo APP_URL; ?>/auth/login">Se connecter</a>
    </div>
</form>

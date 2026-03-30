<h3 class="text-center mb-4" style="font-weight:700;color:var(--slate-900);">Connexion</h3>

<form method="POST" action="<?php echo APP_URL; ?>/auth/login">
    <div class="auth-input-group">
        <label for="email" class="form-label">Email</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <input type="email" class="form-control" id="email" name="email" placeholder="nom@entreprise.com" required autofocus>
        </div>
    </div>
    
    <div class="auth-input-group">
        <label for="password" class="form-label">Mot de passe</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>
        <div class="text-end mt-1">
            <a href="<?php echo APP_URL; ?>/auth/forgot-password" class="text-sm" style="font-size: var(--font-size-xs); color: var(--primary-600); text-decoration: none; font-weight: 500;">Mot de passe oublié ?</a>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary w-100" style="padding:12px;font-weight:600;">
        <i data-lucide="log-in" style="width:18px;height:18px;"></i> Se connecter
    </button>
    
    <div class="auth-footer">
        Système de Gestion de Stock - BOLD STOCK
    </div>
</form>

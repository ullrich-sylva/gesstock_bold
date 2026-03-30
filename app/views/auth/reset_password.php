<h3 class="text-center mb-4" style="font-weight:700;color:var(--slate-900);">Réinitialisation</h3>
<p class="text-center text-muted mb-4" style="font-size: var(--font-size-sm);">Veuillez choisir un nouveau mot de passe sécurisé.</p>

<form method="POST" action="<?php echo APP_URL; ?>/auth/reset-password">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    
    <div class="auth-input-group">
        <label for="password" class="form-label">Nouveau mot de passe</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required autofocus>
        </div>
    </div>

    <div class="auth-input-group">
        <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="••••••••" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary w-100" style="padding:12px;font-weight:600;">
        <i data-lucide="check-circle" style="width:18px;height:18px;"></i> Changer le mot de passe
    </button>
</form>

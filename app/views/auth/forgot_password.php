<h3 class="text-center mb-4" style="font-weight:700;color:var(--slate-900);">Mot de passe oublié ?</h3>
<p class="text-center text-muted mb-4" style="font-size: var(--font-size-sm);">Saisissez votre adresse email pour recevoir un lien de réinitialisation.</p>

<form method="POST" action="<?php echo APP_URL; ?>/auth/forgot-password">
    <div class="auth-input-group">
        <label for="email" class="form-label">Email</label>
        <div style="position:relative;">
            <svg class="auth-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" required autofocus>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary w-100" style="padding:12px;font-weight:600;">
        <i data-lucide="send" style="width:18px;height:18px;"></i> Envoyer le lien
    </button>
    
    <div class="auth-footer">
        <a href="<?php echo APP_URL; ?>/auth/login">Retour à la connexion</a>
    </div>
</form>

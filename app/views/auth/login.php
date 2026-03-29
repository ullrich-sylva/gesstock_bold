<form method="POST" action="<?php echo APP_URL; ?>/auth/login">
    <h3 class="text-center mb-4">Connexion</h3>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required autofocus>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    
    <button type="submit" class="btn btn-primary w-100">Connexion</button>
    
    <p class="text-center mt-3">
        Pas encore inscrit? <a href="<?php echo APP_URL; ?>/auth/register">S'inscrire</a>
    </p>
</form>

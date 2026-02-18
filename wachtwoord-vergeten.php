<?php
require_once('files/header.php');
?>

<div class="container py-4 py-lg-5 my-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-0 shadow">
        <div class="card-body">

          <h2 class="h4 mb-3">Wachtwoord vergeten?</h2>
          <p class="fs-sm text-muted mb-4">
            Vul je e-mailadres in en wij sturen je een link om je wachtwoord opnieuw in te stellen.
          </p>

          <form action="wachtwoord-vergeten-logic.php" method="post">

            <div class="input-group mb-3">
              <i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
              <input 
                class="form-control rounded-start" 
                type="email" 
                name="email" 
                placeholder="Email adres" 
                required>
            </div>

            <div class="text-end pt-3">
              <button class="btn btn-primary" type="submit">
                <i class="ci-send me-2"></i>Reset link versturen
              </button>
            </div>

          </form>

          <hr class="my-4">

          <div class="text-center">
            <a href="login.php" class="fs-sm">
              Terug naar login
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once('files/footer.php');
?>

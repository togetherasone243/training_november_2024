<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Redirige l'utilisateur vers la page de login s'il n'est pas connecté
    header("Location: /login");
    exit();
}

$title = "Dashboard"; // Titre de la page
ob_start();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Bienvenue, <?= htmlspecialchars($_SESSION['user']['nom']) ?> !</h1>
            <p class="lead">Ceci est votre tableau de bord.</p>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Carte pour afficher les informations utilisateur -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Vos Informations</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user']['nom']) ?></li>
                        <li class="list-group-item"><strong>Postnom :</strong> <?= htmlspecialchars($_SESSION['user']['postnom']) ?></li>
                        <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($_SESSION['user']['prenom']) ?></li>
                        <li class="list-group-item"><strong>Matricule :</strong> <?= htmlspecialchars($_SESSION['user']['matricule']) ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Carte pour des actions possibles -->
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Actions disponibles</h5>
                    <p>Vous pouvez effectuer les actions suivantes :</p>
                    <ul>
                        <li>Voir les candidatures disponibles.</li>
                        <li>Voter pour un candidat.</li>
                        <li>Consulter les résultats des votes.</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Commencer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de déconnexion -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="/logout" class="btn btn-danger">Se déconnecter</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>

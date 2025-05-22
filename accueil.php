<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Projets</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "DM Sans", serif;
            margin: 0;
            padding: 0;
            background: #2E2E2E;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1000px;
            width: 90%;
        }

        .card {
            background: #252525;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-family: "Bebas Neue", serif;
            font-size: 28px;
            margin: 0 0 10px;
            background: linear-gradient(to right, #A300EB, #EB9C00);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .card p {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card" onclick="redirectTo('TodoList/todolist.html')">
            <h3>Projet To-Do List</h3>
            <p>Une application simple pour gérer des tâches à faire, avec ajout, suppression et suivi.</p>
        </div>
        <div class="card" onclick="redirectTo('Météo/meteo.html')">
            <h3>Projet Web Météo API</h3>
            <p>Affiche la météo en temps réel d'une ville saisie, grâce à une API météo externe.</p>
        </div>
        <div class="card" onclick="redirectTo('Convertisseur/convertisseur.html')">
            <h3>Projet Convertisseur API</h3>
            <p>Convertit des devises en temps réel grâce à une API de taux de change.</p>
        </div>
    </div>

    </div>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>

</body>

</html>
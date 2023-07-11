<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plats par catégorie</title>
    <style>
        /* Styles CSS pour la mise en page */
        .category {
            margin-bottom: 20px;
        }

        .category-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .plats-list {
            margin-left: 20px;
        }

        .plat-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .plat-name {
            flex: 1;
            margin-right: 10px;
        }

        .plat-button {
            background-color: #e5e5e5;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Plats par catégorie</h1>

    <form action="<?php echo base_url('CCategorisationPlat/getPlatsParCategorie') ?>" method="post">
        <select name="regime" id="regime">
            <?php foreach ($allRegime as $unRegime) : ?>
                <option value="<?php echo $unRegime['id']; ?>"><?php echo $unRegime['nom']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Choisir</button>
    </form>

    <?php if (isset($plats)) : ?>
        <div class="category">
            <h2 class="category-title">
            <?php 
            // echo $plat['nom']; 
                            print_r($plats)
            ?></h2>

            <?php if (isset($plats[$selectedRegime['id_regime']]) && !empty($plats[$selectedRegime['id_regime']])) : ?>
                <div class="plats-list">
                    <?php foreach ($plats[$selectedRegime['id_regime']] as $plat) : ?>
                        <div class="plat-item">
                            <div class="plat-name"><?php echo $plat['nom_plat']; ?></div>
                            <button class="plat-button">Acheter</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Aucun plat disponible pour cette catégorie.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>

</html>

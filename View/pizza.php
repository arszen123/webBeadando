<?php
/**
 * @var \Model\Pizza $pizza
 */
?>
<div id="pizza-details">
    <img width="500" height="500"
         src="<?= $pizza->getImage(500, 500) ?>"/>
    <div class="description">
        <p><?= $pizza->getName() ?></p>
        <a href="/pizza/add?id=<?= $pizza->getId() ?>">
            <button>Kosárba vele!</button>
        </a>

        <div id="descr">
            <?= $pizza->getDescription() ?>
        </div>
        <table id="price-table">
            <caption>Árjegyzék</caption>
            <thead>
            <tr>
                <th>Ár</th>
                <th>Méret</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $pizza->getPrice() ?></td>
                <td>28 cm</td>
            </tr>
            <tr>
                <td><?= $pizza->getPrice(\Model\Pizza::SIZE_38) ?></td>
                <td>38 cm</td>
            </tr>
            <tr>
                <td><?= $pizza->getPrice(\Model\Pizza::SIZE_60) ?></td>
                <td>60 cm</td>
            </tr>
            <tr>
                <td><?= $pizza->getPrice(\Model\Pizza::SIZE_100) ?></td>
                <td>100 cm (**EXTRA**)</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

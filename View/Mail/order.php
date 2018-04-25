<?php
/** @var $pizza \Model\Pizza
 * @var $model array
 */
?>
<html>
<head>
</head>
<body>
Kedves <?= $model['name'] ?>,<br/>
Rendelését felvettük. <br/>
Szállitási cim: <br/>
<?= $model['address'] ?>
<br/>
<br/>
<br/>
<div style="text-align: center">
    <table>
        <tr>
            <th>db</th>
            <th>Nagyság</th>
            <th>Név</th>
            <th>Ár</th>
        </tr>
        <?php $overall = 0; ?>
        <?php foreach ($model['pizzas'] as $pizza): ?>
            <?php $overall += $pizza->getNumber() * $pizza->getCost() ?>
            <tr>
                <td><?= $pizza->getNumber() ?></td>
                <td><?= $pizza->getSizeToHuman() ?></td>
                <td><?= $pizza->getName() ?></td>
                <td><?= $pizza->getNumber() * $pizza->getCost() ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Osszesen:</td>
            <td colspan="1"><?= $overall ?></td>
        </tr>
    </table>
</div>
</body>
</html>
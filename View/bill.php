<table>
    <tr>
        <th>db</th>
        <th>Nagyság</th>
        <th>Név</th>
        <th>Ár</th>
    </tr>
    <?php $overall = 0; ?>
    <?php /** @var \Model\Pizza $pizza */ ?>
    <?php foreach ($pizzas as $pizza): ?>
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
<a href="/order">
    <button>Vissza!</button>
</a>
<a href="/order/make">
    <button>Megrendelem!</button>
</a>
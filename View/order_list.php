<?php
/**
 * Created by PhpStorm.
 * User: after8
 * Date: 4/7/18
 * Time: 12:37 PM
 */

/** @var $order \Model\Order */
$fakerPizza = new \Model\Pizza();
?>
<table>
    <tr>
        <th>Név</th>
        <th>Cim</th>
        <th>Pizza</th>
        <th></th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order->getName() ?></td>
            <td><?= $order->getAddress() ?></td>
            <td>
                <table>
                    <tr>
                        <th>Név</th>
                        <th>db</th>
                        <th>Méret</th>
                    </tr>
                    <?php foreach ($order->getOrder() as $pizza): ?>
                        <tr>
                            <td><?= $fakerPizza->getBy(['id' => $pizza->id])[0]->getName() ?></td>
                            <td><?= $pizza->number ?></td>
                            <td><?= $fakerPizza->getSizeToHuman($pizza->size) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
            <td><a href="/admin/order/done?id=<?= $order->getId() ?>">Kész</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
?>
<h2>Az Ön kosarának tartalma:</h2>
<div>
    <?php if(!($_SESSION['loggedInUser'] instanceof \Model\User) || $_SESSION['loggedInUser']->getEmail() === null) :?>
    <p>A rendeléshez be kell lépnie</p>
    <?php endif; ?>
    <form id="cart_list" method="POST" action="/order/bill">
        <?php foreach ($orderList as $order): ?>
            <div class="row"><?= $order->getName()?>
                <input name="id[]" type="hidden" value="<?= $order->getId() ?>">
                <input name="item[]" type="number" value="<?= $order->getNumber() | 1?>">
                <select name="type[]">
                    <option value="1" <?=$order->getSize()===\Model\Pizza::SIZE_28 ? 'selected' : ''?>>28</option>
                    <option value="2" <?=$order->getSize()===\Model\Pizza::SIZE_38 ? 'selected' : ''?>>38</option>
                    <option value="3" <?=$order->getSize()===\Model\Pizza::SIZE_60 ? 'selected' : ''?>>60</option>
                    <option value="4" <?=$order->getSize()===\Model\Pizza::SIZE_100 ? 'selected' : ''?>>100</option>
                </select>
            </div>
        <?php endforeach; ?>
        <button>Tovább</button>
    </form>
</div>

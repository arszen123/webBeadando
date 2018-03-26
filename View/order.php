<?php
var_dump($_SESSION['loggedInUser']);
?>
<h2>Az Ön kosarának tartalma:</h2>
<div>
    <p>A rendeléshez be kell lépnie</p>
    <form id="cart_list">
        <div class="row">Chuck Noris
            <input name="item" type="number" value="99">
            <select name="type">
                <option>28</option>
                <option>38</option>
                <option>60</option>
                <option>100</option>
            </select>
        </div>
        <div class="row">Hawaii <input name="item" type="number" value="1">
            <select name="type">
                <option>28</option>
                <option>38</option>
                <option>60</option>
                <option>100</option>
            </select>
        </div>
        <div class="row">Nutella <input name="item" type="number" value="2">
            <select name="type">
                <option>28</option>
                <option>38</option>
                <option>60</option>
                <option>100</option>
            </select>
        </div>
        <button>Megrendelem</button>
    </form>
</div>

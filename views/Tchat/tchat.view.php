<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">BIENVENUE DANS LE MINI-CHAT</h1>
<br>
<br>

<style>
    
</style>



<div class="tchat">


    <form method="POST" action="<?= URL ?>tchat">

        <div class="mb-3">
            <label for="user" class="form-label">PSEUDO :</label>
            <input type="text" class="form-control" name="user" placeholder="Indiquez votre pseudo...">
        </div>
        <br>
        <div class="form-group">
            <label for="message">MESSAGE :</label>
            <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Indiquez votre message..."></textarea>
        </div>
        <br>
        <div>
            <button type="reset" class="btn btn-primary">REINITIALISER LE FORMULAIRE</button>
            <button name="submit" class="btn btn-primary" >SEND</button>
        </div>


    </form>
</div>


<br>
<br>

<?php
for ($i = 0; $i < count($tchats); $i++) : ?> 
<div>
        <table>
            <tr>
                <td class="align-middle"><?= $tchats[$i]->getId(); ?></td>
                <td class="align-middle"><?= $tchats[$i]->getUser(); ?></td>
                <td class="align-middle"><?= $tchats[$i]->getMessage(); ?></td>
            </tr>
        </table>
    </div>
<?php endfor; ?>
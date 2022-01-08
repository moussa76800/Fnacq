<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Welcome to mini-chat</h1>
<br>
<br>

<style>

</style>



<div class="tchat">


    <form method="POST" action="<?= URL ?>tchat">

        <div class="mb-3" style="font-weight: bold">
            <label for="user" class="form-label">PSEUDO :</label>
            <input type="text" class="form-control" name="user" placeholder="Indiquez votre pseudo...">
        </div>
        <br>
        <div class="form-group" style="font-weight: bold">
            <label for="message">MESSAGE :</label>
            <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Indiquez votre message..."></textarea>
        </div>
        <br>
        <div>
            <button type="reset" class="btn btn-primary" style="font-weight: bold">Reset form</button>
            <button name="submit" class="btn btn-primary" style="font-weight: bold">Add comment</button>
        </div>


    </form>
</div>


<br>



<table class="table text-center">
    <tr class="table-dark">
      <th  style="font-weight: bold"  >ID</th>
      <th  style="font-weight: bold" >USER</th>
      <th  style="font-weight: bold" >COMMENT</th>
    </tr>

  <?php
for ($i = 0; $i < count($tchats); $i++) : ?>

    <tr>
      <td><class="align-middle"><?= $tchats[$i]->getId(); ?></td>
      <td><class="align-middle"><?= $tchats[$i]->getUser(); ?></td>
      <td><class="align-middle"><?= $tchats[$i]->getMessage(); ?></td>
    </tr>
<?php endfor; ?>
</table>
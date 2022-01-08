<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">User rights management page</h1>
<br>
<br>


<thead>
<table class="table ">
    <tr class="table-dark">
            <th>Login</th>
            <th>Valid</th>
            <th>Rôle</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td><?= $utilisateur['login'] ?></td>
                <td><?= (int)$utilisateur['est_valide'] === 0 ? "non validé" : "validé" ?></td>
                <td>
                    <?php if($utilisateur['role'] === "administrateur") : ?>
                        <?= $utilisateur['role'] ?>
                    <?php else: ?>
                        <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                            <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                            <select class="form-select" name="role" onchange="confirm('confirmez vous la modification ?') ? submit() : document.location.reload()">
                                <option value="utilisateur" <?= $utilisateur['role'] === "utilisateur"  ? "selected" : ""?>>User</option>
                                <option value="utilisateur_Indesirable" <?= $utilisateur['role'] === "utilisateur_Indesirable" && $utilisateur['est_valide'] === "0"  ? "selected" : ""?>> Unwanted user</option>
                                <option value="administrateur" <?= $utilisateur['role'] === "administrateur" ? "selected" : ""?>>Administrator</option>
                            </select>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </thead>
</table>
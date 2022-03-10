<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">User rights management page</h1>
<br>
<br>


<thead>
    <table class="table text-center ">
        <tr class="table-dark ">
            <th>Login</th>
            <th>Valid</th>
            <th>Rôle</th>
            <th>Profil</th>
            <td>Last 5 comments</th>
            <td>number of connections in of</th>



        </tr>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                
                <td><?= $utilisateur['login'] ?></td>
                <td><?= (int)$utilisateur['est_valide'] === 0 ? "non validé" : "validé" ?></td>
                <td>
                    <?php if ($utilisateur['role'] === "administrateur") : ?>
                        <?= $utilisateur['role'] ?>
                    <?php else : ?>
                        <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                            <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                            <select class="form-select" name="role" onchange="confirm('confirmez vous la modification ?') ? submit() : document.location.reload()">
                                <option value="utilisateur" <?= $utilisateur['role'] === "utilisateur"  ? "selected" : "" ?>>User</option>
                                <option value="utilisateur_Indesirable" <?= $utilisateur['role'] === "utilisateur_Indesirable" && $utilisateur['est_valide'] === "0"  ? "selected" : "" ?>> Unwanted user</option>
                                <option value="administrateur" <?= $utilisateur['role'] === "administrateur" ? "selected" : "" ?>>Administrator</option>
                            </select>
                        </form>
                    <?php endif; ?>
                </td>

                <td><a href="showProfilUser/<?= $utilisateur['login'] ?>" class="btn btn-success d-block">Voir Profil</a></td>
                <td><a href="showCommentUser\<?= $utilisateur['login'] ?>" class="btn btn-success d-block">Voir 5 derniers commentaires</a></td>
                <td>
                    <form>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">Today</option>
                            <option value="2">The last 7 days</option>
                        </select>
                        </div>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
</thead>
</table>
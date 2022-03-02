<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Bienvenue dans les 5 derniers commenataires </h1>




    
<div style="background: white ; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px; margin-top: 20px">

    <table class="table text-center">
        <tr class="table-info">
            <th style="font-weight: bold">USER</th>
            <th style="font-weight: bold">COMMENT</th>
            <th colspan="5" style="font-weight: bold"></th>

        </tr>


        <?php

        for ($i = 0; $i < count($comments); $i++) : ?>

            
           
                <tr>
                    
                <td class="align-middle"><?= $comments[$i]['author'] ?></td>
                    <td class="align-middle"><?= $comments[$i]['comment'] ?></td>
                    <td class="align-middle"><?= $comments[$i]['created_at'] ?></td>
            </div>
            </tr>
        <?php endfor;
        ?>
    </table>

</div>
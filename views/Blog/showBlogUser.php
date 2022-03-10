<div style="background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px; margin-top: 20px">

    <h3><b>Comments</b></h3>


    <table class="table text-center">
        <tr class="table-info">
            <th style="font-weight: bold">USER</th>
            <th style="font-weight: bold">COMMENT</th>
            <th colspan="5" style="font-weight: bold"></th>

        </tr>


        <?php

        for ($i = 0; $i < count($comment); $i++) : ?>
            <div style="background: #eee; margin-top: 20px; padding: 5px 10px; border-radius: 10px">
                <tr>
                    <td class="align-middle"><?= $comment[$i]->getAuthor(); ?></td>
                    <td class="align-middle"><?= $comment[$i]->getComment(); ?></td>
                    <td class="text-align: right; font-size: 12px; color: #665 ;font-weight: bold">Created_at <?= $comment[$i]->getCreated_at(); ?></td>
            </div>
            </tr>
        <?php endfor;
        ?>
    </table>

</div>
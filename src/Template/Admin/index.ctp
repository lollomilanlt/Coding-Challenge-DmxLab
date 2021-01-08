
<!--
    View dashboard Admin
-->
<h1>Courses</h1>
<div class="courses"><table>

    <tr>
        <th>Title</th>
        <th>Description</th>
        <th><p><?= $this->Html->link('Aggiungi Corso', ['controller' => 'Courses','action' => 'add']) ?></p></th>
        <th><p><?= $this->Html->link('Log Out', ['controller' => 'Users','action' => 'logout']) ?></p></th>
        
    </tr>

   

    <?php foreach ($courses as $course): ?>
    <tr>
        <td>
            <?= $this->Html->link($course->name, ['action' => 'viewadmin', $course->description]) ?>
        </td>
       
        <td>
            <?= $course->description?>
            
        </td>

        <td>
        <?= $this->Form->postLink(
                'Cancella',
                ['action' => 'delete', $course->name],
                ['confirm' => 'Are you sure?'])
            ?>

        </td>
        
    </tr>
    
    <?php endforeach; ?>
    </table>
    </div>


    <h1>Requests</h1>
    <div class="requests"><table>

<tr>
    <th>User id</th>
    <th>Request id</th>
    <th>Status</th>
    
    
</tr>



<?php foreach ($requests as $request): ?>
<tr>
    <td>
        <?=  $request->users_id ?>
    </td>
   
    <td>
        <?= $request->id?>
        
    </td>

    <td>
    <?= $request->status?>

    </td>

    <td>
        <?= $this->Form->postLink(
                'Accetta',
                ['action' => 'accept', $request->id, $request->users_id],
                ['confirm' => 'Sei sicuro?']
                )

                
            ?>

        <?= $this->Form->postLink(
                'Rifiuta',
                ['action' => 'refuse', $request->id, $request->users_id],
                ['confirm' => 'Sei sicuro??']
                )

                
            ?>  

        </td>

    
</tr>

<?php endforeach; ?>
</table>
    </div>

    



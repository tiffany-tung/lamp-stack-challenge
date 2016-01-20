<table class="table">
  <tr>
    <td>Title</td>
    <td>Released</td> 
    <td>Tickets</td>
    <td>Gross</td>
  </tr>
  <?php
    foreach ($matches as $data) :
  ?>
    <tr>
        <td><a href="detailed-page.php?primaryKey=<?=$data['primary_key'] ?>"><?= $data['title'] ?></a></td>
        <td><?= htmlentities(date("j-M-Y", strtotime($data['released']))) ?></td>
        <td><?= number_format($data['tickets']) ?></td>
        <td><?= "$" . (number_format($data['gross'])) ?></td>
    </tr>
  <?php
    endforeach;
  ?>
</table>
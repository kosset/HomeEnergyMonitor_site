
<table class="table table-bordered">
  <thead>
    <tr>
      <?php
        $cols = $_SESSION['cols'];
        $rows = $_SESSION['rows'];
        $colNames = $_SESSION['colNames'];
        $values = $_SESSION['values'];

        for ($i = 0; $i < ($cols); $i++) {
          echo "<th>".$colNames[$i]."</th>";
        }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
      for ($j = 0; $j < ($rows); $j++) {
              echo "<tr>";
              for ($i = 0; $i < ($cols); $i++) {
                      echo "<td>".$values[$j][$i]."</td>";
              } //end for
              echo "</tr>";
      }
    ?>
  </tbody>
</table>
<!--Basic Filter Options -->
<div class="container-fluid border bg-gradient-primary mb-3 pt-3 pb-3">
    <span class="lead text-white">Basic Details About Students</span>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STUDENT NUMBER</th>
                        <th>YEAR</th>
                        <th>DEPARTMENT</th>
                        <th>EMAIL</th>
                        <th>SEX</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STUDENT NUMBER</th>
                        <th>YEAR</th>
                        <th>DEPARTMENT</th>
                        <th>EMAIL</th>
                        <th>SEX</th>
                        <th>OPTIONS</th>
                    </tr>
                </tfoot>
                <tbody id="tbody-data">
                    <?php
                        $query = "SELECT STUDENT_NUMBER,ACADEMIC_YEAR,DEPARTMENT,EMAIL,SEX FROM student_details ORDER BY ACADEMIC_YEAR ASC;";
                        $sql = mysqli_query($connection,$query);
                        if ($sql){
                            $tbody = "";
                            while ($result = mysqli_fetch_assoc($sql)){
                                $tbody .= "<tr>";
                                $tbody .= "<td>{$result['STUDENT_NUMBER']}</td>";
                                $tbody .= "<td>{$result['ACADEMIC_YEAR']}</td>";
                                $tbody .= "<td>{$result['DEPARTMENT']}</td>";
                                $tbody .= "<td>{$result['EMAIL']}</td>";
                                $tbody .= "<td>{$result['SEX']}</td>";
                                $tbody .= "<td><a href=\"dashboard.php?page=filters&stnum={$result['STUDENT_NUMBER']}\">D</a>&nbsp;<a href=\"dashboard.php?page=filters&stnum={$result['STUDENT_NUMBER']}\">E</a></td>";
                                $tbody .= "</tr>";
                            }
                            echo $tbody;
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
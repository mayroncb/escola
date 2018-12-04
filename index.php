<html>
    <head>
        <meta charset="UTF-8">
        <title>Página Inicial</title>
        <link href="css/site.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <table>
            <h1> Alunos matriculados </h1>

            <form action="insere.php" method="post">
                <fieldset>
                    <label>Nome</label>
                    <input type ="text" name="nome" />
                    <br>

                    <label>Email</label>
                    <input type ="email" name="email" />
                    <br>

                    <label>Turma</label>

                    <select name="turma">
                        <option value="PHP1">PHP1</option>
                        <option value="PHP2">PHP2</option>
                        <option value="Mysql">Mysql</option>
                        <option value="AJAX">Ajax</option>
                        <option value="HTML">HTML</option>
                    </select>
                    <br>    

                    <label>Data de nascimento</label>
                    <input type ="date" name="data" />
                    <br>

                    <button type="submit">Cadastrar</button>
                </fieldset>
            </form>
            <br>

            <tr>
                <th><a href="?coluna=nome">Nome</th>
                <th><a href="?coluna=email">Email</th>
                <th><a href="?coluna=turma">Turma</th>
                <th><a href="?coluna=data">Data de Aniversário</th>
            </tr>   

            <?php
            require 'bd.php';

            /*
              if (isset($_GET["coluna"]) == false){
              $coluna = "nome";
              } else {
              $coluna = $_GET["coluna"];
              } */

            //condição ternaria
            $coluna = (isset($_GET["coluna"]) == false) ? "nome" : $_GET["coluna"];

            $con = dbcon();

            $sql = "SELECT * FROM alunos ORDER BY $coluna ASC";

            $res = mysqli_query($con, $sql);

            $alunos = mysqli_fetch_all($res, MYSQLI_ASSOC);


            foreach ($alunos as $aluno) {

                $data_ori = $aluno["data"];
                $nova_data = explode("-", $data_ori);
                $time = mktime(0, 0, 0, $nova_data[1], $nova_data[2], $nova_data[0]);
                $data = date('d/m/Y', $time);


                echo "<tr>";
                echo "<td>" . $aluno["nome"] . "</td>";
                echo "<td>" . $aluno["email"] . "</td>";
                echo "<td>" . $aluno["turma"] . "</td>";
                echo "<td>" . $data . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>

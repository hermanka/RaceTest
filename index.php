<?php
include "functions.php";
$pdo = pdo_connect();
$stmt = $pdo->prepare('SELECT * FROM deposit');
$stmt->execute();
$deps = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $stmtr = $pdo->prepare('UPDATE deposit set amount= 1000000 WHERE id = ?');
    $stmtr->execute([$_GET['id']]);
    header("location: index.php");
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?= style_script() ?>
        <script>
            $(document).ready(function() {
                $('#deposit').DataTable();
            });
        </script>

        <title>Poor Bank, inc.</title>
    </head>

    <body>
        <div class="container">
            <h2>Just A Poor Bank</h2>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table table-striped" id="deposit">
                        <thead>
                            <tr>
                                <th>Account ID</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($deps as $dep) : ?>
                                <tr>
                                    <td><?= $dep['id'] ?></td>
                                    <td><?= $dep['amount'] ?></td>
                                    <td class="actions">
                                        <a type="button" class="btn btn-outline btn-danger" href="index.php?id=<?= $dep['id'] ?>" class="trash" onclick="return confirm('Are you sure you want to reset this account?');">RESET</a>
                                    </td>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Account ID</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center">
            <p class="mt-5 mb-3 text-muted">hk &copy; 2023</p>
        </div>
    </body>

    </html>
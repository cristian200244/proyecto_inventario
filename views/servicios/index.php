<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800 ">Servicios Relizados
                    <form class="d-flex float-end" role="search">
                        <input class="form-control me-2" type="search" placeholder="buscar " aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>
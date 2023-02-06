<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Administración</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<header class="bg-success py-1">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">ADMINISTRACIÓN</h1>
        </div>
    </div>
</header>
<body>
    <div class=" bg-danger p-1">
        <div class="row text-center">
            <div class="col border-end">Column</div>
            <div class="col border-end">Column</div>
            <div class="col border-end">Column</div>
            <div class="col border-end">Column</div>
            <div class="col">Column</div>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
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
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Example</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>